<?php include "../resources/php/sql.php"; session_start(); ?>
<?php $db=mysqli_connect('localhost', 'root', '', 'oas'); ?>

<?php $_SESSION['code_type_attend1'] = "";  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student List</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
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




  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 100, 40, 20],
          ['2015', 11, 46, 25],
          ['2016', 66, 11, 30],
          ['2014', 100, 40, 20],
          ['2015', 97, 46, 25],
          ['2016', 66, 12, 30],
          ['2014', 100, 40, 20],
          ['2015', 70, 40, 25],
          ['2016', 60, 10, 30],
          ['2014', 10, 40, 20],
          ['2015', 10, 60, 20],
          ['2016', 60, 20, 30],
          ['2017', 10, 54, 35]
        ]);

        var options = {
          chart: {
            title: 'Attendance Performance',
            subtitle: 'Attend, Attent Late, Absent, Medical Leave',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>






</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php  include "navTeacher.php"; ?>
	
	<div class="content-wrapper">

    <!-- Chart Section -->
    <section class="content">
      <div id="columnchart_material" style="width: 100%; height: 500px;""></div>
    </section>

 
    <section class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report By Month</h1>
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
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 260px;">
                    <input name="myInput" type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button  type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Status</th>
                      

                   
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <!-- <?php 

                    $class_id = $_SESSION['class_id'];
                    $result1 = displayStudentAttendanceByClassAbsent($class_id,$dates);
                    $i = 1;
                    while ($row2 = mysqli_fetch_assoc($result1)) {

                    
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row2['id']; ?></td>
                      <td ><?php echo $row2['name']; ?></td>
                      <td style="color: red;"><?php echo $row2['status']; ?></td>
                     
          
                    
                    </tr>

                  <?php $i=$i+1;} ?>

                    <?php 

        
                    $result2 = displayStudentAttendanceByClassAttend($class_id,$dates);
                    while ($row3 = mysqli_fetch_assoc($result2)) {

                    
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row3['id']; ?></td>
                      <td ><?php echo $row3['name']; ?></td>
                      <td><?php echo $row3['status']; ?></td>
                     
          
                    
                    </tr>

                  <?php $i=$i+1;} ?>
                     -->
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


 
  </div>
  






































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
<script src="../plugins/select2/js/select2.full.min.js"></script>
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

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'DD-MM-Y',
        autoclose:true,
        maxDate: new Date()
        

    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<script>
$(document).ready(function(){
    $("#element").val("");
});
</script>

</body>
</html>


<?php
if (isset($_POST['displayNewDate'])) {

  // New date
  $date = $_POST['inputDate'];
  $new_date = strtotime($date);
  $new_date1 = date("Y-m-d", $new_date);


  $timestamp = strtotime($new_date1);
  $day = date('D', $timestamp);

  $oldDate = $_SESSION['date'];


  if ($day==="Sat" || $day ==="Sun") {
    $new_date2 = $_SESSION['date'];
    $_SESSION['date'] = $new_date2;
  echo "<script>
  alert('Weekend. Please Choose Other Date');
  window.location.assign('#')
  </script>";

  } 

  else {
    $_SESSION['code_type_attend'] = "asdassda";
    $new_date2 = $new_date1;
     $_SESSION['date'] = $new_date2;
     echo "<script>
    window.location.assign('reportByDate.php')</script>";
  }


}


?>

