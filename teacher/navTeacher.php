

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
  
  <style type="text/css">
   #tooltip {
  text-align: center;
  color: #fff;
  background: #333;
  position: absolute;
  z-index: 10000;
  padding: 10px;
  border-radius: 5px;
  -webkit-transition: 100ms ease;
  -moz-transition: 100ms ease;
  -o-transition: 100ms ease;
  -ms-transition: 100ms ease;
  transition: 100ms ease;
}

#tooltip:after /* triangle decoration */ {
  width: 0;
  height: 0;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-top: 10px solid #333;
  content: '';
  position: absolute;
  left: 50%;
  bottom: -10px;
  margin-left: -10px;
}

#tooltip.top:after {
  border-top-color: transparent;
  border-bottom: 10px solid #111;
  top: -20px;
  bottom: auto;
}

#tooltip.left:after {
  left: 10px;
  margin: 0;
}

#tooltip.right:after {
  right: 10px;
  left: auto;
  margin: 0;
}
  </style>


</head>
<body>
	<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item definition top" rel="tooltip" title="Minimize menu">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Teacher.php" class="nav-link">HOME</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="contact.php" class="nav-link">CONTACT</a>
      </li>
    </ul>
    <p class="navbar-nav ml-auto" style="margin-right: -70%;"><b>
      <?php echo date('l')."   ".date('d-m-Y'); ?></b>
    </p>
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
  <?php 
  $teacher_id = $_SESSION['teacher_id'];
  $result = displayTeacherByID($teacher_id);
  $row = mysqli_fetch_assoc($result);

  $teacher_name = $row['teacher_name'];
  $teacher_name1 = explode(" ", $teacher_name);
  $teacher_name = $teacher_name1[0];

  ?>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="Teacher.php" class="brand-link">
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
          <a href="profile.php" class="d-block" style="text-transform: uppercase;"><?php echo $teacher_name; ?>(TEACHER)</a>
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
            <a href="Teacher.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/teacher/Teacher.php")) {echo "active";} ?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                HOME
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="parentListTeacher.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/teacher/parentListTeacher.php"))  {echo "active";} ?> ">
              <i class="nav-icon fas fa-users"></i><p>
                PARENT
              </p></a>
          </li>
          <li class="nav-item has-treeview">
            <a href="teacherstudlist.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/teacher/viewStudent.php") || ($url === "http://localhost/AttendanceSystem/teacher/teacherstudlist.php") || ($url === "http://localhost/AttendanceSystem/teacher/editStudent.php") || ($url === "http://localhost/AttendanceSystem/teacher/registerstudent.php"))  {echo "active";} ?> ">
              <i class="nav-icon fas fa-users"></i><p>
                STUDENT
              </p></a>
          </li>
          <li class="nav-item has-treeview">
            <a href="teacherstudattend.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/teacher/teacherstudattend.php"))  {echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i><p>
                MANAGE ATTENDANCE
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
                <a href="reportByDate.php" class="nav-link <?php if($url === "") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BY DAY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reportByWeekByClass.php" class="nav-link <?php if($url === "") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BY WEEK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reportByMonth.php" class="nav-link <?php if($url === "http://localhost/AttendanceSystem/admin/.php") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BY MONTH</p>
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
<script src="../resources/js/index.js"></script>
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