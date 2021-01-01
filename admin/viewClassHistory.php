<?php include "../resources/php/sql.php"; ?>
<?php session_start();?>


<?php 
$class_id =  $_SESSION['class_id'];

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Class</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
            <?php 
            $result0 = displayClassByID($class_id);
            $row0 = mysqli_fetch_assoc($result0)

            ?>
            <h1>Teacher History Class of <?php echo $row0['class_name']; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card" >
              <div class="card-body">
                <table id="example1" class="table table-striped text-nowrap">
                  <thead>
                      <tr>
                      <th>
                          No.
                      </th>
                      <th>
                          Teacher Name
                      </th>
                      <th>
                        Assign Date
                      </th>
                    
                        
                  </tr>   
                  </thead>
                  <tbody id="myTable">
                    <?php $result = displayClassHistoryByID($class_id); 
                     $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['teacher_name']; ?></td>


                      <td><?php echo $row['classHistory_date']; ?></td>
                      
                    </tr>
                    
                    <?php $i=$i+1;} ?>
                   
                    
                  </tbody>
                  
                </table>
                
              </div>
              <!-- /.card-header -->

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

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>


<?php 
if (isset($_POST['viewClass'])) {
    $_SESSION['class_id']=$_POST['id$i'];
    echo "<script>window.location.assign('studentlist.php')</script>";
}

?>

<?php
if (isset($_POST['editClass'])) {
    $_SESSION['class_id']=$_POST['id$i'];
    echo "<script>window.location.assign('editClass.php')</script>";
}

?>


<?php
if (isset($_POST['deleteClass'])) {
   $class_id=number_format($_POST['id$i']);

   if (empty($_POST['teacherData'])) {
     deleteClass($class_id);

   } else
   deleteClassWithEditTeacher($class_id);

 } 

?>
