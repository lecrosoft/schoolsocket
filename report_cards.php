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

                    <?php include_once('includes/report_content.php') ?>


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

    <div class="modal fade" id="addReportCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cardModalLabel">Create New Card Group</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="card_form" enctype="multipart/form-data" method="POST">
                        <div class="form-body">

                            <div class="row p-t-20">
                                <!-- <label class="form-label">Surname <span class="text-danger">*</span></label> -->
                                <input type="hidden" id="session_id" name="session_id" class="form-control" value="<?php echo $current_session_id ?>">
                                <input type="hidden" id="card_id" name="card_id" class="form-control" value="">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Name<span class="text-danger">*</span></label>
                                        <input class="form-control" style="" placeholder="E.G: JSS1 First term 2022/2023" name="card_name" id="card_name" required>
                                        <!-- <option value="" selected>Select Batch</option> -->
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Batch <span class="text-danger">*</span></label>
                                        <select name="batch_id" id="card_batch_id" class="form-control form-select" required>
                                            <option value="" selected>Select Batch</option>
                                            <?php
                                            $query = $global::fetchAll('SELECT `arm`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`abbreviation`,`session_title` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $batch_id ?>><?php echo $abbreviation . ' ' . $arm  . ' ' . $session_title ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Type</label><span class="text-danger">*</span></label>
                                        <div class="d-flex" style="gap:1rem">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="Progress" required>
                                                <label class="form-check-label" for="flexRadioDefault1" style="padding-left: 0.7rem; padding-top:0.3rem">
                                                    Progress
                                                </label>
                                            </div>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="Final" required>
                                                <label class="form-check-label" for="flexRadioDefault2" style="padding-left: 0.7rem; padding-top:0.3rem">
                                                    Final
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Term</label><span class="text-danger">*</span></label>
                                        <select class="select form-control form-select" style="width: 100%; height:36px;" data-placeholder="" name="term" id="term" tabindex="1" required>
                                            <option value="" selected>Select Batch</option>
                                            <?php

                                            $query = $global::fetchAll('SELECT * FROM `term`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $term_id ?>><?php echo $term_name ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Template</label><span class="text-danger">*</span></label>
                                        <select class="form-control form-select" style="width: 100%; height:36px;" data-placeholder="" name="template" id="template" tabindex="1" required>
                                            <option value="" selected>Select Template</option>
                                            <?php
                                            $query = $global::fetchAll('SELECT * FROM `template`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $template_id ?>><?php echo $template_name ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success text-white" id="save_btn"> <i class="fa fa-check"></i> Save</button>

                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                            </div>
                    </form>


                    <!--/row-->

                    <!--/row-->




                </div>



                <!--/span-->
            </div>
        </div>



    </div>






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
    <script src="js/report_card.js">
    </script>
    <script src="js/add_report_card.js">
    </script>

    </script>


</body>

</html>