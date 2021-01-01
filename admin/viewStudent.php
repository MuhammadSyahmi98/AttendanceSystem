

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
              
              <!-- /.card-header -->
              <div>
              
                <div class="card-body">

                  <?php

                    $student_id1 = $_SESSION['student_id'];
                    $result = displayStudentByID($student_id1);
                    $row = mysqli_fetch_assoc($result);
              
                  ?>



                  <div class="form-group">
                    <label for="exampleInputrfid">RFID NUMBER</label>
                    <textarea style="resize: none; height: 40px;" name="student_id" readonly class="form-control" required placeholder="Scan RFID Card"><?php echo $row['student_id']; ?></textarea>  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="name" name="student_name" class="form-control" value="<?php echo $row['student_name']; ?>" readonly placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">IC NUMBER</label>
                    <input class="form-control" name="student_ic" readonly value="<?php echo $row['student_ic']; ?>"  placeholder="Enter Ic Number" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">PARENT NAME</label>
                    <input class="form-control" name="parent_name" readonly value="<?php echo $row['parent_name']; ?>"  placeholder="Enter Parent Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">EMAIL</label>
                    <input type="email" name="parent_email" class="form-control" readonly value="<?php echo $row['parent_email']; ?>"   placeholder="Enter Parent Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">PARENT CONTACT NUMBER</label>
                    <input class="form-control" name="parent_contact" value="<?php echo $row['parent_contact']; ?>"  readonly placeholder="Enter Parent Contact Number" required>
                  </div>
                  <div class="form-group">
                    <?php 
                    $class_id1=$_SESSION['class_id'];
                    $result = displayClassForAddStudent($class_id1);
                    $row = mysqli_fetch_assoc($result); ?>
                    <label for="exampleInputICNumber">Class</label>
                    <input type="class" name="class_id" class="form-control" readonly required value="<?php echo $row['class_name']?>">
                  </div>
                </div>
                <!-- /.card-body -->

           

               
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>



