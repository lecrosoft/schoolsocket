<?php
require_once('init.php');
$output = array();
$examId = $_POST['examId'];




$sql = "SELECT * FROM `exam` WHERE `exam`.`exam_id` = $examId";

$query_sql = $db->query($sql) or die("QUERY ERROR: " . $db->con->error);

while ($row = mysqli_fetch_array($query_sql)) {
    extract($row);
?>
    <div class="modal-header">
        <h5 class="modal-title exam_modal_title text-center" id="exampleModalLabel" style="text-align:center !important"><?php echo $exam_name ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body exam_modal_body container">



        <div class="d-flex" style="justify-content: center;">
            <div class="div" style="display: flex;flex-direction:column">
                <h3>INSTRUCTION</h3>
                <p class="mb-0"><?php echo $instruction ?></p>

            </div>

        </div>
        <hr>
        <div class="text-center">
            <h5 class="text-danger">Are You Sure You Want To start This Exam ?</h5>
            <p>Please note: Once you start the exam, it cannot be paused, stopped, or retaken. Are you ready to begin? Click 'Yes' to start the exam, or 'No' if you are not ready</p>
            <div class="modal-footer222 text-center">

                <a class="btn btn-primary" href="test?test_id=<?php echo $exam_id ?>">Yes</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
            </div>

        </div>

    </div>

<?php
}
