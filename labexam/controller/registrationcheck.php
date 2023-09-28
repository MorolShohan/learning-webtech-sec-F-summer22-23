<?php
include_once('dblist.php');
session_start();

if(isset($_POST['submit']))
{
  $id = $_POST['id'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $usertype = $_POST['usertype'];


$status = adduser($id,$password,$name,$usertype);
if($status){
  header('location: ../view/login.php');
}else{
  header('location: ../view/signup.php');
}
}
else{
  header('location: ../view/login.php');
}
?>