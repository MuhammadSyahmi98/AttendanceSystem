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


  <?php 
  $year = 2020;
  $class_id = $_SESSION['class_id'];

  $nameOfMonth = array("mockup", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December",);


  $absent = $absent2 = $absent3 = $absent4 = $absent5 = $absent6 = $absent7 = $absent8 = $absent9 = $absent10 = $absent11 = $absent12 = 0; 

  $attend = $attend2 = $attend3 = $attend4 = $attend5 = $attend6 = $attend7 = $attend8 = $attend9 = $attend10 = $attend11 = $attend12 = 0;

  $attend_late = $attend_late2 = $attend_late3 = $attend_late4 = $attend_late5 = $attend_late6 = $attend_late7 = $attend_late8 = $attend_late9 = $attend_late10 = $attend_late11 = $attend_late12 = 0;

  $medical_leave = $medical_leave2 = $medical_leave3 = $medical_leave4 = $medical_leave5 = $medical_leave6 = $medical_leave7 = $medical_leave8 = $medical_leave9 = $medical_leave10 = $medical_leave11 = $medical_leave12 = 0; 







  $result = countAttendStatusByMonth(1,$year, $class_id);
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['attend_status']==="Absent") {
      $absent = $row['Status'];

    } else if ($row['attend_status']==="Attend") {
      $attend = $row['Status'];
      
    } else if ($row['attend_status']==="Attend Late") {
      $attend_late = $row['Status'];
      
    } else if ($row['attend_status']==="Medical Leave") {
      $medical_leave = $row['Status'];
      
    }
  }


  $result2 = countAttendStatusByMonth(2,$year, $class_id);
  while ($row2 = mysqli_fetch_assoc($result2)) {
    if ($row2['attend_status']==="Absent") {
      $absent2 = $row2['Status'];

    } else if ($row2['attend_status']==="Attend") {
      $attend2 = $row2['Status'];
      
    } else if ($row2['attend_status']==="Attend Late") {
      $attend_late2 = $row2['Status'];
      
    } else if ($row2['attend_status']==="Medical Leave") {
      $medical_leave2 = $row2['Status'];
      
    }
  }

  $result3 = countAttendStatusByMonth(3,$year, $class_id);

  while ($row3 = mysqli_fetch_assoc($result3)) {
    if ($row3['attend_status']==="Absent") {
      $absent3 = $row3['Status'];

    } else if ($row3['attend_status']==="Attend") {
      $attend3 = $row3['Status'];
      
    } else if ($row3['attend_status']==="Attend Late") {
      $attend_late3 = $row3['Status'];
      
    } else if ($row3['attend_status']==="Medical Leave") {
      $medical_leave3 = $row3['Status'];
      
    }
  }

  $result4 = countAttendStatusByMonth(4,$year, $class_id);

  while ($row4 = mysqli_fetch_assoc($result4)) {
    if ($row4['attend_status']==="Absent") {
      $absent4 = $row4['Status'];

    } else if ($row4['attend_status']==="Attend") {
      $attend4 = $row4['Status'];
      
    } else if ($row4['attend_status']==="Attend Late") {
      $attend_late4 = $row4['Status'];
      
    } else if ($row['attend_status']==="Medical Leave") {
      $medical_leave4 = $row4['Status'];
      
    }
  }

  $result5 = countAttendStatusByMonth(5,$year, $class_id);

  while ($row5 = mysqli_fetch_assoc($result5)) {
    if ($row5['attend_status']==="Absent") {
      $absent5 = $row5['Status'];

    } else if ($row5['attend_status']==="Attend") {
      $attend5 = $row5['Status'];
      
    } else if ($row5['attend_status']==="Attend Late") {
      $attend_late5 = $row5['Status'];
      
    } else if ($row5['attend_status']==="Medical Leave") {
      $medical_leave5 = $row5['Status'];
      
    }
  }

  $result6 = countAttendStatusByMonth(6,$year, $class_id);

  while ($row6 = mysqli_fetch_assoc($result6)) {
    if ($row6['attend_status']==="Absent") {
      $absent6 = $row6['Status'];

    } else if ($row6['attend_status']==="Attend") {
      $attend6 = $row6['Status'];
      
    } else if ($row6['attend_status']==="Attend Late") {
      $attend_late6 = $row6['Status'];
      
    } else if ($row6['attend_status']==="Medical Leave") {
      $medical_leave6 = $row6['Status'];
      
    }
  }

  $result7 = countAttendStatusByMonth(7,$year, $class_id);

  while ($row7 = mysqli_fetch_assoc($result7)) {
    if ($row7['attend_status']==="Absent") {
      $absent7 = $row7['Status'];

    } else if ($row7['attend_status']==="Attend") {
      $attend7 = $row7['Status'];
      
    } else if ($row7['attend_status']==="Attend Late") {
      $attend_late7 = $row7['Status'];
      
    } else if ($row7['attend_status']==="Medical Leave") {
      $medical_leave7 = $row7['Status'];
      
    }
  }

  $result8 = countAttendStatusByMonth(8,$year, $class_id);

  while ($row8 = mysqli_fetch_assoc($result8)) {
    if ($row8['attend_status']==="Absent") {
      $absent8 = $row8['Status'];

    } else if ($row8['attend_status']==="Attend") {
      $attend8 = $row8['Status'];
      
    } else if ($row8['attend_status']==="Attend Late") {
      $attend_late8 = $row8['Status'];
      
    } else if ($row8['attend_status']==="Medical Leave") {
      $medical_leave8 = $row8['Status'];
      
    }
  }

  $result9 = countAttendStatusByMonth(9,$year, $class_id);

  while ($row9 = mysqli_fetch_assoc($result9)) {
    if ($row9['attend_status']==="Absent") {
      $absent9 = $row9['Status'];

    } else if ($row9['attend_status']==="Attend") {
      $attend9 = $row9['Status'];
      
    } else if ($row9['attend_status']==="Attend Late") {
      $attend_late9 = $row9['Status'];
      
    } else if ($row9['attend_status']==="Medical Leave") {
      $medical_leave9 = $row9['Status'];
      
    }
  }

  $result10 = countAttendStatusByMonth(10,$year, $class_id);

  while ($row10 = mysqli_fetch_assoc($result10)) {
    if ($row10['attend_status']==="Absent") {
      $absent10 = $row10['Status'];

    } else if ($row10['attend_status']==="Attend") {
      $attend10 = $row10['Status'];
      
    } else if ($row10['attend_status']==="Attend Late") {
      $attend_late10 = $row10['Status'];
      
    } else if ($row10['attend_status']==="Medical Leave") {
      $medical_leave10 = $row10['Status'];
      
    }
  }

  $result11 = countAttendStatusByMonth(11,$year, $class_id);

  while ($row11 = mysqli_fetch_assoc($result11)) {
    if ($row11['attend_status']==="Absent") {
      $absent11 = $row11['Status'];

    } else if ($row11['attend_status']==="Attend") {
      $attend11 = $row11['Status'];
      
    } else if ($row11['attend_status']==="Attend Late") {
      $attend_late11 = $row11['Status'];
      
    } else if ($row11['attend_status']==="Medical Leave") {
      $medical_leave11 = $row11['Status'];
      
    }
  }

  $result12 = countAttendStatusByMonth(12,$year, $class_id);
  
  while ($row12 = mysqli_fetch_assoc($result12)) {
    if ($row12['attend_status']==="Absent") {
      $absent12 = $row12['Status'];

    } else if ($row12['attend_status']==="Attend") {
      $attend12 = $row12['Status'];
      
    } else if ($row12['attend_status']==="Attend Late") {
      $attend_late12 = $row12['Status'];
      
    } else if ($row12['attend_status']==="Medical Leave") {
      $medical_leave12 = $row12['Status'];
      
    }
  }

  $result13 = countStudentInAttendanceByClass($class_id);
  $row13 = mysqli_fetch_assoc($result13);
  $totalStudent = $row13['numberOfStudent'];

  


  ?>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Absent', 'Attend', 'Attend Late', 'Medical Leave'],
          ['January', <?php echo $absent/$totalStudent*100; ?>, <?php echo $attend/$totalStudent*100; ?>, <?php echo $attend_late/$totalStudent*100; ?>, <?php echo $medical_leave/$totalStudent*100; ?>],

          ['February', <?php echo $absent2/$totalStudent*100; ?>, <?php echo $attend2/$totalStudent*100; ?>, <?php echo $attend_late2/$totalStudent*100; ?>, <?php echo $medical_leave2/$totalStudent*100; ?>],

          ['March', <?php echo $absent3/$totalStudent*100; ?>, <?php echo $attend3/$totalStudent*100; ?>, <?php echo $attend_late3/$totalStudent*100; ?>, <?php echo $medical_leave3/$totalStudent*100; ?>],

          ['April', <?php echo $absent4/$totalStudent*100; ?>, <?php echo $attend4/$totalStudent*100; ?>, <?php echo $attend_late4/$totalStudent*100; ?>, <?php echo $medical_leave4/$totalStudent*100; ?>],

          ['May', <?php echo $absent5/$totalStudent*100; ?>, <?php echo $attend5/$totalStudent*100; ?>, <?php echo $attend_late5/$totalStudent*100; ?>, <?php echo $medical_leave5/$totalStudent*100; ?>],

          ['June',<?php echo $absent6/$totalStudent*100/$totalStudent*100; ?>, <?php echo $attend6/$totalStudent*100; ?>, <?php echo $attend_late6/$totalStudent*100; ?>, <?php echo $medical_leave6/$totalStudent*100; ?>],

          ['July', <?php echo $absent7/$totalStudent*100; ?>, <?php echo $attend7/$totalStudent*100; ?>, <?php echo $attend_late7/$totalStudent*100; ?>, <?php echo $medical_leave7/$totalStudent*100; ?>],

          ['August', <?php echo $absent8/$totalStudent*100; ?>, <?php echo $attend8/$totalStudent*100; ?>, <?php echo $attend_late8/$totalStudent*100; ?>, <?php echo $medical_leave8/$totalStudent*100; ?>],

          ['September', <?php echo $absent9/$totalStudent*100; ?>, <?php echo $attend9/$totalStudent*100; ?>, <?php echo $attend_late9/$totalStudent*100; ?>, <?php echo $medical_leave9/$totalStudent*100; ?>],

          ['October', <?php echo $absent10/$totalStudent*100; ?>, <?php echo $attend10/$totalStudent*100; ?>, <?php echo $attend_late10/$totalStudent*100; ?>, <?php echo $medical_leave10/$totalStudent*100; ?>],

          ['November', <?php echo $absent11/$totalStudent*100; ?>, <?php echo $attend11/$totalStudent*100; ?>, <?php echo $attend_late11/$totalStudent*100; ?>, <?php echo $medical_leave11/$totalStudent*100; ?>],

          ['December', <?php echo (($absent12/$totalStudent)*100); ?>, <?php echo (($attend12/$totalStudent)*100); ?>, <?php echo (($attend_late12/$totalStudent)*100); ?>, <?php echo (($medical_leave12/$totalStudent)*100); ?>]
        ]);

        var options = {
          chart: {
            title: 'Attendance Performance',
            subtitle: 'Attend, Attent Late, Absent, Medical Leave',

            
          },
          backgroundColor: '#f4f6f9',
          chartArea: {
            backgroundColor: {
            fill: '#f4f6f9'
            },
        },
        vAxis: {
    format: "#'%'"
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

    <section class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report By Month</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Chart Section -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
          </div>
        </div>
      </div>
      
    </section>

  <section class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
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
              <div class="card-body table-responsive p-0" style="height: 730px;">
                <table class="table table-head-fixed table-striped text-nowrap ">
                  <thead>
                    <tr>
                      <th>MONTH</th>
                      <th>TOTAL DAY</th>
                      <th>TOTAL ATTEND</th>
                      <th>TOTAL ATTEND LATE</th>
                      <th>TOTAL MEDICAL LEAVE</th>
                      <th>TOTAL ABSENT</th>
                      <th>TOTAL ATTENDANCE</th>
                      <th>PERCENTAGE(%)</th>
                      <th>ACTION</th>
                      
                      

                   
                    </tr>
                  </thead>
                  <tbody id="myTable">

                  <?php
                    


                    for($i=1;$i<=12;$i++) {

                      $data = countDayByMonthAndClass($class_id, $i);
                      $row14 = mysqli_fetch_assoc($data);

                      $data2 = countTotalAttentByMonthAndClass($class_id, $i);
                      $row15 = mysqli_fetch_assoc($data2);

                      $data3 = countTotalAttentLateByMonthAndClass($class_id, $i);
                      $row16 = mysqli_fetch_assoc($data3);

                      $data4 = countTotalMedicalLeaveByMonthAndClass($class_id, $i);
                      $row17 = mysqli_fetch_assoc($data4);

                      $data5 = countTotalAbsentByMonthAndClass($class_id, $i);
                      $row18 = mysqli_fetch_assoc($data5);

                      $data6 = countTotalAttendanceByMonthAndClass($class_id, $i);
                      $row19 = mysqli_fetch_assoc($data6);


                      ?>
                     <tr>
                       <td><?php echo $nameOfMonth[$i]; ?></td>
                       <td><?php if (empty($row14['numberOfDayByMonth'])) {
                         echo "-";
                       } else {echo $row14['numberOfDayByMonth'];} ?></td>

                       <td><?php if (empty($row15['numberOfAttendStudent'])) {
                         echo "-";
                       } else {echo $row15['numberOfAttendStudent'];} ?></td>


                       <td><?php if (empty($row16['numberOfAttendLateStudent'])) {
                         echo "-";
                       } else {echo $row16['numberOfAttendLateStudent'];} ?></td>

                       <td><?php if (empty($row17['numberOfMedicalLeaveStudent'])) {
                         echo "-";
                       } else {echo $row17['numberOfMedicalLeaveStudent'];} ?></td>
                       

                       <td><?php if (empty($row18['numberOfAbsentStudent'])) {
                         echo "-";
                       } else {echo $row18['numberOfAbsentStudent'];} ?></td>


                       <td><?php if (empty($row19['numberOfAttendaceStudent'])) {
                         echo "-";
                       } else {echo $row19['numberOfAttendaceStudent'];} ?></td>





                       <?php

                       if (empty($row15['numberOfAttendStudent'])) {
                         $totalAttend = 0;
                       } else {
                          $totalAttend = $row15['numberOfAttendStudent'];
                       }


                       if (empty($row16['numberOfAttendLateStudent'])) {
                         $totalAttendLate = 0;
                       } else {
                          $totalAttendLate = $row16['numberOfAttendLateStudent'];
                       }

                       $totalAttendance = $row19['numberOfAttendaceStudent'];

                       if (!empty($totalAttendance)) {
                         $percentAttendance = (($totalAttend+$totalAttendLate)/$totalAttendance)*100;
                       }





                        ?>


                       <td><?php if (empty($percentAttendance)) {
                         echo "-";
                       } else {echo round($percentAttendance);} ?></td>






                       <td> <button class="btn btn-primary btn-sm" name="viewClass">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                              </td>
                     </tr> <?php
                      
                    }

                   ?>


                   
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

