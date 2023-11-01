<?php include_once('includes/head.php') ?>
<?php include_once('includes/generalStats.php') ?>
<!-- Page Wrapper -->

<div id="wrapper">
    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid2" id="load">


            <?php
            $next_session_date = "";
            if (isset($_POST['userId'])) {

                $userId = $_POST['userId'];
                $batch_id = $_POST['batch_id'];
                $card_name = $_POST['card_name'];
                $term_id = $_POST['term_id'];
                $card_id = $_POST['card_id'];
                $type = $_POST['type'];
                $template_id = $_POST['template_id'];
                $session_id = $_POST['session_id'];
                $publish = $_POST['publish'];
                $getTermSql = "SELECT * FROM `term` WHERE `term`.`term_id` = $term_id";
                $query_getTermSql = $db->query($getTermSql) or die("QUERY ERROR" . $db->con->error);
                $row = mysqli_fetch_assoc($query_getTermSql);
                extract($row);



                $sql = "SELECT `abbreviation`,`arm`,`user`.`mobile_number`,
    `student_category`.`student_category`,`bloodgroup`.`bloodgroup`,
    `session_title`,`user`.* FROM `user` 
LEFT JOIN `batch` ON `user`.`batch_id` = `batch`.`batch_id` 
LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
LEFT JOIN `bloodgroup` ON `bloodgroup`.`bloodgroup_id` = `user`.`blood_group_id` 
LEFT JOIN `student_category` ON `student_category`.`student_category_id` = `user`.`student_category_id` 
LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` 
WHERE `user`.`user_id` = $userId";

                $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
                $row = mysqli_fetch_assoc($query_sql);
                extract($row);
                $sql1 = "SELECT YEAR(date_of_birth) as year FROM `user` WHERE `user_id` = $userId";
                $query_sql = $db->query($sql1);
                $row2 = mysqli_fetch_assoc($query_sql);
                $year = $row2['year'];
                $current_year = date('Y');

                $sqlDatePresent = "SELECT * FROM `attendance_details` WHERE `user_id` = '" . $userId . "' 
                AND `attendance_details`.`session_id` = '" . $session_id . "' 
                AND `attendance_details`.`term_id` = '" . $term_id . "' 
                AND `attendance_details`.`batch_id` = '" . $batch_id . "' 
                AND `attendance_value` = 'Present' ";
                $query_sqlDatePresent = $db->query($sqlDatePresent) or die("QUERY ERROR" . $db->con->error);
                // $row = mysqli_fetch_assoc($query_sqlDatePresent);
                // extract($row);
                $daysPresent = mysqli_num_rows($query_sqlDatePresent);




                $sql = "SELECT * FROM `academy_session` WHERE `academy_session`.`session_id` = $session_id ";
                $query_sql_session = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
                $row = mysqli_fetch_assoc($query_sql_session);
                extract($row);
                if ($term_id == 1) {
                    $resumption_date = $second_term_start;
                } elseif ($term_id == 2) {
                    $resumption_date = $third_term_start;
                } elseif ($term_id == 3) {
                    if ($next_session_date != "") {
                        $resumption_date = $next_session_date;
                    } else {
                        $resumption_date = "Next Session Start Date not stated";
                    }
                }
                include_once('includes/report_card_content.php');
            } else {
                echo "NOT FOUND";
            }
            ?>







        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->




</div>
<!-- End of Page Wrapper -->