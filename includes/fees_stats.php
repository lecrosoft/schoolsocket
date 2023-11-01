<div class="row">
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
</div>

<div class="row" id="fee_stat_div">


</div>