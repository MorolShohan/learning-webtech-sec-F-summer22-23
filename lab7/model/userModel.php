<?php 
    require_once('db.php');
    
    function login($email, $password){
        $con = getConnection();
        $sql = "select * from admin where email='{$email}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            return true;
        }else{
            return false;
        }
    }

    function addUser($employee_name, $contact_no, $username, $password){
        $con = getConnection();
        $sql = "insert into employee values('{$employee_name}', '{$contact_no}', '{$username}','{$password}')";
        if(mysqli_query($con, $sql)){
           return true;
        }else{
            return false;
        }
    }

    function getAllUser(){
        $con = getConnection();
        $sql = "select * from employee";
        $result = mysqli_query($con, $sql);
        $users = [];

        while($row = mysqli_fetch_assoc($result)){
            //$users = $row;
            array_push($users, $row);
        }

        return $users;
    }
    
    function getUser($username){
        $con = getConnection();
        $sql = "select * from employee where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    

?>