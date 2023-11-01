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

                    <?php include_once('includes/cbt_content.php')
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


    <div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="examModalLabel">Create New Card Group</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="exam_form" enctype="multipart/form-data" method="POST">
                        <div class="form-body">

                            <div class="row p-t-20">
                                <!-- <label class="form-label">Surname <span class="text-danger">*</span></label> -->
                                <input type="hidden" id="session_id" name="session_id" class="form-control" value="<?php echo $current_session_id ?>">
                                <input type="hidden" id="exam_id" name="exam_id" class="form-control" value="">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Name<span class="text-danger">*</span></label>
                                        <input class="form-control" style="" placeholder="E.G:Final Year Examination For JSS1" name="exam_name" id="exam_name" required>
                                        <!-- <option value="" selected>Select Batch</option> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Mode</label><span class="text-danger">*</span></label>
                                        <select name="mode" id="mode" class="form-control form-select" required>
                                            <option value="">Select Option</option>
                                            <option value="Easy">Easy</option>
                                            <option value="Strict">Strict</option>

                                        </select>
                                    </div>
                                </div>

                                <!--/span-->

                                <!--/span-->
                            </div>
                            <!--/row-->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Assign Batch <span class="text-danger">*</span></label>
                                        <select name="batch_id" id="exam_batch_id" class="form-control form-select" required>
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
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Term</label><span class="text-danger">*</span></label>
                                        <select class="select form-control form-select" style="width: 100%; height:36px;" data-placeholder="" name="term" id="term" tabindex="1" required>
                                            <option value="" selected>Select Term</option>
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
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Stat Date</label><span class="text-danger">*</span></label>
                                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">End Date</label><span class="text-danger">*</span></label>
                                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Passing Percentage</label><span class="text-danger">*</span></label>
                                        <input type="text" id="cut_off_percent" name="cut_off_percent" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Instruction</label><span class="text-danger">*</span></label>
                                        <textarea name="instruction" class="form-control" id="instruction" cols="30" rows="10" style="height:50px"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Exam Duration</label><span class="text-danger">*</span></label>
                                        <input type="number" id="duration" name="duration" class="form-control" required placeholder="Enter Duration in min. E.g 30 mins" min="1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Type</label><span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control form-select" required>
                                            <option value="">Select Option</option>
                                            <option value="Assignment">Assignment</option>
                                            <option value="Exam">Exam</option>
                                            <option value="Exam">Mock</option>
                                            <option value="Test">Test</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Result After Finish</label><span class="text-danger">*</span></label>
                                        <select name="show_result_immediately_after" id="show_result_immediately_after" class="form-control form-select" required>
                                            <option value="">Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Check Result With E-pin</label><span class="text-danger">*</span></label>
                                        <select name="e_pin" id="e_pin" class="form-control form-select" required>
                                            <option value="">Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
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
    <script src="js/select2/dist/js/select2.full.min.js" type="text/javascript">
    </script>
    <script src="js/toast/dist/jquery.toast.min.js">
    </script>
    <script src="js/dropify/dist/js/dropify.min.js">
    </script>
    <script src="js/sweetalert/sweetalert.js">
    </script>


    <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="js/cbt.js"></script>
    <script src="js/add_exam.js"></script>
    <script src="js/question.js"></script>
    <script src="js/add_question.js"></script>
    <!-- <script src="js/students_list.js"></script> -->
    <script>
        // loadStudentList();
        loadFormQuestion();
    </script>
    <script>
        tinymce.init({
            selector: '.textarea',
            plugins: 'advlist autolink lists link  charmap preview searchreplace visualblocks code fullscreen insertdatetime  table code help wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            // tinycomments_author: 'Lecrosoft'
            promotion: false
        });
    </script>
</body>

</html>