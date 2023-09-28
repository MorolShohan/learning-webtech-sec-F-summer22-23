<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" /> 
  <title>X Company Registration</title>
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
  <form action="logincheck.php" method="post">
  <fieldset>
    <legend>REGISTRATION</legend>
  <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <br>
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password">
    <br>
    <fieldset>
      <legend>Gender</legend>
    <label for="gender"></label>
    <select name="gender" id="gender">
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
    </fieldset>
  
    <br>
    <fieldset>
      <legend>Date of Birth</legend>
    <label for="date_of_birth"></label>
    <input type="date" name="date_of_birth" id="date_of_birth">
    </fieldset>
   
    <br>
    <input type="submit" value="Submit">
    <input type="submit" value="Reset">
  </fieldset>  
  </form>
  </div>
 
  <footer class ="footer">
  <div class="outer-footer">
  Copyright &copy; 2023
  </div>
  </footer>
</body>
</html>