<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['term_id'])) {
    $session_id = $_POST['session_id'];
    $term_id = $_POST['term_id'];
    $item_id = $_POST['item_id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];
    $type = $_POST['type'];
    $note = $_POST['note'];
    $batch_id = $_POST['batch_id'];

    $get_student = "SELECT `user_id` FROM `user`  WHERE `user`.`user_type` = 'Student' AND `user`.`status` = 'active' AND `user`.`batch_id` = '" . $batch_id . "'";
    $queryGet_student = mysqli_query($db->con, $get_student);

    $countStudent = mysqli_num_rows($queryGet_student);
    if ($countStudent > 0) {

        for ($i = 0; $i < count($item_id); $i++) {

            $sql = "INSERT INTO `invoice`(`session_id`, `term_id`, `item_id`, `price`, `quantity`, `total`, `type`, `note`, `batch_id` ) ";
            $sql .= "VALUES ('";
            $sql .= $session_id . "','";
            $sql .= $term_id . "','";
            $sql .= $item_id[$i] . "','";
            $sql .= $price[$i] . "','";
            $sql .= $qty[$i] . "','";
            $sql .= $total[$i] . "','";
            $sql .= $type[$i] . "','";
            $sql .= $note . "','";
            $sql .= $batch_id . "'";
            $sql .= ")";
            $querySql = mysqli_query($db->con, $sql);
        }
        if ($querySql) {

            global $global;
            $id = $db->the_insert_id();



            $fetch_invoice_sum = "SELECT SUM(total) as total FROM `invoice` WHERE `session_id` = '" . $session_id . "' AND `term_id` = '" . $term_id . "' AND batch_id = '" . $batch_id . "' AND `invoice`.`type` = 'Compulsary'";
            $query_invoice_fetch = mysqli_query($db->con, $fetch_invoice_sum);
            $row = mysqli_fetch_assoc($query_invoice_fetch);
            $totalFees = $row['total'];

            $update_student = "UPDATE `user` SET `user`.`total_fees` = `user`.`total_fees`+ '" . $totalFees . "' WHERE `user`.`user_type` = 'Student' AND `user`.`status` ='Active' AND `user`.`batch_id` = '" . $batch_id . "'";
            $querySqlUpdate_student = mysqli_query($db->con, $update_student);

            while ($row = mysqli_fetch_assoc($queryGet_student)) {
                extract($row);

                $sql = "INSERT INTO `termly_fee_summary`(`user_id`, `batch_id`, `session_id`, `term_id`, `total_fees` ) ";
                $sql .= "VALUES ('";
                $sql .= $user_id . "','";
                $sql .= $batch_id . "','";
                $sql .= $session_id . "','";
                $sql .= $term_id . "','";
                $sql .= $totalFees . "'";
                $sql .= ")";
                $query_Sql = mysqli_query($db->con, $sql);


                if ($query_Sql) {
                    for ($i = 0; $i < count($item_id); $i++) {

                        $student_invoice_sql = "INSERT INTO `student_invoice`(`user_id`, `session_id`, `term_id`, `item_id`, `price`, `quantity`, `total`, `type`, `note`, `batch_id`) ";
                        $student_invoice_sql .= "VALUES ('";
                        $student_invoice_sql .= $user_id . "','";
                        $student_invoice_sql .= $session_id . "','";
                        $student_invoice_sql .= $term_id . "','";
                        $student_invoice_sql .= $item_id[$i] . "','";
                        $student_invoice_sql .= $price[$i] . "','";
                        $student_invoice_sql .= $qty[$i] . "','";
                        $student_invoice_sql .= $total[$i] . "','";
                        $student_invoice_sql .= $type[$i] . "','";
                        $student_invoice_sql .= $note . "','";
                        $student_invoice_sql .= $batch_id . "'";
                        $student_invoice_sql .= ")";
                        $query_student_invoice_sql = mysqli_query($db->con, $student_invoice_sql);
                    }
                }
            }

            if ($query_student_invoice_sql) {
                $update_batch = "UPDATE `batch` SET `invoice` = 'Configured' WHERE `batch_id` = '" . $batch_id . "'";
                $querySqlUpdate_batch = mysqli_query($db->con, $update_batch);

                $response['message'] = "success";

                echo json_encode($response);
            }
        }
    } else {
        $response['message'] = "failed";
        echo json_encode($response);
        //die('QUERY ERROR' . mysqli_error($db->con));
    }
}
