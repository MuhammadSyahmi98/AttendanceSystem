<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>LOGIN</title>
</head>
<body id="particles-js"></body>

<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" onsubmit="return checkStuff()">
      <h4><span>FORGET PASSWORD</span></h4>
      <h5>RETYPE PASSWORD</h5>
      <div>
        <label for="newpass">New Password</label>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <label>RE-type password</label>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
   
        <input type="submit" value="Sign in" class="btn1">
      </form>
        <a href="#" class="dnthave">Don’t have an account? Sign up</a>
      </div>
  </div> 
    
</div>

</html>