 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
         <!-- <div class="sidebar-brand-icon rotate-n-15"> -->
         <div class="sidebar-brand-icon">
             <!-- <i class="fas fa-laugh-wink"></i> -->
             <img src="img/<?php echo $logo ?>" style="width:100%;height:100%" alt="Student Photo">
         </div>
         <div class="sidebar-brand-text mx-3"><sup><?php echo $school_name ?></sup></div>
         <!-- <div class="sidebar-brand-text mx-3">School <sup>Socket</sup></div> -->
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <?php if ($_SESSION['user_role'] == 'Admin') {
        ?>

         <li class="nav-item active">
             <a class="nav-link" href="index" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>
         <hr class="sidebar-divider my-0">
         <li class="nav-item">
             <a class="nav-link" href="student" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Student</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="employee" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Employee</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="guardian" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Guardian</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="fees" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Fees</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="batches" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Batches</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="report_cards" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Report Cards</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="messages" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Messages</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="events" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Events</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="cbt" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>CBT</span></a>
             <!-- <a class="nav-link" href="test" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Test</span></a> -->
         </li>

         <li class="nav-item">
             <a class="nav-link" href="#">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Settings</span></a>
             <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

         <!-- Sidebar Message -->
         <div class="sidebar-card d-none d-lg-flex">
             <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
             <p class="text-center mb-2"><strong>SchoolSocket</strong> is packed with premium features and more!</p>
             <a class="btn btn-success btn-sm" href="https://lecrosoft.com">Learn More</a>
         </div>

     <?php
        } else if ($_SESSION['user_role'] == "Student") {
        ?>

         <li class="nav-item active">
             <a class="nav-link" href="index" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>My Profile</span></a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="student_exam" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>CBT</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="events" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Events</span></a>
         </li>
     <?php
        } else if ($_SESSION['user_role'] == "Teacher") {
        ?>

         <li class="nav-item">
             <a class="nav-link" href="batches" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Subjects</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="batches" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Batches</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="report_cards" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Report Cards</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="events" rel="page">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Events</span></a>
         </li>

     <?php
        }
        ?>

     <!-- Divider -->
     <!-- <hr class="sidebar-divider"> -->

     <!-- Heading -->
     <!-- <div class="sidebar-heading">
         Finance
     </div> -->

     <!-- Nav Item - Pages Collapse Menu -->
     <!-- <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Finance</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Custom Components:</h6>
                 <a class="collapse-item" href="buttons.html">Buttons</a>
                 <a class="collapse-item" href="cards.html">Cards</a>
             </div>
         </div>
     </li> -->

     <!-- Nav Item - Utilities Collapse Menu -->
     <!-- <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Utilities</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Custom Utilities:</h6>
                 <a class="collapse-item" href="utilities-color.html">Colors</a>
                 <a class="collapse-item" href="utilities-border.html">Borders</a>
                 <a class="collapse-item" href="utilities-animation.html">Animations</a>
                 <a class="collapse-item" href="utilities-other.html">Other</a>
             </div>
         </div>
     </li> -->

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <!-- <div class="sidebar-heading">
         Addons
     </div> -->

     <!-- Nav Item - Pages Collapse Menu -->
     <!-- <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Pages</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Login Screens:</h6>
                 <a class="collapse-item" href="login.html">Login</a>
                 <a class="collapse-item" href="register.html">Register</a>
                 <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                 <div class="collapse-divider"></div>
                 <h6 class="collapse-header">Other Pages:</h6>
                 <a class="collapse-item" href="404.html">404 Page</a>
                 <a class="collapse-item" href="blank.html">Blank Page</a>
             </div>
         </div>
     </li> -->

     <!-- Nav Item - Charts -->
     <!-- <li class="nav-item">
         <a class="nav-link" href="charts.html">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
     </li> -->

     <!-- Nav Item - Tables -->

 </ul>