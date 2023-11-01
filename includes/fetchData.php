<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$status = $_GET['status'];
$batch = $_GET['batch'];

$query = "WHERE `user_type` = 'Student' && ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }

if ($batch) {
    $query .= "`user`.`batch_id` = '" . $batch . "' && ";
}
if ($status) {
    $query .= "`user`.`status` = '" . $status . "'";
}
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    $sql = "SELECT `user`.`status`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name`,`user`.`batch_id`,`user`.`gender`,`user`.`photo`,`class`.`class_name`,`batch`.`arm`,`user`.`user_id`,`user`.`admission_number`,`user`.`linked_status`,`user`.`parent_id`,`user`.`parent_fullname`,`user`.`date_created` FROM `user` LEFT JOIN `batch` ON `user`.`batch_id` = `batch`.`batch_id` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
