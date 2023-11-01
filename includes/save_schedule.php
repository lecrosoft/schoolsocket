<?php include('init.php') ?>
<?php
// require_once('../connections/conn.php');
// $branch_id  = $_GET['branch_id'];

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $db->con->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if (empty($id)) {
    $sql = "INSERT INTO `event` (`event_title`,`description`,`start_date`,`location`,`is_holiday`) VALUES ('" . $title . "','" . $description . "','" . $start_datetime . "','" . $location . "','" . $is_holiday . "')";
} else {
    $sql = "UPDATE `event` set `event_title` = '{$title}', `description` = '{$description}', `start_date` = '{$start_datetime}',`location` = '{$location}',`is_holiday` = '{$is_holiday}' where `event_id` = '{$id}'";
}
$save = $db->query($sql);
if ($save) {
    echo "<script> alert('Schedule Successfully Saved.'); location='../events.php' </script>";
} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: " . $db->con->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}
$db->con->close();
