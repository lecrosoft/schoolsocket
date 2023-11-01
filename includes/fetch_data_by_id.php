<?php require_once('init.php'); ?>
<?php
$table_name = $_GET['table'];
$dataId  = $_POST['dataId'];
function edit_data($table, $dataId)
{
    global $db;
    $output = array();
    $sql = "SELECT * FROM `$table` WHERE `$table`.`id` = '" . $dataId . "'";
    $query_sql = mysqli_query($db->con, $sql);
    while ($row = mysqli_fetch_assoc($query_sql)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
edit_data($table_name, $dataId);
