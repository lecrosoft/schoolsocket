<?php include('init.php') ?>
<?php
$response = array('message' => '', 'status' => 0);
$userId = $_POST['userId'];
$sql = "DELETE FROM `user` WHERE user_id = $userId";
$query_sql = mysqli_query($db->con, $sql);
if ($query_sql) {
    $getLinkParent = "SELECT * FROM `link_parent` WHERE `student_id` = $userId";
    $query_getLinkParent = mysqli_query($db->con, $getLinkParent);
    $row = mysqli_fetch_assoc($query_getLinkParent);
    extract($row);
    $countLinkedParent = mysqli_num_rows($query_getLinkParent);
    if ($countLinkedParent > 0) {
        $sqlupdateParent = "UPDATE user SET `number_of_wards` = `number_of_wards`-1 WHERE `user`.`user_id` = '" . $parent_id . "'";
        $query_updateParent = $db->query($sqlupdateParent);
        $sqlLink = "DELETE FROM `link_parent` WHERE `student_id` = $userId";
        $query_sqlLink = mysqli_query($db->con, $sqlLink);
    }

    $response['message '] = 'deleted';
}
echo json_encode($response);
