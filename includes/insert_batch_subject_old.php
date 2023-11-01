<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
if (isset($_POST['subject_batch_id'])) {

    $subject_batch_id = $_POST['subject_batch_id'];
    $term_id = $_POST['term_id'];
    $subject_id = $_POST['subject_id'];
    // $teacher_id = $_POST['teacher_id'];
    $elective = $_POST['elective'];
    $checkSubject = "SELECT * FROM `batch_subject` WHERE `subject_id` = '" . $subject_id . "'  AND `batch_id` = '" . $subject_batch_id . "' AND `term_id` = '" . $term_id . "' ";
    $querySubjectSql = mysqli_query($db->con, $checkSubject);
    $countSubject = mysqli_num_rows($querySubjectSql);
    if ($countSubject > 0) {
        $response['message'] = "Exist";

        echo json_encode($response);
    } else {

        $getStudent = "SELECT * FROM `user` WHERE `user`.`batch_id` = '" . $subject_batch_id . "'";
        $queryGetStudentSql = mysqli_query($db->con, $getStudent);
        $countStudent = mysqli_num_rows($queryGetStudentSql);
        if ($countStudent > 0) {
            $sql = "INSERT INTO `batch_subject`(`subject_id`, `batch_id`, `elective`, `term_id`)  ";
            $sql .= "VALUES ('";
            $sql .= $subject_id . "','";
            $sql .= $subject_batch_id . "','";
            $sql .= $elective . "','";
            $sql .= $term_id . "'";
            $sql .= ")";
            $querySql = mysqli_query($db->con, $sql);

            if ($querySql) {
                // global $global;
                // $id = $db->the_insert_id();

                while ($row = mysqli_fetch_assoc($queryGetStudentSql)) {

                    $user_id = $row['user_id'];
                    $single_subject_sql = "INSERT INTO `student_offering_subject`(`user_id`, `subject_id`, `batch_id`, `term_id`, `elective`)  ";
                    $single_subject_sql .= "VALUES ('";
                    $single_subject_sql .= $user_id . "','";
                    $single_subject_sql .= $subject_id . "','";
                    $single_subject_sql .= $subject_batch_id . "','";
                    $single_subject_sql .= $term_id . "','";
                    $single_subject_sql .= $elective . "'";
                    $single_subject_sql .= ")";
                    $querySubjectSql = mysqli_query($db->con, $single_subject_sql);
                }

                if ($querySubjectSql) {
                    $response['message'] = "success";

                    echo json_encode($response);
                } else {
                    $response['message'] = "failed";
                    // echo $response['message'];
                    // die('QUERY ERROR' . mysqli_error($db->con));
                    echo json_encode($response);
                }
            }
        } else {
            $response['message'] = "no_student";

            echo json_encode($response);
        }
    }
}
