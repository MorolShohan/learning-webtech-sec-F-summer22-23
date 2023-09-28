<?php
session_start();
$lpassword="";
if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
    if (empty($_GET['lname'])) {
        echo "";
    } 
    if (empty($_GET['lpassword'])) {
        echo "";
    }
    else
    if($_GET['lname']==$_SESSION["name"] )
    {
        header('location:home.php');
    }
    
    else {
          echo "You Name & Password is not correct";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style> 
			fieldset{ 
			background-color: white ;
			}
			legend {
  			background-color: purple;
  			color: white;
  			padding: 5px 700px;
			}
			input {
  			margin: 10px;
			}
	</style>

    <title>Employee Login</title>
    
</head>
<body>
    <div align ="center">
    <form  method="get" action="home.php";?>

        <fieldset>

            <legend><h3>Employee Login<h3></legend>
        
        </fieldset>
           
                <label for="name"id="1">Name:</label>
                <script>document.getElementById("1").style.color="purple";
                </script>
                <input type="text" name="lname" id="" placeholder="Enter Your Name">
                <br>

                <label for="password"id="2">Password:</label>
                <script>document.getElementById("2").style.color="purple";
                </script>
                <input type="password" name="lpassword" id="" placeholder="Enter Your Password">
                <hr>
            
                <button type="submit">Login</button>
            
        
    </form>
    </div>
</body>
</html>