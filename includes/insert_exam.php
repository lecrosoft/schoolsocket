<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');

if (isset($_POST['exam_name'])) {
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

    // SQL query with placeholders to prevent SQL injection
    $sql = "INSERT INTO `exam` (
        `exam_name`, `batch_id`, `term_id`, `session_id`,
        `start_date`, `end_date`, `passing_percentage`,
        `instruction`, `exam_duration`, `result_after_finish`,
        `mode`, `exam_type`, `view_result_with_pin`
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    // Create a prepared statement
    if ($stmt = mysqli_prepare($db->con, $sql)) {
        // Bind the parameters and set their data types
        mysqli_stmt_bind_param(
            $stmt,
            "siiisssssssss",
            $exam_name,
            $batch_id,
            $term,
            $session_id,
            $start_date,
            $end_date,
            $cut_off_percent,
            $instruction,
            $duration,
            $show_result_immediately_after,
            $mode,
            $type,
            $e_pin
        );

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $id = $db->the_insert_id();
            $response['message'] = "success";
            echo json_encode($response);
        } else {
            $response['message'] = "failed";
            echo json_encode($response);
            die('QUERY ERROR: ' . mysqli_error($db->con));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        $response['message'] = "failed";
        echo json_encode($response);
        die('PREPARE ERROR: ' . mysqli_error($db->con));
    }
}
