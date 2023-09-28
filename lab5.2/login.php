<?php 

    if(isset($_GET['msg'])){
        if($_GET['msg'] == 'invalid'){
            echo "invalid username/password";
        }else if($_GET['msg'] == 'null'){
            echo "null username/password";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" /> 

  <title>X Company Login</title>
  <meta name="copyright" content="Copyright 2023">
</head>
<body>
<div class ="company">
    <h1>X Company</h1>
  </div>
<div class = "link">
    <a href="home.php">Home</a>
    <a href="login.php">Login</a>
    <a href="registration.php">Registration</a>
  </div>
  <div class = "login">
    <fieldset>
      <legend>LOGIN</legend>
    <form method="POST" action="logincheck.php" >
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <br>
    <input type="checkbox" name="remember_me" id="remember_me"> Remember me
    <br>
    <input type="submit" name ="submit"value="submit">
    <br>
    <a href="forgotpassword.php">Forgot password?</a>
  </form>
    </fieldset>
  
  </div>
  
  <footer class ="footer">
  <div class="outer-footer">
  Copyright &copy; 2023
  </div>
  </footer>

 
  
</body>
</html>