<?php
if (isset($_GET['b_id'])) {
    $b_id = $_GET['b_id'];
}

?>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4 form-group">
        <button id="add_batch_subject" class="btn btn-primary">Add New Subject</button>
        <!-- <label for="">BATCHES </label> -->

    </div>
    <div class="col-xl-3 col-md-6 mb-4 form-group">

        <input type="hidden" id="batchId" value="<?php echo $b_id ?>">
        <input type="hidden" id="termId" value="<?php echo $current_term_id ?>">
        <!-- <label for="">BATCHES </label> -->

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
            <table class="table table-bordered subject_table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th><input class="check-box" type="checkbox"></th> -->

                        <th>SUBJECT</th>
                        <th>EMPLOYEE</th>
                        <th>IS ELECTIVE</th>
                        <th>ACTIONS</th>


                        <!-- <th style="column-width:5% !important"><i class="fa fa-tools"></i></th> -->
                    </tr>
                </thead>
                <tfoot>
                    <tr>

                        <th>SUBJECT</th>
                        <th>EMPLOYEE</th>
                        <th>IS ELECTIVE</th>
                        <th>ACTIONS</th>

                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>