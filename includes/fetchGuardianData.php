<?php
require_once('init.php');
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
// $status = $_GET['status'];
// $batch = $_GET['batch'];

$query = "WHERE `user_type` = 'Guardian' ";

// if ($searchKeyWords) {
//     $query .= "surname LIKE '%$searchKeyWords%' || first_name LIKE '%$searchKeyWords%' || middle_name LIKE '%$searchKeyWords%' || admission_number LIKE '%$searchKeyWords%' || mobile_number LIKE '%$searchKeyWords%' || email LIKE '%$searchKeyWords%' && ";
// }

// if ($batch) {
//     $query .= "`user`.`batch_id` = '" . $batch . "' && ";
// }
// if ($status) {
//     $query .= "`user`.`status` = '" . $status . "'";
// }
if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    $sql = "SELECT `user`.`status`,`user`.`surname`,`user`.`first_name`,`user`.`mobile_number`,`user`.`middle_name`,`user`.`gender`,`user`.`photo`,`user`.`user_id`,`user`.`date_created`,`user`.* FROM `user` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    while ($row = mysqli_fetch_array($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
