

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
  <title>Register Student</title>
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
            <h1>Student Registration</h1>
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
                  <div class="form-group">
                    <label for="exampleInputrfid">RFID NUMBER</label>
                    <textarea style="resize: none; height: 40px;" name="student_id" class="form-control" id="getUID" required placeholder="Scan RFID Card"></textarea>  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="name" name="student_name" class="form-control"  placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">IC NUMBER</label>
                    <input class="form-control" name="student_ic"  placeholder="Enter Ic Number" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">PARENT NAME</label>
                    <input class="form-control" name="parent_name" placeholder="Enter Parent Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">EMAIL</label>
                    <input type="email" name="parent_email" class="form-control"  placeholder="Enter Parent Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">PARENT CONTACT NUMBER</label>
                    <input class="form-control" name="parent_contact" placeholder="Enter Parent Contact Number" required>
                  </div>
                  <div class="form-group">
                    <label>Class</label>
                    <select class="form-control select2" name="ids"  data-placeholder="Select" style="width: 100%;">

                      <option value="">No class</option>
                      <?php 
                      $result = displayAllClass();
                      $i = 1;

                      while ($row4 = mysqli_fetch_assoc($result)) {
                        ?><option value="<?php echo $row4['class_id']; ?>"><?php echo $row4['class_name']; ?></option><?php
                        $i++;
                      }


                      ?>
                     

  
                  </select>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="cancel" id="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="addStudent1" class="btn btn-primary">Submit</button>
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
<script>  
 $(document).ready(function(){  
      $('#cancel').click(function(){
        window.location.assign('allStudentList.php'); 
            
      });  
 });  
 </script> 
</body>
</html>


<?php 
if (isset($_POST['addStudent1'])) {
  $student_id = $_POST['student_id'];
  $student_name = $_POST['student_name'];
  $student_ic = $_POST['student_ic'];
  $parent_name = $_POST['parent_name'];
  $parent_email = $_POST['parent_email'];
  $parent_contact = $_POST['parent_contact'];
  $class_id = $_POST['ids'];

  addStudent4($student_id, $student_name, $student_ic, $parent_name, $parent_email, $parent_contact, $class_id);
}

?>
