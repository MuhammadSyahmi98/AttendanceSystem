<?php
if(isset($_POST['submit_password']))
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $result = mysqli_connect('localhost','root','', 'oas');


  // Validate password strength
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\_w]@', $password);

  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      // echo 'Password should be at least 8 characters in length and should include at least one uletter, one number, and one special character.';
      echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
        window.location.href = 'http://localhost/AttendanceSystem/reEnterPassword.php';
            </script>";

  } else{

      $status = $result->query("update admin set admin_password='$pass' where Binary md5(admin_email)='$email'");
      $teacher = $result->query("update teacher set teacher_password='$pass' where Binary md5(teacher_email)='$email'");
      $parent = $result->query("update parent set parent_password='$pass' where Binary md5(parent_email)='$email'");
      if ($status === false || $teacher === false || $parent === false) {
        die("Didn't Update"); 
      } else {
       echo '<script>alert("Success Update")
        window.location.href = "http://localhost/AttendanceSystem";
        </script>'; 
        // header("Location: http://localhost/AttendanceSystem");
      }
  }

  

}
?> 