<?php
require_once('init.php'); ?>
<?php include_once('generalStats.php') ?>

<div class="options mb-3 ">
    <div class="dropdown no-arrow">
        <a class="dropdown-toggle btn btn-primary" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> Assign Guardian
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

            <a class="dropdown-item  editBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Asign Existing Guardian</a>
            <a class="dropdown-item" id="addGuardianBtn"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Create New Guardian</a>

        </div>
    </div>
</div>
<?php
$output = array();
// $searchKeyWords = $_GET['search_keywords'];



//surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
// $sql = "SELECT `arm`,`a_user_id`,`class`.`class_id`,`abbreviation`,`session_title`,`student_count`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name`,`class_teacher_id`,`assistant_class_teacher_id`,`batch`.`batch_id`,`assistant_class_teacher`.`a_surname`,`assistant_class_teacher`.`a_first_name`,`assistant_class_teacher`.`a_middle_name` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` LEFT JOIN `user` ON `batch`.`class_teacher_id` =`user`.`user_id` LEFT JOIN `assistant_class_teacher` ON `batch`.`batch_id` = `assistant_class_teacher`.`batch_id` $query";
$sql = "SELECT * FROM `student_guardian` LEFT JOIN `user` ON `user`.`user_id` = `student_guardian`.`parent_id`  WHERE `student_id` = $id";
$query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
$count = mysqli_num_rows($query_sql);
if ($count < 1) {
    echo '<div class="alert alert-primary d-flex align-items-center mb-3" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
     &nbsp;No Guardian Has been assigned to this student
  </div>
</div>';
} else {
?>
    <div class="row">
        <?php
        while ($row = mysqli_fetch_array($query_sql)) {


            extract($row);

        ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success2 shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row22 no-gutters align-items-center">
                            <div class="col mr-2">

                                <!-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Generated Revenue</div> -->
                                <?php
                                $profile_photo = "";
                                if ($photo == "" and $gender == "Female") {
                                    $profile_photo = "undraw_profile_3.svg";
                                } else if ($photo == "" and $gender == "Male") {
                                    $profile_photo = "undraw_profile_2.svg";
                                } else {
                                    $profile_photo = $photo;
                                }
                                ?>
                                <div class="d-flex flex-row" style="gap:0.5rem">
                                    <div class="photo">
                                        <div class="dropdown-list-image rounded-circle" style="height: 50px;width:50px; border:2px solid blue">
                                            <img class="rounded-circle" style="height: 100%;width:100%" src="img/<?php echo $profile_photo ?>">
                                        </div>
                                    </div>
                                    <div class="parent_name d-flex flex-column">
                                        <a href="guardian?id=<?php echo $user_id ?>"><?php echo $surname . " " . $first_name ?></a>
                                        <p><?php echo $relationship ?></p>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-2" style="font-weight: bold;">Mobile - <?php echo $mobile_number ?></h6>
                                    <h6 class="mb-2" style="font-weight: bold;">Email - <?php echo $email ?></h6>
                                    <h6 class="mb-2" style="font-weight: bold;">Emergency Contact - <?php echo $emergency ?></h6>
                                    <h6 class="mb-2" style="font-weight: bold;">Can Pick Up? - <?php echo $pickup ?></h6>

                                </div>

                                <div class="d-flex flex-row">
                                    <p class="text-primary">Number Of Wards : <?php echo $number_of_wards ?></p>
                                    <div class="options" style="margin-left: auto;">
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Unasign</a>
                                                <a class="dropdown-item  editBtn" id=${row.user_id}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>View Profile</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
<?php
};
?>