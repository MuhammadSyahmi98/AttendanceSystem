<?php

send_emailParent("syahmijalil12@gmail.com","1234");
?>




<?php

function send_emailParent($email, $password){

   $link="<a href='http://localhost/attendancesystem/'>Click To Login</a>";


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
    $mail->AddAddress($email);
    $mail->Subject  =  'Account For Online Attendance System';
    $mail->IsHTML(true);
    $mail->Body    = '<p>Welcome to Online Attendance System. Below is your account detail. <br>Username: '.$email.'<br>Password: '.$password.'  <br> Click this link to login '.$link.'</p>';
   $mail->Send();
}

 ?>