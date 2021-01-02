 <?php   include "../resources/php/sql.php"; session_start();
  $class_id = $_SESSION['class_id'];
  $_SESSION['code_type_attend'] = "";
  ?>

<?php
$loggedIn = $_SESSION['loggedIn'];

if ($loggedIn!=9999) {
  echo "<script>alert('Please Login');
              window.location.href='../index.php';
              </script>";
}
  

 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>STUDENT ATTENDANCE</title>
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
   <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->

     <?php include "navTeacher.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <?php 
            if (empty($class_id)) { 

              ?><div class= "content-wrapper"><section class="content-header"><div class="container-fluid"><div class="row mb-2"><div class="col-sm-6"><h1 style="color: red;"><?php echo "Please Contact Administrator to Assign Classroom"; ?></h1></div></div></div></section></div> <?php 

            }
          ?>
  <div class="content-wrapper"
   



   <?php
  if (empty($class_id)) {
    
    ?> style="display: none;"  <?php
  }

   ?>     >
     <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Student Attendance</h3>
        </div>
        <div class="card-body">    
          <div class="form-group">
            <form method="POST" autocomplete="off">
              <div class="form-group">
                <?php 

                 $date = $_SESSION['date'];
                 if (empty($_SESSION['code_type_attend1'])) {
                   $date = date('Y-m-d');
                }


                 ?>

                <label>Date: <?php 

                $new_date_start1 = strtotime($date);
                $date2 = date("d-m-Y", $new_date_start1);


                echo $date2; ?></label>
                  <div style="width: 30%;" class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input id="element" name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" required="">
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
              </div>
              <div>
                <button name="searchNewDate" type="submit" class="btn btn-primary">Submit</button>
              </div>  
            </form>   
          </div>
        </div>




<?php 

$result6 = displayDateAttendance($date, $class_id); 
$row2 = mysqli_fetch_assoc($result6);

if (empty($row2['student_name'])) { ?>
  
    <section class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: red;">Data Doesnt Exist. Please Choose Other Date. Thank You</h1>
          </div>
        </div>
      </div>
    </section>

<?php

}



 ?>
     
  
    


    



             <div class="container-fluid">
            <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped text-nowrap">

                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>IC NUMBER</th>
                      <th>STATUS</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   

                    <?php 
                    $result5 = displayDateAttendance($date, $class_id); 
                     $i = 1;
                    while ($row1 = mysqli_fetch_assoc($result5)) {
        
                    
                    ?>


                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row1['student_name']; ?></td>
                      <td><?php echo $row1['student_ic']; ?></td>
                      <td style="<?php if ($row1['attend_status']==="Absent") { echo "color: red;";
                        
                      } ?>"><?php echo $row1['attend_status']; ?></td>
                      <td>
                        <form method="POST">
                          <input type="hidden" name="date1" value="<?php echo $date; ?>">
                          <input type="hidden" name="attendance_id" value="<?php echo $row1['attendance_id']; ?>">
                          <input type="hidden" name="student_id" value="<?php echo $row1['student_id']; ?>">
                          <input type="hidden" name="status" value="<?php echo $row1['attend_status']; ?>">


                          <button name="viewStudent" class="btn btn-primary btn-sm">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </button>
                          <button name="editStudentAttendance" class="btn btn-info btn-sm">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </button>
                         
                        </form>
                      </td>
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
      </div>

    </section>




  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>



</body>

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
        maxDate:new Date()
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

</html>


<?php 
if (isset($_POST['searchNewDate'])) {
  
  $date = $_POST['date'];

  $new_date_start1 = strtotime($date);
  $newDate = date("Y-m-d", $new_date_start1);


  $_SESSION['date'] = $newDate;
  $_SESSION['code_type_attend1'] = "asaaf";

  echo "<script>window.location.assign('teacherstudattend.php')</script>";
}


?>


<?php 
if (isset($_POST['viewStudent'])) {

  $date = $_POST['date1'];

  $attendance_id = $_POST['attendance_id'];
  $student_id = $_POST['student_id'];


  $_SESSION['attendance_id'] = $attendance_id;
  $_SESSION['student_id'] = $student_id;
  $_SESSION['date'] = $date;


  echo "<script>window.location.assign('viewStudentAttendance.php')</script>";

}
?>


<?php 
if (isset($_POST['editStudentAttendance'])) {




  $status = $_POST['status'];
  if ($status === "Attend") {
    echo "<script>alert('Attend Status Cant Be Changed');
            window.location.href='teacherstudattend.php';
            </script>";
  } else {

    $date = $_POST['date1'];

    $attendance_id = $_POST['attendance_id'];
    $student_id = $_POST['student_id'];

    $_SESSION['attendance_id'] = $attendance_id;
    $_SESSION['student_id'] = $student_id;
    $_SESSION['date'] = $date;

    echo "<script>window.location.assign('typeattend.php')</script>";
  }
}


?>
