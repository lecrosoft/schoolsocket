<?php
if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
    $student_id = $_SESSION["user_id"];
    $sql = "SELECT `abbreviation`,`arm`,`user`.`mobile_number`,`user`.`batch_id`,
    `student_category`.`student_category`,`bloodgroup`.`bloodgroup`,
    `session_title`,`user`.* FROM `user` 
LEFT JOIN `batch` ON `user`.`batch_id` = `batch`.`batch_id` 
LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
LEFT JOIN `bloodgroup` ON `bloodgroup`.`bloodgroup_id` = `user`.`blood_group_id` 
LEFT JOIN `student_category` ON `student_category`.`student_category_id` = `user`.`student_category_id` 
LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` 
WHERE `user`.`user_id` = $id
";
    $query_sql = $db->query($sql);
    $row = mysqli_fetch_assoc($query_sql);
    extract($row);
    $student_batch_id = $batch_id;
    $sql1 = "SELECT YEAR(date_of_birth) as year FROM `user` WHERE `user_id` = $id";
    $query_sql = $db->query($sql1);
    $row2 = mysqli_fetch_assoc($query_sql);
    $year = $row2['year'];
    $current_year = date('Y');
}
?>







<!-- Main Content -->
<div id="content">


    <!-- Begin Page Content -->
    <div class="container-fluid" id="load">

        <?php include_once('includes/profile_content.php')
        ?>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->