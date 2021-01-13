<?php include "../resources/php/sql.php"; session_start(); date_default_timezone_set("Asia/Kuala_Lumpur");?>
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
  <title>Edit Date</title>
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

            <h1>Edit Date</h1>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

    <section class="content">
      <div>
        <div class="card-header" style="padding: 0;">
    
        </div>
        <div class="card-body">    
          <div class="form-group">
            <form method="POST">
            <?php 
              $date_id1=$_SESSION['date_id'];
              $result1 = displaySpecificHoliday($date_id1);
              $row = mysqli_fetch_assoc($result1);

              $new_date_start1 = strtotime($row['holiday_start']);
              $new_date_start = date("d-m-Y", $new_date_start1);


             $new_date_end1 = strtotime($row['holiday_end']);
             $new_date_end = date("d-m-Y", $new_date_end1);

              

              ?>
            <input type="hidden" name="holiday_id" value="<?php echo $row['holiday_id']; ?>">
            <label>Start Date:</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest" style="width: 40%;">
                    <input id="element" name="startDate" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php echo $new_date_start ?>">
                   
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
              <label style="margin-top: 10px;">End Date:</label>
              <div class="input-group date" id="reservationdate1" data-target-input="nearest" style="width: 40%;">
                    <input id="element" name="endDate" type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" value="<?php echo $new_date_end ?>" >
                   
                    <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
             <div style="margin-top: 10px;" class="form-group">
                  <label>Type</label>
                  <select class="form-control " name="holiday_type" data-placeholder="Select" style="width: 40%;">
                    <option value="<?php echo $row['holiday_type']; ?>"><?php echo $row['holiday_type']; ?></option>

                    <?php
                    if ($row['holiday_type'] === "National Holiday") {?>
                      <option value="State Holiday">State Holiday</option>
                      <option value="Holidays by Declaration">Holidays by Declaration</option>
                      <option value="School Holiday">School Holiday</option><?php

                    }

                     if ($row['holiday_type'] === "State Holiday") {?>
                      <option value="National Holiday">National Holiday</option>
                      <option value="Holidays by Declaration">Holidays by Declaration</option>
                      <option value="School Holiday">School Holiday</option><?php

                    }

                    if ($row['holiday_type'] === "Holidays by Declaration") {?>
                      <option value="National Holiday">National Holiday</option>
                      <option value="State Holiday">State Holiday</option>
                      <option value="School Holiday">School Holiday</option><?php

                    }

                     if ($row['holiday_type'] === "School Holiday") {?>
                      <option value="National Holiday">National Holiday</option>
                      <option value="State Holiday">State Holiday</option>
                      <option value="Holidays by Declaration">Holidays by Declaration</option><?php

                    }


                     ?>
                  </select>
              </div>
              <div style="margin-top: 10px;" class="form-group" style="width: 40%;">
                <label for="exampleInputEmail1">Description</label>

                <input type="desc" name="holiday_description" class="form-control" id="Description" value="<?php echo $row['holiday_description']; ?>" placeholder="Enter Description" required>
              </div>
            <div>
              <button type="submit" id="cancel" name="cancel" class="btn btn-primary">Cancel</button>
              <button type="submit" class="btn btn-primary" name="updateDate">Update</button>
            </div>   
          </form>
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
 $(document).ready(function(){  
      $('#cancel').click(function(){
        window.location.assign('date.php'); 
            
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
        minDate:moment().millisecond(0).second(0).minute(0).hour(0)
    });
    $('#reservationdate1').datetimepicker({
        format: 'DD-MM-Y',
        minDate:moment().millisecond(0).second(0).minute(0).hour(0)

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


<?php
if (isset($_POST['updateDate'])) {
  $holiday_id = $_POST['holiday_id'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $holiday_type = $_POST['holiday_type'];
  $holiday_description = $_POST['holiday_description'];




  $new_date_start1 = strtotime($startDate);
  $startDate = date("Y-m-d", $new_date_start1);


  $new_date_end1 = strtotime($endDate);
  $endDate = date("Y-m-d", $new_date_end1);

  if (empty($endDate) || empty($startDate) ) {
    echo "<script>alert('Empty Detail Date');
              window.location.href='editDate.php';
              </script>";
  } else {
    if ($startDate > $endDate) {
      echo "<script>alert('Start Date Cant More Than End Date');
              window.location.href='editDate.php';
              </script>"; 
    } else {
      updateDate($holiday_id, $startDate, $endDate, $holiday_type, $holiday_description);
    }
  }


  

  
  
}
?>


<?php 
if (isset($_POST['cancel'])) {
  echo "<script>
            window.location.href='date.php';
            </script>"; 
}

?>