<?php
require_once('init.php'); ?>
<?php include_once('generalStats.php') ?>
<?php
$output = array();
// $searchKeyWords = $_GET['search_keywords'];
$sessionId = $_GET['sessionId'];
$termId = $_GET['termId'];
$batchId = $_GET['batchId'];

$query = "WHERE ";

if ($sessionId) {
    $query .= "`termly_fee_summary`.`session_id` = '" . $sessionId . "' AND ";
}
if ($batchId) {
    $query .= "`termly_fee_summary`.`batch_id` = '" . $batchId . "' AND ";
}
if ($termId) {
    $query .= "`termly_fee_summary`.`term_id` = '" . $termId . "'";
}

if ($query != "") {
    //surname,first_name,middle_name,admission_number,admission_date,arm,abbreviation
    // $sql = "SELECT `arm`,`a_user_id`,`class`.`class_id`,`abbreviation`,`session_title`,`student_count`,`user`.`surname`,`user`.`first_name`,`user`.`middle_name`,`class_teacher_id`,`assistant_class_teacher_id`,`batch`.`batch_id`,`assistant_class_teacher`.`a_surname`,`assistant_class_teacher`.`a_first_name`,`assistant_class_teacher`.`a_middle_name` FROM `batch` LEFT JOIN `class` ON `batch`.`class_id` = `class`.`class_id` LEFT JOIN `academy_session` ON `batch`.`academic_session_id` = `academy_session`.`session_id` LEFT JOIN `user` ON `batch`.`class_teacher_id` =`user`.`user_id` LEFT JOIN `assistant_class_teacher` ON `batch`.`batch_id` = `assistant_class_teacher`.`batch_id` $query";
    $sql = "SELECT SUM(amount_to_pay) as expected_fee,SUM(amount_paid) as generated_fee,SUM(outstanding) as outstanding FROM `termly_fee_summary` $query";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    $row = mysqli_fetch_array($query_sql);
    extract($row);
}
?>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success2 shadow h-100 py-2">
        <div class="card-body">
            <div class="row22 no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-1 font-weight-bold2 text-primary" style="font-weight:900;"><?php echo $currency_symbol ?><?php echo number_format($expected_fee) ?></div>
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
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success2 shadow h-100 py-2">
        <div class="card-body">
            <div class="row22 no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-1 font-weight-bold2 text-success" style="font-weight:900;"><?php echo $currency_symbol ?><?php echo number_format($generated_fee) ?></div>
                    <!-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Generated Revenue</div> -->
                    <p>Generated Revenue</p>
                    <?php
                    if ($expected_fee < 1) {
                        $generated_fee_percentage = 0;
                    } else {
                        $generated_fee_percentage = $generated_fee * 100 / $expected_fee;
                    }
                    ?>
                    <p><?php echo round($generated_fee_percentage, 2) ?>% of expected revenue</p>




                </div>
                <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger2 shadow h-100 py-2">
        <div class="card-body">
            <div class="row22 no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-1 font-weight-bold2 text-danger" style="font-weight:900;"><?php echo $currency_symbol ?><?php echo number_format($outstanding) ?></div>
                    <!-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Generated Revenue</div> -->
                    <p>Outstanding</p>
                    <?php
                    if ($expected_fee < 1) {
                        $outstanding_fee_percentage = 0;
                    } else {
                        $outstanding_fee_percentage = $outstanding * 100 / $expected_fee;
                    }
                    ?>
                    <p><?php echo round($outstanding_fee_percentage, 2) ?>% of expected still outstanding</p>

                </div>
                <!-- <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info2 shadow h-100 py-2">
        <div class="card-body">
            <div class="flex flex-column no-gutters align-items-center mb-3">

                <?php $sql = "SELECT * FROM `batch` WHERE invoice = 'Configured'";
                $query_sql = $db->query($sql);
                $count_invoiced = mysqli_num_rows($query_sql);
                $sqlTotalBatches = "SELECT * FROM `batch`";
                $query_sqlTotalBatches = $db->query($sqlTotalBatches);
                $count_invoiceTotal = mysqli_num_rows($query_sqlTotalBatches);
                if ($count_invoiced < 1) {
                    $invoicedPercentage = 0;
                } else {
                    $invoicedPercentage = (100 * $count_invoiced) / $count_invoiceTotal;
                }

                ?>

                <p><?php echo $count_invoiced ?>/<?php echo $count_invoiceTotal ?> Batch(es) configured</p>

                <div class="col mr-2">
                    <!-- <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div> -->

                    <div class="row no-gutters align-items-center">
                        <!-- <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div> -->
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style=width:<?php echo  $invoicedPercentage ?>% aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="">
                <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                <button class="btn btn-dark " id="fees_config">View All</button>
            </div>
        </div>
    </div>
</div>