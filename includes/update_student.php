<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['userId'])) {
    // $user_type = "Student";
    // $user_role = "Student";
    $folder = '../img/';
    $userId = $_POST['userId'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $religion = $_POST['religion'];

    // $batch_id = $_POST['batch_id'];
    $student_cat_id = $_POST['student_cat_id'];
    $blood_group = $_POST['blood_group'];
    $student_type = $_POST['student_type'];
    // $photo = $_FILES['photo']['name'];
    // $tmp_file = $_FILES['photo']['tmp_name'];
    $health_info = $_POST['health_info'];
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $state_of_origin = $_POST['state_of_origin'];
    $nationalty = $_POST['nationalty'];
    $local_govt = $_POST['local_govt'];
    $admission_number = $_POST['admission_number'];


    $sql = "UPDATE `user` SET `surname`='" . $surname . "',`first_name`='" . $firstname . "',`middle_name`='" . $middlename . "',`admission_number`='" . $admission_number . "',`date_of_birth`='" . $dateofbirth . "',`gender`='" . $gender . "',`religion`='" . $religion . "',`blood_group_id`='" . $blood_group . "',`nationality_id`='" . $nationalty . "',`state_of_origin_id`='" . $state_of_origin . "',`local_gov_of_origin`='" . $local_govt . "',`student_category_id`='" . $student_cat_id . "',`student_type`='" . $student_type . "',`email`='" . $email . "',`mobile_number`='" . $mobile_number . "',`address`='" . $address . "',`health_info`='" . $health_info . "' WHERE `user_id` = '" . $userId . "'";

    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {

        // return true;
        $response['message'] = "update_success";

        echo json_encode($response);
        // echo "Success";
    } else {
        $response['message'] = "failed";
        echo $response['message'];
        die('QUERY ERROR' . mysqli_error($db->con));
    }
}
