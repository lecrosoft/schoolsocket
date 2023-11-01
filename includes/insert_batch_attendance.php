<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
$attendance_status = "Attendance Taken";
if (isset($_POST['user_id'])) {

    $user_id = $_POST['user_id'];
    $attendance_date = $_POST['attendance_date'];
    $attendance_value = $_POST['attendance_value'];
    $late = $_POST['late'];
    $half_day = $_POST['half_day'];
    $comment = $_POST['comment'];
    $session_id = $_POST['session_id'];
    $term_id = $_POST['term_id'];
    $batch_id = $_POST['batch_id'];
    // echo json_encode($attendance_value);
    $find_attendance = "SELECT `atendance_date` FROM `atendance_date`  WHERE `atendance_date` = '" . $attendance_date . "' AND `batch_id` = '" . $batch_id . "' AND `term_id` = '" . $term_id . "' AND `session_id` = '" . $session_id . "'";
    $queryFind_attendance = mysqli_query($db->con, $find_attendance);

    $countAttendance = mysqli_num_rows($queryFind_attendance);
    if ($countAttendance < 1) {

        for ($i = 0; $i < count($user_id); $i++) {



            $sql = "INSERT INTO `attendance_details`(`session_id`, `term_id`, `user_id`, `batch_id`, `atttendance_date`, `attendance_value`, `late`, `half_day`, `comment`) ";
            $sql .= "VALUES ('";
            $sql .= $session_id . "','";
            $sql .= $term_id . "','";
            $sql .= $user_id[$i] . "','";
            $sql .= $batch_id . "','";
            $sql .= $attendance_date . "','";
            $sql .= $attendance_value[$i] . "','";
            $sql .= $late[$i] . "','";
            $sql .= $half_day[$i] . "','";
            $sql .= $comment[$i] . "'";
            $sql .= ")";
            $querySql = mysqli_query($db->con, $sql) or die('QUERY ERROR' . mysqli_error($db->con));
        }
        if ($querySql) {

            global $global;
            $id = $db->the_insert_id();



            $sql = "INSERT INTO `atendance_date`(`atendance_date`, `batch_id`, `term_id`, `session_id`, `attendance_status`) ";
            $sql .= "VALUES ('";
            $sql .= $attendance_date . "','";
            $sql .= $batch_id . "','";
            $sql .= $term_id . "','";
            $sql .= $session_id . "','";
            $sql .= $attendance_status . "'";
            $sql .= ")";
            $queryAttendanceDateSql = mysqli_query($db->con, $sql) or die('QUERY ERROR' . mysqli_error($db->con));



            if ($queryAttendanceDateSql) {
                $response['message'] = "success";

                echo json_encode($response);
            } else {
                $response['message'] = "failed";
                echo json_encode($response);
                //die('QUERY ERROR' . mysqli_error($db->con));
            }
        }
    }
}
