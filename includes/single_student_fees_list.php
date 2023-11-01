<div class="row">
    <div class=" col-xl-2 col-md-6 mb-4 form-group">
        <label for="">ACTION </label>
        <button class="btn btn-success form-control" id="pay_due_fee_btn">Pay Due Fee</button>
    </div>
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
            <?php
            $sql = "SELECT * FROM `academy_session` WHERE `academy_session`.`status` != 'Active'";
            $query_sql2 = $db->query($sql);
            while ($row = mysqli_fetch_assoc($query_sql2)) {
            ?>
                <option value="<?php echo $active_section_id ?>"><?php echo $active_section_name ?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 form-group">
        <label for="">TERM </label>
        <select name="term_id" id="termId" class="form-control form-select">
            <option value="">All Terms</option>
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
        <input id="userId" type="hidden" value="<?php echo $id ?>">
    </div>

</div>

<?php //include('student_filter_box.php');
// include('tables.php');
// studentPaymentListTable();
?>
<div class=" card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered due_fee_table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th><input class="check-box" type="checkbox"></th> -->
                        <th style="white-space:nowrap !important;">Fee Types</th>
                        <th style="white-space:nowrap !important;">Term</th>
                        <th>Amount(<?php echo $currency_symbol ?>)</th>
                        <th>Discount(<?php echo $currency_symbol ?>)</th>
                        <th>Expected(<?php echo $currency_symbol ?>)</th>
                        <th>Paid(<?php echo $currency_symbol ?>)</th>
                        <th>Outstanding(<?php echo $currency_symbol ?>)</th>
                        <th>Action</th>
                        <!-- <th style="column-width:5% !important"><i class="fa fa-tools"></i></th> -->
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <!-- <th></th> -->
                        <th style="white-space:nowrap !important;">Fee Types</th>
                        <th style="white-space:nowrap !important;">Term</th>
                        <th>Amount(<?php echo $currency_symbol ?>)</th>
                        <th>Discount(<?php echo $currency_symbol ?>)</th>
                        <th>Expected(<?php echo $currency_symbol ?>)</th>
                        <th>Paid(<?php echo $currency_symbol ?>)</th>
                        <th>Outstanding(<?php echo $currency_symbol ?>)</th>
                        <th>Action</th>

                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>