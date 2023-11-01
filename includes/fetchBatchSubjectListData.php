<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
// $term_Id = $_GET['term_Id'];
// $batch_Id = $_GET['batch_Id'];

$query = "WHERE ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }
$batch_Id = $_GET['batch_Id'];

if ($batch_Id) {
    $query .= "`batch_subject`.`batch_id` = '" . $batch_Id . "'";
}
// if ($term_Id) {
//     $query .= "`batch_student_list`.`term_id` = '" . $term_Id . "'";
// }
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    $sql = "SELECT `batch_subject`.`id`,`batch_subject`.`batch_id`,`elective`,`employee_count`,`subject_name` FROM `batch_subject` 
    LEFT JOIN `subject_names` ON `batch_subject`.`subject_id` = `subject_names`.`subject_id` 
    LEFT JOIN `batch` ON `batch_subject`.`batch_id` = `batch`.`batch_id` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
