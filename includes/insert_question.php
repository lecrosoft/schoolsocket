<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['subject'])) {
    $session_id = $_POST['session_id'];
    $subject = $_POST['subject'];
    $folder = '../img/';
    $question_exam_id = $_POST['question_exam_id'];
    $question = $_POST['question'];
    $photo = $_FILES['photo']['name'];
    $tmp_file = $_FILES['photo']['tmp_name'];
    $option = $_POST['option'];
    $correct_answer = $_POST['correct_answer'];




    for ($i = 0; $i < count($question_exam_id); $i++) {

        $sql = "INSERT INTO `question`(`subject_id`, `exam_id`, `question`, `image`) ";
        $sql .= "VALUES ('";
        $sql .= $subject . "','";
        $sql .= $question_exam_id[$i] . "','";
        $sql .= $question . "','";
        $sql .= $photo . "'";
        $sql .= ")";
        $querySql = mysqli_query($db->con, $sql);
        if ($querySql) {
            global $global;
            $id = $db->the_insert_id();
            move_uploaded_file($tmp_file, $folder . $photo);
            for ($x = 0; $x < count($option); $x++) {
                $sqlOption = "INSERT INTO `options`(`question_id`, `option_value`, `correct_answer`) ";
                $sqlOption .= "VALUES ('";
                $sqlOption .= $id . "','";
                $sqlOption .= $option[$x] . "','";
                $sqlOption .= $correct_answer[$x] . "'";
                $sqlOption .= ")";
                $querySqlOption = mysqli_query($db->con, $sqlOption);
            }
        }
    }
    if ($querySqlOption) {

        global $global;
        $id = $db->the_insert_id();
        $response['message'] = "success";

        echo json_encode($response);
    }
} else {
    $response['message'] = "failed";
    echo json_encode($response);
}
