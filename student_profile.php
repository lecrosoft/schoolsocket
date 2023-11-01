<?php include_once('includes/head.php') ?>
<?php include_once('includes/generalStats.php') ?>
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">SchoolSocket</p>
    </div>
</div>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student_id = $id;
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

                    <?php include_once('includes/profile_content.php')
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
    <div class="modal fade" id="addDeuFeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pay Fees</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="" id="feePaymentForm">
                        <input type="hidden" id="student_id" name="student_id" class="" value="<?php echo $id ?>">
                        <input type="hidden" id="term_id" name="term_id" class="" value="<?php echo $current_term_id ?>">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">AMOUNT<span class="text-danger">*</span>
                                    </label>
                                    <input type="number" min="1" class="form-control" id="amount_to_pay" name="amount_to_pay" placeholder="Enter Amount" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">PAYMENT METHOD<span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-select" data-placeholder="" name="payment_method" id="payment_method" required>
                                        <option value="" selected>Select Payment Method</option>
                                        <?php
                                        $query = $global::fetchAll('SELECT * FROM `payment_method`');
                                        while ($row = mysqli_fetch_array($query)) {
                                            extract($row);
                                        ?>
                                            <option value=<?php echo $id ?>><?php echo $payment_method ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>


                            <hr>

                            <!--/span-->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="makePaymentBtn" class="btn btn-primary">Make Payment</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="addSingleDeuFeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pay Fees</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="" id="singleFeePaymentForm">
                        <input type="hidden" id="single_student_id" name="single_student_id" class="" value="<?php echo $id ?>">
                        <input type="hidden" id="single_term_id" name="single_term_id" class="" value="<?php echo $current_term_id ?>">
                        <input type="text" id="item_id" name="item_id" class="">
                        <input type="text" id="outstanding" name="outstanding" class="">
                        <div class=" row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">AMOUNT<span class="text-danger">*</span>
                                    </label>
                                    <input type="number" min="1" class="form-control" id="amount_to_pay_single" name="amount_to_pay_single" placeholder="Enter Amount" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">PAYMENT METHOD<span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-select" data-placeholder="" name="payment_method_single" id="payment_method_single" required>
                                        <option value="" selected>Select Payment Method</option>
                                        <?php
                                        $query = $global::fetchAll('SELECT * FROM `payment_method`');
                                        while ($row = mysqli_fetch_array($query)) {
                                            extract($row);
                                        ?>
                                            <option value=<?php echo $id ?>><?php echo $payment_method ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>


                            <hr>

                            <!--/span-->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="saveSinglePaymentBtn" class="btn btn-primary">Make Payment</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>





    <!-- ================================ADD GUARDIAN MODAL ============================ -->


    <div class="modal fade" id="addGuardianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Create Guardian</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form" enctype="multipart/form-data">
                        <div class="form-body">
                            <h3 class="card-title">Personal Info</h3>
                            <hr>
                            <div class="row p-t-20">
                                <!-- <label class="form-label">Surname <span class="text-danger">*</span></label> -->
                                <input type="hidden" id="userId" name="userId" class="form-control" placeholder="" value="<?php echo $student_id ?>">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="e.g :  Mr/Mrs" required>
                                        <small class="form-control-feedback"></small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Surname <span class="text-danger">*</span></label>
                                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Ogundimu" required>
                                        <small class="form-control-feedback"></small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Olumide" required>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" id="middlename" name="middlename" class="form-control" placeholder="Olalekan">
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label class="form-label">Mobile Number</label><span class="text-danger">*</span></label>
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control" required>
                                    </div>


                                </div>
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label class="form-label">Secondary mobile Number</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control">
                                    </div>


                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-success22">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select class="form-control form-select" id="gender" name="gender" required>
                                            <option value="" disabled selected>Select Gender </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <small class="form-control-feedback"></small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="e.g: lecrosoft@gmail.com">
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>

                                <!--/span-->
                            </div>
                            <div class="row">

                                <!--/span-->
                                <div class="col-md-6 photo_div">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Guardian Photo</h4>
                                            <label for="input-file-now" class="form-label">Drang File here</label>
                                            <input type="file" id="input-file-now" class="dropify photo" name="photo" />
                                        </div>
                                    </div>
                                </div>
                                <!--/spGender-->

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>

                                        <textarea name="address" id="address" cols="30" rows="10" class=" form-control" style="height:100px"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label class="form-label">Relationship</label><span class="text-danger">*</span></label>
                                                <input type="text" name="relationship" id="relationship" class=" form-control" placeholder="E.g: Father,Mother,Aunty,Uncle,Driver etc. " required>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="toggle-switch">
                                                <label class="form-label">Emergency Contact?
                                                </label>
                                                <input type="hidden" id="" name="emergency" value="NO" class="toggle-switch-checkbox">
                                                <input type="checkbox" id="switch" name="emergency" class="toggle-switch-checkbox">
                                                <label for="switch" class="toggle-switch-label"></label>
                                                <div class="toggle-switch-label-text">
                                                    <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <span></span> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="toggle-switch">
                                                <label class="form-label">Authorized to Pick Up ?
                                                </label>
                                                <input type="hidden" id="" name="pickup" value="NO" class="">
                                                <input type="checkbox" id="score_switch" name="pickup" class="toggle-switch-checkbox2">
                                                <label for="score_switch" class="toggle-switch-label2"></label>
                                                <div class="toggle-switch-label-text2">
                                                    <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <!--/spGender-->


                                </div>

                            </div>

                            <!--/row-->

                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success text-white" id="save_btn"> <i class="fa fa-check"></i> Save</button>

                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ================================ADD GUARDIAN MODAL ============================ -->



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



    <!-- <script src="js/fees_stat_dashboard.js"></script> -->
    <script src="js/single_student_fees.js"></script>
    <script src="js/pay_fee.js"></script>
    <!-- <script src="js/pay_single_fee.js"></script> -->
    <script src="js/create_guardian.js"></script>
    <script src="js/add_guardian.js"></script>
    <script src="js/student_accessment.js"></script>
    <script src="js/single_students_attendance.js"></script>
    <script>
        loadStudentInvoiceList();
        loadStudentAccessment();
        loadStudentAttendance();
    </script>
    <!-- <script src="js/students_list.js"></script> -->

</body>

</html>