<?php include "../resources/php/sql.php"; session_start(); ?>

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
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
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



  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report By Month</h1>
            <form method="POST" style="margin-top: 10px;" autocomplete="off">

              <div class="form-group">
                <select style="margin-top: 10px;" class="form-control" name="months"  data-placeholder="Select" style="width: 100%;" onchange="showUsers(this.value)">
                  <?php $date = date('n') ?>
                  <option value="0">- Select Month -</option>
                  <option value="1" >January</option>
                  <option value="2" style="<?php if ($date<2) { ?> display: none; <?php } ?>">February</option>
                  <option value="3" style="<?php if ($date<3) { ?> display: none; <?php } ?>">March</option>
                  <option value="4" style="<?php if ($date<4) { ?> display: none; <?php } ?>">April</option>
                  <option value="5" style="<?php if ($date<5) { ?> display: none; <?php } ?>">May</option>
                  <option value="6" style="<?php if ($date<6) { ?> display: none; <?php } ?>">June</option>
                  <option value="7" style="<?php if ($date<12) { ?> display: none; <?php } ?>">July</option>
                  <option value="8" style="<?php if ($date<7) { ?> display: none; <?php } ?>">August</option>
                  <option value="9" style="<?php if ($date<8) { ?> display: none; <?php } ?>">September</option>
                  <option value="10" style="<?php if ($date<9) { ?> display: none; <?php } ?>">October</option>
                  <option value="11" style="<?php if ($date<10) { ?> display: none; <?php } ?>">November</option>
                  <option value="12" style="<?php if ($date<11) { ?> display: none; <?php } ?>">December</option>
                  
                  
  
                </select>
              </div>
                
            </form>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
      
    </section>



  <!-- Using Ajax after user click option will show google chart in this section -->
  <section class="content" id="chart1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <section class="content" >
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                   <div id="piechart" style="width: 100%; height: 500px;"></div>
                  </div>
                </div>
              </div>
              
            </section>

            <div id="txtHint"></div>
          </div>
        </div>
      </div>
    </section>




  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"; ?>

 


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

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




<!-- Ajax that be used to fetch other page that have google chart in it -->
<script>
  var testData = [];
  var insertData = [];

function showUsers(str) {
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText)
        var value = JSON.parse(this.responseText);
        
        
        console.log(value);

        insertData = value;

        insertData.forEach((data) => {
           data.splice(1, 2);
        });

        console.log(insertData);

        showData(str);
        
        drawChart();

   
      }
    };
    xmlhttp.open("GET","serviceByClass.php?carts&month="+str,true);
    xmlhttp.send();
}

function showData(str) {
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var value = this.responseText;

        document.getElementById("txtHint").innerHTML = value;
      }
    };
    xmlhttp.open("GET","getAttendanceDataByMonthByClass.php?month="+str,true);
    xmlhttp.send();
}
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      //google.charts.setOnLoadCallback(drawChart);


      function drawChart() {
        console.log(insertData);

        var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              insertData[0],
              insertData[1],
              insertData[2],
              insertData[3],
              insertData[4]
        ]);

        var options = {
          title: 'Attendance Percentange',
          is3D: true,
          colors: ['#36c', '#f90', '#9610b2', '#dc3912'],
          backgroundColor: '#f4f6f9',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</html>

<?php 
if (isset($_POST['viewAttend'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Attend";
  echo "<script>window.location.assign('listOfStudentByMonthByClass.php')</script>";
}
?>

<?php 
if (isset($_POST['viewAttendLate'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Attend Late";
  echo "<script>window.location.assign('listOfStudentByMonthByClass.php')</script>";
}
?>


<?php 
if (isset($_POST['viewAbsent'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Absent";
  echo "<script>window.location.assign('listOfStudentByMonthByClass.php')</script>";
}
?>


<?php 
if (isset($_POST['viewMedicalLeave'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Medical Leave";
  echo "<script>window.location.assign('listOfStudentByMonthByClass.php')</script>";
}
?>


<?php 
if (isset($_POST['viewOther'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Other";
  echo "<script>window.location.assign('listOfStudentByMonth.php')</script>";
}
?>



<?php 
if (isset($_POST['viewAll'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "All";
  echo "<script>window.location.assign('listOfStudentByMonth.php')</script>";
}
?>