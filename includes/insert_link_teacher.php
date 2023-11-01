<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['batchToLinkId'])) {

    $batchToLinkId = $_POST['batchToLinkId'];
    $teacher_id = $_POST['teacher_id'];
    $assistant_teacher_id = $_POST['assistant_teacher_id'];

    $check_asistant_exist = "SELECT * FROM `assistant_class_teacher` WHERE `a_user_id` ='" . $assistant_teacher_id . "' ";
    $query_exist = $db->query($check_asistant_exist);
    $count = mysqli_num_rows($query_exist);

    if ($count < 1) {

        $update_batch = "UPDATE `batch` SET `class_teacher_id` = '" . $teacher_id . "',`assistant_class_teacher_id` ='" . $assistant_teacher_id . "' WHERE `batch`.`batch_id` = '" . $batchToLinkId . "'";
        $query_update_batch = $db->query($update_batch);
        if ($query_update_batch) {

            $sqlgetAssistantTeacher = "SELECT `user_id`,`surname`,`first_name`,`middle_name` FROM user  WHERE `user`.`user_id` = '" . $assistant_teacher_id . "'";
            $query_sqlgetAssistantTeacher = $db->query($sqlgetAssistantTeacher);
            $row = mysqli_fetch_assoc($query_sqlgetAssistantTeacher);
            extract($row);
            $a_teacher_id = $row['user_id'];
            $a_teacher_surname = $row['surname'];
            $a_teacher_first_name = $row['first_name'];
            $a_teacher_middle_name = $row['middle_name'];


            if ($assistant_teacher_id) {
                $sql = "INSERT INTO `assistant_class_teacher`(`a_user_id`, `batch_id`, `a_surname`, `a_first_name`, `a_middle_name`)  ";
                $sql .= "VALUES ('";
                $sql .= $a_teacher_id . "','";
                $sql .= $batchToLinkId . "','";
                $sql .= $a_teacher_surname . "','";
                $sql .= $a_teacher_first_name . "','";
                $sql .= $a_teacher_middle_name . "'";
                $sql .= ")";
                $querySql = mysqli_query($db->con, $sql);
            }



            global $global;
            $id = $db->the_insert_id();

            $sqlupdate = "UPDATE user SET `user`.`assigned_batch_id` = '" . $batchToLinkId . "' WHERE `user`.`user_id` = '" . $teacher_id . "'";
            $query_update = $db->query($sqlupdate);
            if ($query_update) {
                // return true;
                $response['message'] = "success";

                echo json_encode($response);
                // echo "Success";
            }
        }
    } else {
        $response['message'] = "failed";
        // echo $response['message'];
        // die('QUERY ERROR' . mysqli_error($db->con));
        echo json_encode($response);
    }
}
