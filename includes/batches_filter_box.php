 <div class="row">
     <!-- <div class="col-lg-4 col-md-6 form-group">
         <label for="">
             SEARCH</label>
         <input type="text" class="form-control" placeholder="search by name,ADM No,Email,Phone number" id="searchInput">
     </div> -->
     <div class="col-lg-4 col-md-6 form-group">
         <label for="">
             ACADEMY SESSION</label>
         <select name="" id="academy_session" class="form-control form-select ">
             <!-- <option value="Active">Select Session</option> -->
             <?php $sql = "SELECT `session_id`,`session_title` FROM `academy_session`";
                $query_sql = $db->query($sql);
                while ($row = mysqli_fetch_assoc($query_sql)) {
                    extract($row);
                ?>
                 <option value=<?php echo $session_id ?>><?php echo $session_title ?></option>
             <?php
                }

                ?>
         </select>
     </div>
     <div class="col-lg-4 col-md-6 form-group">
         <label for="">
             CLASS</label>
         <select name="" id="class" class="form-control form-select">
             <option value="">Select Class</option>

             <?php $sql = "SELECT * FROM `class`";
                $query_sql = $db->query($sql);
                while ($row = mysqli_fetch_assoc($query_sql)) {
                    extract($row);
                ?>
                 <option value=<?php echo $class_id ?>><?php echo $class_name  ?></option>
             <?php
                }

                ?>
         </select>
     </div>
     <div class="col-lg-4 col-md-6 form-group">
         <label for="">
             BATCH</label>
         <div class="row">
             <!-- <button type="button" class="btn btn-outline-primary mr-2 ml-4" id="bulk_upload"><i class="fas fa-download fa-sm text-white-50"></i> Bulk Upload</button> -->
             <button type="button" class="btn btn-primary shadow-sm " id="add"><i class=" fas fa-download fa-sm text-white-50"></i> Add New Batch</button>
         </div>
     </div>
 </div>