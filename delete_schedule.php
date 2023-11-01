<?php include('includes/init.php') ?>
<?php
if (!isset($_GET['id'])) {
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
    $db->con->close();
    exit;
}

$delete = $db->query("DELETE FROM `event` where event_id = '{$_GET['id']}'");
if ($delete) {
    echo "<script> alert('Event has deleted successfully.'); location='events.php' </script>";
} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: " . $db->con->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}
$db->con->close();
