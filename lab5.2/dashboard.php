<!DOCTYPE html>
<html>
<head>
  <title>Login Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style.css" /> 
</head>
<body>
<body>
<div class ="company">
    <h1>X Company</h1>
  </div>
<div class = "link">
    <P>logged in as <?php session_start(); echo $_SESSION['username']; ?></P>
    <a href="logout.php">Logout</a>
  </div>
  <h1>Welcome, <?php 
   echo $_SESSION['username']; ?></h1>
  <ul class ="left-margin">
  <h3>Account</h3><hr>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="viewprofile.php">View Profile</a></li>
    <li><a href="editprofile.php">Edit Profile</a></li>
    <li><a href="profilepicture.php">Change Profile Picture</a></li>
    <li><a href="changepassword.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  <footer class ="footer">
  <div class="outer-footer">
  Copyright &copy; 2023
  </div>
  </footer>
</body>
</html>
