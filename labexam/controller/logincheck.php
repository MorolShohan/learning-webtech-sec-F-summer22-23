<?php

require_once('dblist.php');
session_start();

if(isset($_POST['submit']))
{
  $id = $_POST['id'];
  $password = $_POST['password'];

  $status = login($id, $password, $usertype);
  if($username == "" || $password == ""){
    header('location: ../view/login.php?msg=null');
  }elseif($status){
    $_SESSION['flag'] = 'true';
    if($usertype == "user")
    {
      header('location: ../view/userhomepage.php');
    }else{
      header('location: ../view/adminhomepage.php');
    }
  }else{
    header('location: ../view/login.php?msg=invalid');
  }
}else{
  header('location:../view/login.php');
}