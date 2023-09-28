<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" /> 
  <title>Forgot Password</title>
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
  <div class ="login">
    <fieldset>
      <legend>FORGOT PASSWORD</legend>
    <form action="process_forgot_password.php" method="post">
    <label for="email">Enter your email address</label>
    <input type="email" name="email" id="email">
    <br>
    <input type="submit" value="Submit">
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
