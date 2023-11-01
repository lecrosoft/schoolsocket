<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$session_id = $_GET['session_id'];
$term_id = $_GET['term_id'];
$student_id = $_GET['student_id'];

$query = "WHERE `score_sheet`.`user_id` = $student_id AND ";

if ($term_id) {
    $query .= "`score_sheet`.`term_id` = '" . $term_id . "' AND ";
}
if ($session_id) {
    $query .= "`score_sheet`.`session_id` = '" . $session_id . "'";
}

if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    $sql = "SELECT `assessment`.`id`,`assessment`.`assesment_name`,`subject_names`.`subject_name`,
    `assessment_category`.`category_name`,`assessment`.`due_date`,`assessment`.`possible_points`,`score_sheet`.`score` FROM `score_sheet` 
    LEFT JOIN `assessment` ON `score_sheet`.`assessment_id` = `assessment`.`id` 
    LEFT JOIN `subject_names` ON `assessment`.`subject_id` = `subject_names`.`subject_id` 
    LEFT JOIN `assessment_category` ON `assessment_category`.`id` =  `assessment`.`assesment_category_id` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
