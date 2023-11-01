<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$term_Id = $_GET['term_Id'];
// $batch_Id = $_GET['batch_Id'];
$student_id = $_GET['student_id'];
$from = $_GET['from'];
$to = $_GET['to'];
$session_id = $_GET['session_id'];

$query = "WHERE `attendance_details`.`user_id` = '" . $student_id . "' AND ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }

if ($session_id) {
    $query .= "`attendance_details`.`session_id` = '" . $session_id . "' AND ";
}
if ($term_Id) {
    $query .= "`attendance_details`.`term_id` = '" . $term_Id . "' AND ";
}
if ($from && $to) {
    $query .= "`attendance_details`.`atttendance_date` BETWEEN '" . $from . "' AND '" . $to . "'";
}
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    $sql = "SELECT `attendance_details`.`id`,`user`.`surname`,`user`.`first_name`,
    `user`.`middle_name`,`user`.`photo`,`user`.`admission_date`,`user`.`admission_number`,
    `attendance_details`.`batch_id`,`class`.`class_name`,`class`.`abbreviation`,`batch`.`arm`,
    `user`.`user_id`,`attendance_details`.`late`,`attendance_details`.`attendance_value`,
    `attendance_details`.`half_day`,`attendance_details`.`comment`,
    `attendance_details`.`atttendance_date` 
    FROM `attendance_details` 
    LEFT JOIN `batch` ON `attendance_details`.`batch_id` = `batch`.`batch_id` 
    LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
    LEFT JOIN `user` ON `attendance_details`.`user_id`=`user`.`user_id` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
