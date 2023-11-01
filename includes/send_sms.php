<?php
require_once('init.php');
?>

<?php


if (isset($_GET['select_contact'])) {

    $receipiant_number = array();

    $group = $_GET['select_contact'];


    switch ($group) {
        case 'parent_only':
            $sql = "SELECT `mobile_number`,`surname`,`first_name` FROM `user` WHERE `user_type` = 'Guardian' AND `user`.`status` ='Active' AND `mobile_number` !=''";
            $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);


            while ($row = mysqli_fetch_assoc($query_sql)) {

                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);
                $receipiant_number[] = $mobile_number;
            }
            // $members_number = implode(",", $receipiant_number);
            echo json_encode(array("member" => $receipiant_number));
            break;




        case 'all_staffs':
            $sql = "SELECT `mobile_number`,`surname`,`first_name` FROM `user` WHERE `user_type` = 'Employee' AND `user`.`status` ='Active' AND `mobile_number` !=''";
            $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);


            while ($row = mysqli_fetch_assoc($query_sql)) {

                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);
                $receipiant_number[] = $mobile_number;
            }
            // $members_number = implode(",", $receipiant_number);
            echo json_encode(array("member" => $receipiant_number));
            break;




        case 'academic_staffs':
            $sql = "SELECT `mobile_number`,`surname`,`first_name`,`staff_type` FROM `user` WHERE `user_type` = 'Employee' AND `user`.`status` ='Active' AND `user`.`staff_type` ='Academy' AND `mobile_number` !=''";
            $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);


            while ($row = mysqli_fetch_assoc($query_sql)) {

                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);
                $receipiant_number[] = $mobile_number;
            }
            // $members_number = implode(",", $receipiant_number);
            echo json_encode(array("member" => $receipiant_number));
            break;



        case 'non_academic_staffs':
            $sql = "SELECT `mobile_number`,`surname`,`first_name`,`staff_type` FROM `user` WHERE `user_type` = 'Employee' AND `user`.`status` ='Active' AND `user`.`staff_type` ='Non Academy' AND `mobile_number` !=''";
            $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);


            while ($row = mysqli_fetch_assoc($query_sql)) {

                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);
                $receipiant_number[] = $mobile_number;
            }
            // $members_number = implode(",", $receipiant_number);
            echo json_encode(array("member" => $receipiant_number));
            break;



        case 'debtors':
            $sql = "SELECT `mobile_number`,`surname`,`first_name`,`staff_type` FROM `user` WHERE `user_type` = 'Employee' AND `user`.`status` ='Active' AND `user`.`staff_type` ='Non Academy' AND `mobile_number` !=''";
            $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);


            while ($row = mysqli_fetch_assoc($query_sql)) {

                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);
                $receipiant_number[] = $mobile_number;
            }
            // $members_number = implode(",", $receipiant_number);
            echo json_encode(array("member" => $receipiant_number));
            break;
        case 'Alumni':
            $sql = "SELECT `mobile_number`,`surname`,`first_name`,`staff_type` FROM `user` WHERE `user_type` = 'Student' AND `user`.`status` !='Active' AND `mobile_number` !=''";
            $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);


            while ($row = mysqli_fetch_assoc($query_sql)) {

                // for ($i = 0; $i < count($receipiant_mail); $i++) {
                extract($row);
                $receipiant_number[] = $mobile_number;
            }
            // $members_number = implode(",", $receipiant_number);
            echo json_encode(array("member" => $receipiant_number));
            break;
    }

    //     end of switch statement//




}
