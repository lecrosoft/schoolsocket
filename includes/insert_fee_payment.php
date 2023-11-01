<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['subjectId'])) {
    $subjectId = $_POST['subjectId'];
    $term_Id = $_POST['term_id'];
    $session_id = $_POST['session_id'];
    $batch_id = $_POST['batch_id'];
    $assessment_category_id = $_POST['assessment_category_id'];
    $assessment_name = $_POST['assessment_name'];
    $abbreviation = $_POST['abbreviation'];
    $due_date = $_POST['due_date'];
    $possible_points = $_POST['possible_points'];
    $description = $_POST['description'];
    $file = $_FILES['file']['name'];
    $show_on_report_card = $_POST['show_on_report_card'];
    $show_score = $_POST['show_score'];




    $sql = "INSERT INTO `assessment`
    (`subject_id`, `assesment_category_id`, `assesment_name`,
     `abbreviation`, `due_date`, `possible_points`, `description`,
      `file`, `show_on_report`,`show_score`,`term_id`,`assessment_session_id`,
      `assessment_batch_id`) ";
    $sql .= "VALUES ('";
    $sql .= $subjectId . "','";
    $sql .= $assessment_category_id . "','";
    $sql .= $assessment_name . "','";
    $sql .= $abbreviation . "','";
    $sql .= $due_date . "','";
    $sql .= $possible_points . "','";
    $sql .= $description . "','";
    $sql .= $file . "','";
    $sql .= $show_on_report_card . "','";
    $sql .= $show_score . "','";
    $sql .= $term_Id . "','";
    $sql .= $session_id  . "','";
    $sql .= $batch_id . "'";

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
