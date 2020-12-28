<?php include "../resources/php/sql.php"; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Teacher</title>
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
    <?php  include "navAdmin.php"; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Teacher</h1>
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
                <?php
                 $teacher_id = $_SESSION['teacher_id'];
                 $result = displayTeacherByID($teacher_id);
                 $row = mysqli_fetch_assoc($result);
                 $class_id2 = $row['class_id'];
                ?>

            

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Name</label>
                    <input type="name" name="teacher_name" class="form-control" value="<?php echo $row['teacher_name']; ?>"  placeholder="Enter Teacher Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="teacher_email" class="form-control" value="<?php echo $row['teacher_email']; ?>"  placeholder="Enter Teacher Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Number</label>
                    <input type="name" name="teacher_contact" class="form-control" value="<?php echo $row['teacher_contact'] ?>"  placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group">
                  <label>Class</label>
                  <select class="form-control select2" name="class_id1"  data-placeholder="Select" style="width: 100%;">
                    <?php 
                      $result1 = displayClassByID($class_id2);
                      $row1 = mysqli_fetch_assoc($result1);
                    ?>

                    <option value="<?php echo $row1['class_id']; ?>"><?php echo $row1['class_name']; ?></option>

                    <?php  $resultl = displayAvailableClassTeacher(); 
                    $i=1;
                    while ($row = mysqli_fetch_assoc($resultl)) {
                    ?>
                      <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>

                      

                    <?php
                    $i++;
                    }
                    ?>

                    <?php 
                        if (!empty($row1['class_id'])) {
                         ?> <option value=""></option><?php
                        }
                      ?>
                    
  
                  </select>
                </div>
                
                </div>
                 <div class="card-footer">
                  <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="updateTeacher" class="btn btn-primary">Update</button>
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
if (isset($_POST['updateTeacher'])) {

  $teacher_id = $_SESSION['teacher_id'];
  $teacher_name = $_POST['teacher_name'];
  $teacher_email = $_POST['teacher_email'];
  $teacher_contact = $_POST['teacher_contact'];
  $class_id = $_POST['class_id1'];

  if ($class_id === "") {
    updateTeacherEmpty($teacher_id, $teacher_name, $teacher_email, $teacher_contact);
  } else {
    updateTeacher($teacher_id, $teacher_name, $teacher_email, $teacher_contact, $class_id);
  }




}


?>

<?php
if (isset($_POST['cancel'])) {
  echo "<script>window.location.assign('adminTeacher.php')</script>";
}

 ?>

