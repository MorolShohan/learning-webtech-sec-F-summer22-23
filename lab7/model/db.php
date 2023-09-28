<?php 
    $host = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "shop";

    function getConnection(){
        global $host;
        global $dbname;
        global $dbpass;
        global $dbuser;
        
        $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
        return $con;
    }


?>