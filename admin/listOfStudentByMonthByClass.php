<?php include "../resources/php/sql.php"; ?>
<?php session_start();?>
<?php
$loggedIn = $_SESSION['loggedIn'];
$class_id = $_SESSION['class_id'];

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
  <title>Admin</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
   <?php include "navAdmin.php"; ?>
  <?php
       $month =   $_SESSION['current_month'];
       $month1 =   $_SESSION['current_month'];
       $status =   $_SESSION['status_student'];
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php 
               $month1 = date('F', mktime(0, 0, 0, $month1, 10)); // March ?>
            <h1>List of Student By Month</h1>

            <?php 
              $result4 = displayClassByID($class_id);
              $row4 = mysqli_fetch_assoc($result4);
            ?>

            <h4>Class: <?php echo $row4['class_name']; ?></h4>
            <h4>Month: <?php echo $month1; ?></h4>
            <h4>Status: <?php echo $status; ?></h4>
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
                        Name
                      </th>
                      <th>
                        Class
                      </th>
                      <th>Date</th>
                      <th>Status</th>
                     
                  </tr>   
                  </thead>
                  <tbody id="myTable">
                    <?php 
                    if ($status != "All") {
                      $result = displayStatusByMonthByClass($month, $status, $class_id);
                    } else {
                      $result = displayAllStatusByMonthByClass($month, $class_id);
                    }

                     
                     $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>


                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['student_name']; ?></td>
                        <td><?php echo $row['class_name']; ?></td>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['attend_status']; ?></td>
                        
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









