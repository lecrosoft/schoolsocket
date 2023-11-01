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
        <label for="">ADD ASSESSMENT</label>
        <button id="addAssessmentButton" class="btn btn-primary form-control">Add Assessment</button>

    </div>
    <div class="col-xl-3 col-md-6 mb-4 form-group">

        <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $id ?>">
        <input type="hidden" name="session_id" id="session_id" value="<?php echo $current_session_id ?>">

    </div>
</div>

<?php //include('student_filter_box.php');
// include('tables.php');
// studentPaymentListTable();P
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Student Offering This subject</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered scoresheetTable" id="scoresheet" width="100%" cellspacing="0" style="padding: 0% !important; margin:0%">
                <thead style="padding: 0px !important; margin:0px !important">
                    <tr style="padding: 0% !important; margin:px">
                        <!-- <th><input class="check-box" type="checkbox"></th> -->
                        <th style="white-space:nowrap !important;">
                            <div class="d-flex flex-row" style="gap:2rem">
                                <div class="student_name" style="width: 90%;"> Student names</div>
                                <div class="d-flex flex-column" style="justify-content: flex-end;">
                                    <div class="abbreviation border-bottom-primary" style="">Category</div>
                                    <div class="max-score">Point</div>
                                </div>
                            </div>
                        </th>
                        <?php
                        $query = $global::fetchAll('SELECT * FROM `assessment` LEFT JOIN `assessment_category` ON `assessment`.`assesment_category_id` = `assessment_category`.`id` WHERE `assessment`.`subject_id` = "' . $id . '"');
                        while ($row = mysqli_fetch_assoc($query)) {
                            extract($row);
                        ?>
                            <th style="width: 100px;">
                                <div class="d-flex flex-column">
                                    <div class="assessment_title scoresheet_th"><?php echo $assesment_name ?></div>
                                    <div class="abbreviation text-primary" style=""><?php echo $abbreviation ?></div>
                                    <div class="max-score text-primary"><?php echo $possible_points ?></div>
                                </div>
                            </th>
                        <?php
                        }
                        ?>



                        <!-- <th style="column-width:5% !important"><i class="fa fa-tools"></i></th> -->
                    </tr>

                </thead>
                <tbody id="tbody">

                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th>Student names</th>
                        <th>Class</th>
                        <th>ADM NO.</th>
                        <th>ADIMISSION DATE</th>
                       

                    </tr>
                </tfoot> -->

            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="assessmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Assessment</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="" id="assessmentForm">
                    <input type="hidden" id="term_id" name="term_id" value="<?php echo $active_term_id ?>">
                    <input type="hidden" id="session_id" name="session_id" value="<?php echo $current_session_id ?>">
                    <input type="hidden" id="subjectId" name="subjectId" value="<?php echo $_GET['id'] ?>">
                    <input type="hidden" id="batch_id" name="batch_id" value="<?php echo $_GET['b_id'] ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">ASSESSMENT CATEGORY <span class="text-danger">*</span>
                                </label>
                                <select class="select2 form-control form-select" style="width: 100%; height:36px;" data-placeholder="" name="assessment_category_id" id="assessment_category_id" required>
                                    <option value="">Select</option>
                                    <?php
                                    $query = $global::fetchAll('SELECT * FROM `assessment_category`');
                                    while ($row = mysqli_fetch_array($query)) {
                                        extract($row);
                                    ?>
                                        <option value=<?php echo $id ?>><?php echo $category_name ?></option>
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
                                <label class="form-label">NAME <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="assessment_name" id="assessment_name" placeholder="E.g: First CA" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">ABBREVIATION<span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="abbreviation" id="abbreviation" placeholder="E.g: FCA" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">DUE DATE<span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" name="due_date" id="due_date" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">POSSIBLE POINTS<span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control" name="possible_points" id="possible_points" placeholder="E.G: 20" required min="1">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">DESCRIPTION
                                </label>

                                <textarea name="description" id="description" class="form-control" cols="30" rows="10" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">FILE
                                </label>
                                <input type="file" class="form-control" name="file" id="file">
                            </div>
                        </div>
                        <!--/span-->
                        <hr>
                        <div class="col-md-12">


                            <a class="show_more_btn">Show More </a>
                        </div>
                        <div class="more_details col-md-12 row hidden">
                            <div class="col-md-12">
                                <div class="toggle-switch">
                                    <label class="form-label">INCLUDE IN FINAL GRADE
                                    </label>
                                    <input type="hidden" id="" name="show_on_report_card" value="NO" class="toggle-switch-checkbox">
                                    <input type="checkbox" id="switch" name="show_on_report_card" class="toggle-switch-checkbox">
                                    <label for="switch" class="toggle-switch-label"></label>
                                    <div class="toggle-switch-label-text">
                                        <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="toggle-switch">
                                    <label class="form-label">SHOW SCORE TO STUDENT
                                    </label>
                                    <input type="hidden" id="" name="show_score" value="NO" class="">
                                    <input type="checkbox" id="score_switch" name="show_score" class="toggle-switch-checkbox2">
                                    <label for="score_switch" class="toggle-switch-label2"></label>
                                    <div class="toggle-switch-label-text2">
                                        <!-- <span class="toggle-switch-label-on"><i class="fa fa-check"></i></span>
                                        <span class="toggle-switch-label-off">NO</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>

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