<?php
    
    require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
</head>
<body>
    <?php
    
        if(isset($_GET['name']))
        {
           $getid = $_GET['name'];

           $sql1 = "SELECT * FROM products WHERE name=$getid";

           $query = $conn->query($sql1);
   
           $data = mysqli_fetch_assoc($query);
   
           
           $name = $data['name'];
           $buying_price = $data['buying_price'];
           $selling_price = $data['selling_price'];
          
        }

        if(isset($_GET['name']))
        {
            $new_name = $_GET['name'];
            $new_buying_price = $_GET['buying_price'];
            $new_selling_price = $_GET['selling_price'];

            $sql1 = "UPDATE products SET name = '$new_name' ,
            buying_price = '$new_buying_price',
            selling_price ='$new_selling_price',
             WHERE product_id = $new_product_id  ";

            if($conn->query($sql1) == TRUE)
            {
                echo 'Updated!';
            }
                else
            {
                echo 'not updated!';
            } 
            
        }


    ?>

    <?php
        $sql = "SELECT * FROM products";
        $query = $conn->query($sql);

        ?>

    <form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method ="GET">
    <label for="name">Name</label><br>
    <input type="text" name="name" id="name">
    <br>
    <label for="buying_price">Buying price</label><br>
    <input type="text" name="buying_price" id="buying_price">
    <br>
    <label for="selling_price">Selling price</label><br>
    <input type="text" name="selling_price" id="selling_price">
    <br>
    <input type="submit" name="Submit" value="submit">
       


    </form>
    <button><a href ="view.php">Back to Dashboard </a></button><br><br>
    
</body>
</html>