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
    <form name="form1" class="box" onsubmit="return checkStuff()">
      <h4>My<span>Attendance</span></h4>
      <h5>Sign in to your account.</h5>
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
        
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" value="Sign in" class="btn1">
      </form>
       
  </div> 
    
</div>

</html>