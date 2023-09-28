<?php 
    
    include_once('../model/userModel.php');

    session_start();
    
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        

        $status = addproject($id, $name, $description);

        if($status){
            header('location: ../view/index.php');
        }else{
            header('location: ../view/signup.php');
        }
    }else{
        header('location: ../view/login.php');
    }
?>