<?php include('init.php') ?>
<?php
$output = array();
$cardId = $_POST['cardId'];
$sql = "SELECT `report_group`.`id`,`report_group`.`publish`,`arm`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`session_title`,`term`.`term_name`,`class`.`abbreviation`,`report_group`.* FROM `report_group` 
    LEFT JOIN `batch` ON `report_group`.`batch_id` = `batch`.`batch_id` 
    LEFT JOIN `term`  ON `report_group`.`term_id` = `term`.`term_id` 
    LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
    LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` WHERE `report_group`.`id` = $cardId";
$query_sql = mysqli_query($db->con, $sql);
while ($row = mysqli_fetch_assoc($query_sql)) {
    $output[] = $row;
}
echo json_encode($output);
