<?php
session_start();
$name = "";
$email = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname="abd";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
        $sql ="INSERT INTO ab (Id, Name, Email,Address)VALUES (2,'abc','abd@gmail.com','Dhaka')";
            $res = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['name'])) {
        echo "Empty";
    } else {
        
      echo"ok";
    }

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>FORM</title>
</head>
<body>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>Registration</legend>
            <p>
                Name : <label for="name">Name:</label>
                <input type="text" name="name" id="" placeholder="Enter Your Name">
                <br><hr>
            </p>

            <p>
                Email : <label for="email">Email:</label>
                <input type="text" name="email" id="" placeholder="Enter your Email">
                <br><hr>
            </p>

            <p>
                Password : <label for="password">Password:</label>
                <input type="password" name="password" id=""><br><hr>
            </p>

            <button>submit</button>
        </fieldset>
    </form>
</body>
</html>