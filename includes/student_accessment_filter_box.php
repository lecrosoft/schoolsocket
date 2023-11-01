 <div class="row">
     <!-- <div class="col-lg-4 col-md-6 form-group">
         <label for="">
             SEARCH</label>
         <input type="text" class="form-control" placeholder="search by name,ADM No,Email,Phone number" id="searchInput">
     </div> -->
     <div class="col-lg-3 col-md-6 form-group">
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
     <div class="col-lg-3 col-md-6 form-group">
         <label for="">TERM </label>
         <select name="term_id" id="term_id" class="form-control form-select">
             <option value="">All</option>
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
     <div class="col-lg-3 col-md-6 form-group">
         <input type="hidden" id="student_id" value="<?php echo $student_id ?>">
     </div>

 </div>