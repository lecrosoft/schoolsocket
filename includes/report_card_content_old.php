<div class="card" id="printCardDiv">
    <div class="card-body">
        <div class="reportcardheader" style="margin-bottom: 1rem;">
            <div class="school-logo">
                <img src="img/<?php echo $logo ?>" style="width:100%;height:100%" alt="School Logo">
            </div>
            <div class="school-name-address" style="line-height:6px">
                <h1><?php echo $school_name ?></h1>
                <p>Motto: <?php echo $motto ?></p>
                <p><?php echo $address ?></p>
                <p>Phone: <?php echo $phone_number . "," . $phone_number_two ?></p>
                <p>Email: <?php echo $email  ?></p>
                <h5 style="font-weight: bold; text-transform:uppercase"><?php echo $card_name ?></h5>
            </div>

            <div class="student-passport">
                <?php
                $profile_photo = "";
                if ($photo == "" and $gender == "Female") {
                    $profile_photo = "undraw_profile_1.svg";
                } else if ($photo == "" and $gender == "Male") {
                    $profile_photo = "undraw_profile_2.svg";
                } else {
                    $profile_photo = $photo;
                }
                ?>
                <img src="img/<?php echo $profile_photo ?>" style="width:100%;height:100%" alt="Student Photo">
                <button class="btn btn-primary mt-2" id="printBtn"><i class="fa fa-print"></i>&nbsp;Print</button>
            </div>
        </div>




        <div class="student_profile" style="">
            <h2 class="text-center" style="font-weight: bold;text-transform:uppercase"><?php echo $surname . " " . $first_name . " " . $middle_name; ?></h2>
            <div class="d-flex flex-row text-center" style="justify-content: center;">
                <div class="div">
                    <p>&nbsp;Gender: <?php echo $gender ?> |</p>
                </div>
                <div class="div">
                    <p>&nbsp; Admission Number: <?php echo $admission_number ?> |</p>
                </div>
                <div class="div">
                    <p> &nbsp;Age: <?php echo $current_year - $year ?></p>
                </div>
            </div>
        </div>

        <div class="term_details d-flex flex-row" style="">
            <div class="d-flex flex-column" style="width:33.3%;border-right: 1px solid black;padding:1rem;line-height:5px">
                <p>Term: <?php echo $term_name ?></p>
                <?php ?>
                <p>Session: <?php echo $session_title ?> </p>
                <p>Resumption: <?php if (is_string($resumption_date)) {
                                    echo $resumption_date;
                                } else {
                                    echo date('d M Y', strtotime($resumption_date));
                                } ?></p>

            </div>
            <div class="d-flex flex-column" style="width:33.3%;border-right: 1px solid black;padding:1rem;line-height:5px">
                <p>Class: <?php echo $abbreviation . ' ' . $arm ?></p>
                <p>Students in Class: 20 </p>
                <p>Class Teacher: Alabi Tosin</p>

            </div>
            <div class="d-flex flex-column" style="width:33.3%;padding:1rem;line-height:5px">
                <p>Total Days in Term: <?php echo $numberOfDaySchoolOpen ?></p>
                <p>Total Days Present: <?php echo $daysPresent ?> </p>
                <p>Total Days Absent: <?php echo ($numberOfDaySchoolOpen - $daysPresent)  ?></p>

            </div>
        </div>
        <div class="content">

            <div class="d-flex score_group" style="gap:10px">
                <div class="score_table" style="width: 80%;margin-bottom:1rem;">
                    <table>
                        <thead>
                            <tr>
                                <th class="subject_th">Subjects</th>
                                <?php
                                // $getAccessmentSql = "SELECT * FROM `assessment` WHERE `show_on_report` = 'on' AND `term_id` = '" . $term_id . "'  AND `assessment`.`assessment_session_id` ='" . $session_id . "' AND `assessment`.`assessment_batch_id` = '" . $batch_id . "' ORDER BY `id` ASC";
                                // $query_getAccessmentSql = $db->query($getAccessmentSql);
                                // while ($row = mysqli_fetch_assoc($query_getAccessmentSql)) {
                                //     extract($row);
                                ?>
                                <!-- <th style="width:10px">
                                        <div class="d-flex">
                                            <div class="assessment_title scoresheet_th" style="text-transform: capitalize;" id="<?php echo $id ?>"><?php echo $assesment_name ?> (<?php echo $possible_points ?>)</div>
                                        </div>
                                    </th> -->
                                <?php

                                // }


                                ?>
                                <th style="width:10px">
                                    <div class="d-flex">
                                        <div class="assessment_title scoresheet_th" style="text-transform: capitalize;" id="<?php  ?>">First Ca (20)</div>
                                    </div>
                                </th>
                                <th style="width:10px">
                                    <div class="d-flex">
                                        <div class="assessment_title scoresheet_th" style="text-transform: capitalize;" id="<?php   ?>"> Second Ca (20)</div>
                                    </div>
                                </th>
                                <th style="width:10px">
                                    <div class="d-flex">
                                        <div class="assessment_title scoresheet_th" style="text-transform: capitalize;" id="<?php ?>"> Exam (100)</div>
                                    </div>
                                </th>

                                <th style="width:10px">
                                    <div class="d-flex">
                                        <div class="assessment_title scoresheet_th">Total (100)</div>
                                    </div>
                                </th>
                                <th style="width:10px">
                                    <div class="d-flex">
                                        <div class="assessment_title scoresheet_th">Grade</div>
                                    </div>
                                </th>

                            </tr>
                        </thead>
                        <tbody>


                            <?php

                            $subject_sql = "SELECT DISTINCT(`score_sheet`.`subject_id`),`subject_name`
                            FROM `score_sheet` 
                            LEFT JOIN `subject_names` ON `score_sheet`.`subject_id` = `subject_names`.`subject_id` 
                            WHERE `score_sheet`.`user_id` = '" . $userId . "' 
                            AND `score_sheet`.`session_id` = '" . $session_id . "' 
                            AND `score_sheet`.`term_id` = '" . $term_id . "' 
                            AND `score_sheet`.`batch_id` ='" . $batch_id . "'";
                            $query_subject_sql = $db->query($subject_sql);
                            while ($row = mysqli_fetch_assoc($query_subject_sql)) {
                                extract($row);
                                $score_subject_id = $row['subject_id'];
                            ?>
                                <tr>
                                    <td class="subject_th"><?php echo $subject_name ?></td>
                                    <?php
                                    $subject_sql_score = "SELECT score,assessment_id FROM `score_sheet` 
                                    LEFT JOIN `assessment` ON  `score_sheet`.`assessment_id` = `assessment`.`id`
                                    WHERE `score_sheet`.`term_id` ='" . $term_id . "'
                                     AND `score_sheet`.`session_id` = '" . $session_id . "' AND 
                                     `score_sheet`.`batch_id` = '" . $batch_id . "' 
                                     AND `score_sheet`.`subject_id` = '" . $score_subject_id . "' 
                                     AND `score_sheet`.`user_id` = '" . $userId . "' 
                                     AND `assessment`.`show_on_report` ='on'
                                      ORDER BY `assessment_id` ASC";
                                    $query_subject_sql_score = $db->query($subject_sql_score);
                                    $sum_score = 0; // initialize sum_score to 0
                                    while ($row2 = mysqli_fetch_assoc($query_subject_sql_score)) {
                                        extract($row2);
                                        $sum_score += $score;
                                    ?>
                                        <td><?php echo $score ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td><?php echo $sum_score ?></td>
                                    <?php
                                    $sql_grade_score = "SELECT `grade_score` 
                                    FROM `grade` 
                                    WHERE `min_score` <= '" . $sum_score . "'  
                                    AND `max_score` >= '" . $sum_score . "'
                                    LIMIT 1";
                                    $query_sql_grade_score = $db->query($sql_grade_score);
                                    while ($row4 = mysqli_fetch_assoc($query_sql_grade_score)) {
                                        extract($row4);

                                    ?>
                                        <td><?php echo $grade_score ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>



                            <?php

                            }


                            ?>




                        </tbody>
                    </table>


                </div>
                <div class="affectiveDomain_table" style="width: 20%;margin-bottom:1rem;">

                    <table style="margin-bottom: 1rem;">
                        <h6 style="white-space: nowrap;">AFFECTIVE SKILLS</h6>
                        <thead>
                            <tr>
                                <th class="subject_th" style="width:90%">PUNTUALITY</th>

                                <th>A</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="subject_th" style="width:90%">PUNTUALITY</th>

                                <th>A</th>
                            </tr>
                            <tr>
                                <th class="subject_th" style="width:90%">PUNTUALITY</th>

                                <th>A</th>
                            </tr>
                            <tr>
                                <th class="subject_th" style="width:90%">PUNTUALITY</th>

                                <th>A</th>
                            </tr>
                            <tr>
                                <th class="subject_th" style="width:90%">PUNTUALITY</th>

                                <th>A</th>
                            </tr>

                            <tr>
                                <th class="subject_th" style="width:90%">PUNTUALITY</th>

                                <th>A</th>
                            </tr>
                        </tbody>
                    </table>


                    <!-- PSYCHOMOTOR SKILLS  -->


                    <table style="margin-bottom: 1rem;">
                        <h6 style="white-space: nowrap;">PSYCHOMOTOR SKILLS</h6>
                        <thead>
                            <tr>
                                <th class="subject_th" style="width:90%">HANDWITING</th>

                                <th>2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="subject_th" style="width:90%">VERBAL FLUENCY</th>

                                <th>5</th>
                            </tr>
                            <tr>
                                <th class="subject_th" style="width:90%">SPORTS</th>

                                <th>2</th>
                            </tr>
                            <tr>
                                <th class="subject_th" style="width:90%">HANDLING TOOLS</th>

                                <th>4</th>
                            </tr>
                            <tr>
                                <th class="subject_th" style="width:90%">DRAWING & PAINTING</th>

                                <th>A</th>
                            </tr>

                        </tbody>
                    </table>

                    <!-- GRADE  -->

                    <table>
                        <h6 style="white-space: nowrap;">GRADING SYSTEM</h6>

                        <tbody>
                            <?php
                            $grade_sql = "SELECT * FROM `grade`";
                            $query_grade_sql = $db->query($grade_sql);
                            while ($row3 = mysqli_fetch_assoc($query_grade_sql)) {
                                extract($row3);

                            ?>
                                <tr>
                                    <td class="subject_th"><?php echo $grade_score ?></td>

                                    <td style="width:90%"><?php echo $min_score . '-' . $max_score ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="d-flex flex-row" style="border-bottom: 1px solid black;">
                <div class="summary" style="width:85%;margin-bottom: 1rem;">
                    <H6>SUMMARY</H6>
                    <table>
                        <tr>
                            <td>TOTAL SCORE:</td>
                            <td> 800/1600</td>
                            <td>AVG SCORE:</td>
                            <td>66.8%</td>
                            <td>GRADE:</td>
                            <td>B</td>
                        </tr>
                    </table>
                </div>
                <div class="signature" style="width:15%;margin-bottom: 1rem;">
                    <h6>SIGNATURE/STAMP:</h6>
                </div>
            </div>
            <div class="teacher_comment" style="border-bottom: 1px solid black;">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row">
                        <h6>CLASS TEACHER REMARKS: </h6>
                        <p style="text-decoration: underline;">&nbsp;Good Result,More room for Improvement</p>
                    </div>
                    <div class="d-flex flex-row">
                        <h6>SCHOOL HEAD REMARKS: </h6>
                        <p style="text-decoration: underline;">&nbsp;Good Result,More room for Improvement</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>