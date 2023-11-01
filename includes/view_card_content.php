<!-- Page Heading -->
<div class="card mb-3">
    <div class="card-body p-4">
        <div class="row">
            <div class="col-md-8">

                <h5>REPORT CARDS</h5>
                <select name="" id="student_id" class="normalize2 form-control form-select">
                    <option value="" selected disabled>Select Student</option>
                    <?php

                    $sql = "SELECT `batch_student_list`.`user_id`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name` FROM `batch_student_list` 
                    LEFT JOIN `user` ON `batch_student_list`.`user_id` = `user`.`user_id`
                    WHERE `batch_student_list`.`batch_id` = $batch_id ";

                    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
                    while ($row = mysqli_fetch_assoc($query_sql)) {
                        extract($row)

                    ?>
                        <option value="<?php echo $user_id ?>"><?php echo $surname . " " . $first_name . " " . $middle_name  ?></option>

                    <?php
                    };
                    ?>
                </select>
                <input type="hidden" id="card_name" value="<?php echo $card_name ?>">
                <input type="hidden" id="batch_id" value="<?php echo $thisCardBatchId ?>">
                <input type="hidden" id="type" value="<?php echo $type ?>">
                <input type="hidden" id="term_id" value="<?php echo $term_id ?>">
                <input type="hidden" id="card_id" value="<?php echo $card_id ?>">
                <input type="hidden" id="session_id" value="<?php echo $session_id ?>">
                <input type="hidden" id="publish" value="<?php echo $publish ?>">
                <input type="hidden" id="template_id" value="<?php echo $template_id ?>">

            </div>

            <div class="col-md-4">
                <label for="">&nbsp;</label>
                <div class="d-flex" style="gap: 1rem;">
                    <div class="fee_detail">
                        <div class="d-flex" style="gap: 1rem;">

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

<div class="card_content" style="overflow-x: auto;">
    <div class="card mb-3">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-12">

                    <h6>Select student to view report card</h6>


                </div>


            </div>
        </div>
    </div>
</div>