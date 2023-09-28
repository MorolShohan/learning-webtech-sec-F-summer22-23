<?php 
   
    require_once('../model/userModel.php');

    session_start();
    
    if(isset($_POST['submit']))
    {
        //print_r($_GET);
        $email = $_POST['email'];
        $password = $_POST['password'];

        $status = login($email, $password);

        if($email == "" || $password == ""){
            //echo "null username/password";
            header('location: ../view/login.php?msg=null');
        }else if($status){
            //echo "valid user!";
            $_SESSION['flag'] = 'true';
            header('location: ../view/home.php');
        }else{
            //echo "invalid username/password";
            header('location: ../view/login.php?msg=invalid');
        }
    }else{
        header('location: ../view/login.php');
    }
?>