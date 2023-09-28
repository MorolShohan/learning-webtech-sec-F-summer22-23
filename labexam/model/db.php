<?php
$host = "127.0.0.1";
$dbuser = "root";
$dbpass = '';
$dbname = "ums";

function getconnection()
{
  global $host;
  global $dbuser;
  global $dbpass;
  global $dbname;

  $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  return con;
}
?>