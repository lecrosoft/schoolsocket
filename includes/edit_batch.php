<?php include('init.php') ?>
<?php
$output = array();
$batchId = $_POST['batchId'];
$sql = "SELECT * FROM batch WHERE batch_id = $batchId";
$query_sql = mysqli_query($db->con, $sql);
while ($row = mysqli_fetch_assoc($query_sql)) {
    $output[] = $row;
}
echo json_encode($output);
