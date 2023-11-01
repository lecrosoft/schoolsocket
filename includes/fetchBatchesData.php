<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$academy_session = $_GET['academy_session'];
$class = $_GET['class'];

$query = "WHERE ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }

if ($class) {
    $query .= "`batch`.`class_id` = '" . $class . "' && ";
}
if ($academy_session) {
    $query .= "`batch`.`academic_session_id` = '" . $academy_session . "'";
}
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    // $sql = "SELECT `arm`,`a_user_id`,`class`.`class_id`,`abbreviation`,`session_title`,`student_count`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name`,`class_teacher_id`,`assistant_class_teacher_id`,`batch`.`batch_id`,`assistant_class_teacher`.`a_surname`,`assistant_class_teacher`.`a_first_name`,`assistant_class_teacher`.`a_middle_name` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` LEFT JOIN `user` ON `batch`.`class_teacher_id` =`user`.`user_id` LEFT JOIN `assistant_class_teacher` ON `batch`.`batch_id` = `assistant_class_teacher`.`batch_id` $query";
    $sql = "SELECT `arm`,`batch`.`batch_id`,`class_name`,`user`.`user_id`,`class`.`class_id`,`abbreviation`,`session_title`,`student_count`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name`,`class_teacher_id`,`assistant_class_teacher_id`,`a_surname`,`a_first_name`,`a_middle_name`,`a_user_id` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` LEFT JOIN `user` ON `batch`.`class_teacher_id` =`user`.`user_id` LEFT JOIN `assistant_class_teacher` ON `batch`.`assistant_class_teacher_id` = `assistant_class_teacher`.`a_user_id` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
