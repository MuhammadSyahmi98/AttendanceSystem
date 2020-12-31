<?php
if(isset($_POST['submit_password']))
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $result = mysqli_connect('localhost','root','', 'oas');

  $status = $result->query("update admin set admin_password='$pass' where Binary md5(admin_email)='$email'");
  $teacher = $result->query("update teacher set teacher_password='$pass' where Binary md5(teacher_email)='$email'");
  if ($status === false || $teacher === false) {
    die("Didn't Update"); 
  } else {
    echo '<script>alert("Success Update")
    window.location.href = "http://localhost/AttendanceSystem";
    </script>'; 
    // header("Location: http://localhost/AttendanceSystem");
  }

}
?> 