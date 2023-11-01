<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$session_Id = $_GET['session_Id'];
$term_Id = $_GET['term_Id'];
$user_Id = $_GET['user_Id'];

$query = "WHERE `student_invoice`.`user_id` = $user_Id AND `student_invoice`.`type` = 'Compulsary' AND `student_invoice`.`outstanding` > 0 AND ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }


if ($term_Id) {
    $query .= "`student_invoice`.`term_id` = '" . $term_Id . "' AND ";
}
if ($session_Id) {
    $query .= "`student_invoice`.`session_id` = '" . $session_Id . "'";
}

if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    $sql = "SELECT `student_invoice`.`id`,`user`.`surname`,`user`.`first_name`,
    `user`.`middle_name`,`user`.`photo`,`user`.`batch_id`,`class`.`class_name`,
    `class`.`abbreviation`,`batch`.`arm`,`user`.`user_id`,`user`.`admission_number`,
    `term`.`term_name`,`item`.`item_name`,`student_invoice`.`price`,
    `student_invoice`.`discount`,`student_invoice`.`total`,`student_invoice`.`discount`,
    `student_invoice`.`expected_amount`,`student_invoice`.`amount_paid`,
    `student_invoice`.`outstanding` FROM `student_invoice` 
    LEFT JOIN `batch` ON `student_invoice`.`batch_id` = `batch`.`batch_id` 
    LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
    LEFT JOIN `user` ON `student_invoice`.`user_id`=`user`.`user_id` 
    LEFT JOIN `term` ON `student_invoice`.`term_id` = `term`.`term_id`
    LEFT JOIN `item` ON `student_invoice`.`item_id` = `item`.`item_id` $query ORDER BY `student_invoice`.`id` ASC ";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
