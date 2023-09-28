<?php

require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Users</title>
</head>
<body>
    <?php
    if(isset($_GET['id']))
    {
        $getid = $_GET['id'];

        $sql1 = "SELECT * FROM users WHERE user_id=$getid";

        $query = $conn->query($sql1);

        $data = mysqli_fetch_assoc($query);

        $user_id  = $data['user_id'];
        $user_first_name = $data['user_first_name'];
        $user_last_name = $data['user_last_name'];
        $user_email = $data['user_email'];
        $user_password = $data['user_password'];

    }

        if(isset($_GET['user_first_name']))
        {
            $new_user_first_name= $_GET['user_first_name'];
            $new_user_last_name = $_GET['user_last_name'];
            $new_user_email = $_GET['user_email'];
            $new_user_password = $_GET['user_password'];
            $new_user_id = $_GET['user_id'];

            $sql1 = "UPDATE users SET 
            user_first_name = '$new_user_first_name' ,
            user_last_name = '$new_user_last_name',
            user_email = '$new_user_email',
            user_password = '$new_user_password'
            WHERE user_id = '$new_user_id'";


         if($conn->query($sql1) == TRUE)
         {
            echo 'Updated!';
         }
         else
         {
            echo 'not updated!';
         } 

        } 

    ?>
    <form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method ="GET">
    
    User's First Name : <br>
       <input type = "text" name = "user_first_name"value = "<?php echo $user_first_name ?>"><br><br>
       User's Last Name : <br>
       <input type = "text" name = "user_last_name"value = "<?php echo $user_last_name ?>"><br><br>
       User's Email : <br>
       <input type = "email" name = "user_email"value = "<?php echo $user_email ?>"><br><br>
       User's Password : <br>
       <input type = "password" name = "user_password"value = "<?php echo $user_password ?>"><br><br>
       <input type = "password" name = "user_id"value = "<?php echo $user_id ?>"hidden><br><br>
        <input type = "submit" value = "submit">
       
       


    </form>
    
</body>
</html>