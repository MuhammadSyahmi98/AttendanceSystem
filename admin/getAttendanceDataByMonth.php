<?php include "../resources/php/sql.php"; session_start(); ?>


<?php




$loggedIn = $_SESSION['loggedIn'];
$month = $_GET['month'];

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

    <!--Part All  -->
    <!--  -->
    <!--  -->
    <div style="<?php if ($month ==="0") {
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
                      <th>Total Attend</th>
                      <th>Total Attendance</th>
                      <th>Percentage</th>
                      <th>View</th>
                      
                      

                   
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <!-- Get attend data by month -->
                    <?php



                    ?>
                    <tr>
                       <td>1</td>
                       <td>Attend</td>
                       <td>120</td>
                       <td>240</td>
                       <td>30%</td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="id$i" value="<?php echo $row['admin_id']; ?>">

                          <button class="btn btn-primary btn-sm" name="viewAdmin">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>



                    <tr>
                       <td>1</td>
                       <td>Attend Late</td>
                       <td>120</td>
                       <td>240</td>
                       <td>30%</td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="id$i" value="<?php echo $row['admin_id']; ?>">

                          <button class="btn btn-primary btn-sm" name="viewAdmin">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>
                    



                    <tr>
                       <td>1</td>
                       <td>Absent</td>
                       <td>120</td>
                       <td>240</td>
                       <td>30%</td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="id$i" value="<?php echo $row['admin_id']; ?>">

                          <button class="btn btn-primary btn-sm" name="viewAdmin">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>
                    


                    <tr>
                       <td>1</td>
                       <td>Medical Leave</td>
                       <td>120</td>
                       <td>240333</td>
                       <td>30%</td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="id$i" value="<?php echo $row['admin_id']; ?>">

                          <button class="btn btn-primary btn-sm" name="viewAdmin">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                       </td>
                      
                      
                      
                    </tr>
                    


                    <tr>
                       <td>1</td>
                       <td>Other</td>
                       <td>120</td>
                       <td>240</td>
                       <td>30%</td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="id$i" value="<?php echo $row['admin_id']; ?>">

                          <button class="btn btn-primary btn-sm" name="viewAdmin">
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

