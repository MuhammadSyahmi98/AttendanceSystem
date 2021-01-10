<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
  $result = mysqli_connect('localhost','root','', 'oas');

  $email2 = $_POST['email'];
  
  $select=$result->query("select * from admin where admin_email='$email2'");

  $teacher=$result->query("select * from teacher where teacher_email='$email2'");

  $parent=$result->query("select * from parent where parent_email='$email2'");

  // $parent=$result->query("select email,password from admin where email='$email2'");
  if(mysqli_num_rows($select)==1)
  {
    while($row=mysqli_fetch_array($select))
    {
      $admin = $row['admin_email']; 
      $email=md5($row['admin_email']);
      $pass=md5($row['admin_password']);
    }
    $link="<a href='http://localhost/AttendanceSystem/reEnterPassword.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require_once('PHPMailerAutoload.php');
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
    $mail->AddAddress($admin);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
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
                <p><b>Check Your Email and Click on the link sent to your email</b></p>
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




      <?php
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  } 

  else if (mysqli_num_rows($teacher)==1) {
    $teacher2=$result->query("select * from teacher where teacher_email='$email2'");
    while($row3=mysqli_fetch_array($teacher2))
    {
      $teacher = $row3['teacher_email'];
      $email=md5($row3['teacher_email']);
      $pass=md5($row3['teacher_password']);
    }
    $link="<a href='http://localhost/AttendanceSystem/reEnterPassword.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require_once('PHPMailerAutoload.php');
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
    $mail->AddAddress($teacher);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
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
                <p>Check Your Email and Click on the link sent to your email</p>
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




      <?php
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
    
  }

  ///////////////////////////////////////////////////////////////
   else if (mysqli_num_rows($parent)==1) {
    $parent3=$result->query("select * from parent where parent_email='$email2'");
    while($row4=mysqli_fetch_array($parent3))
    {
      $parent = $row4['parent_email'];
      $email=md5($row4['parent_email']);
      $pass=md5($row4['parent_password']);
    }
    $link="<a href='http://localhost/AttendanceSystem/reEnterPassword.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require_once('PHPMailerAutoload.php');
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
    $mail->AddAddress($parent);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
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
                <p>Check Your Email and Click on the link sent to your email</p>
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




      <?php
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
    
  }


}
?>
