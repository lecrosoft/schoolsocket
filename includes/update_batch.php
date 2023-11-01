<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['batchId'])) {
    // $user_type = "Student";
    // $user_role = "Student";
    $batchId = $_POST['batchId'];
    $arm = $_POST['arm'];
    $batch_class = $_POST['batch_class'];
    $academic_session = $_POST['academic_session'];

    $sql = "UPDATE `batch` SET `arm`='" . $arm . "',`class_id`='" . $batch_class . "',`academic_session_id`='" . $academic_session . "' WHERE `batch_id`= '" . $batchId . "'";

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
