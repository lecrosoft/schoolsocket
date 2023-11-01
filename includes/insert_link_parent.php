<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['studentToLinkId'])) {

    $studentToLinkId = $_POST['studentToLinkId'];
    $parent_id = $_POST['parent_id'];
    $relationship = $_POST['relationship'];



    $sql = "INSERT INTO `link_parent`(`parent_id`, `student_id`, `relationship`) ";
    $sql .= "VALUES ('";
    $sql .= $parent_id . "','";
    $sql .= $studentToLinkId . "','";
    $sql .= $relationship . "'";
    $sql .= ")";

    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {
        global $global;
        $id = $db->the_insert_id();

        $sqlgetParent = "SELECT surname,first_name FROM user  WHERE `user`.`user_id` = '" . $parent_id . "'";
        $query_sqlgetParent = $db->query($sqlgetParent);
        $row = mysqli_fetch_assoc($query_sqlgetParent);
        extract($row);
        $p_fullName = $surname . ' ' . $first_name;

        $sqlupdate = "UPDATE user SET `parent_id` = '" . $parent_id . "',`linked_status` = 'Linked',`parent_fullname` = '" . $p_fullName . "' WHERE `user`.`user_id` = '" . $studentToLinkId . "'";
        $query_update = $db->query($sqlupdate);
        $sqlupdateParent = "UPDATE user SET `number_of_wards` = `number_of_wards`+1 WHERE `user`.`user_id` = '" . $parent_id . "'";
        $query_updateParent = $db->query($sqlupdateParent);


        // return true;
        $response['message'] = "success";

        echo json_encode($response);
        // echo "Success";
    } else {
        $response['message'] = "failed";
        echo $response['message'];
        die('QUERY ERROR' . mysqli_error($db->con));
    }
}
