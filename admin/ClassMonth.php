<?php include "../resources/php/sql.php"; ?>
<?php session_start();?>
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
  <title>Attendance</title>
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
            <h1>Report by Month</h1>
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
              
              <div class="card-body" >
                <table c id="example1" class="table table-striped text-nowrap">
                  <thead>
                      <tr>
                      <th>
                          No.
                      </th>
                      <th>
                          Class
                      </th>
                      <th>
                          Teacher
                      </th>
                      <th>
                        Action
                      </th>   
                  </tr>   
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>All</td>
                      <td>-</td>
                      <td>
                        
                        <form method="post">


                          <button class="btn btn-primary btn-sm" name="viewAllMonth">
                            <i class="fas fa-folder">
                              </i>
                              Report
                          </button> 
                              
                         
                
                        </form>
                      </td>
                    </tr>
                    <?php $result = displayClass(); 
                     $i = 2;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['class_name']; ?></td>
                      <td><span class="tag tag-success"><?php if(empty($row['teacher_name'])){
                        echo " - ";
                      } else {echo $row['teacher_name'];}  ?></span></td>
                      <td>
                        <form method="post" >

                          <input type="hidden" name="teacherData" value="<?php echo $row['teacher_name']; ?>"> 
                          <input type="hidden" name="id$i" value="<?php echo $row['class_id']; ?>"> 

                          <button class="btn btn-primary btn-sm" name="viewByMonth">
                            <i class="fas fa-folder">
                              </i>
                              Report
                          </button> 
                              
                         
                
                        </form>
                      </td>
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
if (isset($_POST['viewAllMonth'])) {
  echo "<script>window.location.assign('reportByMonth.php')</script>";
}
?>


<?php 
if (isset($_POST['viewByMonth'])) {
  $_SESSION['class_id'] = $_POST['id$i'];
  echo "<script>window.location.assign('reportByMonthByClass.php')</script>";
}
?>
