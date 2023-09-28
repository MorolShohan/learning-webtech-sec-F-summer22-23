<?php
$host="localhost";
$dbname="product db";
$username="root";
$password="";

$conn = mysqli_connect($host,$username,$password,$dbname);
if (mysqli_connect_errno())
{
  die("connection error: ".mysqli_connect_error());
}

?>