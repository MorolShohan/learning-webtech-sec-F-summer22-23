<?php
    
    require('connection.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <?php
             if(isset($_GET['user_email']))
             {
                 $user_email= $_GET['user_email'];
                 $user_password= $_GET['user_password'];
                
         
                 $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password' ";

                 $query = $conn->query($sql);
                 

                 if(mysqli_num_rows($query) == 1 )
                 {
                    echo 'login successful';
                 }
                 else{
                    $data = mysqli_fetch_array($query);
                    $user_first_name = $data['user_first_name'];
                    $user_last_name = $data['user_last_name'];

                    $_SESSION['user_first_name'] = $user_first_name;
                    $_SESSION['user_last_name'] = $user_last_name;

                    header('location:index.php');
                 }

                 
                  
        
         
             }


    ?>


    <form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method ="GET">
        
       User's Email : <br>
       <input type = "email" name = "user_email"><br><br>
       User's Password : <br>
       <input type = "password" name = "user_password"><br><br>
        <input type = "submit" value = "submit">
       


    </form>
    
</body>
</html>