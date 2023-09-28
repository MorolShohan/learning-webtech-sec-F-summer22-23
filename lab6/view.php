<?php

require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Of Product</title>
</head>
<body>
    <?php
       
        $sql = "SELECT * FROM products";

        $query = $conn->query($sql);
        echo "<table border = '2'><tr><th>Name</th><th>Buying Price</th><th>Selling Price</th></tr>";

        while($data = mysqli_fetch_assoc($query))
        {
            $name  = $data['name'];
            $buying_price = $data['buying_price'];
            $selling_price = $data['selling_price'];
            
            

            echo "<tr>
            <td>$name</td>
            <td>$buying_price</td>
            <td>$selling_price</td>

            <td><a href = 'editproduct.php?id=$name'>Edit</a></td>
            <td><a href = 'deleteproduct.php'>Delete</a></td>
            </tr>";
           
        }
        echo "</tr></table>"
     


    ?>
  
  <button><a href ="view.php">Back to Dashboard </a></button><br><br>
</body>
</html>