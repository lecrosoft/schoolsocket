    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ================Add student Modal ================================================== -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Add Student</h5>
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
                                <input type="hidden" id="userId" name="userId" class="form-control" placeholder="Ogundimu" required>
                                <input type="hidden" id="current_term_id" name="current_term_id" class="form-control" placeholder="" value="<?php echo $current_term_id ?>" required>
                                <input type="hidden" id="current_session_id" name="current_session_id" class="form-control" placeholder="" value="<?php echo $current_session_id ?>" required>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Surname <span class="text-danger">*</span></label>
                                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Ogundimu" required>
                                        <small class="form-control-feedback"></small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Olumide" required>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" id="middlename" name="middlename" class="form-control" placeholder="Olalekan">
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>

                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" id="dateofbirth" name="dateofbirth" class="form-control" placeholder="dd/mm/yyyy" required>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Addmission Number <span class="text-danger">*</span></label>
                                        <input type="text" id="admission_number" name="admission_number" class="form-control" placeholder="Enter Admission No." required>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/spGender-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Religion</label>
                                        <select class="form-control form-select" name="religion" id="religion">
                                            <option value="" selected>Select Religion</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Muslim">Muslim</option>
                                        </select>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control">
                                    </div>


                                </div>
                                <!--/spGender-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6 batch_div">
                                    <div class="form-group">
                                        <label class="form-label">Batch <span class="text-danger">*</span></label>
                                        <select class="normalize form-control2 form-select" style="" data-placeholder="" name="batch_id" id="batch_id" tabindex="1" required>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Student Category</label>
                                        <select class="normalize form-control2 form-select" style="width: 100%; height:36px;" data-placeholder="" name="student_cat_id" id="student_cat_id" tabindex="1">
                                            <option value="">Select Student Category</option>
                                            <?php
                                            $query = $global::fetchAll('SELECT * FROM `student_category`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $student_category_id ?>><?php echo $student_category ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Blood group</label>
                                        <select class="normalize form-control2 form-select" style="" data-placeholder="" name="blood_group" id="blood_group" tabindex="1">
                                            <!-- <option value="" selected>Select Blood group</option> -->
                                            <?php
                                            $query = $global::fetchAll('SELECT * FROM `bloodgroup`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $bloodgroup_id ?>><?php echo $bloodgroup ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Student Type</label>
                                        <select class="normalize form-control2 form-select" name="student_type" id="student_type">
                                            <option value="" selected>Select Student Type</option>
                                            <option value="Day">Day</option>
                                            <option value="Boarding">Boarding</option>

                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6 photo_div">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Student Photo</h4>
                                            <label for="input-file-now" class="form-label">Your so fresh input file — Default version</label>
                                            <input type="file" id="input-file-now" class="dropify photo" name="photo" />
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">


                                    <div class="form-group has-danger22">
                                        <label class="form-label">Health info</label>
                                        <textarea type="text" id="health_info" name="health_info" class="form-control" placeholder="health_info" style="height:100px"></textarea>
                                        <small class="form-control-feedback"> </small>
                                    </div>

                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <h3 class="box-title m-t-40">Address</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Street</label>
                                        <input type="text" name="address" id="address" class=" form-control">
                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="e.g: lecrosoftgmail.com">
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Nationalty</label>
                                        <select class="normalized form-control form-select" name="nationalty" id="nationalty">
                                            <option selected value="">--Select your Country--</option>
                                            <option selected value="Nigeria">Nigerian</option>
                                        </select>
                                    </div>
                                </div>



                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">State of Origin <span class="text-danger">*</span></label>
                                        <select onchange="toggleLGA(this);" class="normalize form-control2 form-select" style="" name="state_of_origin" id="state" required>
                                            <option selected value="">--Select your state of origin--</option>

                                            <option value="Abia">Abia</option>
                                            <option value="Adamawa">Adamawa</option>
                                            <option value="AkwaIbom">AkwaIbom</option>
                                            <option value="Anambra">Anambra</option>
                                            <option value="Bauchi">Bauchi</option>
                                            <option value="Bayelsa">Bayelsa</option>
                                            <option value="Benue">Benue</option>
                                            <option value="Borno">Borno</option>
                                            <option value="Cross River">Cross River</option>
                                            <option value="Delta">Delta</option>
                                            <option value="Ebonyi">Ebonyi</option>
                                            <option value="Edo">Edo</option>
                                            <option value="Ekiti">Ekiti</option>
                                            <option value="Enugu">Enugu</option>
                                            <option value="FCT">FCT</option>
                                            <option value="Gombe">Gombe</option>
                                            <option value="Imo">Imo</option>
                                            <option value="Jigawa">Jigawa</option>
                                            <option value="Kaduna">Kaduna</option>
                                            <option value="Kano">Kano</option>
                                            <option value="Katsina">Katsina</option>
                                            <option value="Kebbi">Kebbi</option>
                                            <option value="Kogi">Kogi</option>
                                            <option value="Kwara">Kwara</option>
                                            <option value="Lagos">Lagos</option>
                                            <option value="Nasarawa">Nasarawa</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Ogun">Ogun</option>
                                            <option value="Ondo">Ondo</option>
                                            <option value="Osun">Osun</option>
                                            <option value="Oyo">Oyo</option>
                                            <option value="Plateau">Plateau</option>
                                            <option value="Rivers">Rivers</option>
                                            <option value="Sokoto">Sokoto</option>
                                            <option value="Taraba">Taraba</option>
                                            <option value="Yobe">Yobe</option>
                                            <option value="Zamfara">Zamafara</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Local Government <span class="text-danger">*</span></label>
                                        <select class="select4444 form-control22 form-select select-lga" style="width: 100%; height:36px;" name="local_govt" id="lga">
                                            <option id="lgaOption"></option>


                                        </select>
                                    </div>
                                </div>



                                <!--/span-->
                            </div>
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

    <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="questionModalLabel">Create New Card Group</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="question_form" enctype="multipart/form-data" method="POST">
                        <div class="form-body">

                            <div class="row p-t-20">

                                <input type="hidden" id="session_id" name="session_id" class="form-control" value="<?php echo $current_session_id ?>">
                                <input type="hidden" id="question_id" name="question_id" class="form-control" value="">


                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                                        <select name="subject" id="subject" class="form-control form-select" required>
                                            <option value="" selected>Select Batch</option>
                                            <?php
                                            $query = $global::fetchAll('SELECT * FROM `subject_names`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $subject_id ?>><?php echo $subject_name ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Exam</label><span class="text-danger">*</span></label>
                                        <select name="question_exam_id[]" id="question_exam_id" class="form-control form-select select2" required multiple style="width:100%;height:4rem">
                                            <option value="">Select Exam(s)</option>
                                            <?php
                                            $query = $global::fetchAll('SELECT * FROM `exam`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $exam_id ?>><?php echo $exam_name ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!--/span-->

                                <!--/span-->
                            </div>
                            <!--/row-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Question <span class="text-danger">*</span></label>
                                        <textarea name="question" id="question" class="textarea" cols="30" rows="10" style="height:200px" class="form-control">

                                  </textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-danger22">

                                        <input type="button" id="add_option" name="add_option" class="btn btn-primary" value="Add Image">
                                    </div>
                                </div>
                                <div class="col-md-12 photo_div">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Question Image</h4>
                                            <label for="input-file-now" class="form-label">Your so fresh input file — Default version</label>
                                            <input type="file" id="input-file-now" class="dropify photo" name="photo" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <label for="">Options</label>
                            <div class="row">

                                <div class="col-md-8" id="option-div">

                                    <div class="d-flex mb-3 radio-container" style="gap:0.5rem">
                                        <input type="text" name="option[]" class="form-control" placeholder="Enter Option" required>
                                        <input type="radio" class="custom-radio-question" name="correct_answer[0]" value="true">
                                        <span style="white-space: nowrap;">Correct Answer</span>
                                        <button type="button" class="btn btn-danger btn_del btn-sm"><i class="fa fa-times"></i></button>
                                    </div>


                                </div>

                            </div>

                            <div class="form-group">
                                <button class="btn btn-secondary" id="add_item">
                                    <i class="fa fa-plus"></i> Add Item
                                </button>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success text-white" id="save_btn2"> <i class="fa fa-check"></i> Save</button>

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

    <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalLabel">Create Employee</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="employeeForm" enctype="multipart/form-data">
                        <div class="form-body">
                            <h3 class="card-title">Personal Info</h3>
                            <hr>
                            <div class="row p-t-20">
                                <!-- <label class="form-label">Surname <span class="text-danger">*</span></label> -->
                                <input type="hidden" id="userId" name="userId" class="form-control" placeholder="Ogundimu">
                                <input type="hidden" id="current_term_id" name="current_term_id" class="form-control" placeholder="" value="<?php echo $current_term_id ?>" required>
                                <input type="hidden" id="current_session_id" name="current_session_id" class="form-control" placeholder="" value="<?php echo $current_session_id ?>" required>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Surname <span class="text-danger">*</span></label>
                                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Ogundimu" required>
                                        <small class="form-control-feedback"></small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Olumide" required>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-4">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" id="middlename" name="middlename" class="form-control" placeholder="Olalekan">
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">


                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" id="dateofbirth" name="dateofbirth" class="form-control" placeholder="dd/mm/yyyy" required>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Employee Number <span class="text-danger">*</span></label>
                                        <input type="text" id="employee_number" name="employee_number" class="form-control" placeholder="Enter Admission No." required>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--/span-->
                                <!--/spGender-->
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Religion</label>
                                        <select class="form-control form-select" name="religion" id="religion">
                                            <option value="" selected>Select Religion</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Muslim">Muslim</option>
                                        </select>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Date Joined <span class="text-danger">*</span></label>
                                        <input type="date" id="datejoined" name="datejoined" class="form-control" placeholder="dd/mm/yyyy" required>
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>

                                <!--/spGender-->
                                <div class="col-md-4 batch_div">
                                    <div class="form-group">
                                        <label class="form-label">Marital Status <span class="text-danger">*</span></label>
                                        <select class="normalize form-control2 form-select" style="" data-placeholder="" name="marital_status" id="marital_status" tabindex="1" required>
                                            <option value="" selected>Select Batch</option>

                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">

                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Employee Position</label>
                                        <select class="normalize form-control2 form-select" style="width: 100%; height:36px;" data-placeholder="" name="employee_position" id="employee_position" tabindex="1">
                                            <option value="">Select Student Category</option>
                                            <?php
                                            $query = $global::fetchAll('SELECT * FROM `student_category`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $student_category_id ?>><?php echo $student_category ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Blood group</label>
                                        <select class="normalize form-control2 form-select" style="" data-placeholder="" name="blood_group" id="blood_group" tabindex="1">
                                            <option value="" selected>Select Blood group</option>
                                            <?php
                                            $query = $global::fetchAll('SELECT * FROM `bloodgroup`');
                                            while ($row = mysqli_fetch_array($query)) {
                                                extract($row);
                                            ?>
                                                <option value=<?php echo $bloodgroup_id ?>><?php echo $bloodgroup ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Employee Category</label>
                                        <select class="normalize form-control2 form-select" name="employee_category" id="employee_category">
                                            <option value="" selected>Select Employee Category</option>
                                            <option value="Teaching Staff">Teaching Staff</option>
                                            <option value="Non Teaching Staff">Non Teaching Staff</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!--/span-->

                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-4 photo_div">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Employee Photo</h4>
                                            <label for="input-file-now" class="form-label">Your so fresh input file — Default version</label>
                                            <input type="file" id="input-file-now" class="dropify photo" name="photo" />
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->



                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Qulification</label>
                                                <select class="normalize form-control2 form-select" name="qualification" id="qualification">
                                                    <option value="" selected>Select Student Type</option>
                                                    <option value="BSC">Bsc</option>
                                                    <option value="HND">HND</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="e.g:lecrosoft@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nationalty</label>
                                                <select class="normalize form-control2 form-select" style="" name="nationalty" id="nationalty">
                                                    <!-- <option selected value="">--Select your Country--</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Department</label>
                                                <select class="normalize form-control2 form-select" name="department" id="department">
                                                    <option value="" selected>Select Department</option>
                                                    <option value="Senior">Senior Secondary School</option>
                                                    <option value="Junior">Junior Secondary School</option>
                                                    <option value="Nursery">Nursery</option>
                                                    <option value="Primary">Primary</option>
                                                    <option value="Driver">Driver</option>
                                                    <option value="Cook">Cook</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input type="text" name="address" id="address" class=" form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Next of Kin Name</label>
                                        <input type="text" id="nextofkin_name" name="nextofkin_name" class="form-control" placeholder="Next Of Kin Name">
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Relationship with Next of Kin</label>
                                        <input type="text" id="nextofkin_relationship" name="nextofkin_relationship" class="form-control" placeholder="Next of kin Relationship">
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-4">
                                    <div class="form-group has-danger22">
                                        <label class="form-label">Next of kin Mobile Number</label>
                                        <input type="text" id="nextofkin_mobile_number" name="nextofkin_mobile_number" class="form-control" placeholder="Next of kin Mobile number">
                                        <small class="form-control-feedback"> </small>
                                    </div>
                                </div>


                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-4 photo_div">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Employee Signature</h4>
                                            <label for="input-file-now" class="form-label">This signature will appear on student report card</label>
                                            <input type="file" id="input-file-now" class="dropify photo" name="signature" />
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->



                                <div class="col-md-8">
                                    <div class="row">

                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label class="form-label">Next of kin Address</label>
                                                <input type="text" name="next_of_kin_address" id="next_of_kin_address" class=" form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Bank</label>
                                                <select class="normalize form-control2 form-select" name="bank_name" id="bank_name">
                                                    <option value="" selected>Select bank</option>
                                                    <option value="UBA">UBA</option>
                                                    <option value="GTB">GTB</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Employee Account Number</label>
                                                <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Employee account number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Account name</label>
                                                <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Account Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Employee Salary</label>
                                                <input type="number" name="salary" id="salary" class="form-control" placeholder="Salary Amount" min="1">
                                            </div>
                                        </div>


                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div>
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



    </div>
    </div>
    </div>

    <!-- ================END OF Add student Modal ================================================== -->
    <div class="modal fade" id="linkParentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Link Parent</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="" id="linkParentForm">
                        <input type="hidden" id="studentToLinkId" name="studentToLinkId">
                        <h6 id="studentToLink" style="font-weight:bold"></h6>
                        <small id="">Select a parent and the relationship this parent has with this child.</small>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">SEARCH PARENT
                                    </label>
                                    <select class="normalize form-control form-select" style="width: 100%; height:36px;" data-placeholder="" name="parent_id" id="parent_id" required>
                                        <option value="" selected>Select</option>
                                        <?php
                                        $query = $global::fetchAll('SELECT * FROM `user` WHERE `user_type` = "Guardian"');
                                        while ($row = mysqli_fetch_array($query)) {
                                            extract($row);
                                        ?>
                                            <option value=<?php echo $user_id ?>><?php echo $surname . ' ' . $first_name ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="form-label">SELECT RELATIONSHIP
                                    </label>
                                    <select class="normalize2 form-control form-select" name="relationship" id="relationship" required>
                                        <option value="" selected>Select Relationship</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Mother">Guardian</option>

                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="linkParentBtn" class="btn btn-primary">Save Parent</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="linkTeachertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Teacher</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="" id="linkTeacherForm">
                        <input type="" id="batchToLinkId" name="batchToLinkId">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">SELECT CLASS TEACHER <span class="text-danger">*</span>
                                    </label>
                                    <select class="normalize form-control form-select" style="width: 100%; height:36px;" data-placeholder="" name="teacher_id" id="teacher_id" required>
                                        <option value="">Select</option>
                                        <?php
                                        $query = $global::fetchAll('SELECT * FROM `user` WHERE `user_type` = "Employee" AND `user_role` = "Class Teacher" AND `user`.`status` = "Active"');
                                        while ($row = mysqli_fetch_array($query)) {
                                            extract($row);
                                        ?>
                                            <option value=<?php echo $user_id ?>><?php echo $surname . ' ' . $first_name ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">SELECT ASSISTANT CLASS TEACHER
                                    </label>
                                    <select class="normalize form-control form-select" style="width: 100%; height:36px;" data-placeholder="" name="assistant_teacher_id" id="assistant_teacher_id">
                                        <option value="">Select</option>
                                        <?php
                                        $query = $global::fetchAll('SELECT * FROM `user` WHERE `user_type` = "Employee" AND `user_role` = "Assistant Class Teacher" AND `user`.`status` = "Active"');
                                        while ($row = mysqli_fetch_array($query)) {
                                            extract($row);
                                        ?>
                                            <option value=<?php echo $user_id ?>><?php echo $surname . ' ' . $first_name ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <hr>

                            <!--/span-->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="linkTeacherBtn" class="btn btn-primary">Save</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="feeConfigurationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fee_config_modal_title" id="exampleModalLabel">Fees Configuration Status</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body fee_config_modal_body">

                    <?php $sql = "SELECT `arm`,`batch`.`invoice`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`abbreviation`,`session_title` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id`";
                    $query_sql = $db->query($sql);
                    $text = "";
                    $disable = "";
                    $color = '';
                    while ($row = mysqli_fetch_assoc($query_sql)) {
                        extract($row);
                        if ($invoice == "Configured") {
                            $disable = "disabled";
                            $text = "Configured";
                            $color = 'btn-success';
                        } else {
                            $disable = "";
                            $text = "Not Configured";
                            $color = "btn-secondary";
                        }
                    ?>
                        <!-- <option value=<?php echo $batch_id ?>><?php echo $class_abbreviation . ' ' . $arm  . ' ' . $session_title ?></option> -->
                        <div class="d-flex" style="justify-content: space-between;">
                            <div class="div" style="display: flex;flex-direction:column">
                                <p class="mb-0"><?php echo $abbreviation . ' ' . $arm  . ' ' . $session_title ?></p>
                                <small><?php echo $class_name ?></small>
                            </div>
                            <div class="div">
                                <button class="btn <?php echo $color ?> fee_config_btn" <?php echo $disable ?>><?php echo $text ?></button>
                            </div>
                        </div>
                        <hr>
                    <?php
                    }

                    ?>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="">Save Configuration</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="modal fade" id="startExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content exam-modal-content">



            </div>
        </div>
    </div>




    <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Subject</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="" id="batchSubjectForm">
                        <input type="hidden" id="subject_batch_id" name="subject_batch_id" class="">
                        <input type="hidden" id="term_id" name="term_id" class="">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">SELECT SUBJECT
                                    </label>
                                    <select class="normalize  form-select" style="width: 100%; height:36px;" data-placeholder="" name="subject_id" id="subject_id" required>
                                        <option value="">Select</option>
                                        <?php
                                        $query = $global::fetchAll('SELECT * FROM `subject_names`');
                                        while ($row = mysqli_fetch_array($query)) {
                                            extract($row);
                                        ?>
                                            <option value=<?php echo $subject_id ?>><?php echo $subject_name ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="toggle-switch">
                                    <label class="form-label">IS ELECTIVE ?
                                    </label>
                                    <input type="hidden" id="" name="elective" value="NO" class="toggle-switch-checkbox">
                                    <input type="checkbox" id="switch" name="elective" class="toggle-switch-checkbox">
                                    <label for="switch" class="toggle-switch-label"></label>
                                    <div class="toggle-switch-label-text">
                                        <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                                    </div>
                                </div>


                            </div>
                            <br>
                            <hr>

                            <!--/span-->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="addSubjectBtn" class="btn btn-primary">Save</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="uploadForm" method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Excel File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fileInput">Choose Excel File:</label>
                            <input type="file" class="form-control-file" id="fileInput" name="fileInput">
                        </div>

                        <a href="file/upload_student.csv" download>Click here to download Template</a>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>