 <div class="row">
     <!-- <div class="col-lg-4 col-md-6 form-group">
         <label for="">
             SEARCH</label>
         <input type="text" class="form-control" placeholder="search by name,ADM No,Email,Phone number" id="searchInput">
     </div> -->
     <div class="col-lg-4 col-md-6 form-group">

         <label for="">
             STATUS</label>
         <select name="" id="status" class="form-control form-select ">
             <option value="Active">Active</option>
             <option value="Dropped">Dropped</option>
         </select>

     </div>
     <div class="col-lg-4 col-md-6 form-group">

         <label for="">
             BATCH</label>
         <select name="" id="batch" class="form-control2 normalize form-select">
             <option value="">Select Batch</option>

             <?php $sql = "SELECT * FROM `batch` LEFT JOIN academy_session ON `batch`.`academic_session_id` =`academy_session`.`session-id`";
                $query_sql = $db->query($sql);
                while ($row = mysqli_fetch_assoc($query_sql)) {
                    extract($row);
                ?>
                 <option value=<?php echo $batch_id ?>><?php echo $class_abbreviation . ' ' . $arm  . ' ' . $session_title ?></option>
             <?php
                }

                ?>
         </select>

     </div>
     <div class="col-lg-4 col-md-6 form-group">
         <label for="">
             BATCH</label>
         <div class="row">
             <button type="button" class="btn btn-outline-primary mr-2 ml-4" id="bulk_upload"><i class="fas fa-download fa-sm text-white-50"></i> Bulk Upload</button>
             <button type="button" class="btn btn-primary shadow-sm " id="add"><i class=" fas fa-download fa-sm text-white-50"></i> Create Employee</button>
         </div>
     </div>
 </div>