<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" /> 
  <title>Login Dashboard</title>
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
    <form action="change_profile_picture.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <legend>Change Profile Picture</legend>
      <img src="pic.png"alt="profilepic" width ="90px">
      <p>Select a file to upload: <input type="file" name="profile_picture"></p>
      <p><input type="submit" value="Change Profile Picture"></p>
    </fieldset>
  </form>
  <footer class ="footer">
  <div class="outer-footer">
  Copyright &copy; 2023
  </div>
  </footer>
</body>
</html>