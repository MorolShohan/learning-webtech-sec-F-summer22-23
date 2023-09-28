<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['name'])) {
        echo "Empty";
    } else {
        $_SESSION["name"] = $_GET['name'];
        $_SESSION["password"] = $_GET['password'];
        header('location:login.php');
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
            <legend>Registration</legend>
            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="" placeholder="Enter Your Name">
                <br><hr>
            </p>

            <p>
                <label for="email">Email:</label>
                <input type="text" name="email" id="" placeholder="Enter your Email">
                <br><hr>
            </p>

            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id=""><br><hr>
            </p>

            <button type="submit">Submit</button>
            
        </fieldset>
    </form>
</body>
</html>