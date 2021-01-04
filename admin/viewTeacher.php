

<!-- Refresh the page and will resit the UIDContainer to empty. The RFID will show nothing -->
<?php
  include "../resources/php/sql.php"; session_start();
  $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
  file_put_contents('../UIDContainer.php',$Write);
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
            <h1>Teacher Information</h1>
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
              
              <!-- /.card-header -->
              <div>
              
                <div class="card-body pb-0">




                  <div class="card card-primary card-outline">
            
                  <!-- /.card-header -->
                  <div class="card-body">

                    <?php 

                        $teacher_id =  $_SESSION['teacher_id'];
                        
                        $result = displayTeacherByIDByClass($teacher_id);
                         $row = mysqli_fetch_assoc($result);

            

                     ?>



                    <strong style="font-size: 110%;">RFID ID</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['teacher_name']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;"> Name</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['teacher_email']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;"> IC Number</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['teacher_contact']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;"> Parent Name</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['class_name']; ?>
                    </p>

                    <hr>

                    
                  </div>
                  <!-- /.card-body -->
                  
                </div>
              
              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                  <a href="adminTeacher.php">
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



