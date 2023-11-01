<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['surname'])) {
    $user_type = "Student";
    $user_role = "Student";
    $folder = '../img/';
    $current_term_id = $_POST['current_term_id'];
    $current_session_id = $_POST['current_session_id'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $religion = $_POST['religion'];
    $date_created = date('Y-m-d');
    $batch_id = $_POST['batch_id'];
    $student_cat_id = $_POST['student_cat_id'];
    $blood_group = $_POST['blood_group'];
    $student_type = $_POST['student_type'];
    $photo = $_FILES['photo']['name'];
    $tmp_file = $_FILES['photo']['tmp_name'];
    $health_info = $_POST['health_info'];
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $state_of_origin = $_POST['state_of_origin'];
    $nationalty = $_POST['nationalty'];
    $local_govt = $_POST['local_govt'];
    $batch_id = $_POST['batch_id'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $health_info = $_POST['health_info'];
    $admission_number = $_POST['admission_number'];
    $this_user_batch_id = $batch_id;

    $sql = "INSERT INTO `user`(`surname`, `first_name`, `middle_name`, `admission_number`, `date_created`,
     `date_of_birth`, `gender`, `user_type`, `user_role`, `religion`, `blood_group_id`,
      `nationality_id`, `state_of_origin_id`, `local_gov_of_origin`, `batch_id`,
       `student_category_id`,`student_type`,`email`, `mobile_number`,`address`,
        `health_info`,`photo`) ";
    $sql .= "VALUES ('";
    $sql .= $surname . "','";
    $sql .= $firstname . "','";
    $sql .= $middlename . "','";
    $sql .= $admission_number . "','";
    $sql .= $date_created . "','";
    $sql .= $dateofbirth . "','";
    $sql .= $gender . "','";
    $sql .= $user_type . "','";
    $sql .= $user_role . "','";
    $sql .= $religion . "','";
    $sql .= $blood_group . "','";
    $sql .= $nationalty . "','";
    $sql .= $state_of_origin . "','";
    $sql .= $local_govt . "','";
    $sql .= $batch_id . "','";
    $sql .= $student_cat_id . "','";
    $sql .= $student_type . "','";
    $sql .= $email . "','";
    $sql .= $mobile_number . "','";
    $sql .= $address . "','";
    $sql .= $health_info . "','";
    $sql .= $photo . "'";
    $sql .= ")";

    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {
        global $global;
        $id = $db->the_insert_id();
        $this_user_id = $id;
        // $sqlUser = $user->fetchUserById($id);
        move_uploaded_file($tmp_file, $folder . $photo);
        $username = 's' .  $id;
        $password = $username . '123';
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sqlupdate = "UPDATE user SET `username` = '" . $username . "',`password` = '" . $hashed_password . "' WHERE `user`.`user_id` = '" . $id . "'";
        $query_update = $db->query($sqlupdate);

        if ($query_update) {
            $add_to_batch_sql = "INSERT INTO `batch_student_list`(`user_id`, `batch_id`, `term_id`) ";
            $add_to_batch_sql .= "VALUES ('";
            $add_to_batch_sql .= $id . "','";
            $add_to_batch_sql .= $batch_id . "','";
            $add_to_batch_sql .= $current_term_id . "'";
            $add_to_batch_sql .= ")";
            $query_add_to_batch_sql = mysqli_query($db->con, $add_to_batch_sql);

            if ($query_add_to_batch_sql) {
                $update_batch = "UPDATE `batch` SET `batch`.`student_count` = `batch`.`student_count`+1 
                WHERE `batch`.`batch_id` = '" . $batch_id . "'";
                $query_batch = $db->query($update_batch);
            }
            if ($query_batch) {
                $invoice_sql = "SELECT * FROM `batch` WHERE `batch_id` = $batch_id";
                $queryInvoice_Sql = mysqli_query($db->con, $invoice_sql);
                $row = mysqli_fetch_assoc($queryInvoice_Sql);
                extract($row);
                if ($invoice == "Configured") {

                    $fetch_invoice_sum = "SELECT SUM(total) as total FROM `invoice` 
                    WHERE `session_id` = '" . $current_session_id . "' 
                    AND `term_id` = '" . $current_term_id . "' AND batch_id = '" . $batch_id . "' 
                    AND `invoice`.`type` = 'Compulsary'";
                    $query_invoice_fetch = mysqli_query($db->con, $fetch_invoice_sum);
                    $row = mysqli_fetch_assoc($query_invoice_fetch);
                    $totalFees = $row['total'];

                    $update_student = "UPDATE `user` SET `user`.`total_fees` = `user`.`total_fees`+ '" . $totalFees . "' 
                    WHERE `user`.`user_type` = 'Student' AND `user`.`batch_id` = '" . $batch_id . "' 
                    AND `user`.`user_id` = '" . $id . "'";
                    $querySqlUpdate_student = mysqli_query($db->con, $update_student);



                    $sql = "INSERT INTO `termly_fee_summary`(`user_id`, `batch_id`, `session_id`, `term_id`, `total_fees` ) ";
                    $sql .= "VALUES ('";
                    $sql .= $id . "','";
                    $sql .= $batch_id . "','";
                    $sql .= $current_session_id . "','";
                    $sql .= $current_term_id . "','";
                    $sql .= $totalFees . "'";
                    $sql .= ")";
                    $query_Sql = mysqli_query($db->con, $sql);


                    if ($query_Sql) {
                        $invoice_sql = "SELECT * FROM `invoice` WHERE `invoice`.`session_id` = '" . $current_session_id . "' AND `invoice`.`term_id` = '" . $current_term_id . "' AND `invoice`.`batch_id` = '" . $this_user_batch_id . "'";
                        $query_invoice_sql = mysqli_query($db->con, $invoice_sql);
                        $count_invoice_sql = mysqli_num_rows($query_invoice_sql);
                        if ($count_invoice_sql > 0) {
                            while ($row = mysqli_fetch_assoc($query_invoice_sql)) {
                                extract($row);
                                $student_invoice_sql = "INSERT INTO `student_invoice`(`user_id`, `session_id`, `term_id`, `item_id`, `price`, `quantity`, `total`, `type`, `note`, `batch_id`) ";
                                $student_invoice_sql .= "VALUES ('";
                                $student_invoice_sql .= $this_user_id . "','";
                                $student_invoice_sql .= $current_session_id . "','";
                                $student_invoice_sql .= $current_term_id . "','";
                                $student_invoice_sql .= $item_id . "','";
                                $student_invoice_sql .= $price . "','";
                                $student_invoice_sql .= $quantity . "','";
                                $student_invoice_sql .= $total . "','";
                                $student_invoice_sql .= $type . "','";
                                $student_invoice_sql .= $note . "','";
                                $student_invoice_sql .=
                                    $this_user_batch_id . "'";
                                $student_invoice_sql .= ")";
                                $query_student_invoice_sql = mysqli_query($db->con, $student_invoice_sql);
                            }
                        }
                    }

                    // Check if subject already exists for batch and term
                    $checkSubject = "SELECT * FROM `batch_subject` WHERE `batch_subject`.`batch_id` = '$this_user_batch_id' AND `term_id` = '$current_term_id'";
                    $querySubjectSql = mysqli_query($db->con, $checkSubject);
                    $countSubject = mysqli_num_rows($querySubjectSql);
                    if ($countSubject > 0) {
                        while ($row = mysqli_fetch_assoc($querySubjectSql)) {
                            extract($row);

                            $single_subject_sql = "INSERT INTO `student_offering_subject`
                            (`user_id`, `subject_id`, `batch_id`, `term_id`, `elective`) 
                            VALUES ('$this_user_id','$subject_id','$batch_id','$term_id','$elective')";
                            $querySingle_subject_sql = mysqli_query($db->con, $single_subject_sql);
                        }
                    }
                }

                $response['message'] = "success";

                echo json_encode($response);
            }
        }


        // return true;


        // echo "Success";
    } else {
        $response['message'] = "failed";
        echo $response['message'];
        die('QUERY ERROR' . mysqli_error($db->con));
    }
}
