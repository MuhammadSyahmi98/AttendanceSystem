<?php session_start(); ?>


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





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {


        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Attend',     12],
          ['Medical Leave',     34],
          ['Attend Late',     12],
          ['Absend',      12]
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
  <?php include "navAdmin.php"; ?>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report   By Month</h1>
            <form method="POST" style="margin-top: 10px;" autocomplete="off">

              <div class="form-group">
               <select class="form-control" name="class"  data-placeholder="Select" style="width: 100%;">

                  <option value="all">All</option>
                  <option value="all">1 Pintar</option>
                  <option value="all">2 Pintar</option>
                  <option value="all">3 Pintar</option>
                    
  
                </select>
                <select style="margin-top: 10px;" class="form-control" name="class"  data-placeholder="Select" style="width: 100%;">
                  <?php $date = date('n') ?>
                  <option>- Select Month -</option>
                  <option value="all" >January</option>
                  <option value="1" style="<?php if ($date<2) { ?> display: none; <?php } ?>">February</option>
                  <option value="2" style="<?php if ($date<3) { ?> display: none; <?php } ?>">Mac</option>
                  <option value="3" style="<?php if ($date<4) { ?> display: none; <?php } ?>">April</option>
                  <option value="4" style="<?php if ($date<5) { ?> display: none; <?php } ?>">February</option>
                  <option value="5" style="<?php if ($date<6) { ?> display: none; <?php } ?>">Mac</option>
                  <option value="6" style="<?php if ($date<7) { ?> display: none; <?php } ?>">April</option>
                  <option value="7" style="<?php if ($date<8) { ?> display: none; <?php } ?>">February</option>
                  <option value="8" style="<?php if ($date<9) { ?> display: none; <?php } ?>">Mac</option>
                  <option value="9" style="<?php if ($date<10) { ?> display: none; <?php } ?>">April</option>
                  <option value="10" style="<?php if ($date<11) { ?> display: none; <?php } ?>">February</option>
                  <option value="11" style="<?php if ($date<12) { ?> display: none; <?php } ?>">Mac</option>
                  <option value="12" style="<?php if ($date<13) { ?> display: none; <?php } ?>">April</option>
                    
  
                </select>
              </div>
                <div>
                   <button name="displayNewDate" type="submit" class="btn btn-primary">Submit</button>
                </div>     
              
            </form>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
      
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
          </div>
        </div>
      </div>
      
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-12">
            adasfasf
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
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
        format: 'L'
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
</body>
</html>
