<?php
  include "../resources/php/sql.php"; session_start();
  $pemail = "";
?>

<?php
$loggedIn = $_SESSION['loggedIn'];

if ($loggedIn!=1111) {
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
  <?php  include "navParent.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
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

                    $student_id = $_SESSION['student_id'];
                    $result = parentDisplayByID($student_id); 
                    $row = mysqli_fetch_assoc($result);
                 ?>  

                <strong><i class="fas fa-book mr-1"></i> Name</strong>

                <p class="text-muted">
                  <?php echo $row['parent_name']; ?>
                </p>

                <hr>

                <strong><i class="fas fa-envelope"></i></i> Email</strong>

                <p class="text-muted"><?php echo $row['parent_email']; ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i>Contact Number</strong>

                <p class="text-muted">
                   <?php echo $row['parent_contact']; ?>
                </p>

                <hr>


                <strong><i class="nav-icon fas fa-home"></i> Address</strong>

                <p class="text-muted">
                   <?php echo $row['parent_address']; ?>
                </p>

                <hr>

                <strong><i class="fas fa-user-tie"></i> Type</strong>

                <p class="text-muted">Parent</p>
              </div>
              <!-- /.card-body -->
               <form method="POST">
             <div class="card-footer">
                  <button type="submit" id="cancel" name="cancel" class="btn btn-primary">Back</button>
                  <button type="submit" name="updateParent" class="btn btn-primary">Update</button>
              </div>
              </form>
            </div>
            
              </div>
              <!-- /.card-body -->
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

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>

<?php
if (isset($_POST['updateParent'])) {
  echo "<script>window.location.assign('lupdate.php')</script>";
}
?>


<?php 
if (isset($_POST['cancel'])) {
   echo "<script>window.location.assign('Parent.php')</script>";
}

?>






