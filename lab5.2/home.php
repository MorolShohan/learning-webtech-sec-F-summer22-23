<?php 
    session_start();

    if(!isset($_SESSION['flag'])){
       header('location:login.php'); 
    }

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" /> 
  <title>Home Page</title>
  <meta name="copyright" content="Copyright 2023">
</head>
<body>
<div class = "link">
    <a href="home.php">Home</a>
    <a href="login.php">Login</a>
    <a href="registration.php">Registration</a>
  </div>
  <h1>Welcome to Xcompany!</h1>
  <p>Please click on one of the following links to continue:</p>
  
  <footer class ="footer">
  <div class="outer-footer">
  Copyright &copy; 2023
  </div>
  </footer>
</body>
</html>