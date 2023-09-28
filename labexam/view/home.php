<?php
session_start();

if(!isset($_SESSION['flag'])){
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <h1>Welcome home!</h1>
  <button><a href="../controller/logout.php">Logout</a></button>
</body>
</html>