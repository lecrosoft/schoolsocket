<?php include('init.php') ?>
<?php
$output = array();
$batchId = $_POST['batchId'];
$sql = "SELECT `arm`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`abbreviation`,`session_title` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id`' WHERE `batch_id` = $batchId";
$query_sql = mysqli_query($db->con, $sql);
while ($row = mysqli_fetch_assoc($query_sql)) {
    $output[] = $row;
}
echo json_encode($output);
