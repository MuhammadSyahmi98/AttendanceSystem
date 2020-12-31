<?php   include "resources/php/sql.php"; session_start(); ?>






<?php
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $result = mysqli_connect('localhost','root','', 'oas');
  
  $select=$result->query("select * from admin where md5(admin_email)='$email' and md5(admin_password)='$pass'");

  $teacher=$result->query("select * from teacher where md5(teacher_email)='$email' and md5(teacher_password)='$pass'");
  if(mysqli_num_rows($select)==1)
  {
    ?>
      <!DOCTYPE html>
      <html>
      <head>
        <link rel="stylesheet" type="text/css" href="resources/style.css">
        <title>Resit Password</title>



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
              <form class="login100-form validate-form flex-sb flex-w" method="POST" action="submit_new.php">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <span class="login100-form-title p-b-32">
                  Resit Password
                </span>

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
                
               
                <div class="container-login100-form-btn" style="margin-top: 10px;">
                  <button class="login100-form-btn" name="submit_password">
                    Submit
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

      </html>

    <?php
  } else if (mysqli_num_rows($teacher)==1) {
    ?>
      <!DOCTYPE html>
      <html>
      <head>
        <link rel="stylesheet" type="text/css" href="resources/style.css">
        <title>Resit Password</title>



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
              <form class="login100-form validate-form flex-sb flex-w" method="POST" action="submit_new.php">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <span class="login100-form-title p-b-32">
                  Resit Password
                </span>

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
                
               
                <div class="container-login100-form-btn" style="margin-top: 10px;">
                  <button class="login100-form-btn" name="submit_password">
                    Submit
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
      </html>

    <?php
  }
}
?>




