<?php
    
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "clothing db";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Category</title>
</head>
<body>
    <?php
    if(isset($_GET['category_name']))
    {
        $category_name = $_GET['category_name'];
        $category_entrydate = $_GET['category_entrydate'];

        $sql = "INSERT INTO category (category_name, category_entrydate ) 
        VALUES ('$category_name' , '$category_entrydate')";

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
    <form action ="add_category.php" method ="GET">
        Category : <br>
       <input type = "text" name = "category_name"><br><br>
       Category Entry Date : <br>
       <input type = "date" name = "category_entrydate"><br><br>
       <input type = "submit" value ="submit">
       <button><a href ="list_of_category.php">List of Category </a></button><br><br>
       
       


    </form>
    
</body>
</html>