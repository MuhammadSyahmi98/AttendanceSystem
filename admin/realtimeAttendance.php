<?php   include "../resources/php/sql.php"; session_start(); ?>
<?php $date = date("Y-m-d"); ?>
<?php $dates = date("d-m-Y"); ?>
<?php $day = date("l"); ?>
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
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">

      <div class="row">
          <div class="col-12">
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">Daily Log: <b> <?php echo $day." ".$dates; ?> </b></h3>


                
              </div>
              <div class="card-body table-responsive p-0" style="height: 500px;" >
                <table id="" class="table table-striped text-nowrap">
                  <thead>
                      <tr>
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
                        Time-in
                      </th>
                      <th>Status</th>
                  </tr>   
                  </thead>
                  <tbody id="myTable">
                    <?php $result = displayCurrentDateAttendance($date); 
                     $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>

                    <tr>
                      <td><?php echo $row['student_id']; ?></td>
                      <td><?php echo $row['student_name']; ?></td>
                      <?php 

                      $result9 = displayClassByID($row['class_id']); 
                      $row9 = mysqli_fetch_assoc($result9);

                      ?>



                      <td><?php echo $row9['class_name']; ?></td>
                      <td><?php echo $row['time_in']; ?></td>
                      <td><?php echo $row['attend_status']; ?></td>
                      
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

<!-- jQuery -->

<!-- Bootstrap 4 -->

<!-- DataTables -->

</body>
</html>


