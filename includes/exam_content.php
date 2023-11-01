<?php
$sql = "SELECT * FROM `exam` WHERE `exam`.`exam_id` = $test_id";

$query_sql = $db->query($sql) or die("QUERY ERROR: " . $db->con->error);
$row = mysqli_fetch_array($query_sql);
extract($row);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="h3 mb-0 text-gray-800"><?php echo $exam_name ?></h4>
    <h4 class="h3 mb-0 text-gray-800">Subject: Maths</h4>
    <!-- <a href="#" id="timer" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-clock fa-sm text-white-50"></i> <span id="timer_count">2:30</span></a> -->
    <div>
        <button id="timer" class="btn btn-primary"><i class="fas fa-clock fa-sm text-white-50"></i> Timer: <span id="timer_count">0s</span></button>
    </div>
</div>



<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">

            <div class="container py-5" id="page-container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $sql = "SELECT * FROM `question` WHERE `question`.`exam_id` = $test_id";

                        $query_sql = $db->query($sql) or die("QUERY ERROR: " . $db->con->error);
                        while ($row = mysqli_fetch_array($query_sql)) {
                            extract($row);
                        ?>
                            <div class="container questions">
                                <!-- Question 1 -->
                                <?php
                                if ($image == '') {
                                ?>
                                    <div class="d-flex" style="gap:1rem">
                                        <h5 class="question_number">Q1</h5>
                                        <p><?php echo $question ?></p>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="row">
                                        <div class="exam-img col-md-6" style="display:flex;gap:1rem">
                                            <h5 class="question_number">Q2</h5>
                                            <img src="img/<?php echo $image ?>" alt="" style="height:200px;width:350px;align-self:center;object-fit:contain" class="mb-3">
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $question ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <hr>
                                <!-- Radio options for Question 1 -->
                                <?php
                                $sqlOption = "SELECT * FROM `options` WHERE `options`.`question_id` = $question_id";

                                $query_sqlOption = $db->query($sqlOption) or die("QUERY ERROR: " . $db->con->error);
                                while ($rowOption = mysqli_fetch_array($query_sqlOption)) {
                                    extract($rowOption);
                                ?>
                                    <input type="radio" name="question<?php echo $question_id ?>" data-correct="<?php echo $correct_answer ?>"> <?php echo $option_value ?> <br>
                                <?php
                                }


                                ?>



                                <!-- Add similar data-correct attributes to the radio buttons for other questions -->

                                <!-- Navigation buttons for Question 1 -->
                                <div class="row mt-3 mb-3">
                                    <div class="div"><button class="btn btn-warning" id="previous-button" onclick="previous()">Previous</button></div>
                                    <div class="ml-auto"><button class="btn btn-primary" id="next-button" onclick="next()">Next</button></div>
                                </div>
                            </div>
                        <?php
                        };
                        ?>
                    </div>
                </div>
            </div>







            <!-- ADD Event modal -->



        </div>

    </div>
</div>