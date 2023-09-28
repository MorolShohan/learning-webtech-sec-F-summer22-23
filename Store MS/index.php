<?php
session_start();

 $user_first_name = $_SESSION['user_first_name'];
 $user_last_name = $_SESSION['user_last_name'];

 //if(!empty($user_first_name) && !empty ($user_last_name){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>SHOHAN FASHION HOUSE | CBMS </title>
</head>
<body>

<h1>Clothing Brand Management System</h1>
<h3><a href="logout.php"> Logout</a></h3>
   

</body>
</html>

<?php
//}else
//{
    header('location:login.php')
//}
?>