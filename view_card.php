<?php include_once('includes/head.php') ?>


<?php include_once('includes/generalStats.php') ?>
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">SchoolSocket</p>
    </div>
</div>
<?php

$card_id = $_GET['id'];
// $this_card_template_id = $_GET['t'];
// $this_card_session_id = $_GET['s'];
// $this_card_term_id = $_GET['trm'];

$sql = "SELECT * FROM `report_group` 
    WHERE `report_group`.`id` = $card_id ";

$query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
$row = mysqli_fetch_assoc($query_sql);
extract($row);
$thisCardBatchId = $row['batch_id'];
$this_card_template_id = $row['template_id'];
$this_card_session_id = $row['session_id'];
$this_card_term_id = $row['term_id'];





// $this_batch_sql = "SELECT `arm`,`batch`.`invoice`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`abbreviation`,`session_title` FROM `batch` 
// LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` 
// LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id`
//  WHERE `batch`.`batch_id` =  $batch_id ";
// $query_this_batch_sql = $db->query($this_batch_sql) or die("QUERY ERROR" . $db->con->error);
// $this_batch_student_count = mysqli_num_rows($query_this_batch_sql);
// $row = mysqli_fetch_assoc($query_this_batch_sql);
// extract($row);
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

                    <?php include_once('includes/view_card_content.php')

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

    <script src="js/view_card.js">
    </script>


</body>

</html>