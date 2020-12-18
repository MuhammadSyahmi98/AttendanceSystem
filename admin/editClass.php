<?php include "../resources/php/sql.php"; session_start();?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Edit Class</title>

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

     <?php include "navAdmin.php"; ?>


  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Edit Class</h1>

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

              <form method="POST">

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputName">Class</label>

                    <?php
                    $class_id1=$_SESSION['class_id'];
                    $result = displayClassForAddStudent($class_id1);
                    $row = mysqli_fetch_assoc($result);
                    ?>


                    <input type="name" name="class_name" class="form-control" value="<?php echo $row['class_name']; ?>">

                  </div>

                  <div class="form-group">
                     <label>Teacher</label>
                     <?php
                      $class_id1=$_SESSION['class_id'];
                      $result = displaySpecificTeacher($class_id1);
                      $row = mysqli_fetch_assoc($result);

                 
                      ?>
                      <input type="hidden" name="session_teacher_id" value="<?php echo $row['teacher_id']; ?>">
                      <select class="form-control select2" name="teacher_id"  data-placeholder="Select" style="width: 100%;">

                      

                      <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['teacher_name']; ?></option>



                      <?php  $resultl = displayAvailableTeacher(); 
                
                      while ($row1 = mysqli_fetch_assoc($resultl)) {
                      ?>

                      <option value="<?php echo $row1['teacher_id']; ?>"><?php echo $row1['teacher_name']; ?></option>

                     <?php

                      }
                      ?>
                      <?php 
                      if (!empty($row['teacher_name'])) {
                        ?><option value=""></option><?php
                      }
                      ?>
                      
                    
  
                    </select>
                </div>


                 
                  
              </div>

                <div class="card-footer">
                  <button type="submit" name="updateClass" class="btn btn-primary">Update</button>
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

<!-- AdminLTE App -->






<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
</body>

</html>


<?php
if (isset($_POST['updateClass'])) {
  $class_id=$_SESSION['class_id'];
  $class_name = $_POST['class_name'];
  $teacher_id = $_POST['teacher_id'];
  $teacher_id_moke = $_POST['session_teacher_id'];

  if ($teacher_id === "") {
    updateClassEmpty($class_name, $teacher_id_moke, $class_id);
  } else {
    updateClass($class_name, $teacher_id, $class_id);
  }


  
}

?>