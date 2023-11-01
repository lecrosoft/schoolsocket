<?php
if (isset($_GET['b_id'])) {
    $b_id = $_GET['b_id'];
    $id = $_GET['id'];
}

?>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4 form-group">
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
    <div class="col-xl-3 col-md-6 mb-4 form-group">
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
    <div class="col-xl-3 col-md-6 mb-4 form-group">

        <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $id ?>">

    </div>
</div>

<?php //include('student_filter_box.php');
// include('tables.php');
// studentPaymentListTable();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Student Offering This subject</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered studentTable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th><input class="check-box" type="checkbox"></th> -->
                        <th style="white-space:nowrap !important;">Student names</th>
                        <th>Class</th>
                        <th>ADM NO.</th>
                        <th>ADIMISSION DATE</th>


                        <!-- <th style="column-width:5% !important"><i class="fa fa-tools"></i></th> -->
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Student names</th>
                        <th>Class</th>
                        <th>ADM NO.</th>
                        <th>ADIMISSION DATE</th>
                        <!-- <th>Actions</th> -->

                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>