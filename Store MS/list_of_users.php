<?php

require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<style> 
			fieldset{ 
			background-color: Gray ;
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

    <title>List Of Users</title>
</head>
<body>
    <?php

        $sql = "SELECT * FROM users";

        $query = $conn->query($sql);
        echo "<table border = '2'><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";

        while($data = mysqli_fetch_assoc($query))
        {
            $user_id  = $data['user_id'];
            $user_first_name  = $data['user_first_name'];
            $user_last_name = $data['user_last_name'];
            $user_email = $data['user_email'];

            echo "<tr>
            <td>$user_first_name</td>
            <td>$user_last_name</td>
            <td>$user_email</td>

            <td><a href = 'edit_users.php?id=$user_id'>Edit</a></td>
            </tr>";
           
        }
        echo "</tr></table>"
     


    ?>

<button><a href ="users.php">Add Customer </a></button><br><br>
<button><a href ="home.php">Back to Dashboard </a></button><br><br>

  
    
</body>
</html>