

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
  <?php  include "navTeacher.php"; ?>

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
              <form role="form" method="POST" action="registerStudent.php">
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
                    <input class="form-control" name="student_ic"  placeholder="Enter Address" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">ADDRESS</label>
                    <input class="form-control" name="student_address"  placeholder="Enter Ic Number" required>
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
                    <?php 
                    $class_id1=$_SESSION['class_id'];
                    $result = displayClassForAddStudent($class_id1);
                    $row = mysqli_fetch_assoc($result); ?>
                    <label for="exampleInputICNumber">Class</label>
                    <input type="class" name="class_id" class="form-control"  required value="<?php echo $row['class_name']?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="cancel" name="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="addStudent" class="btn btn-primary">Submit</button>
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
</body>
</html>


<?php 
if (isset($_POST['addStudent'])) {
  $student_id = $_POST['student_id'];
  $student_name = $_POST['student_name'];
  $student_ic = $_POST['student_ic'];
  $parent_name = $_POST['parent_name'];
  $parent_email = $_POST['parent_email'];
  $parent_contact = $_POST['parent_contact'];
  $class_id = $_SESSION['class_id'];




  if(preg_match("/^[A-Z][a-zA-Z - ' .]+$/", $student_name) === 0 || preg_match("/^[A-Z][a-zA-Z - ' .]+$/", $parent_name) === 0) {
  echo "<script>alert('Name must be from letters, dashes, spaces and must not start with dash');
             window.location.href='registerStudent.php';
              </script>";

  } else {
    if (preg_match("/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/", $student_ic) === 0) {
        echo "<script>alert('IC must be numbers: 999999-99-9999');
             window.location.href='registerStudent.php';
              </script>";
      } else {
          $result = verifyParent($parent_name, $parent_email);
          $row = mysqli_fetch_assoc($result);

          if(!empty($row)) {

            $parent_id = $row['parent_id'];

            addStudentFromTeacher($student_id, $student_name, $student_ic, $parent_name, $parent_email, $parent_contact, $class_id);


          } else {

            

            echo "<script>
          alert('Parent Doesnt Exist in Database. Need To Register Parent');
          window.location.assign('registerParent.php')
          </script>";

          }
        }
    
  }












  
}

?>


<script>  
 $(document).ready(function(){  
      $('#cancel').click(function(){
        window.location.assign('teacherstudlist.php'); 
            
      });  
 });  
 </script> 


