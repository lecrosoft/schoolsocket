<?php include('init.php') ?>
<?php
$output = array();
$examId = $_POST['examId'];
$sql = "SELECT `exam`.`exam_id`,`exam`.`start_date`,exam_status,`arm`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`session_title`,`term`.`term_name`,`class`.`abbreviation`,`exam`.* FROM `exam` 
    LEFT JOIN `batch` ON `exam`.`batch_id` = `batch`.`batch_id` 
    LEFT JOIN `term`  ON `exam`.`term_id` = `term`.`term_id` 
    LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
    LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` WHERE `exam`.`exam_id` = $examId";
$query_sql = mysqli_query($db->con, $sql);
while ($row = mysqli_fetch_assoc($query_sql)) {
    $output[] = $row;
}
echo json_encode($output);
