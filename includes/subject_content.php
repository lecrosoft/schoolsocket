<!-- Page Heading -->
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex" style="gap: 1rem;">

                    <div class="picture">
                        <p class="text-white-600 small">Subject Name</p>
                        <h5 class="fw-bold" style="margin-top: -0.7rem;text-transform:capitalize"><?php echo $subject_name ?></h5>
                        <h5><?php echo $abbreviation . ' ' . $arm . ' ' . $session_title ?></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex">
                    <div class="fee_detail">
                        <p class="text-white-600 small">Student in Batch</p>
                        <h4 class="fw-bold text-white" style="margin-top: -0.7rem;"><?php echo $this_batch_student_count ?></h4>
                        <div class="d-flex" style="gap: 1rem;">
                            <!-- <div class="batch d-flex flex-column">
                                <p class="text-gray-600 small">Gender</p>
                                <h6 style="margin-top: -0.7rem;"><?php echo $gender ?></h6>
                            </div> -->
                            <div class="options">
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle btn btn-success" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    </div>
</div>

<!-- Content Row -->
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Student List</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Score Sheet</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Assessement</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <?php include('batch_students_in_subject_list.php') ?>

    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <?php include('score_sheet.php') ?>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>