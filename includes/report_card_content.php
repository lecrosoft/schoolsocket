            <div class="card" id="printCardDiv">
                <div class="card-body">
                    <div class="reportcardheader" style="margin-bottom: 1rem;">
                        <div class="school-logo">
                            <img src="img/<?php echo $logo ?>" style="width:100%;height:100%" alt="School Logo">
                        </div>
                        <div class="school-name-address" style="line-height:6px">
                            <h1><?php echo $school_name ?></h1>
                            <p>Motto: <?php echo $motto ?></p>
                            <p><?php echo $school_address ?></p>
                            <p>Phone: <?php echo $school_phone_number . "" . $school_phone_number_two ?></p>
                            <p>Email: <?php echo $school_email  ?></p>
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




                    <div class="student_profile">
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

                    <div class="term_details d-flex flex-row">
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
                            <p>Students in Class: </p>
                            <p>Class Teacher:</p>

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
                                            $assessmentSql = "SELECT 
                        `template_assessment`.`assesment_name`,
                        `template_assessment`.`abbreviation`,
                        `template_assessment`.`max_score`,
                        `template_assessment`.* 
                    FROM `template_assessment`
                    WHERE `template_assessment`.`show_on_report` = 'on' 
                        AND `template_assessment`.`session_id` = '" . $session_id . "' 
                        AND `template_assessment`.`term_id` = '" . $term_id . "' 
                        AND `template_assessment`.`template_id` = '" . $template_id . "' 
                    ORDER BY `template_assessment`.`id` ASC";
                                            $assessmentQuery = $db->query($assessmentSql);
                                            $assessmentCount = mysqli_num_rows($assessmentQuery);
                                            ?>
                                            <?php while ($assessmentRow = mysqli_fetch_assoc($assessmentQuery)) { ?>
                                                <th style="width:10px">
                                                    <div class="d-flex">
                                                        <div class="assessment_title scoresheet_th"><?php echo $assessmentRow['assesment_name'] . ' ' . '(' . $assessmentRow['max_score'] . ')'  ?></div>
                                                    </div>
                                                </th>

                                            <?php } ?>
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
                                        $subjectSql = "SELECT DISTINCT score_sheet.subject_id, subject_names.subject_name
                    FROM score_sheet 
                    LEFT JOIN subject_names ON score_sheet.subject_id = subject_names.subject_id 
                    WHERE score_sheet.user_id = '$userId' 
                        AND score_sheet.session_id = '$session_id' 
                        AND score_sheet.term_id = '$term_id' 
                        AND score_sheet.batch_id = '$batch_id'";

                                        $subjectQuery = $db->query($subjectSql);
                                        $totalSumScore = 0; // initialize variable to store sum of scores
                                        while ($subjectRow = mysqli_fetch_assoc($subjectQuery)) {
                                            $scoreSubjectId = $subjectRow['subject_id'];
                                            $subjectName = $subjectRow['subject_name'];

                                            $scoreSql = "SELECT score, assessment_id 
                                            FROM score_sheet 
                                            LEFT JOIN assessment ON score_sheet.assessment_id = assessment.id
                                            WHERE score_sheet.term_id = '$term_id'
                                                AND score_sheet.session_id = '$session_id' 
                                                AND score_sheet.batch_id = '$batch_id' 
                                                AND score_sheet.subject_id = '$scoreSubjectId' 
                                                AND score_sheet.user_id = '$userId' 
                                                AND assessment.show_on_report = 'on'
                                            ORDER BY assessment_id ASC";

                                            $scoreQuery = $db->query($scoreSql);

                                            $scores = [];
                                            $sumScore = 0;

                                            while ($scoreRow = mysqli_fetch_assoc($scoreQuery)) {
                                                $scores[] = $scoreRow['score'];
                                                if ($scoreRow['score'] != '-') {
                                                    $sumScore += $scoreRow['score'];
                                                }
                                            }

                                            // Calculate number of empty score columns
                                            $emptyColumnsCount = $assessmentCount - count($scores);

                                            // Fill empty scores with "-" 
                                            for ($i = 0; $i < $emptyColumnsCount; $i++) {
                                                $scores[] = "-";
                                            }

                                            // Get grade for the sum of scores
                                            $gradeSql = "SELECT grade_score 
                                            FROM grade 
                                            WHERE min_score <= '$sumScore'  
                                            AND max_score >= '$sumScore'
                                            LIMIT 1";

                                            $gradeQuery = $db->query($gradeSql);
                                            echo "<tr>";
                                            echo "<td class='subject_th'>$subjectName</td>";

                                            foreach ($scores as $score) {
                                                echo "<td>$score</td>";
                                            }

                                            echo "<td>$sumScore</td>";
                                            echo "<td>";

                                            while ($gradeRow = mysqli_fetch_assoc($gradeQuery)) {
                                                echo $gradeRow['grade_score'];
                                            }

                                            echo "</td>";
                                            echo "</tr>";

                                            $totalSumScore += $sumScore; // accumulate sum of scores
                                        }
                                        ?>


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


                        <?php
                        // Get the count of table rows
                        $countSql = "SELECT COUNT(*) as count FROM ($subjectSql) as subjects";
                        $countQuery = $db->query($countSql);
                        $countRow = mysqli_fetch_assoc($countQuery);
                        $tableRowCount = $countRow['count'];

                        $percentage_obtainable =  round(($totalSumScore / ($tableRowCount * 100) * 100), 2);
                        $gradeSql2 = "SELECT grade_score,principal_comment,class_teacher_comment 
                                            FROM grade 
                                            WHERE min_score <= '$percentage_obtainable'  
                                            AND max_score >= '$percentage_obtainable'
                                            LIMIT 1";
                        $query_grade_sql2 = $db->query($gradeSql2);
                        $row5 = mysqli_fetch_assoc($query_grade_sql2);
                        extract($row5);


                        $finalGrade = $grade_score;
                        ?>



                        <div class="d-flex flex-row" style="border-bottom: 1px solid black;">
                            <div class="summary" style="width:85%;margin-bottom: 1rem;">
                                <H6>SUMMARY</H6>
                                <table>
                                    <tr>
                                        <td>TOTAL SCORE:</td>
                                        <td> <?php echo $totalSumScore ?>/<?php echo $tableRowCount * 100  ?></td>
                                        <td>AVG SCORE:</td>
                                        <td><?php echo ($totalSumScore / ($tableRowCount * 100) * 100) ?>%</td>
                                        <td>GRADE:</td>
                                        <td><?php echo $finalGrade ?></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- <div class="signature" style="width:15%;margin-bottom: 1rem;">
                                <h6>SIGNATURE/STAMP:</h6>
                            </div> -->
                        </div>
                        <div class="teacher_comment" style="border-bottom: 1px solid black;">
                            <div class="d-flex flex-column">
                                <div class="" style="display:flex;flex-direction:row">
                                    <div class="d-flex flex-row">
                                        <h6>CLASS TEACHER REMARKS: </h6>
                                        <p style="text-decoration: underline;">&nbsp;<?php echo $class_teacher_comment ?></p>
                                    </div>
                                    <div class="signature2 d-flex flex-row" style="width:30%;margin-left:auto;gap:5px;margin-bottom:1rem;margin-top:1rem">
                                        <p style="font-size:10px">CLASS TEACHER SIGNATURE:</p>
                                        <img src="img/<?php echo $principal_signature ?>" style="width:50%;height:50px" alt="proncipal sIgnature">

                                    </div>
                                </div>
                                <div class="" style="display:flex;flex-direction:row">
                                    <div class="d-flex flex-row">
                                        <h6>SCHOOL HEAD REMARKS: </h6>
                                        <p style="text-decoration: underline;">&nbsp;<?php echo $principal_comment ?></p>
                                    </div>
                                    <div class="signature2 d-flex flex-row" style="width:30%;margin-left:auto;gap:5px;margin-bottom:1rem">
                                        <p style="font-size:10px">PRINCIPAL SIGNATURE:</p>
                                        <img src="img/<?php echo $principal_signature ?>" style="width:50%;height:50px" alt="proncipal sIgnature">

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>