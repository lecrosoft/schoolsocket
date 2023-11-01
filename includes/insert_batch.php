<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['arm'])) {
    $arm = $_POST['arm'];
    $class = $_POST['batch_class'];
    $academic_session = $_POST['academic_session'];




    $sql = "INSERT INTO `batch`(`arm`, `class_id`,`academic_session_id` ) ";
    $sql .= "VALUES ('";
    $sql .= $arm . "','";
    $sql .= $class . "','";
    $sql .= $academic_session . "'";
    $sql .= ")";

    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {
        global $global;
        $id = $db->the_insert_id();
        // return true;
        $response['message'] = "success";

        echo json_encode($response);
        // echo "Success";
    } else {
        $response['message'] = "failed";
        echo $response['message'];
        die('QUERY ERROR' . mysqli_error($db->con));
    }
}
