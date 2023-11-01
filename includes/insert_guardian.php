<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['surname'])) {
    $user_type = "Guardian";
    $user_role = "Guardian";
    $student_id = $_POST['userId'];
    $title = $_POST['title'];
    $folder = '../img/';
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $date_created = date('Y-m-d');
    $photo = $_FILES['photo']['name'];
    $tmp_file = $_FILES['photo']['tmp_name'];
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $phone_number = $_POST['phone_number'];
    $relationship = $_POST['relationship'];
    $emergency = $_POST['emergency'];
    $pickup = $_POST['pickup'];


    $sql = "INSERT INTO `user`
    (`title`,`surname`, `first_name`, `middle_name`,
    `date_created`,`gender`, `user_type`, `user_role`,
    `email`, `mobile_number`,`phone_no`,`address`,`photo`,
    `relationship`,`emergency`,`pickup`) ";
    $sql .= "VALUES ('";
    $sql .= $title . "','";
    $sql .= $surname . "','";
    $sql .= $firstname . "','";
    $sql .= $middlename . "','";
    $sql .= $date_created . "','";
    $sql .= $gender . "','";
    $sql .= $user_type . "','";
    $sql .= $user_role . "','";
    $sql .= $email . "','";
    $sql .= $mobile_number . "','";
    $sql .= $phone_number . "','";
    $sql .= $address . "','";
    $sql .= $photo . "','";
    $sql .= $relationship . "','";
    $sql .= $emergency . "','";
    $sql .= $pickup . "'";
    $sql .= ")";
    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {
        global $global;
        $id = $db->the_insert_id();
        $parent_id = $id;
        // $sqlUser = $user->fetchUserById($id);
        move_uploaded_file($tmp_file, $folder . $photo);
        $username = 'p' .  $id;
        $password = $username . '123';
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sqlupdate = "UPDATE user SET `username` = '" . $username . "',`password` = '" . $hashed_password . "' WHERE `user`.`user_id` = '" . $id . "'";
        $query_update = $db->query($sqlupdate);

        if ($query_update) {
            $link_student_sql = "INSERT INTO `student_guardian`(`parent_id`, `student_id`, `relationship`) ";
            $link_student_sql .= "VALUES ('";
            $link_student_sql .= $id . "','";
            $link_student_sql .= $student_id . "','";
            $link_student_sql .= $relationship . "'";
            $link_student_sql .= ")";
            $query_link_student_sql = mysqli_query($db->con, $link_student_sql);

            if ($query_link_student_sql) {
                $update_student = "UPDATE `user` SET `linked_status` ='Linked'  WHERE `user`.`user_id` = '" . $student_id . "'";
                $query_student = $db->query($update_student);
                $update_parent = "UPDATE `user` SET `number_of_wards` =`number_of_wards`+ 1  WHERE `user`.`user_id` = '" . $parent_id . "'";
                $query_parent = $db->query($update_parent);
            }
            if ($query_student & $query_parent) {

                $response['message'] = "success";

                echo json_encode($response);
            } else {
                $response['message'] = "failed";
                echo $response['message'];
                die('QUERY ERROR' . mysqli_error($db->con));
            }
        }


        // return true;


        // echo "Success";
    }
}
