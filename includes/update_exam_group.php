<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['exam_name'])) {
    $exam_id = $_POST['exam_id'];
    $exam_name = $_POST['exam_name'];
    $session_id = $_POST['session_id'];
    $batch_id = $_POST['batch_id'];
    $term = $_POST['term'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $cut_off_percent = $_POST['cut_off_percent'];
    $instruction = $_POST['instruction'];
    $duration = $_POST['duration'];
    $show_result_immediately_after = $_POST['show_result_immediately_after'];
    $mode = $_POST['mode'];
    $type = $_POST['type'];
    $e_pin = $_POST['e_pin'];





    $sql = "UPDATE `exam` SET `exam_name`='" . $exam_name . "',
    `batch_id`='" . $batch_id . "',`term_id`='" . $term . "',
    `session_id`='" . $session_id . "',`start_date`='" . $start_date . "',
    `end_date`='" . $end_date . "',`passing_percentage`='" . $cut_off_percent . "',
    `instruction`='" . $instruction . "',`exam_duration`='" . $duration . "',
    `result_after_finish`='" . $show_result_immediately_after . "',
    `mode`='" . $mode . "',`exam_type`='" . $type . "',`view_result_with_pin`='" . $e_pin . "'
     WHERE `exam`.`exam_id` = '" . $exam_id . "'";
    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {
        global $global;
        $id = $db->the_insert_id();
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
