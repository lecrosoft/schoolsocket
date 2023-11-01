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




                    <?php
                    if ($_SESSION['user_role'] == 'Admin') {
                        include_once('includes/dashboard.php');
                    } elseif ($_SESSION['user_role'] == 'Student') {
                        include_once('student_dashboard.php');
                    } elseif ($_SESSION['user_role'] == 'Teacher') {
                        include('teacher_dashboard.php');
                    } elseif ($_SESSION['user_role'] == 'Parent') {
                        include('includes/teacher_dashboard.php');
                    }


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
    <?php include('includes/settings.php') ?>
    <!-- Logout Modal-->
    <?php
    include('includes/modal.php')
    ?>

    <!-- Bootstrap core JavaScript-->
    <?php include('includes/global_external_js.php') ?>
    <!-- <script src="js/main.js"></script>
    <script>
        const page = function(url) {
            $.ajax({
                url: url,
                method: "POST",
                success: function(data) {
                    document.querySelector("#load").innerHTML = data;
                }
            })
        }
        page('dashboard')
    </script> -->
    <script src="js/helper_function.js"></script>
    <script src="js/batches.js">
    </script>
    <script src="js/add_batch.js">
    </script>
    <script src="js/link_teacher.js">
    </script>


    <script src="js/students.js">
    </script>
    <script src="js/add_students.js">
    </script>
    <script src="js/link_parent.js">
    </script>
    <script src="js/lga.js"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        })
    </script>
</body>

</html>