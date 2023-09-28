<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css" /> 
</head>
<body>
<div class ="company">
    <h1>X Company</h1>
  </div>
  <div class = "link">
    <a href="logout.php">Logout</a>
  </div>
  <div class="left-margin">
    <ul>
    <h3>Account</h3><hr>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="viewprofile.php">View Profile</a></li>
      <li><a href="editprofile.php">Edit Profile</a></li>
      <li><a href="profilepicture.php">Change Profile Picture</a></li>
      <li><a href="changepassword.php">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  <form action="changepassword.php" method="post">
    <fieldset>
      <legend>Change Password</legend>
      <p>Current Password: <input type="password" name="current_password"></p>
      <p class ="p1">New Password: <input type="password" name="new_password"></p>
      <p class ="p2">Retype New Password: <input type="password" name="retype_new_password"></p>
      <p><input type="submit" value="Change Password"></p>
    </fieldset>
  </form>
  <footer class ="footer">
  <div class="outer-footer">
  Copyright &copy; 2023
  </div>
  </footer>
</body>
</html>