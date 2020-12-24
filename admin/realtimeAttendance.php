<?php   include "../resources/php/sql.php"; session_start(); ?>
<?php $date = date("Y-m-d"); ?>


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
                <h3 class="card-title">Daily Log: <b> <?php echo $date; ?></b></h3>


                
              </div>
              <div class="card-body table-responsive p-0" style="height: 500px;" >
                <table class="table table-head-fixed text-nowrap">
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
                      <th>
                        Time-out
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
                      <td><?php if(empty($row['time_out'])){
                        echo "-";
                      } else {
                        echo $row['time_out'];
                      } ?></td>
                      <td>Attend</td>
                      
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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
