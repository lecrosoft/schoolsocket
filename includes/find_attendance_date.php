<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['attendance_date'])) {
    $attendance_date = $_POST['attendance_date'];
    $term_Id = $_POST['term_Id'];
    $session_id = $_POST['session_id'];
    $batch_Id = $_POST['batch_Id'];




    $sql = "SELECT `atendance_date`,`attendance_status` FROM `atendance_date` WHERE `batch_id` = '" . $batch_Id . "' AND term_id = '" . $term_Id . "' AND `session_id` = '" . $session_id . "' AND `atendance_date` = '" . $attendance_date . "'";

    $querySql = mysqli_query($db->con, $sql) or
        die('QUERY ERROR' . mysqli_error($db->con));;
    $countSql = mysqli_num_rows($querySql);
    if ($querySql) {
        global $global;
        if ($countSql > 0) {

            $row = mysqli_fetch_assoc($querySql);
            extract($row);
            // return true;
            $response['message'] = "Attendance Taken";

            echo json_encode($response);
        } else {
            $response['message'] = "Attendance Not Taken";
            echo json_encode($response);
        }
        // echo "Success";
    }
}
