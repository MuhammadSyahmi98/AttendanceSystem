<?php include "../resources/php/sql.php"; session_start(); ?>


<?php




$loggedIn = $_SESSION['loggedIn'];
$month1 = $_GET['month'];
$_SESSION['current_month'] = $month1;
$class_id = $_SESSION['class_id'];

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
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed" >
<!-- Site wrapper -->
  <?php $result0 = countTotalAttendanceByMonthByClass($month1, $class_id);
                      $row0 = mysqli_fetch_assoc($result0); ?>
    <!--Part All  -->
    <!--  -->
    <!--  -->
    <div style="<?php if ($month1 ==="0" || empty($row0['totalAttendance'])) {
     ?>  display: none; <?php
    } ?>">

    


    <section class="content-header" > 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail</h1>
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
                <table id="example1" class="table table-striped text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Type Status</th>
                      <th>Total</th>
                      <th>Total Attendance</th>
                      <th>Percentage</th>
                      <th>View</th>
                      
                      

                   
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <!-- Get attend data by month -->
                    <?php

                      // Count attendance by month
                      
                      $totalAttendance = $row0['totalAttendance'];


                      // Attend by month
                      $result = countAttendByMonthByClass($month1, $class_id);
                      $row = mysqli_fetch_assoc($result);
                      if (empty($row['totalAttend'])) {
                        $totalAttend = 0;
                      } else {
                        $totalAttend = $row['totalAttend'];
                      }



                      // Attend Late by month
                      $result2 = countAttendLateByMonthByClass($month1, $class_id);
                      $row2 = mysqli_fetch_assoc($result2);
                      if (empty($row2['totalAttendLate'])) {
                        $totalAttendLate = 0;
                      } else {
                        $totalAttendLate = $row2['totalAttendLate'];
                      }
                      


                      // Attend Late by month
                      $result3 = countAbsentByMonthByClass($month1, $class_id);
                      $row3 = mysqli_fetch_assoc($result3);
                      if (empty($row3['totalAbsent'])) {
                        $totalAbsent = 0;
                      } else {
                        $totalAbsent = $row3['totalAbsent'];
                      }


                      // Medical Leave Late by month
                      $result4 = countMedicalLeaveByMonthByClass($month1, $class_id);
                      $row4 = mysqli_fetch_assoc($result4);
                      if (empty($row4['totalMedicalLeave'])) {
                        $totalMedicalLeave = 0;
                      } else {
                        $totalMedicalLeave = $row4['totalMedicalLeave'];
                      }
                      


                      // Other Late by month
                      $result5 = countOtherByMonthByClass($month1, $class_id);
                      $row5 = mysqli_fetch_assoc($result5);
                      if (empty($row5['totalOther'])) {
                        $totalOther = 0;
                      } else {
                        $totalOther = $row5['totalOther'];
                      }

                    ?>
                  
                    <tr>
                       <td>1</td>
                       <td>Attend</td>
                       <td><?php echo $totalAttend ?></td>
                       <td><?php echo $totalAttendance ?></td>
                       <td><?php echo round($totalAttend/$totalAttendance*100,1)."%"; ?></td>
                       <td>
                        <form method="post">
                          
                          <input type="hidden" name="month" value="<?php echo $month1; ?>">
                          <button class="btn btn-primary btn-sm" name="viewAttend">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>
                    



                    <tr>
                       <td>2</td>
                       <td>Attend Late</td>
                       <td><?php echo $totalAttendLate ?></td>
                       <td><?php echo $totalAttendance ?></td>
                       <td><?php echo round($totalAttendLate/$totalAttendance*100,1)."%"; ?></td>
                       <td>
                        <form method="post">
                          
                          <input type="hidden" name="month" value="<?php echo $month1; ?>">
                          <button class="btn btn-primary btn-sm" name="viewAttendLate">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>
                    


                    <tr>
                       <td>3</td>
                       <td>Absent</td>
                       <td><?php echo $totalAbsent ?></td>
                       <td><?php echo $totalAttendance ?></td>
                       <td><?php echo round($totalAbsent/$totalAttendance*100,1)."%"; ?></td>
                       <td>
                        <form method="post">
                          
                          <input type="hidden" name="month" value="<?php echo $month1; ?>">
                          <button class="btn btn-primary btn-sm" name="viewAbsent">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>
                    


                    <tr>
                       <td>4</td>
                       <td>Medical Leave</td>
                       <td><?php echo $totalMedicalLeave ?></td>
                       <td><?php echo $totalAttendance ?></td>
                       <td><?php echo round($totalMedicalLeave/$totalAttendance*100,1)."%"; ?></td>
                       <td>
                        <form method="post">
                          
                          <input type="hidden" name="month" value="<?php echo $month1; ?>">
                          <button class="btn btn-primary btn-sm" name="viewMedicalLeave">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>

                    <tr>
                       <td>5</td>
                       <td>Other</td>
                       <td><?php echo $totalOther ?></td>
                       <td><?php echo $totalAttendance ?></td>
                       <td><?php echo round($totalOther/$totalAttendance*100,1)."%"; ?></td>
                       <td>
                        <form method="post">
                          
                          <input type="hidden" name="month" value="<?php echo $month1; ?>">
                          <button class="btn btn-primary btn-sm" name="viewOther">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>

                    <tr>
                       <td>5</td>
                       <td>All</td>
                       <td><?php echo $totalAttendance; ?></td>
                       <td><?php echo $totalAttendance; ?></td>
                       <td><?php echo "100%"; ?></td>
                       <td>
                        <form method="post">
                          
                          <input type="hidden" name="month" value="<?php echo $month1; ?>">
                          <button class="btn btn-primary btn-sm" name="viewAll">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>
                    
                    
                    
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


<?php 
if (isset($_POST['viewAttend'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Attend";
  echo "<script>window.location.assign('listOfStudentByMonth.php')</script>";
}
?>

<?php 
if (isset($_POST['viewAttendLate'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Attend Late";
  echo "<script>window.location.assign('listOfStudentByMonth.php')</script>";
}
?>


<?php 
if (isset($_POST['viewAbsent'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Absent";
  echo "<script>window.location.assign('listOfStudentByMonth.php')</script>";
}
?>


<?php 
if (isset($_POST['viewMedicalLeave'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Medical Leave";
  echo "<script>window.location.assign('listOfStudentByMonth.php')</script>";
}
?>


<?php 
if (isset($_POST['viewOther'])) {
  $_SESSION['current_month'] = $_POST['month'];
  $_SESSION['status_student'] = "Other";
  echo "<script>window.location.assign('listOfStudentByMonth.php')</script>";
}
?>
