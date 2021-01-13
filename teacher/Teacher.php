<?php   include "../resources/php/sql.php"; session_start(); ?>
<?php $_SESSION['teacher_id'] = $_SESSION['teacher_id'];
      $_SESSION['class_id'] = $_SESSION['class_id'];
      $_SESSION['date'] = "";
      $_SESSION['code_type_attend'] = "";
      $_SESSION['code_type_attend1'] = "";

?>

<?php
$loggedIn = $_SESSION['loggedIn'];

if ($loggedIn!=9999) {
  echo "<script>alert('Please Login');
              window.location.href='../index.php';
              </script>";
}
  

 ?>

<?php $class_id = $_SESSION['class_id']; ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TEACHER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include "navTeacher.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <?php 
            if (empty($class_id )) { 

              ?>


              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1 style="color: red;">Please Contact Administrator to Assign Classroom</h1>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>

               <?php 

            }
              
          ?>

    <section class="content-header" style="<?php if (empty($class_id)) {
      display: none;
    } ?>">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner" >

                <?php 
                $class_id = $_SESSION['class_id'];
                $result = countStudentByClass($class_id);
                $row = mysqli_fetch_assoc($result);
                $numberOfStudent = $row['numberOfStudent'];

                ?>

                <?php 
                $class_id = $_SESSION['class_id'];
                $date = date('Y-m-d');
                // Attend
                $result = countAttendStudentByClassAttend($class_id, $date);
                $row = mysqli_fetch_assoc($result);
                $totalAttend = $row['totalAttend'];


                //AttendLate
                $result2 = countAttendLateStudentByClassAttend($class_id, $date);
                $row2 = mysqli_fetch_assoc($result2);
                $totalAttendLate = $row2['totalAttendLate'];
                $total = $totalAttend + $totalAttendLate;


                $todayAttendPrecentage = ($total/$numberOfStudent)*100;
                $todayAbsentPrecentage = 100 -  $todayAttendPrecentage;

                ?>

                <h3><?php echo round($todayAttendPrecentage, 2); ?><sup style="font-size: 20px">%</sup></h3>

                <p>Today Attend Percentage</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="reportByDate.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo round($todayAbsentPrecentage, 2); ?><sup style="font-size: 20px">%</sup></h3>

                <p>Today Absence Percentage</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="reportByDate.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <?php 
                $class_id = $_SESSION['class_id'];
                $result = countStudentByClass($class_id);
                $row = mysqli_fetch_assoc($result);
                $numberOfStudent = $row['numberOfStudent'];

                ?>
                <h3><?php echo $numberOfStudent; ?></h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="teacherstudlist.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
        </div>
        

        <div class="row">
          <div class="col-12">
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">Daily Log: <b>  <?php echo date("l")." ".date("d-m-Y"); ?></b></h3>


               
              </div>
              <div class="card-body">
                <table id="example1" class="table table-head-fixed table-striped text-nowrap ">
                  <thead>
                      <tr>
                        <th>
                          No.
                        </th>
                      <th>
                          ID
                      </th>
                      <th>
                          Name
                      </th>
                      <th>
                          Class
                      </th>
                      <th>
                        Status
                      </th>   
                  </tr>   
                  </thead>
                  <tbody>
                    <?php 
                    $date = date('Y-m-d');
                    $result = displayTodayAttendanceByMonth($class_id, $date); 
                     $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['class']; ?></td>
                      <td><?php echo $row['status']; ?></td>
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

 <?php include "footer.php" ?>

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
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
