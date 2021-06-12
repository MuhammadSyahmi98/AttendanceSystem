<?php include "resources/php/sql.php";
session_start(); ?>

<?php

if (empty($_SESSION['loggedIn'])) {
  $loggedIn = 0;
} else {
  $loggedIn = $_SESSION['loggedIn'];
}


if (empty($_SESSION['type'])) {
  $type = '';
} else {
  $type = $_SESSION['type'];
}


if ($loggedIn === 893247348) {

  if ($type === "admin") {
    echo "<script>
              window.location.href='admin/admin.php';
              </script>";
  }
}

if ($loggedIn === 9999) {
  if ($type === "teacher") {
    echo "<script>
              window.location.href='teacher/Teacher.php';
              </script>";
  }
}

if ($loggedIn === 1111) {
  if ($type === "parent") {
    echo "<script>
              window.location.href='parent/Parent.php';
              </script>";
  }
}


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="resources/style.css">
  <title>LOGIN</title>



  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="resources/style/images/icons/favicon.ico" />
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
          <div class="wrap-input100 validate-input m-b-36" data-validate="Valid email is: a@gmail.com">
            <input id="email" class="input100" type="text" name="email">
            <span class="focus-input100"></span>
          </div>

          <span class="txt1 p-b-11">
            Password
          </span>
          <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
            <span class="btn-show-pass">
              <i class="fa fa-eye"></i>
            </span>
            <input id="password" class="input100" type="password" name="password">
            <span class="focus-input100"></span>
          </div>

          <div class="flex-sb-m w-full p-b-48">

            <div>

              <a href="resitEmail.php" class="txt3">
                Forgot Password?
              </a>
            </div>
          </div>

          <div class="container-login100-form-btn" style="margin-bottom: 15px;">
            <button class="login100-form-btn" name="login">
              Login
            </button>
          </div>
        </form>
        <p style="margin-bottom: 5px;">Click button below to auto field input</p>
        <div class="container-login100-form-btn">
          <button onclick="admin()" class="login100-form-btn" style="margin-right: 5px; margin-bottom:10px;">
            Admin
          </button>
          <button onclick="teacher()" class="login100-form-btn">
            Teacher
          </button>
          <button onclick="parent()" class="login100-form-btn">
            Parent
          </button>
        </div>


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

  <script>
    function admin() {
      document.getElementById("email").value = "admin@gmail.com";
      document.getElementById("password").value = "12345678";
    }

    function teacher() {
      document.getElementById("email").value = "tengku@gmail.com";
      document.getElementById("password").value = "Tengku@98";
    }

    function parent() {
      document.getElementById("email").value = "syahir72@gmail.com";
      document.getElementById("password").value = "Syakir@12";
    }
  </script>


</body>

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


      $result4 = validateFirstTimeLogin($email, $password);
      $row4 = mysqli_fetch_assoc($result4);

      $statusLogin = $row4['admin_login'];

      if ($statusLogin === '0') {
        $_SESSION['admin_id'] = $row4['admin_id'];
        $_SESSION['teacher_id'] = "";
        $_SESSION['parent_id'] = "";
        echo "<script>
              window.location.href='firstTimeLogin.php';
             </script>";
      } else {
        $_SESSION['admin_id'] = $row4['admin_id'];

        $_SESSION['admin_idMain'] = $row4['admin_id'];
        $_SESSION['loggedIn'] = 893247348;
        $_SESSION['type'] = "admin";
        echo $statusLogin;
        echo "<script>
                window.location.href='admin/admin.php';
                </script>";
      }
    } else {
      $test = verifyTeacher($email, $password);
      if ($test === 2345) {


        // Validate First Time
        $result5 = validateFirstTimeLoginTeacher($email, $password);
        $row5 = mysqli_fetch_assoc($result5);

        $statusLogin = $row5['teacher_login'];

        if ($statusLogin === '0') {
          $_SESSION['admin_id'] = "";
          $_SESSION['teacher_id'] = $row5['teacher_id'];
          $_SESSION['parent_id'] = "";
          echo "<script>
              window.location.href='firstTimeLogin.php';
             </script>";
        } else {

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
      } else {
        $test = verifyParent2($email, $password);
        if ($test === 2221) {

          // Validate First Time
          $result6 = validateFirstTimeLoginParent($email, $password);
          $row6 = mysqli_fetch_assoc($result6);

          $statusLogin = $row6['parent_login'];

          if ($statusLogin === '0') {
            $_SESSION['admin_id'] = "";
            $_SESSION['teacher_id'] = "";
            $_SESSION['parent_id'] = $row6['parent_id'];
            echo "<script>
                window.location.href='firstTimeLogin.php';
               </script>";
          } else {

            $result = displayParentByEmail($email);
            $data = mysqli_fetch_assoc($result);

            $_SESSION['loggedIn'] = 1111;
            $_SESSION['parent_email'] = $data['parent_email'];
            $_SESSION['parent_id'] = $data['parent_id'];
            $_SESSION['parent_name'] = $data['parent_name'];
            $_SESSION['student_id'] = $data['student_id'];
            $_SESSION['class_id'] = $data['class_id'];
            $_SESSION['type'] = "parent";


            echo "<script>
                window.location.href='parent/Parent.php';
                </script>";
          }
        } else {
          echo "<script>alert('PLEASE TRY AGAIN');
              window.location.href='index.php';
              </script>";
        }
      }
    }
  }
}

?>