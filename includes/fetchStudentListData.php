<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$session_Id = $_GET['session_Id'];
$term_Id = $_GET['term_Id'];
$batch_Id = $_GET['batch_Id'];

$query = "WHERE ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }


if ($session_Id) {
    $query .= "`termly_fee_summary`.`session_id` = '" . $session_Id . "' AND ";
}
if ($batch_Id) {
    $query .= "`termly_fee_summary`.`batch_id` = '" . $batch_Id . "' AND ";
}
if ($term_Id) {
    $query .= "`termly_fee_summary`.`term_id` = '" . $term_Id . "'";
}
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    $sql = "SELECT `termly_fee_summary`.`id`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name`,`user`.`photo`,`user`.`batch_id`,`class`.`class_name`,`class`.`abbreviation`,`batch`.`arm`,`user`.`user_id`,`user`.`admission_number`,`termly_fee_summary`.`total_fees`,`termly_fee_summary`.`total_discount`,`termly_fee_summary`.`amount_to_pay`,`termly_fee_summary`.`amount_paid`,`termly_fee_summary`.`outstanding` FROM `termly_fee_summary` LEFT JOIN `batch` ON `termly_fee_summary`.`batch_id` = `batch`.`batch_id` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `user` ON `termly_fee_summary`.`user_id`=`user`.`user_id` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
