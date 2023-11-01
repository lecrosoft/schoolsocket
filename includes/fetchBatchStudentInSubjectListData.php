<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$term_Id = $_GET['term_Id'];
$batch_Id = $_GET['batch_Id'];
$subject_id = $_GET['subject_id'];

$query = "WHERE `student_offering_subject`.`elective` = 'NO' AND ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }

if ($batch_Id) {
    $query .= "`student_offering_subject`.`batch_id` = '" . $batch_Id . "' AND ";
}
if ($term_Id) {
    $query .= "`student_offering_subject`.`term_id` = '" . $term_Id . "' AND ";
}
if ($subject_id) {
    $query .= "`student_offering_subject`.`subject_id` = '" . $subject_id . "'";
}
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    // $sql = "SELECT `student_offering_subject`.`id`,`user`.`surname`,`user`.`first_name`,
    // `user`.`middle_name`,`user`.`photo`,`user`.`admission_date`,`user`.`admission_number`,
    // `student_offering_subject`.`batch_id`,`class`.`class_name`,`class`.`abbreviation`,
    // `batch`.`arm`,`user`.`user_id`,`assessment`.* FROM `student_offering_subject` 
    // LEFT JOIN `batch` ON `student_offering_subject`.`batch_id` = `batch`.`batch_id` 
    // LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `user` ON 
    // `student_offering_subject`.`user_id`=`user`.`user_id` LEFT JOIN `assessment` ON 
    // `student_offering_subject`.`subject_id` = `assessment`.`subject_id` $query";
    // $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    // while ($row = mysqli_fetch_array($query_sql)) {
    //     $output[] = $row;
    // }
    // echo json_encode($output);




    $sql = "SELECT `student_offering_subject`.`id`,`user`.`surname`,`user`.`first_name`,
    `user`.`middle_name`,`user`.`photo`,`user`.`admission_date`,`user`.`admission_number`,
    `student_offering_subject`.`batch_id`,`class`.`class_name`,`class`.`abbreviation`,
    `batch`.`arm`,`user`.`user_id`,`assessment`.* FROM `student_offering_subject` 
    LEFT JOIN `batch` ON `student_offering_subject`.`batch_id` = `batch`.`batch_id` 
    LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `user` ON 
    `student_offering_subject`.`user_id`=`user`.`user_id` LEFT JOIN `assessment` ON 
    `student_offering_subject`.`subject_id` = `assessment`.`subject_id` $query";

    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    $output = array();
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
