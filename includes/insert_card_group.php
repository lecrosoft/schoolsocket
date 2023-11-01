<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['card_name'])) {
    $card_name = $_POST['card_name'];
    $session_id = $_POST['session_id'];
    $batch_id = $_POST['batch_id'];
    $type = $_POST['type'];
    $term = $_POST['term'];
    $template = $_POST['template'];





    $sql = "INSERT INTO `report_group`(`card_name`, `batch_id`, `type`, `term_id`, `template_id`,`session_id`) ";
    $sql .= "VALUES ('";
    $sql .= $card_name . "','";
    $sql .= $batch_id . "','";
    $sql .= $type . "','";
    $sql .= $term . "','";
    $sql .= $template . "','";
    $sql .= $session_id . "'";
    $sql .= ")";

    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {
        global $global;
        $id = $db->the_insert_id();
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
