<?php include "../resources/php/sql.php"; session_start();?>

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

  <title>Edit Admin</title>

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

     <?php include "navAdmin.php"; ?>


  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Edit Admin</h1>

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

              <div>

              <form method="POST">

                <div class="card-body">
                  <?php
                    $admin_id = $_SESSION['admin_id'];
                    $result = displayAdminByID($admin_id);
                    $row = mysqli_fetch_assoc($result);
                    ?>

                  <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                  <div class="form-group">

                    <label for="exampleInputName">Name</label>
                    <input type="name" name="admin_name" class="form-control" value="<?php echo $row['admin_name']; ?>">

                  </div>


                  <div class="form-group">

                    <label for="exampleInputName">Email</label>

                    
                    <input type="email" name="admin_email" class="form-control" value="<?php echo $row['admin_email']; ?>">

                  </div>


                  

                 
                  
              </div>

                <div class="card-footer">
                  <button type="submit" id="cancel" name="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="updateAdmin" class="btn btn-primary">Update</button>
                </div>
              </form>

               

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

<!-- AdminLTE App -->






<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
 

</body>

</html>


<?php
if (isset($_POST['updateAdmin'])) {
  $admin_id = $_POST['admin_id'];
  $name = $_POST['admin_name'];
  $email = $_POST['admin_email'];
  updateAdmin($admin_id, $name, $email);

}

?>


<?php 
if (isset($_POST['cancel'])) {
   echo "<script>window.location.assign('listAdmin.php')</script>";
}

?>


