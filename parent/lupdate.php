<?php
  include "../resources/php/sql.php"; 

  session_start();
  
?>



<?php
$loggedIn = $_SESSION['loggedIn'];

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
  <title>Edit Student</title>
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
  <?php  include "navParent.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Details</h1>
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

                  <?php

                    $parent_id = $_SESSION['parent_id'];
                    $result = parentDisplayByID($parent_id);
                    $row = mysqli_fetch_assoc($result);
                  ?>


                  
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="name" name="parent_name" class="form-control" value="<?php echo $row['parent_name']; ?>"  placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName">Email</label>
                    <input type="email" name="parent_email" class="form-control" value="<?php echo $row['parent_email']; ?>"  placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">Contact Number</label>
                    <input class="form-control" name="parent_contact" value="<?php echo $row['parent_contact']; ?>"  placeholder="Enter Contact Number" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="cancel" id="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="updateParent" class="btn btn-primary">Update</button>
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

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

</body>
</html>


<?php 
if (isset($_POST['updateParent'])) {
  $parent_id = $_SESSION['parent_id'];

  $parent_name = $_POST['parent_name'];
  $parent_email = $_POST['parent_email'];
  $parent_contact = $_POST['parent_contact'];


  if(preg_match("/^[A-Z][a-zA-Z - ' .]+$/", $parent_name) === 0) {
  echo "<script>alert('Name must be from letters, dashes, spaces and must not start with dash');
             window.location.href='lupdate.php';
              </script>";

  } else {
    if(preg_match("/^[0-9]{3}-[0-9]{7}$/", $parent_contact) === 0) {
      
      if(preg_match("/^[0-9]{3}-[0-9]{8}$/", $parent_contact) === 0){
         echo "<script>alert('Wrong Phone Number Format: 012-12412345 or 012-1241234');
                  window.location.href='lupdate.php';
                  </script>";
      } else {
          updateParent1($parent_id, $parent_name, $parent_email, $parent_contact);
        }   


        }

     else {
        updateParent1($parent_id, $parent_name, $parent_email, $parent_contact);
      
    }
        
    }


}


?>