<?php

require('connection.php');

$sql1 = "SELECT * FROM category ";
$query1 = $conn->query($sql1);

$data_list = array();

while($data1 = mysqli_fetch_assoc($query1))
{
$category_id = $data1['category_id'];
$category_name = $data1['category_name'];

$data_list[$category_id] = $category_name;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Of Product</title>
</head>
<body>
    <?php

        $sql = "SELECT * FROM product";

        $query = $conn->query($sql);
        echo "<table border = '2'><tr><th>Product Name</th><th>Category</th><th>Code</th><th>Action</th></tr>";

        while($data = mysqli_fetch_assoc($query))
        {
            $product_id  = $data['product_id'];
            $product_name = $data['product_name'];
            $product_category = $data['product_category'];
            $product_code = $data['product_code'];

            echo "<tr>
            <td>$product_name</td>
            <td>$data_list[$product_category]</td>
            <td>$product_code</td>

            <td><a href = 'edit_product.php?id=$product_id'>Edit</a></td>
            </tr>";
           
        }
        echo "</tr></table>"
     


    ?>
  
  <button><a href ="home.php">Back to Dashboard </a></button><br><br>
</body>
</html>