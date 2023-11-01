<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card  bg-gradient-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-white"><?php echo number_format($countGuardian) ?> </div>
                        <div class="text-xs font-weight text-white text-capitalize mb-1">
                            Total Guardian</div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="col mr-2 mb-2">
                            <div class="text-xs font-weight-bold text-warning text-capitalize  mb-1">
                                Active Guardian</div>
                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo number_format($countActiveGuardian) ?></div>
                        </div>
                        <div class="col mr-2 mb-2">
                            <div class="text-xs font-weight text-white text-capitalize  mb-1">
                                Deactivated Guardian</div>
                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo number_format($countInActiveGuardian) ?></div>
                        </div>
                    </div>
                    <!-- <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card bg-gradient-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                            Parent Linked to student</div>
                        <div class="h5 mb-0 font-weight-bold text-white"><?php echo number_format($countAcademy_staff) ?></div>
                    </div>
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                            UnLinked Parent</div>
                        <div class="h5 mb-0 font-weight-bold text-white"><?php echo number_format($countNonAcademy_staff) ?></div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-white"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary  text-uppercase mb-1">Male
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($countMale_guardian) ?></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <?php
                                    if ($countActiveGuardian < 1) {
                                        $male_percentage = 0;
                                    } else {
                                        $male_percentage = $countMale_guardian * 100 / $countActiveGuardian;
                                    }
                                    ?>
                                    <div class="progress-bar bg-info" role="progressbar" style=width:<?php echo $male_percentage ?>% aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs font-weight-bold text-primary  text-uppercase mb-1">Female
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($countFemale_guardian) ?></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <?php
                                    if ($countActiveGuardian < 1) {
                                        $female_percentage = 0;
                                    } else {
                                        $female_percentage = $countFemale_guardian * 100 / $countActiveGuardian;
                                    }
                                    ?>

                                    <div class="progress-bar bg-primary" role="progressbar" style=width:<?php echo $female_percentage ?>% aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>