<?php
require_once('db.php');
function login($id,$password)
{
  $con = getconnection();
  $sql = "SELECT * from users where id = '{$id}' and password ='{$password}'";
  $result = mysqli_query($con, $sql);
  $count = mysqli_num_rows(result);

  if($count == 1)
  {
    return true;
  } else{
    return false;
  }

}

function adduser($id,$password,$name,$usertype)
{
  $con = getconnection();
  $sql = "INSERT into users values('{$id}','{$password}','{$name}','{$usertype}')";
  if(mysqli_query($con,$sql)){
    return true;

  }else{
    return false;
  }
}
?>