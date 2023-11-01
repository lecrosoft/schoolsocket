<?php
if (isset($_GET['b_id'])) {
    $b_id = $_GET['b_id'];
    $attendanceDate;
}

$attendanceStatus = "Attendance Not Taken";
$labelColor = "danger";
?>

<form action="" id="submit_attendance_form" method="POST">
    <div class="row">
        <div class="col-xl-2 col-md-6 mb-4 form-group">
            <input type="hidden" name="session_id" id="session_id" value="<?php echo $current_session_id ?>">
            <label for="">Date </label>
            <input type="date" class="form-control" name="attendance_date" id="attendance_date" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>">


        </div>
        <div class="col-xl-3 col-md-6 mb-4 form-group">
            <label for="">Attendance Status</label>

            <div class="text-white form-control" id="attendanceStatus"></div>

        </div>
        <div class="col-xl-3 col-md-6 mb-4 form-group hidden">
            <label for="">TERM </label>
            <select name="term_id" id="termId" class="form-control form-select">
                <?php
                $sql = "SELECT * FROM `term` WHERE `term`.`status` = 'Active'";
                $query_sql = $db->query($sql);
                $active_term_row = mysqli_fetch_assoc($query_sql);
                $active_term_name = $active_term_row['term_name'];
                $active_term_id = $active_term_row['term_id'];
                ?>
                <option value="<?php echo $active_term_id ?>"><?php echo $active_term_name ?></option>
                <?php
                $sql = "SELECT * FROM `term` WHERE `term`.`status` IS NULL";
                $query_allsql = $db->query($sql);

                while ($row = mysqli_fetch_assoc($query_allsql)) {
                    extract($row);
                ?>
                    <option value="<?php echo $term_id ?>"><?php echo $term_name ?></option>
                <?php
                }
                ?>
            </select>

        </div>
        <div class="col-xl-3 col-md-6 mb-4 form-group hidden">
            <label for="">BATCHES </label>
            <select name="batch_id" id="batchId" class="form-control form-select">
                <!-- <option value="">Select Batch</option> -->
                <?php
                $query = $global::fetchAll('SELECT `arm`,`batch`.`batch_id`,`class_name`,`class`.`class_id`,`abbreviation`,`session_title` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` WHERE `batch_id` = "' . $b_id . '"');
                while ($row = mysqli_fetch_array($query)) {
                    extract($row);
                ?>
                    <option value=<?php echo $batch_id ?>><?php echo $abbreviation . ' ' . $arm  . ' ' . $session_title ?></option>
                <?php
                }
                ?>
            </select>

        </div>
        <div class="col-xl-3 col-md-6 mb-4 form-group" style="margin-left: auto;">
            <label for="">Termly Attendance </label>
            <button class="btn btn-outline-primary form-control">Use Term Attendance</button>

        </div>
        <div class="col-xl-3 col-md-6 mb-4 form-group">
            <label for="">Save Attendance </label>
            <button type="submit" class="btn btn-primary form-control" id="save_btn">Save Attendance</button>

        </div>
    </div>

    <?php //include('student_filter_box.php');
    // include('tables.php');
    // studentPaymentListTable();
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daily Attendance</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered attendanceTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th><input class="check-box" type="checkbox"></th> -->
                            <th style="white-space:nowrap !important;">Student names</th>
                            <th>Present/Absent</th>
                            <th>Late</th>
                            <th>Half Day</th>
                            <th>Comment</th>


                            <!-- <th style="column-width:5% !important"><i class="fa fa-tools"></i></th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th style="white-space:nowrap !important;">Student names</th>
                            <th>Present/Absent</th>
                            <th>Late</th>
                            <th>Half Day</th>
                            <th>Comment</th>

                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>


    <!-- Attendance modal -->
    <div class="modal fade" id="attendance-modal" tabindex="-1" role="dialog" aria-labelledby="attendance-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attendance-modal-label">Student Attendance For </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="reason-group">
                        <label for="attendance-reason">Reason:</label>

                        <textarea name="attendance-reason" class="form-control" id="attendance-reason" cols="30" rows="10" style="height:100px" placeholder="e.g: Was sick with typhoid"></textarea>
                    </div>
                    <div class="toggle-switch" id="reason-group">
                        <label for="attendance-reason">Half Day ?</label>

                        <input type="hidden" id="" name="half_day" value="NO" class="toggle-switch-checkbox">
                        <input type="checkbox" id="switch" name="half_day" class="toggle-switch-checkbox switch-input">
                        <label for="switch" class="toggle-switch-label"></label>
                        <div class="toggle-switch-label-text">
                            <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="absent-submit-btn">Mark Absent</button>
                </div>
            </div>

        </div>


</form>