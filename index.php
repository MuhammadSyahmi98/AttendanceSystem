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
  } else if ($type==="taecher") {
     echo "<script>
              window.location.href='teacher/Teacher.php';
              </script>";
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="resources/style.css">
  <title>LOGIN</title>
</head>
<body id="particles-js"></body>

<div class="animated bounceInDown">
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
    
</div>

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