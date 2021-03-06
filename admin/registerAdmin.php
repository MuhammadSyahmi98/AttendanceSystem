<?php
include "../resources/php/sql.php";

?>

<?php
session_start();
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

  <title>Register Class</title>

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

   <!-- Navbar -->
  <?php  include "navAdmin.php"; ?>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Admin Registration</h1>

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

              <form role="form" method="POST">

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputName">Name</label>

                    <input type="name" name="admin_name" class="form-control" placeholder="Enter Name" required>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputName">Email</label>

                    <input type="email" name="admin_email" class="form-control" placeholder="Enter Email" required>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputName">Contact Number</label>

                    <input type="name" name="admin_contact" class="form-control" placeholder="Enter Contact Number: XXX-XXXXXXX Or XXX-XXXXXXXX" required>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputName">Password</label>

                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputName">Re-Password</label>

                    <input type="password" name="rePassword" class="form-control" placeholder="Enter Password" required>

                  </div>

                  
              </div>

                <div class="card-footer">
                  <button type="submit" id="cancel" name="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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



<!-- AdminLTE for demo purposes -->

<script src="../dist/js/demo.js"></script>


<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>  
 $(document).ready(function(){  
      $('#cancel').click(function(){
        window.location.assign('listAdmin.php'); 
            
      });  
 });  
 </script> 


</body>

</html>

<?php 
if (isset($_POST['submit'])) {
  $name = $_POST['admin_name'];
  $email = $_POST['admin_email'];
  $password = $_POST['password']; 
  $rePassword = $_POST['rePassword'];
  $admin_contact = $_POST['admin_contact'];

  if(preg_match("/^[A-Z][a-zA-Z -]+$/", $name) === 0) {
  echo "<script>alert('Name must be from letters, dashes, spaces and must not start with dash');
             
              </script>";

  } else {
    if(preg_match("/^[0-9]{3}-[0-9]{7}$/", $admin_contact) === 0) {
      
      if(preg_match("/^[0-9]{3}-[0-9]{8}$/", $admin_contact) === 0){
         echo "<script>alert('Wrong Phone Number Format: 012-12412345 or 012-1241234');
                  window.location.href='registerAdmin.php';
                  </script>";
      } else {
            if ($password === $rePassword) {
              addAdmin($name, $email, $password, $admin_contact);


            } else {
              echo "<script>alert('Password Doesnt Match. Please Try Again');
                      window.location.href='registerAdmin.php';
                      </script>";
            }
        }

    } else {
        if ($password === $rePassword) {
          addAdmin($name, $email, $password, $admin_contact);


        } else {
          echo "<script>alert('Password Doesnt Match. Please Try Again');
                  window.location.href='registerAdmin.php';
                  </script>";
        }
    }
    
  }

  



}


?>
