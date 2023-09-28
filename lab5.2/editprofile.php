<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css" /> 
</head>
<body>
<div class ="company">
    <h1>X Company</h1>
  </div>
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
  <div class="right-margin">
    <fieldset>
      <legend>Edit Profile</legend>
      <p>Name: <input type="text" name="name"></p>
      <p>Email: <input type="email" name="email"></p>
      <p>Gender: <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female</p>
      <p>Date of Birth: <input type="date" name="dob"></p>
      <p><input type="submit" value="Update Profile"></p>
    </fieldset>
  </div>
  <footer class ="footer">
  <div class="outer-footer">
  Copyright &copy; 2023
  </div>
  </footer>
</body>
</html>