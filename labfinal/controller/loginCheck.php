<?php 
   
    require_once('../model/userModel.php');

    session_start();
    
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $status = login($email, $password);

}
?>