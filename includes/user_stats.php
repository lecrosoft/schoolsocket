<div class="col-lg-4 col-md-6 border-start">
    <!-- <center class="m-t-30 m-b-40 p-t-20 p-b-20">
              <font class="display-3">25</font>
              <h6 class="text-muted">Active Users</h6>
              <button type="button" class="btn btn-success text-white">View Details</button>
            </center>
            <hr> -->

    <?php
    function userStats($countStudent, $title, $link, $color, $icon, $percenrage)
    {
        echo "
        <div class='card shadow py-2 mb-4'>
            <div class='card-body'>
                <div class='row no-gutters align-items-center'>
                    <div class='col mr-2'>
                        <div class='text-xs font-weight-bold text-$color text-uppercase mb-1'>
                            $title</div>
                        <div class='h5 mb-0 font-weight-bold text-gray-800'>" . number_format($countStudent) . "</div>
                         <div class='text-xs font-weight-bold text-$color text-uppercase mb-1'>
                             <a href='" . $link . "'>VIEW REPORTS</a></div>

                    </div>
                    <div class='col-auto'>
                        <i class='$icon fa-2x text-$color-300'></i>
                    </div>
                </div>
            </div>
        </div>
        ";
    }




    ?>

    <?php userStats($countStudent, 'STUDENT', 'student', 'primary', 'fas fa-calendar', 45); ?>
    <!-- <hr> -->
    <?php userStats($countEmployee, 'EMPLOYEE', 'employee', 'success', 'fas fa-calendar', 45); ?>
    <!-- <hr> -->
    <?php userStats($countGuardian, 'GUARDIAN', 'guardian', 'primary', 'fas fa-calendar', 45); ?>

</div>