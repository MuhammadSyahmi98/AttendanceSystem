<?php include "../resources/php/sql.php";?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register Teacher</title>
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
            <h1>Teacher Registration</h1>
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
              <form role="form" method="POST" action="registerteacher.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Name</label>
                    <input type="name" name="teacher_name" class="form-control"  placeholder="Enter Teacher Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="teacher_email" class="form-control"  placeholder="Enter Teacher Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Number</label>
                    <input type="name" name="teacher_contact" class="form-control"  placeholder="Enter Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password_1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Re-Password</label>
                    <input type="password" name="password_2" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                  <label>Class</label>
                  <select class="form-control select2" name="class_id2" style="width: 100%;" >

                    <option value=""></option>
                    <?php  $resultl = displayAvailableClass(); 
                    $i=1;
                    while ($row = mysqli_fetch_assoc($resultl)) {
                    ?>
                      <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>

                    <?php

                    }
                    ?>
                    
  
                  </select>
                </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="cancel" id="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="addTeacher" class="btn btn-primary">Submit</button>
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>  
 $(document).ready(function(){  
      $('#cancel').click(function(){
        window.location.assign('adminTeacher.php'); 
            
      });  
 });  
 </script> 
</body>
</html>



<?php
if (isset($_POST['addTeacher'])) {
  $teacher_name = $_POST['teacher_name'];
  $teacher_email = $_POST['teacher_email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
  $teacher_contact = $_POST['teacher_contact'];
  $class_id = $_POST['class_id2'];

  if ($password_1 === $password_2) {
    $set = addTeacher($teacher_name, $teacher_email, $teacher_contact, $password_1, $class_id);
    if (!empty($class_id)) {

      $result2 = getTeacherID($class_id);
      $row4 = mysqli_fetch_assoc($result2);
      $teacher_id = $row4['teacher_id'];
      $d = date("Y-m-d");
      addClasHistory($class_id, $teacher_id, $d);
    }
  } else {
    echo "FAIL";
  }


}




?>
