<?php
$response = array('message' => '', 'status' => 0);

// Connect to database and sanitize input
require_once('init.php');
if (isset($_POST['subject_batch_id'])) {
    $subject_batch_id = mysqli_real_escape_string($db->con, $_POST['subject_batch_id']);
    $term_id = mysqli_real_escape_string($db->con, $_POST['term_id']);
    $subject_id = mysqli_real_escape_string($db->con, $_POST['subject_id']);
    $elective = mysqli_real_escape_string($db->con, $_POST['elective']);

    // Check if subject already exists for batch and term
    $checkSubject = "SELECT * FROM `batch_subject` WHERE `subject_id` = '$subject_id' AND `batch_id` = '$subject_batch_id' AND `term_id` = '$term_id'";
    $querySubjectSql = mysqli_query($db->con, $checkSubject);
    $countSubject = mysqli_num_rows($querySubjectSql);

    if ($countSubject > 0) {
        $response['message'] = "Subject already exists for this batch and term";
        echo json_encode($response);
    } else {
        // Get all students in batch
        $getStudent = "SELECT * FROM `user` WHERE `user`.`batch_id` = '" . $subject_batch_id . "'";
        $queryGetStudentSql = mysqli_query($db->con, $getStudent);
        $countStudent = mysqli_num_rows($queryGetStudentSql);

        if ($countStudent > 0) {
            // Insert new subject into batch_subject table
            $sql = "INSERT INTO `batch_subject`(`subject_id`, `batch_id`, `elective`, `term_id`) VALUES ('$subject_id','$subject_batch_id','$elective','$term_id')";
            $querySql = mysqli_query($db->con, $sql);

            if ($querySql) {
                // Insert new subject for each student in student_offering_subject table
                while ($row = mysqli_fetch_assoc($queryGetStudentSql)) {
                    $user_id = $row['user_id'];
                    $single_subject_sql = "INSERT INTO `student_offering_subject`(`user_id`, `subject_id`, `batch_id`, `term_id`, `elective`) VALUES ('$user_id','$subject_id','$subject_batch_id','$term_id','$elective')";
                    $querySubjectSql = mysqli_query($db->con, $single_subject_sql);
                }

                if ($querySubjectSql) {
                    $response['message'] = "Subject added successfully";
                    echo json_encode($response);
                } else {
                    $response['message'] = "Failed to add subject for students";
                    echo json_encode($response);
                }
            } else {
                $response['message'] = "Failed to add subject to batch_subject table";
                echo json_encode($response);
            }
        } else {
            $response['message'] = "No students found in this batch";
            echo json_encode($response);
        }
    }
}
