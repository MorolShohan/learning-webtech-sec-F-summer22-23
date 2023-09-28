<?php
session_start();
$lpassword="";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['lname'])) {
        echo "";
    } 
    if (empty($_GET['lpassword'])) {
        echo "";
    }
    else
    if($_GET['lname']==$_SESSION["name"] )
    {
        header('location: practice.php');
    }
    
    else {
          echo "You Name & Password is not correct";
    }
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FORM</title>
</head>
<body>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>Login</legend>
            <p>
                <label for="name">Name:</label>
                <input type="text" name="lname" id="" placeholder="Enter Your Name">
                <br><hr>
            </p>

            <p>
                <label for="password">Password:</label>
                <input type="password" name="lpassword" id=""><br><hr>
            </p>

            <button type="submit">Login</button>
            
        </fieldset>
    </form>
</body>
</html>