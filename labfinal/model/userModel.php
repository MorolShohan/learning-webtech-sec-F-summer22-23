<?php 
    require_once('db.php');
    
    function login($email, $password){
        $con = getConnection();
        $sql = "select * from users where email='{$email}' and password='{$password}'";
        $status = mysqli_query($con, $sql);
        $count = mysqli_num_rows($status);
        if ($status && mysqli_num_rows($status)>0) {
            $row = mysqli_fetch_assoc($status);
            $user = $row;
            $_SESSION['user'] = $user;
            if ($row['type'] === 'admin') {
                setcookie('status', 'true', time() + 3600, '/');
                header('Location: ../view/admin.php');
                exit();
            } else {
                setcookie('status', 'true', time() + 3600, '/');
                header('Location: analyst.php');
                exit();
            }
        } else {
            header('Location: login.php?error=invalid');
            exit();
        }
        
        
        
        mysqli_close($con);
        if($count == 1){
            return true;
        }else{
            return false;
        }

        
    }

    function addproject($id, $name, $description){
        $con = getConnection();
        $sql = "insert into product values('{$id}', '{$name}', '{$description}')";
        if(mysqli_query($con, $sql)){
           return true;
        }else{
            return false;
        }
    }

    

?>