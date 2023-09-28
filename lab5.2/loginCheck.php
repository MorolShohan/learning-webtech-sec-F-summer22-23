<?php 
    session_start();
    
    if(isset($_POST['submit']))
    {
        //print_r($_GET);
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "" || $password == ""){
            //echo "null username/password";
            header('location: login.php?msg=null');
        }else if($username == $password){
            //echo "valid user!";
            $_SESSION['flag'] = 'true';
            header('location: dashboard.php');
        }else{
            //echo "invalid username/password";
            header('location: forgotpassword.php?msg=invalid');
        }
    }else{
        header('location: login.php');
    }
?>