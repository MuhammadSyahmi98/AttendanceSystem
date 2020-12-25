<?php include "../resources/php/sql.php"; session_start(); ?>
<?php $db=mysqli_connect('localhost', 'root', '', 'oas'); ?>



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
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      <?php 

      if (empty($_SESSION['code_type_attend'])) {
        $dates = date('d-m-Y');
      }else {
        $dates = $_SESSION['date'];
      }
      


      $timestamp = strtotime($dates);

      $day = date('D', $timestamp);


      $class_id = $_SESSION['class_id'];

      // Status = "Attend"
      $result = countAttendStudentByClassAttend($class_id, $dates);
      $row = mysqli_fetch_assoc($result);
      $totalAttend = $row['totalAttend'];


      // Status = "Medical Leave"
      $result3 = countMedicalLeaveStudentByClassAttend($class_id, $dates);
      $row3 = mysqli_fetch_assoc($result3);
      $totalMedicalLeave = $row3['totalMedicalLeave'];


      // Status = "Attend Late"
      $result4 = countAttendLateStudentByClassAttend($class_id, $dates);
      $row4 = mysqli_fetch_assoc($result4);
      $totalAttendLate = $row4['totalAttendLate'];



      // Total Student
      $result1 = countStudentByClass($class_id);
      $row1 = mysqli_fetch_assoc($result1);
      $totalStudent = $row1['numberOfStudent'];







      if (empty($totalAttend)) {
        $absent = 0;
      } else {
        $absent = $totalStudent - $totalAttend - $totalMedicalLeave - $totalAttendLate;
      }
      

      ?>

      function drawChart() {


        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Attend',     <?php echo $totalAttend; ?>],
          ['Medical Leave',     <?php echo $totalMedicalLeave; ?>],
          ['Attend Late',     <?php echo $totalAttendLate; ?>],
          ['Absend',      <?php echo $absent; ?>]
        ]);

        var options = {
          title: 'Attendance Percentange',
          is3D: true,
          colors: ['#36c', '#f90', '#9610b2', '#dc3912'],
          backgroundColor: '#f4f6f9',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>






</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php  include "navTeacher.php"; ?>
	
	<div class="content-wrapper">


   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report   By Day</h1>
            <form name="contact-form" method="POST" style="margin-top: 10px;" autocomplete="off" onclick="submitForm()">
              <div class="form-group">
              <div class="form-group">
       
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input id="element" name="inputDate" type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
                   
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                </div>
                <div>
                   <button name="displayNewDate" type="submit" class="btn btn-primary">Submit</button>
                </div>     
              </div>
            </form>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
      
    </section>


    
     
    

    <section class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="text-decoration: underline;">Report Date: <?php 
              $new_date = strtotime($dates);
              $new_date1 = date("d-m-Y", $new_date);
            echo $new_date1; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <?php
    if ($absent === 0 && empty($totalAttend)) { ?>
      <section class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: red;">Data Doesnt Exist. Please Choose Other Date. Thank You</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    }


    ?> 


    <!-- Chart Section -->
    <section class="content">
      <div id="piechart_3d" style="width: 100%; height: 500px; <?php if($absent === 0 && empty($totalAttend)){ echo "visibility: hidden;";} ?>"></div>
    </section>

 
    <section class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Of Students</h1>
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
                    <?php 

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

