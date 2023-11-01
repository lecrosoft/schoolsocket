<!-- <div class="row">
    <div class=" col-xl-3 col-md-6 mb-4 form-group">
        <label for="">SESSION </label>
        <select name="session_id" id="session_id" class="form-control form-select">
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
        <select name="term_id" id="term_id" class="form-control form-select">
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
        <select name="batch_id" id="batch_id" class="form-control form-select">
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
</div> -->

<div class="row" id="fee_stat_div22">
    <?php $sql = "SELECT * FROM `exam` WHERE `exam`.`batch_id` = '" . $_SESSION['batch_id'] . "' ORDER BY `exam`.`start_date` DESC";
    $query_sql = $db->query($sql);
    while ($row = mysqli_fetch_assoc($query_sql)) {
        extract($row);


    ?>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info2 shadow h-100 py-2">
                <div class="card-body">
                    <div class="flex flex-column no-gutters align-items-center mb-3">



                        <p><?php echo $exam_name ?></p>

                        <div class="col mr-2">
                            <div class="h5 mb-1 font-weight-bold2 text-success" style="font-weight:400;">Start Date: <?php
                                                                                                                        if ($start_date == date('Y-m-d')) {
                                                                                                                            echo "Today";
                                                                                                                        } else {
                                                                                                                            echo $start_date;
                                                                                                                        }
                                                                                                                        ?></div>

                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-500">Cut Off percentage : <?php echo $passing_percentage ?>%</div>
                                </div>

                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-warning">Duration : <?php
                                                                                                        $given_minutes = $exam_duration;

                                                                                                        // Convert minutes to hours, minutes, and seconds
                                                                                                        $hours = floor($given_minutes / 60);
                                                                                                        $minutes = $given_minutes % 60;
                                                                                                        $seconds = 0; // Since you only have minutes, seconds will be 0

                                                                                                        // Create a formatted time string
                                                                                                        $time_string = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

                                                                                                        // Echo the time string or store it in a new variable


                                                                                                        // If you want to store it in a new variable, you can do this:
                                                                                                        $new_variable = $time_string;

                                                                                                        // Now $new_variable contains the formatted time string.


                                                                                                        echo $time_string; ?></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="">
                        <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                        <button class="btn btn-dark startExamBtn" id=<?php echo $exam_id ?>>Start Exam</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

</div>