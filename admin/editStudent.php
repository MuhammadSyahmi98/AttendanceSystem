<?php
  include "../resources/php/sql.php"; 

  session_start();
  
?>

<?php 
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
  <title>Edit Student</title>
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
  <?php  include "navAdmin.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student</h1>
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
              <form role="form" method="POST">
                <div class="card-body">

                  <?php

                    $student_id = $_SESSION['student_id'];
                    $result = displayStudentByID($student_id);
                    $row = mysqli_fetch_assoc($result);
                  ?>


                  <div class="form-group">
                    <label for="exampleInputrfid">RFID NUMBER</label>
                    <textarea name="student_id" style="resize: none; height: 40px;" class="form-control" required placeholder="Scan RFID Card" readonly><?php echo $row['student_id'];?></textarea>  
                  </div>

                  <div class="form-group">
                    <label for="exampleInputrfid">NEW RFID NUMBER</label>
                    <textarea name="new_RFID" style="resize: none; height: 40px;" class="form-control" id="getUID"   placeholder="Scan RFID Card If Want To Change Current RFID Card"></textarea>  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName">NAME</label>
                    <input type="name" name="student_name" class="form-control" id="exampleInputname" value="<?php echo $row['student_name']; ?>" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">IC NUMBER</label>
                    <input type="icnumber" name="student_ic" class="form-control" value="<?php echo $row['student_ic'];?>" id="exampleInputIcnumber" placeholder="Enter IcNumber">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">Address</label>
                    <input type="icnumber" name="student_address" class="form-control" value="<?php echo $row['student_address'];?>" id="exampleInputIcnumber" placeholder="Enter IcNumber">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">STATUS</label>
                    
                    <select class="form-control select2" name="student_status"  data-placeholder="Select" style="width: 100%;">

                      <?php if ($row['student_status']=== 'Active') { ?>
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>  <?php
                      } else if($row['student_status']=== 'Deactive') {
                        ?>
                        <option value="Deactive">Deactive</option>
                        <option value="Active">Active</option>  <?php
                      } 

                      ?>
                      
                    
  
                    </select>


                  </div>
                  <div class="form-group">
                    <?php 
                    $class_id1=$_SESSION['class_id'];
                    $result = displayClassForAddStudent($class_id1);
                    $row = mysqli_fetch_assoc($result); ?>
                    <label for="exampleInputICNumber">Class</label>





                    <select class="form-control select2" name="class_id"  data-placeholder="Select" style="width: 100%;">


                    <?php 
                    if (!empty($row['class_id'])) { ?>
                      <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option> <?php
                    }
                    ?>
                    <?php 
                        if (empty($row['class_id'])) {
                         ?> <option value=""></option><?php
                        }
                      ?>
                    
                    

                    <?php  $resultl = displayClassExceptOneRow($class_id1); 
                    $i=1;
                    while ($row1 = mysqli_fetch_assoc($resultl)) {
                    ?>
                      <option value="<?php echo $row1['class_id']; ?>"><?php echo $row1['class_name']; ?></option>

                      

                    <?php
                    $i++;
                    }
                    ?>

                    <?php 
                        if (!empty($row['class_id'])) {
                         ?> <option value=""></option><?php
                        }
                      ?>
                    
  
                  </select>













              
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="cancel" id="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="updateStudent" class="btn btn-primary">Update</button>
                </div>
              </form>

               
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

  <?php include "footer.php"; ?>
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
if (isset($_POST['updateStudent'])) {

  $new_student_id = $_POST['new_RFID'];
  $student_id = $_POST['student_id'];
  $student_name = $_POST['student_name'];
  $student_ic = $_POST['student_ic'];
  $class_id = $_POST['class_id'];
  $student_status = $_POST['student_status'];
  $student_address = $_POST['student_address'];
  $page = $_SESSION['pageStudentList'];




  if(preg_match("/^[A-Z][a-zA-Z - ' .]+$/", $student_name) === 0) {
  echo "<script>alert('Name must be from letters, dashes, spaces and must not start with dash');
             window.location.href='editStudent.php';
              </script>";

  } else {
    if (preg_match("/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/", $student_ic) === 0) {
        echo "<script>alert('IC must be numbers: 999999-99-9999');
             window.location.href='editStudent.php';
              </script>";
      } else {
          if (empty($new_student_id)) {
              updateStudent($student_id, $student_name, $student_status, $student_ic, $student_address, $class_id,$page);

          } else {
              updateStudentNewStudentID($student_id, $new_student_id,  $student_name, $student_status, $student_ic, $student_address, $class_id, $page);
          }
        }
    
  }














   
 
}

?>

<?php 

if (isset($_POST['cancel'])) {
  
  echo "<script>window.location.assign('allStudentList.php')</script>";
}
