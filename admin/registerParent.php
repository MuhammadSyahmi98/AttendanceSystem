

<!-- Refresh the page and will resit the UIDContainer to empty. The RFID will show nothing -->
<?php
  include "../resources/php/sql.php"; session_start();
  $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
  file_put_contents('../UIDContainer.php',$Write);
?>

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
  <title>Parent Student</title>
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
            <h1>Parent Registration</h1>
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
                    <input type="name" name="parent_name" class="form-control"  placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName">Email</label>
                    <input type="email" name="parent_email" class="form-control"  placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">Contact Number</label>
                    <input class="form-control" name="parent_contact"  placeholder="Enter Contact Number" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">Password</label>
                    <input type="password" class="form-control" name="parent_password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputICNumber">Re-Password</label>
                    <input type="password" name="parent_rePassword" class="form-control"  placeholder="Enter Re-Password" required>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="cancel" id="cancel" class="btn btn-primary">Cancel</button>
                  <button type="submit" name="addParent" class="btn btn-primary">Submit</button>
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
<script>  
 $(document).ready(function(){  
      $('#cancel').click(function(){
        window.location.assign('parentList.php'); 
            
      });  
 });  
 </script> 
</body>
</html>



<?php
if (isset($_POST['addParent'])) {
  $parent_name = $_POST['parent_name'];
  $parent_email = $_POST['parent_email'];
  $parent_contact = $_POST['parent_contact'];
  $parent_password = $_POST['parent_password'];
  $parent_rePassword = $_POST['parent_rePassword'];



  if(preg_match("/^[A-Z][a-zA-Z - . \ ']+$/", $parent_name) === 0) {
  echo "<script>alert('Name must be from letters, dashes, spaces and must not start with dash');
             window.location.href='registerParent.php';
              </script>";

  } else {
    if(preg_match("/^[0-9]{3}-[0-9]{7}$/", $parent_contact) === 0) {
      
      if(preg_match("/^[0-9]{3}-[0-9]{8}$/", $parent_contact) === 0){
         echo "<script>alert('Wrong Phone Number Format: 012-12412345 or 012-1241234');
                  window.location.href='registerParent.php';
                  </script>";
      } else {
         if ($parent_password != $parent_rePassword) {
            echo "<script>
          alert('Password Not Match');
          </script>";
          } else {

            $test = $_SESSION['allstudent'];
            
            if ($test===12) {
              $code = 12;
            } else if($test ===9) {
              $code = 9;
            } else if ($test ===23) {
              $code = 23;
            }

            $result = addParent($parent_name, $parent_email, $parent_contact, $parent_password,$code);
            if ($result) {
              // send_emailParent($parent_email, $parent_password);
              if ($code === 12) {
                echo "<script>alert('Successfully Register Parent');
                window.location.href='registerStudent2.php';
                </script>";

                return $result;

              } else if($code === 9) {
                echo "<script>alert('Successfully Register Parent');
                window.location.href='registerStudent.php';
                </script>";
                return $result;
              } else if($code === 23) {
                echo "<script>alert('Successfully Register Parent');
                window.location.href='parentList.php';
                </script>";
                
              }
            }
            
          }
        }   


        }

     else {

      if ($parent_password != $parent_rePassword) {
        echo "<script>
      alert('Password Not Match');
      </script>";
      } else {

        $test = $_SESSION['allstudent'];
        
        if ($test===12) {
          $code = 12;
        } else if($test ===9) {
          $code = 9;
        } else if ($test ===23) {
          $code = 23;
        }

        $result = addParent($parent_name, $parent_email, $parent_contact, $parent_password,$code);
        if ($result) {
              // send_emailParent($parent_email, $parent_password);
              if ($code === 12) {
                echo "<script>alert('Successfully Register Parent');
                window.location.href='registerStudent2.php';
                </script>";

                return $result;

              } else if($code === 9) {
                echo "<script>alert('Successfully Register Parent');
                window.location.href='registerStudent.php';
                </script>";
                return $result;
              } else if($code === 23) {
                echo "<script>alert('Successfully Register Parent');
                window.location.href='parentList.php';
                </script>";
                
              }
            }
        
      }
    }
        
    }
    
  }




?>


<?php

function send_emailParent($email, $password){

   $link="<a href='http://localhost/attendancesystem/'>Click To Login</a>";


    require_once('../PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "attendancesystem.my@gmail.com";
    // GMAIL password
    $mail->Password = "Qwerty@123";
    $mail->SMTPSecure = "tls";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = 587;
    $mail->From='attendancesystem.my@gmail.com';
    $mail->FromName='attendancesystem.my';
    $mail->AddAddress($email);
    $mail->Subject  =  'Welcome To Online Attendance System';
    $mail->IsHTML(true);
    $mail->Body    = '<p>Welcome to Online Attendance System. Below is your account detail. <br>Username: '.$email.'<br>Password: '.$password.'  <br> Click this link to login '.$link.'</p>';
   $mail->Send();
}

 ?>


