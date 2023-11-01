<?php session_start() ?>
<?php

include('init.php');
$output = array();
$response = array('message' => '', 'status' => 0);
// $searchKeyWords = $_GET['search_keywords'];
$inputedUsername = $_POST['username'];
$inputedPassword = $_POST['password'];
// $inputedUsername = $db->excape_string($inputedUsername);
// $inputedPassword = $db->excape_string($inputedPassword);
$inputedUsername = mysqli_real_escape_string($db->con, $inputedUsername);
$inputedPassword = mysqli_real_escape_string($db->con, $inputedPassword);
// echo $inputedUsername;
// echo $inputedPassword;

if (!empty($inputedUsername) &&  !empty($inputedPassword)) {
    $sql = "SELECT * FROM `user` WHERE `username` = '" . $inputedUsername . "'";
    $query_sql = $db->query($sql);
    $count = mysqli_num_rows($query_sql);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($query_sql);
        extract($row);

        $verify_password = password_verify($inputedPassword, $password);
        if ($inputedUsername == $username && $verify_password == 1) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['surname'] = $surname;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['middle_name'] = $middle_name;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['photo'] = $photo;
            $_SESSION['batch_id'] = $batch_id;

            $response['message'] = 'success';
        }
    } else {
        $response['message'] = 'failed';
    }
}
echo json_encode($response);
