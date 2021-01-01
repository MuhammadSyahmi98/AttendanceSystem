<?php   include "resources/php/sql.php"; session_start(); ?>

<?php 

if (empty($_SESSION['loggedIn'])) {
  $loggedIn = 0;
} else {
  $loggedIn = $_SESSION['loggedIn'];
}


if(empty($_SESSION['type'])){
  $type = '';
} else {
  $type = $_SESSION['type'];
}


if($loggedIn=== 893247348){
  
  if ($type === "admin") {
     echo "<script>
              window.location.href='admin/admin.php';
              </script>";
} else if ($loggedIn===9999) {
  if ($type==="teacher") {
    echo "<script>
              window.location.href='teacher/Teacher.php';
              </script>";
  }
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="resources/style.css">
  <title>LOGIN</title>



  <!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="resources/style/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="resources/style/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="resources/style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="resources/style/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="resources/style/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="resources/style/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="resources/style/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="resources/style/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="resources/style/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="resources/style/css/util.css">
  <link rel="stylesheet" type="text/css" href="resources/style/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
        <form class="login100-form validate-form flex-sb flex-w" method="POST">
          <span class="login100-form-title p-b-32">
            Online Attendance 
          </span>

          <span class="txt1 p-b-11">
            Email
          </span>
          <div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
            <input class="input100" type="text" name="email" >
            <span class="focus-input100"></span>
          </div>
          
          <span class="txt1 p-b-11">
            Password
          </span>
          <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
            <span class="btn-show-pass">
              <i class="fa fa-eye"></i>
            </span>
            <input class="input100" type="password" name="password" >
            <span class="focus-input100"></span>
          </div>
          
          <div class="flex-sb-m w-full p-b-48">
            
            <div>
              
              <a href="resitEmail.php" class="txt3">
                Forgot Password?
              </a>
            </div>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="login">
              Login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>



<!--===============================================================================================-->
  <script src="resources/style/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="resources/style/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="resources/style/vendor/bootstrap/js/popper.js"></script>
  <script src="resources/style/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="resources/style/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="resources/style/vendor/daterangepicker/moment.min.js"></script>
  <script src="resources/style/vendor/daterangepicker/daterangepicker.js"></script>
<!--===========resources/style/====================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="resources/style/js/main.js"></script>


</body>












<!-- <div class="animated bounceInDown">
  <div style="margin-top: 2.5%;" class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" method="POST">
      <h4>My<span>Attendance</span></h4>
      <h5>Sign in to your account.</h5>
        <input type="text" name="email" placeholder="Email" autocomplete="off" required="Enter Email">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off" required="Enter Password">
        
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" name="login" value="Sign in" class="btn1">
      </form>
       
  </div> 
    
</div> -->

</html>


<?php 
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  if (empty($email) || empty($password)) {
    echo "<script>
              window.location.href='index.php';
              </script>";
  } else {
    $test = verifyAdmin($email, $password);
    if ($test === 9985) {

      $_SESSION['loggedIn'] = 893247348;
      $_SESSION['type'] = "admin";
       echo "<script>
              window.location.href='admin/admin.php';
             </script>";
    } else {
        $test = verifyTeacher($email, $password);
        if ($test === 2345) {

          $result = displayTeacherByEmail($email);
          $data = mysqli_fetch_assoc($result);

          $_SESSION['loggedIn'] = 9999;
          $_SESSION['teacher_id'] = $data['teacher_id'];
          $_SESSION['class_id'] = $data['class_id'];
          $_SESSION['type'] = "teacher";



          echo "<script>
              window.location.href='teacher/Teacher.php';
              </script>";


        }
        else{
          echo "<script>alert('PLEASE TRY AGAIN');
              window.location.href='index.php';
              </script>";
        }


    }
  }





}

?>