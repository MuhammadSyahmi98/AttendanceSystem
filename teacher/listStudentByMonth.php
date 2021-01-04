<?php   include "../resources/php/sql.php"; session_start(); ?>
<?php $_SESSION['code_type_attend'] = "";
$_SESSION['code_type_attend1'] = "";?>

<?php
$loggedIn = $_SESSION['loggedIn'];
$code1 = $_SESSION['code1'];

if ($loggedIn!=9999) {
  echo "<script>alert('Please Login');
              window.location.href='../index.php';
              </script>";
}

if ($code1 != "1") {
   echo "<script>
              window.location.href='Teacher.php';
              </script>";
}
  

 ?>
<?php 
$nameOfMonth = array("mockup", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");


$month = $_SESSION['month'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>STUDENT LIST</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
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
  <!-- Navbar -->
   <?php include "navTeacher.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <section>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php 
            $class_id1=$_SESSION['class_id'];
            $result = displayClassByID($class_id1);
             $row = mysqli_fetch_assoc($result);

            ?>

            <?php 
            if (empty($row['class_name'])) { 

              ?><h1 style="color: red;"><?php echo "Please Contact Administrator to Assign Classroom"; ?></h1> <?php 

            } else {
              ?><h1>Report For <?php echo $nameOfMonth[$month]; ?></h1><?php
            }
              
          ?>

            
            
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
              <div class="card-body">
                <table id="example2" class="table table-striped text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>DATE</th>
                      <th>STATUS</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <?php 

                    $class_id1=$_SESSION['class_id'];
                    $result = displayAttendanceByClassByMonth($class_id1,$month);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['dates']; ?></td>
                      <td><?php echo $row['status']; ?></td>
                      
                     
                      
                    </tr>

                  <?php $i=$i+1;} ?>
                    
                  </tbody>
                </table>
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
  </section>
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
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<style>
    #exportButton {
        border-radius: 0;
    }
</style>
<!-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> -->
</body>
</html>


<?php  
if (isset($_POST['editDetailStudent'])) {
   $_SESSION['student_id'] = $_POST['id$i'];
    echo "<script>window.location.assign('editStudent.php')</script>";
}

if (isset($_POST['viewDetailStudent'])){
    $_SESSION['student_id'] = $_POST['id$i'];
  echo "<script>window.location.assign('viewStudent.php')</script>";

}

?>