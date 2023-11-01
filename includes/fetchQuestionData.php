<?php
require_once('init.php');
$output = array();
$subject_id = isset($_GET['subject_id']) ? $_GET['subject_id'] : null;
$exam_id = isset($_GET['exam_id']) ? $_GET['exam_id'] : null;

$queryConditions = array();

if (!is_null($subject_id)) {
    $queryConditions[] = "`question`.`subject_id` = '" . $subject_id . "'";
}

if (!is_null($exam_id)) {
    $queryConditions[] = "`question`.`exam_id`  = '" . $exam_id . "'";
}

if (!empty($queryConditions)) {
    $query = "WHERE " . implode(' AND ', $queryConditions);
} else {
    // If both subject_id and exam_id are null or empty, fetch all records
    $query = "";
}

$sql = "SELECT * FROM `question`
LEFT JOIN `subject_names` ON `question`.`subject_id` = `subject_names`.`subject_id`
LEFT JOIN `exam` ON `question`.`exam_id` = `exam`.`exam_id` $query";

$query_sql = $db->query($sql) or die("QUERY ERROR: " . $db->con->error);

while ($row = mysqli_fetch_array($query_sql)) {
    $output[] = $row;
}

echo json_encode($output);
