<!doctype html>
<html>
<head>
<title>Registration Form</title>
</head>
<body>    
<form>
  <fieldset>
    <legend>REGISTRATION</legend>
  <label>Id:</label>
<input type ="text" name="id" required><br><br>
<label>Password</label>
<input type ="password" name="password" required><br><br>
<label>Confirm Password</label>
<input type ="password" name="password" required><br><br>
<label>Name:</label>
<input type ="text" name="name" required><br><br>
<label>User Type</label><br><hr>
<input type="radio" name="usertype"id="user" required>
<label for="user">User</label>
<input type="radio" name="usertype"id="admin" required>
<label for="admin">Admin</label><hr>

<input type="submit" value="Sign Up">
<a href="login.php">Sign In</a>
  </fieldset>



</form>


 

</body>
</html>