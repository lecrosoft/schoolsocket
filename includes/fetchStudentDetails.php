<?php
require_once('init.php');

$allusers = $_POST['userids'];
$output = [];
for ($i = 0; $i < count($allusers); $i++) {


    $sql_student = "SELECT `first_name`,`surname`,`middle_name` FROM `user` WHERE `user_id`='" . $allusers[$i] . "'";
    $query_sql_student = $db->query($sql_student) or die("QUERY ERROR" . $db->con->error);
    // $row_student = mysqli_fetch_assoc($query_sql_student);
    // var_dump($row_student['first_name']);
    //echo mysqli_num_rows($query_sql_student);
    if (mysqli_num_rows($query_sql_student) > 0) {

        while ($row = mysqli_fetch_array($query_sql_student)) {
            $obj = new stdClass;
            $obj->student = $row['surname'] . ' ' . $row['first_name'] . ' ' . $row['middle_name'];
            $obj->userid = $allusers[$i];
            $output[] = $obj;
        }
    }
}

echo json_encode($output);
