<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['card_name'])) {
    $card_name = $_POST['card_name'];
    $card_id = $_POST['card_id'];
    $session_id = $_POST['session_id'];
    $batch_id = $_POST['batch_id'];
    $type = $_POST['type'];
    $term = $_POST['term'];
    $template = $_POST['template'];





    $sql = "UPDATE `report_group` SET `card_name`='" . $card_name . "',`batch_id`='" . $batch_id . "',`type`='" . $type . "',`term_id`='" . $term . "',`template_id`='" . $template . "' WHERE `report_group`.`id` = '" . $card_id . "'";
    $querySql = mysqli_query($db->con, $sql);
    if ($querySql) {
        global $global;
        $id = $db->the_insert_id();
        // return true;
        $response['message'] = "update_success";

        echo json_encode($response);
        // echo "Success";
    } else {
        $response['message'] = "failed";
        echo $response['message'];
        die('QUERY ERROR' . mysqli_error($db->con));
    }
}
