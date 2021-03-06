
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
        <a href="Parent.php" class="nav-link">HOME</a>
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


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="Parent.php" class="brand-link">
      <img src="../resources/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size: 97%;">Myattendance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <?php 
          $parent_id = $_SESSION['parent_id'];
          $result = displayParentByID($parent_id);
          $row = mysqli_fetch_assoc($result);

          $parent_name = $row['parent_name'];
          $parent_name1 = explode(" ", $parent_name);
          $parent_name = $parent_name1[0];

        ?>

        <div class="info">
          <a href="Parent.php" class="d-block"><p><?php echo $parent_name." (Parent)"; ?></p></a>
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
            <a href="Parent.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/parent/Parent.php")) {echo "active";} ?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                HOME 
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="lprofile.php" class="nav-link <?php if(($url === "http://localhost/AttendanceSystem/parent/lprofile.php")) {echo "active";} ?> ">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                PROFILE
              </p>
            </a>
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