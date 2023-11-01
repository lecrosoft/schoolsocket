<?php include_once('includes/head.php') ?>
<?php include_once('includes/generalStats.php') ?>
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">SchoolSocket</p>
    </div>
</div>

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

                    <?php include_once('includes/event_content.php')
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


    <?php
    $schedules = $db->query("SELECT * FROM `event`");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_date']));
        $row['edate'] = date("F d, Y h:i A", strtotime($row['end_date']));
        $sched_res[$row['event_id']] = $row;
    }
    ?>
    <?php
    //if (isset($con)) $con->close();
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

    <script src="js/calendar.js">
    </script>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <script>
        $(document).ready(function() {
            $(".add-event").click(function() {
                $("#dataModal2").modal("show");
            });
            $(".close").click(function() {
                $("#dataModal2").modal("hide");
            });
            $(".btn-close").click(function() {
                $("#event-details-modal").modal("hide");
            });

        })
    </script>
</body>

</html>