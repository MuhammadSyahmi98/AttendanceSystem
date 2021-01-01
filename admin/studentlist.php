<?php include "../resources/php/sql.php"; session_start(); ?>
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
  <title>Student List</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php  include "navAdmin.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php 
            $class_id1=$_SESSION['class_id'];
            $result = displayClassByID($class_id1);
             $row = mysqli_fetch_assoc($result);

            ?>
            <h1>Student List of <?php echo $row['class_name']; ?></h1>
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
                    <input id="myInput" type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="input-group-append">
                      
                      <button type="submit" class="btn btn-primary" style="margin-left: 10px;" onclick="location.href='registerstudent.php';">Add</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>IC NUMBER</th>
                      <th>Parent Name</th>
                      <th>Parent Contact Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <?php 

                    $class_id1=$_SESSION['class_id'];
                    $result = displayStudentByClass($class_id1);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>
                    <tr>
                      <td><?php echo $row['student_id'] ?></td>
                      <td><?php echo $row['student_name']; ?></td>
                      <td><?php echo $row['student_ic']; ?></td>
                      <td><?php echo $row['parent_name']; ?></td>
                      <td><?php echo $row['parent_contact']; ?></td>
                      <td>
                        <form method="POST" action="studentlist.php">

                          <input type="hidden" name="idy$i" value="<?php echo $row['student_id']; ?>">
                          <input type="hidden" name="id$i" value="<?php echo $class_id1; ?>">

                          <button class="btn btn-primary btn-sm" name="viewDetailStudent">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </button>
                          <button class="btn btn-info btn-sm" name="editDetailStudent">
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>


<?php 
if (isset($_POST['viewDetailStudent'])) {
  $_SESSION['student_id'] = $_POST['idy$i'];
  $_SESSION['class_id'] = $_POST['id$i'];
  echo "<script>window.location.assign('viewStudent.php')</script>";
  
}

?>

<?php 
if (isset($_POST['editDetailStudent'])) {
  $_SESSION['student_id'] = $_POST['idy$i'];
   $_SESSION['pageStudentList'] = 2;
  echo "<script>window.location.assign('editStudent.php')</script>";
  
}

?>


<?php 
if (isset($_POST['deleteDetailStudent'])) {
  $student_id = $_POST['idy$i'];
  deleteStudent($student_id);
}

?>