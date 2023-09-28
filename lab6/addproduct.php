<?php
require_once('connection.php');
//if (isset($_POST['submit'])) {
 $name = $_POST["name"];
 $buying_price = $_POST['buying_price'];
 $selling_price = $_POST['selling_price'];



$sql = "INSERT INTO products (name,buying_price,selling_price) values (?,?,?)";
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql))
{
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sii",$name,$buying_price,$selling_price);

mysqli_stmt_execute($stmt);
echo "record saved";


?>


