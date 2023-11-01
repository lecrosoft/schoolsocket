<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employee</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<?php include('employee_stats.php') ?>


<!-- Content Row -->

<!-- Pie Chart -->
<?php include('employee_filter_box.php');
include('tables.php');
employeeListTable();
?>

<!-- Content Row -->

<!-- ===========after the page content and container fluidd closing tag ============== -->