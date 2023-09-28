<?php

require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Of Category</title>
</head>
<body>
    <?php

        $sql = "SELECT * FROM category";

        $query = $conn->query($sql);
        echo "<table border = '2'><tr><th>Category</th><th>Date</th><th>Action</th></tr>";

        while($data = mysqli_fetch_assoc($query))
        {
            $category_id = $data['category_id'];
            $category_name = $data['category_name'];
            $category_entrydate = $data['category_entrydate'];

            echo "<tr>
            <td>$category_name</td>
            <td>$category_entrydate</td>
            <td><a href = 'edit_category.php?id=$category_id'>Edit</a></td>
            </tr>";
           
        }
        echo "</tr></table>"
     


    ?>

<button><a href ="home.php">Back to Dashboard </a></button><br><br>
  
    
</body>
</html>