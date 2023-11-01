<?php include('init.php') ?>
<?php
$output = array();
$response = array('message' => '', 'status' => 0);
$template_id = $_POST['template_id'];
$sql = "SELECT * FROM `message_template` WHERE `message_template`.`id` = '" . $template_id . "' ";
$query_sql = mysqli_query($db->con, $sql);
while ($row = mysqli_fetch_assoc($query_sql)) {
    $output[] = $row;
}
echo json_encode($output);
