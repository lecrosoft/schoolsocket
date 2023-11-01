 <div class="row">
     <!-- <div class="col-lg-4 col-md-6 form-group">
         <label for="">
             SEARCH</label>
         <input type="text" class="form-control" placeholder="search by name,ADM No,Email,Phone number" id="searchInput">
     </div> -->
     <div class="col-lg-3 col-md-6 form-group">
         <label for="">SESSION </label>
         <select name="subject_id" id="subject_id" class="form-control form-select">
             <option value="">All</option>
             <?php
                $sql = "SELECT * FROM `subject_names`";
                $query_sql = $db->query($sql);

                while ($subject_row = mysqli_fetch_assoc($query_sql)) {
                    $subject_name = $subject_row['subject_name'];
                    $subject_id = $subject_row['subject_id'];
                ?>
                 <option value="<?php echo $subject_id ?>"><?php echo $subject_name ?></option>
             <?php
                }

                ?>

         </select>
     </div>
     <div class="col-lg-3 col-md-6 form-group">
         <label for="">Exam </label>
         <select name="exam_id" id="exam_id" class="form-control form-select">
             <option value="">All</option>
             <?php
                $sql = "SELECT * FROM `exam`";
                $query_sql = $db->query($sql);

                while ($exam_row = mysqli_fetch_assoc($query_sql)) {

                    $exam_name = $exam_row['exam_name'];
                    $exam_id = $exam_row['exam_id'];
                ?>
                 <option value="<?php echo $exam_id ?>"><?php echo $exam_name ?></option>
             <?php
                }
                ?>
         </select>
     </div>

     <div class="col-lg-3 col-md-6 form-group">
         <label for="">
             Add </label>
         <div class="row">
             <!-- <button type="button" class="btn btn-outline-primary mr-2 ml-4" id="bulk_upload"><i class="fas fa-download fa-sm text-white-50"></i> Bulk Upload</button> -->
             <button type="button" class="btn btn-primary shadow-sm" id="add_question_btn"><i class=" fas fa-download fa-sm text-white-50"></i> Create New </button>
         </div>
     </div>
 </div>