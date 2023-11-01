<?php
function studentListTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Parent/Guardian</th>
                            <th>Admission date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Student</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Parent/Guardian</th>
                            <th>Admission date</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}
function questionListTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Question Bank</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table question_table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                             <th>Subject</th>
                            <th>Exam</th>
                            <th>Question</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Subject</th>
                            <th>Exam</th>
                            <th>Question</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}
function
batchesListTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Batches List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class Teacher</th>
                            <th>Assistant Class Teacher</th>
                            <th>Number of students</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           <th>Name</th>
                            <th>Class Teacher</th>
                            <th>Assistant Class Teacher</th>
                            <th>Number of students</th>
                            <th>Actions</th>

                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}
function
reportCardListTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Report Card Group</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Term</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           <th>Name</th>
                            <th>Batch</th>
                            <th>Term</th>
                            <th>Type</th>
                            <th>Publish</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}
function
examListTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Exams</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="exam-table table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Term</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           <th>Name</th>
                            <th>Batch</th>
                            <th>Term</th>
                            <th>Type</th>
                            <th>Publish</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}
function
studentAccessmentTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Report Card Group</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered student_assessment" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Due Date</th>
                            <th>Mark Given</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                         <th>Name</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Due Date</th>
                            <th>Mark Given</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}

function studentPaymentListTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input class="check-box" type="checkbox"></th>
                            <th>Student</th>
                            <th>Class</th>
                            <th>Amount(₦)</th>
                            <th>Discount(₦)</th>
                            <th>Expected(₦)</th>
                            <th>Paid(₦)</th>
                            <th>Outstanding(₦)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Student</th>
                            <th>Class</th>
                            <th>Amount(₦)</th>
                            <th>Discount(₦)</th>
                            <th>Expected(₦)</th>
                            <th>Paid(₦)</th>
                            <th>Outstanding(₦)</th>
                            <th>Actions</th>

                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}
function employeeListTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                           
                        <tr>
                            <th>Employee</th>
                            <th>Gender</th>
                            <th>Staff Type</th>
                            <th>Mobile Number</th>
                         
                            <th>Employment date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                             <th>Employee</th>
                            <th>Gender</th>
                             <th>Staff Type</th>
                          <th>Mobile Number</th>
                            <th>Employment date</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}
function guardianListTable()
{

    echo '<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Guardian List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                           
                        <tr>
                            <th>Name</th>
                            <th>Wards</th>
                            <th>Status</th>
                            <th>Mobile Number</th>
                            <th>Activated date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                             <th>Name</th>
                            <th>Wards</th>
                            <th>Status</th>
                            <th>Mobile Number</th>
                            <th>Activated date</th>
                            <th>Actions</th>

                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>';
}
