<?php 
	
if(preg_match("/config.php/",$_SERVER['SCRIPT_FILENAME'])){
	die("Access denied: Please away from here.");
}

	$connection = mysqli_connect('localhost','root','','exceptional') or die("Database Not connected".mysqli_connect_error());
	session_start();

	$host = "localhost";
    $dbname = "exceptional";
    $dbpass = "";
    $dbuser = "root";

    function getConnection()
    {
        global $host;
        global $dbname;
        global $dbpass;
        global $dbuser;
        return $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    }

 ?>