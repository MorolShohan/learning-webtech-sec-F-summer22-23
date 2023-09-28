<?php
if(!empty($_POST['email'])&&isset($_POST['submit']))
{
  $email = $_POST['email'];
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
  echo 'valid email address';
}
else echo 'not valid ';
}else echo 'write your email address';
?>

<html>
<head>
  <title>Email Validation</title>
</head>
<body>
<form method ="POST" action="t2.php">
  <fieldset>
    <legend>Email</legend>
    <label for="email"></label>
    <input type="email" name="email" value="">
    <br><hr>
    <input type="submit" name="submit">
  </fieldset>
</form>
</body>
</html>