

<!-- Refresh the page and will resit the UIDContainer to empty. The RFID will show nothing -->
<?php
  include "../resources/php/sql.php"; session_start();
?>

<?php
$loggedIn = $_SESSION['loggedIn'];

if ($loggedIn!=9999) {
  echo "<script>alert('PLEASE TRY AGAIN');
              window.location.href='../index.php';
              </script>";
}
  

 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Details</title>
  <!-- Tell the browser to be responsive to screen width -->
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
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php  include "navTeacher.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Contact</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
    
    <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">


            <?php 

            $result = displayAdmin();
                         
            while ($row = mysqli_fetch_assoc($result)) {
           
              

            ?>
            <div class="col-12 col-sm-6 col-md-6  align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Admin
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> <?php echo $row['admin_name']; ?></b></h2>
                      
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small" style="font-size: 110%;"><span class="fa-li"><i class="fas fa-envelope"></i></span><?php echo $row['admin_email']; ?></li>
                        <li class="small" style="font-size: 110%; margin-top: 8px;"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>  Phone Number: <?php echo $row['admin_contact']; ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                  </div>
                </div>
              </div>
            </div>


          <?php } ?>





          </div>
        </div>
      </div>


    </section>










    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php  include "footer.php"; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>

<?php 
if (isset($_POST['back'])) {
   echo "<script>
            window.location.href='listAdmin.php';
            </script>";
}
?>



