<?php include_once('includes/head.php') ?>
<?php include_once('includes/generalStats.php') ?>
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">SchoolSocket</p>
    </div>
</div>
<?php
if (isset($_GET['b_id'])) {
    $id = $_GET['b_id'];
    $sql = "SELECT `arm`,`batch`.`batch_id`,`class_name`,
        `user`.`user_id`,`class`.`class_id`,`abbreviation`,
        `session_title`,`student_count`,`user`.`surname`,`user`.`user_role`,
        `user`.`first_name`,`user`.`middle_name`,`user`.`employee_number`,`class_teacher_id`,
        `assistant_class_teacher_id`,`a_surname`,`a_first_name`,
        `a_middle_name`,`a_user_id` FROM `batch`
         LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id`
          LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id`
           LEFT JOIN `user` ON `batch`.`class_teacher_id` =`user`.`user_id`
            LEFT JOIN `assistant_class_teacher` ON `batch`.`assistant_class_teacher_id` = `assistant_class_teacher`.`a_user_id` 
            WHERE `batch`.`batch_id` = $id";

    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    $row = mysqli_fetch_assoc($query_sql);
    extract($row);
}
$this_batch_sql = "SELECT `batch_student_list`.`id`,`user`.`surname`,
`user`.`first_name`,`user`.`middle_name`,`user`.`photo`,
`user`.`admission_date`,`user`.`admission_number`,
`batch_student_list`.`batch_id`,`class`.`class_name`,
`class`.`abbreviation`,`batch`.`arm`,`user`.`user_id`
 FROM `batch_student_list` LEFT JOIN `batch` ON `batch_student_list`.`batch_id` = `batch`.`batch_id` 
 LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
 LEFT JOIN `user` ON `batch_student_list`.`user_id`=`user`.`user_id`
 WHERE `batch_student_list`.`batch_id` =  $id ";
$query_this_batch_sql = $db->query($this_batch_sql) or die("QUERY ERROR" . $db->con->error);
$this_batch_student_count = mysqli_num_rows($query_this_batch_sql);


?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('includes/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('includes/topbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="load">

                    <?php include_once('includes/batch_content.php')
                    ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('includes/footer.php') ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    include('includes/modal.php')
    ?>

    <!-- Bootstrap core JavaScript-->
    <?php include('includes/global_external_js.php') ?>
    <script src="js/select2/dist/js/select2.full.min.js" type="text/javascript">
    </script>
    <script src="js/toast/dist/jquery.toast.min.js">
    </script>
    <script src="js/dropify/dist/js/dropify.min.js">
    </script>
    <script src="js/sweetalert/sweetalert.js">
    </script>

    <script src="js/batch_students_list.js"></script>
    <script src="js/batch_subject_list.js"></script>
    <script src="js/add_batch_subject.js"></script>
    <script src="js/batch_students_attendance.js"></script>
    <script src="js/add_batch_attendance.js"></script>
    <script>
        loadStudentList();
        loadSubjectList();
        loadStudentAttendance();
        loadAttendanceForm("POST");
    </script>

</body>

</html>