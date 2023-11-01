<?php include('init.php') ?>
<?php
$response = array('message' => '', 'status' => 0);
$cardId = $_POST['cardId'];
$sql = "DELETE FROM `report_group` WHERE `report_group`.`id` = $cardId";
$query_sql = mysqli_query($db->con, $sql);
if ($query_sql) {
    $response['message'] = 'deleted';
}
echo json_encode($response);
