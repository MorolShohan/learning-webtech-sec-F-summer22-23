<?php 

    if(isset($_GET['msg'])){
        if($_GET['msg'] == 'invalid'){
            echo "invalde username/password";
        }else if($_GET['msg'] == 'null'){
            echo "null username/password";
        }
    }
?>

<html lang="en">
<head>
    <title>Login Page</title>
</head>
<body>
        <form method="POST" action="../controller/loginCheck.php" enctype="">
        <fieldset align = "center">
                <legend>Login</legend>
            Email:   <input type="email" name="email" value="" /><br>
            password:   <input type="password" name="password" value="" /> <br>
                        <input type="submit" name="submit" value="Submit" />
                        <a href="addemployee.php.php"> Signup </a> 
</fieldset>
        </form>    
</body>
</html>