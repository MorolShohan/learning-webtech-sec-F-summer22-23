<?php
    
    require('connection.php');
    


    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
</head>
<body>
    <?php
    if(isset($_GET['product_name']))
    {
        $product_name = $_GET['product_name'];
        $product_category = $_GET['product_category'];
        $product_code = $_GET['product_code'];
        $product_entry_date = $_GET['product_entry_date'];

        $sql = "INSERT INTO product (product_name, product_category, product_code, product_entry_date ) 
        VALUES ('$product_name' , '$product_category' , '$product_code' , '$product_entry_date' )";

        if($conn->query($sql) == TRUE)
        {
            echo "Data Inserted";
        }
            else
            {
                "Data not inserted";
            }
        }
        


    ?>

    <?php
        $sql = "SELECT * FROM category";
        $query = $conn->query($sql);

        ?>

    ?>
    <form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method ="GET">
        Product : <br>
       <input type = "text" name = "product_name"><br><br>
       Product Category: <br>
       <select name = "product_category">
        <?php
        while($data = mysqli_fetch_array($query)){
         $category_id = $data['category_id'];
         $category_name = $data['category_name'];

        echo "<option value ='$category_id'>$category_name</option>";
        }
        ?>
       </select><br><br>
       Product Code: <br>
       <input type = "text" name = "product_code"><br><br>
       Product Entry Date: <br>
       <input type = "date" name = "product_entry_date"><br><br>
        <input type = "submit" value = "submit">
        <button><a href ="list_of_product.php">list of product </a></button><br><br>
       


    </form>
    
</body>
</html>