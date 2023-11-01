 <?php
    $sql = "SELECT SUM(amount_to_pay) as expected_fee,SUM(amount_paid) as generated_fee,SUM(outstanding) as outstanding FROM `termly_fee_summary`";
    $query_sql = $db->query($sql) or die("QUERY ERROR" . $db->con->error);
    $row = mysqli_fetch_array($query_sql);
    extract($row);
    ?>
 <div class="row">

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-4 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             Expected Fees</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo html_entity_decode($currency_symbol) ?><?php echo number_format($expected_fee) ?></div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-calendar fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-4 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             Generated Fees</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $currency_symbol ?><?php echo number_format($generated_fee) ?></div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-4 col-md-6 mb-4">
         <div class="card border-left-danger shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                             Outstanding</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $currency_symbol ?><?php echo number_format($outstanding) ?></div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>