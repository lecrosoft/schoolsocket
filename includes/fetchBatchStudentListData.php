<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$term_Id = $_GET['term_Id'];
$batch_Id = $_GET['batch_Id'];

$query = "WHERE ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }

if ($batch_Id) {
    $query .= "`batch_student_list`.`batch_id` = '" . $batch_Id . "' AND ";
}
if ($term_Id) {
    $query .= "`batch_student_list`.`term_id` = '" . $term_Id . "'";
}
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    $sql = "SELECT `batch_student_list`.`id`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name`,`user`.`photo`,`user`.`admission_date`,`user`.`admission_number`,`batch_student_list`.`batch_id`,`class`.`class_name`,`class`.`abbreviation`,`batch`.`arm`,`user`.`user_id` FROM `batch_student_list` LEFT JOIN `batch` ON `batch_student_list`.`batch_id` = `batch`.`batch_id` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `user` ON `batch_student_list`.`user_id`=`user`.`user_id` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
