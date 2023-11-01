 <div class="col-lg-6 mb-4">

     <!-- Project Card Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Debtors List</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table" id="dataTableyyt" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>CLASS</th>
                             <th>STUDENT. NO</th>
                             <th>AMOUNT</th>
                             <th><button class="btn btn-primary btn-sm">VIEW ALL</button></th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php //$sql = "SELECT SUM(outstanding) as outstanding, COUNT(user_id) as user_count, `termly_fee_summary`.`batch_id`,`batch`.`arm`,`abbreviation` FROM `termly_fee_summary` LEFT JOIN batch ON termly_fee_summary.batch_id = batch.batch_id LEFT JOIN class ON `class`.`class_id` = `batch`.`class_id` WHERE outstanding > 0 GROUP BY termly_fee_summary.batch_id";
                            $sql = "SELECT SUM(outstanding) as outstanding, COUNT(user_id) as user_count, `user`.`batch_id`,`batch`.`arm`,`abbreviation` FROM `user` LEFT JOIN batch ON user.batch_id = batch.batch_id LEFT JOIN class ON `class`.`class_id` = `batch`.`class_id` WHERE outstanding > 0 GROUP BY user.batch_id";
                            $query_sql = $db->query($sql);
                            while ($row = mysqli_fetch_assoc($query_sql)) {
                                extract($row);
                            ?>
                             <tr>
                                 <td><?php echo $abbreviation . ' ' . $arm  ?></td>
                                 <th><?php echo $user_count ?></td>
                                 <td><?php echo number_format($outstanding) ?></td>
                                 <td><button class="btn btn-primary btn-sm">VIEW ALL</button></td>


                             </tr>
                         <?php
                            }

                            ?>

                     </tbody>

                 </table>
             </div>
         </div>
     </div>

     <!-- Color System -->
     <!-- <div class="row">
         <div class="col-lg-6 mb-4">
             <div class="card bg-primary text-white shadow">
                 <div class="card-body">
                     Primary
                     <div class="text-white-50 small">#4e73df</div>
                 </div>
             </div>
         </div>
         <div class="col-lg-6 mb-4">
             <div class="card bg-success text-white shadow">
                 <div class="card-body">
                     Success
                     <div class="text-white-50 small">#1cc88a</div>
                 </div>
             </div>
         </div>
         <div class="col-lg-6 mb-4">
             <div class="card bg-info text-white shadow">
                 <div class="card-body">
                     Info
                     <div class="text-white-50 small">#36b9cc</div>
                 </div>
             </div>
         </div>
         <div class="col-lg-6 mb-4">
             <div class="card bg-warning text-white shadow">
                 <div class="card-body">
                     Warning
                     <div class="text-white-50 small">#f6c23e</div>
                 </div>
             </div>
         </div>
         <div class="col-lg-6 mb-4">
             <div class="card bg-danger text-white shadow">
                 <div class="card-body">
                     Danger
                     <div class="text-white-50 small">#e74a3b</div>
                 </div>
             </div>
         </div>
         <div class="col-lg-6 mb-4">
             <div class="card bg-secondary text-white shadow">
                 <div class="card-body">
                     Secondary
                     <div class="text-white-50 small">#858796</div>
                 </div>
             </div>
         </div>
         <div class="col-lg-6 mb-4">
             <div class="card bg-light text-black shadow">
                 <div class="card-body">
                     Light
                     <div class="text-black-50 small">#f8f9fc</div>
                 </div>
             </div>
         </div>
         <div class="col-lg-6 mb-4">
             <div class="card bg-dark text-white shadow">
                 <div class="card-body">
                     Dark
                     <div class="text-white-50 small">#5a5c69</div>
                 </div>
             </div>
         </div>
     </div> -->

 </div>