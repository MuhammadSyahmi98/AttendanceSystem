

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

  <!-- JS-RFID -->

  <script src="jquery.min.js"></script>
    <script>
      $(document).ready(function(){
         $("#getUID").load("../UIDContainer.php");
        setInterval(function() {
          $("#getUID").load("../UIDContainer.php");
        }, 500);
      });
    </script>

  <!-- /.JS-RFID -->


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

                        $student_id = $_SESSION['student_id'];
                        $result = displayStudentByID($student_id);
                         $row = mysqli_fetch_assoc($result);

            

                     ?>



                    <strong style="font-size: 110%;">RFID ID</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['student_id']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;"> Name</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['student_name']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;"> IC Number</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['student_ic']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;">Student Address</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['student_address']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;"> Parent Name</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['parent_name']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;"> Parent Email</strong>

                    <p class="text-muted" style="font-size: 120%;"> <?php echo $row['parent_email']; ?></p>

                    <hr>

                    <strong style="font-size: 110%;"> Parent Contact</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['parent_contact']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;">Parent Address</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['parent_address']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 110%;"> Class</strong>
                    <?php 
                      $class_id1=$_SESSION['class_id'];
                      $result = displayClassForAddStudent($class_id1);
                      $row1 = mysqli_fetch_assoc($result); ?>
                    
                    <p class="text-muted" style="font-size: 120%;"><?php if (!empty($row1)) {
                      echo $row1['class_name'];
                    } else {
                      echo "-";
                    } ?></p>
                  </div>
                  <!-- /.card-body -->
                  
                </div>
              
              </div>
               <div class="card-footer">
                  <a href="allStudentList.php">
                  <button type="submit" id="cancel" name="cancel" class="btn btn-primary">Back</button>
                  </a>
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



