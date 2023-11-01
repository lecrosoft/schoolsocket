<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
$x = $_POST["data"];



for ($i = 0; $i < count($x); $i++) {


    $query =  "SELECT * FROM `score_sheet` WHERE `user_id`='" . $x[$i]['userid'] . "' AND `assessment_id`='" . $x[$i]['assessment_id'] . "' ";
    $queryCheck = mysqli_query($db->con, $query);
    if (mysqli_num_rows($queryCheck) > 0) {
        if ($x[$i]['score'] != "") {
            $updateQuery = "UPDATE `score_sheet` SET `score`='" . $x[$i]['score'] . "' WHERE `user_id`='" . $x[$i]['userid'] . "' AND `assessment_id`='" . $x[$i]['assessment_id'] . "' ";
            $update = mysqli_query($db->con, $updateQuery);
        }
    } else {
        $sql = "INSERT INTO `score_sheet`(`session_id`, `batch_id`, `user_id`, `assessment_id`, `term_id`, `score`,`subject_id`) ";
        $sql .= "VALUES ('";
        $sql .= $x[$i]['session_id'] . "','";
        $sql .= $x[$i]['batch_id'] . "','";
        $sql .= $x[$i]['userid'] . "','";
        $sql .= $x[$i]['assessment_id'] . "','";
        $sql .= $x[$i]['term_id'] . "','";
        $sql .= $x[$i]['score'] . "','";
        $sql .= $x[$i]['subject_id'] . "'";
        $sql .= ")";
        $querySql = mysqli_query($db->con, $sql);
    }
}
echo json_encode(array("message" => "Data successfully committed 444", "count" => count($x)));
