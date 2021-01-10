<?php include "../resources/php/sql.php"; session_start(); ?>


<?php

$loggedIn = $_SESSION['loggedIn'];
$month1 = $_GET['month'];
$_SESSION['current_month'] = $month1;
$student_id = $_SESSION['student_id'];

if ($loggedIn!=1111) {
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
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed" >
<!-- Site wrapper -->
  <?php $result0 = countTotalAttendanceStudentByMonthByClass($month1, $student_id);
                      $row0 = mysqli_fetch_assoc($result0); ?>
    <!--Part All  -->
    <!--  -->
    <!--  -->
    <div style="<?php if ($month1 ==="0" || empty($row0['totalAttendance'])) {
     ?>  display: none; <?php
    } ?>">

    


    <!--<section class="content-header" > 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail</h1>
          </div>
        </div>
      </div> /.container-fluid 
    </section>-->


  </div>

</body>



 


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



</html>



