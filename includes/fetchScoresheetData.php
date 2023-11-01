<?php
require_once('init.php');

$allusers = $_POST['userids'];
$vitals = $_POST['x'];
$output = [];
for ($i = 0; $i < count($allusers); $i++) {

    for ($j = 0; $j < count(($vitals)); $j++) {
        $sql_student = "SELECT `first_name`,`surname`,`middle_name` FROM `user` WHERE `user_id`='" . $allusers[$i] . "'";
        $query_sql_student = $db->query($sql_student) or die("QUERY ERROR" . $db->con->error);
        $row_student = mysqli_fetch_assoc($query_sql_student);
        // var_dump($row_student['first_name']);

        $sql = "SELECT * FROM `score_sheet` WHERE user_id='" . $allusers[$i] . "' AND assessment_id='" . $vitals[$j]['assessment_id'] . "' AND batch_id='" . $vitals[$j]['batch_id'] . "'";
        $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
        if (mysqli_num_rows($query_sql) > 0) {

            while ($row = mysqli_fetch_array($query_sql)) {
                $obj = new stdClass;
                $obj->student = $row_student['surname'] . ' ' . $row_student['first_name'] . ' ' . $row_student['middle_name'];
                $obj->userid = $allusers[$i];
                $obj->assessment_name = $vitals[$j]['assessment_name'];
                $obj->assessment_id = $vitals[$j]['assessment_id'];
                $obj->score = $row['score'];
                $output[] = $obj;
            }
        } else {

            $obj = new stdClass;
            $obj->userid = $allusers[$i];
            $obj->assessment_name = $vitals[$j]['assessment_name'];
            $obj->assessment_id = $vitals[$j]['assessment_id'];
            $obj->student = $row_student['surname'] . ' ' . $row_student['first_name'] . ' ' . $row_student['middle_name'];
            $obj->score = null;
            $output[] = $obj;
        }
    }
}

echo json_encode($output);
