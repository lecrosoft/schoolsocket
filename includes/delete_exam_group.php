<?php include('init.php') ?>
<?php
$response = array('message' => '', 'status' => 0);
$examId = $_POST['examId'];
$sql = "DELETE FROM `exam` WHERE `exam`.`exam_id` = $examId";
$query_sql = mysqli_query($db->con, $sql);
if ($query_sql) {
    $response['message'] = 'deleted';
}
echo json_encode($response);
