

<!-- Refresh the page and will resit the UIDContainer to empty. The RFID will show nothing -->
<?php
  include "../resources/php/sql.php"; session_start();
?>

<?php
$loggedIn = $_SESSION['loggedIn'];

if ($loggedIn!=893247348) {
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
  <?php  include "navAdmin.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Information</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-body">


              <div class="card card-primary card-outline">
            
              <!-- /.card-header -->
              <div class="card-body">

                <?php 

                    $admin_id = $_SESSION['admin_id'];
                    $result = displayAdminByID($admin_id); 
                    $row = mysqli_fetch_assoc($result);

        

                 ?>



                <strong  style="font-size: 110%;"><i class="fas fa-book mr-1"></i> Name</strong>

                <p class="text-muted" style="font-size: 120%;">
                  <?php echo $row['admin_name']; ?>
                </p>

                <hr>

                <strong style="font-size: 110%;"><i class="fas fa-envelope"></i></i> Email</strong>

                <p class="text-muted" style="font-size: 120%;"><?php echo $row['admin_email']; ?></p>

                <hr>

                <strong style="font-size: 110%;"><i class="fas fa-pencil-alt mr-1"></i>Contact Number</strong>

                <p class="text-muted" style="font-size: 120%;">
                   <?php echo $row['admin_contact']; ?>
                </p>

                <hr>

                <strong style="font-size: 110%;"><i class="fas fa-user-tie"></i> Type</strong>

                <p class="text-muted" style="font-size: 120%;">Admin</p>
              </div>
              <!-- /.card-body -->

            </div>
              
            








              <!-- /.card-body -->
            </div>
            <div class="card-footer">
                  <a href="listAdmin.php">
                  <button type="submit" id="cancel" name="cancel" class="btn btn-primary">Back</button>
                  </a>
                </div>
            </div>

            <!-- /.card -->
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



