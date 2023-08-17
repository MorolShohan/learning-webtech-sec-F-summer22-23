<?php
require_once('../model/user_model.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $result=user($username,$password);

    if($result['Role']=="Analyst"){
        header('location:../view/analyst_dashboard.html');
    }else if($result['Role']=="Admin"){
        header('location:../view/admin_dashboard.php');
    }else{
        header('');
    }

}
?>