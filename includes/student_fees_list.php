<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success2 shadow h-100 py-2">
            <div class="card-body">
                <div class="row22 no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-1 font-weight-bold2 text-primary" style="font-weight:900;"><?php echo $currency_symbol ?>215,00</div>
                        <!-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Generated Revenue</div> -->
                        <p>Expected Revenue</p>


                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success2 shadow h-100 py-2">
            <div class="card-body">
                <div class="row22 no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-1 font-weight-bold2 text-success" style="font-weight:900;"><?php echo $currency_symbol ?>215,00</div>
                        <!-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Generated Revenue</div> -->
                        <p>Generated Revenue</p>
                        <p>0% of expected revenue</p>

                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger2 shadow h-100 py-2">
            <div class="card-body">
                <div class="row22 no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-1 font-weight-bold2 text-danger" style="font-weight:900;"><?php echo $currency_symbol ?>215,00</div>
                        <!-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Generated Revenue</div> -->
                        <p>Outstanding</p>
                        <p>100% of expected still outstanding</p>

                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>



    <!-- Pending Requests Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="row">
    <div class=" col-xl-3 col-md-6 mb-4 form-group">
        <label for="">SESSION </label>
        <select name="session_id" id="sessionId" class="form-control form-select">
            <?php
            $sql = "SELECT * FROM `academy_session` WHERE `academy_session`.`status` = 'Active'";
            $query_sql = $db->query($sql);
            $active_section_row = mysqli_fetch_assoc($query_sql);
            $active_section_name = $active_section_row['session_title'];
            $active_section_id = $active_section_row['session_id'];
            ?>
            <option value="<?php echo $active_section_id ?>"><?php echo $active_section_name ?></option>
        </select>
    </div>
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
            <option value="">Select Batch</option>
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

<?php //include('student_filter_box.php');
// include('tables.php');
// studentPaymentListTable();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th><input class="check-box" type="checkbox"></th> -->
                        <th style="white-space:nowrap !important;">Student names</th>
                        <th>Class</th>
                        <th>Amount(<?php echo $currency_symbol ?>)</th>
                        <th>Discount(<?php echo $currency_symbol ?>)</th>
                        <th>Expected(<?php echo $currency_symbol ?>)</th>
                        <th>Paid(<?php echo $currency_symbol ?>)</th>
                        <th>Outstanding(<?php echo $currency_symbol ?>)</th>
                        <!-- <th style="column-width:5% !important"><i class="fa fa-tools"></i></th> -->
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <!-- <th></th> -->
                        <th>Student</th>
                        <th>Class</th>
                        <th>Amount(<?php echo $currency_symbol ?>)</th>
                        <th>Discount(<?php echo $currency_symbol ?>)</th>
                        <th>Expected(<?php echo $currency_symbol ?>)</th>
                        <th>Paid(<?php echo $currency_symbol ?>)</th>
                        <th>Outstanding(<?php echo $currency_symbol ?>)</th>
                        <!-- <th>Actions</th> -->

                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>