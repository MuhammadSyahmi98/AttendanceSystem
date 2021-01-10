<?php   include "resources/php/sql.php"; session_start(); ?>
<?php 
  $admin_id = $_SESSION['admin_id']; 
  $teacher_id = $_SESSION['teacher_id'];
  $parent_id = $_SESSION['parent_id']; 
?>

      <!DOCTYPE html>
      <html>
      <head>
        <link rel="stylesheet" type="text/css" href="resources/style.css">
        <title>First Time Login</title>



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

                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
                <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">


                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <span class="login100-form-title p-b-32">
                  First time login
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

                <span class="txt1 p-b-11" style="margin-top: 20px;">
                  Re-Password
                </span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
                  <span class="btn-show-pass">
                    <i class="fa fa-eye"></i>
                  </span>
                  <input class="input100" type="password" name="rePassword" >
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
      if (isset($_POST['submit_password'])) {
        
        
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];

        // Validate For Admin
        if (!empty($_SESSION['admin_id'])) {

            if ($password === $rePassword) {
              $admin_id = $_POST['admin_id'];

            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^_\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                // echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
                     
                      </script>";
            } else{
                updatePasswordAdmin($admin_id, $password);
            }
          } else {
                echo "<script>alert('Password Doesnt Match');
                     
                      </script>"; 
          }

        } 

        // Validate For Teacher
         if (!empty($_SESSION['teacher_id'])) {

            if ($password === $rePassword) {
              $teacher_id = $_POST['teacher_id'];

              // Validate password strength
              $uppercase = preg_match('@[A-Z]@', $password);
              $lowercase = preg_match('@[a-z]@', $password);
              $number    = preg_match('@[0-9]@', $password);
              $specialChars = preg_match('@[^_\w]@', $password);

              if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                  // echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                  echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
                       
                        </script>";
              }else{
               updatePasswordTeacher($teacher_id, $password);
              }
            } else {
                    echo "<script>alert('Password Doesnt Match');
                   
                    </script>";

            }

        } 


           // Validate For Parent
          if (!empty($_SESSION['parent_id'])) {

              if ($password === $rePassword) {
                $parent_id = $_POST['parent_id'];

              // Validate password strength
              $uppercase = preg_match('@[A-Z]@', $password);
              $lowercase = preg_match('@[a-z]@', $password);
              $number    = preg_match('@[0-9]@', $password);
              $specialChars = preg_match('@[^_\w]@', $password);

              if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                  // echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                  echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
                       
                        </script>";
              } else{
                  updatePasswordParent($parent_id, $password);
              }
            } else {
                  echo "<script>alert('Password Doesnt Match');
                       
                        </script>"; 
            }

          } 


      }
      ?>
  