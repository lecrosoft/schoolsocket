<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Student<?php //echo $id 
                                                ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <?php
                $profile_photo = "";
                if ($photo == "" and $gender == "Female") {
                    $profile_photo = "undraw_profile_1.svg";
                } else if ($photo == "" and $gender == "Male") {
                    $profile_photo = "undraw_profile_2.svg";
                } else {
                    $profile_photo = $photo;
                }
                ?>
                <div class="d-flex" style="gap: 1rem;">
                    <div class="dropdown-list-image rounded-circle" style="height: 100px;width:100px; ">
                        <img class="rounded-circle" style="height: 100px;width:100px;border:3px solid blue" src="img/<?php echo $profile_photo ?>">
                    </div>
                    <div class="picture">
                        <p class="text-gray-600 small">Student name</p>
                        <h5 class="fw-bold" style="margin-top: -0.7rem;text-transform:capitalize"><?php echo $surname . ' ' . $first_name . ' ' . $middle_name ?></h5>
                        <div class="d-flex" style="gap: 1rem;">
                            <div class="batch d-flex flex-column">
                                <p class="text-gray-600 small">Batch</p>
                                <h6 style="margin-top: -0.7rem;"><?php echo $abbreviation . ' ' . $arm ?></h6>
                            </div>
                            <div class="session">
                                <p class="text-gray-600 small">Session</p>
                                <h6 style="margin-top: -0.7rem;"><?php echo $session_title ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex">
                    <div class="fee_detail">
                        <p class="text-success">Enrolled</p>
                        <h6 class="fw-bold" style="margin-top: -0.7rem;"><?php echo $date_created ?> | -- Enrollment</h6>
                        <div class="d-flex" style="gap: 1rem;">
                            <div class="batch d-flex flex-column">
                                <p class="text-gray-600 small">Account Status</p>
                                <h6 style="margin-top: -0.7rem;" class="text-success"><?php echo $status ?></h6>
                            </div>
                            <div class="session">
                                <p class="text-gray-600 small">Admission Number</p>
                                <h6 style="margin-top: -0.7rem;"><?php echo $admission_number ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="options">
                        <i class="fa fa-pencil text-primary"></i>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex">
                    <div class="fee_detail">
                        <p class="text-gray-600 small">Due Fees</p>
                        <h4 class="fw-bold text-danger" style="margin-top: -0.7rem;"><?php echo $currency_symbol ?><?php echo number_format($outstanding) ?></h4>
                        <div class="d-flex" style="gap: 1rem;">
                            <div class="batch d-flex flex-column">
                                <p class="text-gray-600 small">Gender</p>
                                <h6 style="margin-top: -0.7rem;"><?php echo $gender ?></h6>
                            </div>
                            <div class="session">
                                <p class="text-gray-600 small">Age</p>

                                <h6 style="margin-top: -0.7rem;"><?php echo $current_year - $year ?> years </h6>
                            </div>
                        </div>
                    </div>
                    <div class="options">
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle btn btn-primary" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> Options
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

                                <a class="dropdown-item" href="student_profile.php?s_id=${row.user_id}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>View Profile</a>
                                <a class="dropdown-item  editBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Edit Profile</a>
                                <a class="dropdown-item linkParentBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Link Parent/Guardian</a>
                                <a class="dropdown-item deleteBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Delete Student</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Bio</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Fees</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Guardians</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-assessment" type="button" role="tab" aria-controls="pills-assessment" aria-selected="false">Asssessments</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-attendance" type="button" role="tab" aria-controls="pills-attendance" aria-selected="false">Attandance</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-report-card-tab" data-toggle="pill" data-target="#pills-report_card" type="button" role="tab" aria-controls="pills-report_card" aria-selected="false">Report Cards</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Notes</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Batch History</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <?php include('students_bio.php') ?>

    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <?php include('single_student_fees_tab.php') ?>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><?php include('student_guardian.php') ?></div>
    <div class="tab-pane fade" id="pills-assessment" role="tabpanel" aria-labelledby="pills-contact-tab"><?php include('student_assessment_content.php') ?></div>
    <div class="tab-pane fade" id="pills-attendance" role="tabpanel" aria-labelledby="pills-contact-tab"><?php include('student_attendance_content.php') ?></div>
    <div class="tab-pane fade" id="pills-report_card" role="tabpanel" aria-labelledby="pills-report-card-tab">kkkk</div>
</div>