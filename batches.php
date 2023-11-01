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

                    <?php include_once('includes/batches_content.php') ?>


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
    <!-- <script src="js/main.js"></script> -->
    <!-- <script src="../assets/toast-master/js/jquery.toast.js"></script>
<script src="../assets/dropify/dist/js/dropify.min.js"></script>
<script src="../assets/select2/dist/js/select2.full.min.js" type="text/javascript"></script> -->
    <script src="js/select2/dist/js/select2.full.min.js" type="text/javascript">
    </script>
    <script src="js/toast/dist/jquery.toast.min.js">
    </script>
    <script src="js/dropify/dist/js/dropify.min.js">
    </script>
    <script src="js/sweetalert/sweetalert.js">
    </script>

    <script src="js/helper_function.js"></script>
    <script src="js/batches.js">
    </script>
    <script src="js/add_batch.js">
    </script>
    <script src="js/link_teacher.js">
    </script>


</body>

</html>