<?php
if(isset($_GET['msg']))
{
  if($_GET['msg'] == 'invalid')
  {
    echo "invalid username/password";
  }else if($_GET['msg'] == 'null')
{
  echo "null username/password";
}
}
?>

<!doctype html>
<html>
<head>
<title>Login Form</title>
</head>
<body>    
<form method="POST" action="logincheck.php"enctype="">
  <fieldset>
    <legend>Login</legend>
  <label>User Id:</label>
<input type ="text" name="userid" required><br><br>
<label>Password</label>
<input type ="password" name="password" required><br><hr>
<input type="submit" value="login">
<a href="registration.php">Register</a></a>
  </fieldset>
</form>
</body>
</html>