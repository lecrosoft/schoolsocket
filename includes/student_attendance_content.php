<!-- Pie Chart -->
<?php include('student_attendance_filter_box.php');


$sqlDateAbsent = "SELECT * FROM `attendance_details` WHERE `user_id` = '" . $student_id . "'
                        AND `attendance_details`.`session_id` = '" . $current_session_id . "'
                        AND `attendance_details`.`term_id` = '" . $current_term_id . "'
                        AND `attendance_details`.`batch_id` = '" . $student_batch_id . "'
                        AND `attendance_value` = 'Absent' ";
$query_sqlDateAbsent = $db->query($sqlDateAbsent) or die("QUERY ERROR" . $db->con->error);
// $row = mysqli_fetch_assoc($query_sqlDatePresent);
// extract($row);
$daysAbsent = mysqli_num_rows($query_sqlDateAbsent);



?>
<div class="row">

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success2 shadow h-100 py-2">
            <div class="card-body">
                <div class="row22 no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-1 font-weight-bold2 text-primary" style="font-weight:900;"></div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            DAYS OPENED</div>
                        <p><?php echo $numberOfDaySchoolOpen ?></p>


                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success2 shadow h-100 py-2">
            <div class="card-body">
                <div class="row22 no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-1 font-weight-bold2 text-primary" style="font-weight:900;"></div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            SCORE</div>
                        <p>302</p>


                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success2 shadow h-100 py-2">
            <div class="card-body">
                <div class="row22 no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-1 font-weight-bold2 text-primary" style="font-weight:900;"></div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            PERCENTAGE</div>
                        <p>100</p>


                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success2 shadow h-100 py-2">
            <div class="card-body">
                <div class="row22 no-gutters align-items-center">
                    <div class="col mr-2">


                        <?php
                        $sqlDateLate = "SELECT * FROM `attendance_details` WHERE `user_id` = '" . $student_id . "'
                        AND `attendance_details`.`session_id` = '" . $current_session_id . "'
                        AND `attendance_details`.`term_id` = '" . $current_term_id . "'
                        AND `attendance_details`.`batch_id` = '" . $student_batch_id . "'
                        AND `late` = 'YES' ";
                        $query_sqlDateLate = $db->query($sqlDateLate) or die("QUERY ERROR" . $db->con->error);
                        // $row = mysqli_fetch_assoc($query_sqlDatePresent);
                        // extract($row);
                        $daysLate = mysqli_num_rows($query_sqlDateLate);
                        ?>

                        <div class="d-flex flex-row" style="gap:0.5rem">
                            <div class="span1"> <span class="btn btn-sm border border-danger text-dark msg_balance"><?php echo $daysAbsent ?></span> <span class="text-danger">Days Absent</span></div>
                            <div class="span2"> <span class="btn btn-sm border border-primary text-dark msg_balance"><?php echo $count_holiday ?></span> <span class="text-primary">Holidays</span></div>
                        </div>







                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success2 shadow h-100 py-2">
            <div class="card-body">
                <div class="row22 no-gutters align-items-center">
                    <div class="col mr-2">

                        <?php

                        $sqlDatePresent = "SELECT * FROM `attendance_details` WHERE `user_id` = '" . $student_id . "'
                        AND `attendance_details`.`session_id` = '" . $current_session_id . "'
                        AND `attendance_details`.`term_id` = '" . $current_term_id . "'
                        AND `attendance_details`.`batch_id` = '" . $student_batch_id . "'
                        AND `attendance_value` = 'Present' ";
                        $query_sqlDatePresent = $db->query($sqlDatePresent) or die("QUERY ERROR" . $db->con->error);
                        // $row = mysqli_fetch_assoc($query_sqlDatePresent);
                        // extract($row);
                        $daysPresent = mysqli_num_rows($query_sqlDatePresent);

                        ?>
                        <div class="d-flex flex-row" style="gap:0.5rem">
                            <div class="span1"> <span class="btn btn-sm border border-success text-dark msg_balance"><?php echo $daysPresent ?></span> <span class="text-success">Days Present</span></div>
                            <div class="span2"> <span class="btn btn-sm border border-warning text-dark msg_balance"><?php echo $daysLate ?></span> <span class="text-warning">Days Late</span></div>
                        </div>







                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>



</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row" style="gap: 1rem;">
            <h6 class="m-0 font-weight-bold text-primary col">Attendance Report</h6>
            <input type="date" id="from" class="form-control col" value="<?php echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d') ?>">
            <input type="date" id="to" class="form-control col" value="<?php echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d') ?>">
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered attendanceTable" id="dataTabless" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Attendance</th>
                        <th>late</th>
                        <th>Half Day</th>
                        <th>Comment</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Attendance</th>
                        <th>late</th>
                        <th>Half Day</th>
                        <th>Comment</th>

                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>
<!-- Content Row --
===========after the page content and container fluidd closing tag ==============