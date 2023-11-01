<?php include('init.php') ?>
<?php
$output = array();
$userId = $_POST['userId'];
$sql = "SELECT * FROM user WHERE user_id = $userId";
$query_sql = mysqli_query($db->con, $sql);
while ($row = mysqli_fetch_assoc($query_sql)) {
    $output[] = $row;
}
echo json_encode($output);
