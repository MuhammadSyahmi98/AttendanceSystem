<?php include "../resources/php/sql.php"; ?>
<?php session_start();?>
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
  <title>Admin</title>
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
   <?php include "navAdmin.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Admin</h1>
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
              <div class="card-header">
                <h3 class="card-title"></h3>


                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 74px;">
                    <div class="">
                      
                      <button type="submit" class="btn btn-primary"  onclick="location.href='registerAdmin.php';">Add</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-striped text-nowrap">
                  <thead>
                      <tr>
                      <th>
                          No.
                      </th>
                      <th>
                          Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>Contact Number</th>
                      <th>
                        Action
                      </th> 
                  </tr>   
                  </thead>
                  <tbody id="myTable">
                    <?php $result = displayAdmin(); 
                     $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
        
                    
                    ?>


                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['admin_name']; ?></td>
                        <td><?php echo $row['admin_email']; ?></td>
                        <td><?php echo $row['admin_contact']; ?></td>
                        <td>
                        <form method="post">

                          <input type="hidden" name="id$i" value="<?php echo $row['admin_id']; ?>">

                          <button class="btn btn-primary btn-sm" name="viewAdmin">
                            <i class="fas fa-folder">
                              </i>
                              View
                          </button> 
                              
                          
                          <button class="btn btn-info btn-sm" name="editAdmin">
                              <i class="fas fa-pencil-alt" >
                              </i>
                              Edit
                          </button>
                          <button class="btn btn-danger btn-sm" name="deleteAdmin" OnClick="return confirm('Confirm to delete this data?');"  style="<?php if ($i===1) {
                            ?>display: none; <?php
                          } ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
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

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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
</body>
</html>


<?php 
if (isset($_POST['viewAdmin'])) {
    $_SESSION['admin_id']=$_POST['id$i'];
    echo "<script>window.location.assign('viewAdmin.php')</script>";
}

?>

<?php 
if (isset($_POST['editAdmin'])) {
    $_SESSION['admin_id']=$_POST['id$i'];
    echo "<script>window.location.assign('editAdmin.php')</script>";
}

?>

<?php 
if (isset($_POST['deleteAdmin'])) {
    $admin_id = $_POST['id$i'];
    deleteAdmin($admin_id);
   
}

?>






