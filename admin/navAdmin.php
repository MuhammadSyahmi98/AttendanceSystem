<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>
<body>
	<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin.php" class="nav-link">HOME</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item">
         <a href="logout.php">
        <button class="btn btn-danger"  href="logout.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </button>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin.php" class="brand-link">
      <img src="../resources/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size: 97%;">MyAttendance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile.php" class="d-block">ADMIN</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul id="myDIV" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php  
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                 $url = "https://";   
            else  
                 $url = "http://";   
            // Append the host(domain name, ip) to the URL.   
            $url.= $_SERVER['HTTP_HOST'];   
            
            // Append the requested resource location to the URL   
            $url.= $_SERVER['REQUEST_URI'];    
              
            
          ?>   


          <li class="nav-item has-treeview">
            <a href="admin.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/admin/admin.php")) {echo "active";} ?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                HOME 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="listAdmin.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/admin/listAdmin.php") || ($url === "http://localhost/AttendanceSystem/admin/registerAdmin.php") || ($url === "http://localhost/AttendanceSystem/admin/viewAdmin.php") || ($url === "http://localhost/AttendanceSystem/admin/editAdmin.php")) {echo "active";} ?> "><i class="nav-icon fas fa-user-tie"></i><p>
                ADMIN
              </p></a>
          </li>
          <li class="nav-item has-treeview">
            <a href="class.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/admin/class.php")  || ($url === "http://localhost/AttendanceSystem/admin/editClass.php")) {echo "active";} ?> "><i class="nav-icon fas fa-chalkboard"></i><p>
                CLASS
              </p></a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="adminTeacher.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/admin/adminTeacher.php") || ($url === "http://localhost/AttendanceSystem/admin/editTeacher.php")) {echo "active";} ?> ">
              <i class="nav-icon fas fa-users"></i><p>
                TEACHER
              </p></a>
          </li>
          <li class="nav-item has-treeview">
            <a href="allStudentList.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/admin/allStudentList.php") || ($url === "http://localhost/AttendanceSystem/admin/viewStudent.php") || ($url === "http://localhost/AttendanceSystem/admin/studentlist.php") || ($url === "http://localhost/AttendanceSystem/admin/editStudent.php"))  {echo "active";} ?> ">
              <i class="nav-icon fas fa-users"></i><p>
                STUDENT
              </p></a>
          </li>
          <li class="nav-item has-treeview">
            <a href="date.php" class="nav-link <?php if($url === "http://localhost/AttendanceSystem/admin/date.php") {echo "active";} ?>"><i class="nav-icon far fa-calendar-alt"></i><p>
                HOLIDAY
              </p></a>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                ATTENDANCE REPORT
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ClassDate.php" class="nav-link <?php if($url === "http://localhost/AttendanceSystem/admin/attendance.php") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BY DAY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reportByMonth.php" class="nav-link <?php if($url === "http://localhost/AttendanceSystem/admin/.php") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BY MONTH</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index3.html" class="nav-link <?php if($url === "http://localhost/AttendanceSystem/admin/.php") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BY YEAR</p>
                </a>
              </li>
            </ul> 
            </li>

          
             
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
</script>
</body>
</html>