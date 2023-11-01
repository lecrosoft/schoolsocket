<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['surname'])) {
    $user_type = "Employee";
    $user_role = "Teacher";
    $folder = '../img/';
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $religion = $_POST['religion'];
    $employment_date = $_POST['datejoined'];
    $marital_status = $_POST['marital_status'];
    $employee_position = $_POST['employee_position'];
    $blood_group = $_POST['blood_group'];
    $staff_type = $_POST['employee_category'];
    $photo = $_FILES['photo']['name'];
    $tmp_file = $_FILES['photo']['tmp_name'];
    $signature = $_FILES['signature']['name'];
    $tmp_signature_file = $_FILES['signature']['tmp_name'];
    $qualification = $_POST['qualification'];
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $phone_number = $_POST['phone_number'];
    $nationalty = $_POST['nationalty'];
    $department = $_POST['department'];
    $nextofkin_name = $_POST['nextofkin_name'];
    $nextofkin_relationship = $_POST['nextofkin_relationship'];
    $nextofkin_mobile_number = $_POST['nextofkin_mobile_number'];
    $next_of_kin_address = $_POST['next_of_kin_address'];
    $bank_name = $_POST['bank_name'];
    $account_number = $_POST['account_number'];
    $account_name = $_POST['account_name'];
    $salary = $_POST['salary'];
    $employee_number = $_POST['employee_number'];


    $sql = "INSERT INTO `user`(`surname`,`first_name`, 
    `middle_name`,
    `date_of_birth`, `gender`, 
    `user_type`,`user_role`,`staff_type`,`religion`, `blood_group_id`, 
    `nationality_id`,`email`, `mobile_number`, `phone_no`, 
    `address`,`photo`,`signature`,`employee_number`, `employment_date`, 
    `marital_status`, `employee_position`, `department`, `nextofkin_name`, 
    `nextofkin_relationship`, `nextofkin_mobile_number`, `next_of_kin_address`, 
    `bank_name`, `account_number`, `account_name`,`qualification`, `salary`) ";
    $sql .= "VALUES ('";
    $sql .= $surname . "','";
    $sql .= $firstname . "','";
    $sql .= $middlename . "','";
    $sql .= $dateofbirth . "','";
    $sql .= $gender . "','";
    $sql .= $user_type . "','";
    $sql .= $user_role . "','";
    $sql .= $staff_type . "','";
    $sql .= $religion . "','";
    $sql .= $blood_group . "','";
    $sql .= $nationalty . "','";
    $sql .= $email . "','";
    $sql .= $mobile_number . "','";
    $sql .= $phone_number . "','";
    $sql .= $address . "','";
    $sql .= $photo . "','";
    $sql .= $signature . "','";
    $sql .= $employee_number . "','";
    $sql .= $employment_date . "','";
    $sql .= $marital_status . "','";
    $sql .= $employee_position . "','";
    $sql .= $department . "','";
    $sql .= $nextofkin_name . "','";
    $sql .= $nextofkin_relationship . "','";
    $sql .= $nextofkin_mobile_number . "','";
    $sql .= $next_of_kin_address . "','";
    $sql .= $bank_name . "','";
    $sql .= $account_number . "','";
    $sql .= $account_name . "','";
    $sql .= $qualification . "','";
    $sql .= $salary . "'";
    $sql .= ")";

    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {
        global $global;
        $id = $db->the_insert_id();
        // $sqlUser = $user->fetchUserById($id);
        move_uploaded_file($tmp_file, $folder . $photo);
        move_uploaded_file($tmp_signature_file, $folder . $signature);
        $username = 'e' .  $id;
        $password = $username . '123';
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sqlupdate = "UPDATE user SET `username` = '" . $username . "',`password` = '" . $hashed_password . "' WHERE `user`.`user_id` = '" . $id . "'";
        $query_update = $db->query($sqlupdate);

        if ($query_update) {
            $response['message'] = "success";

            echo json_encode($response);
        } else {
            $response['message'] = "failed";
            echo $response['message'];
            die('QUERY ERROR' . mysqli_error($db->con));
        }


        // return true;


        // echo "Success";
    }
}
