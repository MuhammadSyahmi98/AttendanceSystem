

<!-- Refresh the page and will resit the UIDContainer to empty. The RFID will show nothing -->
<?php
  include "../resources/php/sql.php"; session_start();
  $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
  file_put_contents('../UIDContainer.php',$Write);
?>

<?php
$loggedIn = $_SESSION['loggedIn'];

if ($loggedIn!=9999) {
  echo "<script>alert('Please Login');
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
  <?php  include "navTeacher.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance Information</h1>
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





              <div class="card card-primary card-outline">
            
                  <!-- /.card-header -->
                  <div class="card-body">

                    <?php 

                        $student_id = $_SESSION['student_id'];
                        $attendance_id = $_SESSION['attendance_id'];
                        $result = displaystudentAttendanceByID($student_id, $attendance_id);
                        $row = mysqli_fetch_assoc($result);



                        $date1=$_SESSION['date'];

                     ?>



                    <strong style="font-size: 120%;">Date</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $date1; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 120%;"> Student Name</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['student_name']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 120%;"> IC Number</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['student_ic']; ?>
                    </p>

                    <hr>

                    <strong style="font-size: 120%;"> Attendance Status</strong>

                    <p class="text-muted" style="font-size: 120%;">
                      <?php echo $row['attend_status']; ?>
                    </p>

                    <hr>


                    <?php 
                    // Include the database configuration file  
                          require '../connectDB.php';

                     
                    // Get image data from database 
                    $result = $conn->query("SELECT * FROM attendance WHERE attendance_id = '$attendance_id'"); 
                    ?>


                  <div class="form-group" style="<?php if (($row['attend_status'] === "Attend Late") || ($row['attend_status'] === "Absent") || ($row['attend_status'] === "Attend")) {
                    ?> display: none; <?php
                  } ?>">
                  <strong style="font-size: 120%;">PROVE</strong>
                    <?php while($row = $result->fetch_assoc()){ ?> 
                      <div>
                      <?php if ($row['attend_status'] === "Medical Leave" || $row['attend_status'] === "Other") { ?>
                        <img style="margin-top: 15px; height: 300px; width: 600px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['attendance_img']); ?>" /> 
        <?php } else { ?>
          <input class="form-control" name="" readonly value="" > <?php
        } ?> </div> <?php
                      }?>

                    
                    
                  </div>



                  <!-- /.card-body -->
                  
                </div>
                
                














              
             
              
           
               
              </div>
              <div class="card-footer">
                  <a href="teacherstudattend.php">
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

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>



