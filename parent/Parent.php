<?php include "../resources/php/sql.php"; ?>
<?php session_start();

$parent_id= $_SESSION['parent_id'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student</title>
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
<!-- Site wrapper -->
<div class="wrapper">
   <?php include "navParent.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card" >
             
              <div class="card-body table-responsive p-0" style="height: 500px;" >
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                      <tr>
                      <th>
                          No.
                      </th>
                      <th>
                          Name
                      </th>
                      <th>
                          IC Number
                      </th>
                      <th>
                          Class
                      </th>
                      <th>
                          Teacher Name
                      </th>
                      <th>
                          Teacher Contact Number
                      </th>
                      <th>
                          Teacher Email
                      </th>
                      <th>
                        Action
                      </th>   
                  </tr>   
                  </thead>
                  <tbody>
                    <?php $result = displaySpecificStudent($parent_id); 
                     $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['student_name']; ?></td>
                      <td><?php echo $row['student_ic']; ?></td>
                      <td><?php echo $row['class_name']; ?></td>
                      <td><?php echo $row['teacher_name']; ?></td>
                      <td><?php echo $row['teacher_contact']; ?></td>
                      <td><?php echo $row['teacher_email']; ?></td>
                      <td>
                        <form method="POST">

                          <input type="hidden" name="id" value="<?php echo $row['student_id']; ?>"> 

                          <button class="btn btn-primary btn-sm" name="viewstudent">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                        </form>
                      </td>
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


<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>


<?php 
if (isset($_POST['viewstudent'])) {
    $_SESSION['student_id']= $_POST['id'];
    echo "<script>window.location.assign('ajaxindex.php')</script>";
}

?>
