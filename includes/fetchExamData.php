<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$session_id = $_GET['session_id'];
$term_id = $_GET['term_id'];
$batch_id = $_GET['batch_id'];

$query = "WHERE ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }


if ($batch_id) {
    $query .= "`exam`.`batch_id` = '" . $batch_id . "' AND ";
}
if ($term_id) {
    $query .= "`exam`.`term_id` = '" . $term_id . "' AND ";
}
if ($session_id) {
    $query .= "`batch`.`academic_session_id` = '" . $session_id . "'";
}
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    // $sql = "SELECT `arm`,`a_user_id`,`class`.`class_id`,`abbreviation`,`session_title`,`student_count`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name`,`class_teacher_id`,`assistant_class_teacher_id`,`batch`.`batch_id`,`assistant_class_teacher`.`a_surname`,`assistant_class_teacher`.`a_first_name`,`assistant_class_teacher`.`a_middle_name` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` LEFT JOIN `user` ON `batch`.`class_teacher_id` =`user`.`user_id` LEFT JOIN `assistant_class_teacher` ON `batch`.`batch_id` = `assistant_class_teacher`.`batch_id` $query";
    $sql = "SELECT `exam`.`exam_id`,`exam`.`start_date`,`exam`.`start_date`,`arm`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`session_title`,`term`.`term_name`,`class`.`abbreviation`,`exam`.* FROM `exam` 
    LEFT JOIN `batch` ON `exam`.`batch_id` = `batch`.`batch_id` 
    LEFT JOIN `term`  ON `exam`.`term_id` = `term`.`term_id` 
    LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
    LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
