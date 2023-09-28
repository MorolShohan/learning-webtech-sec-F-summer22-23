<?php

require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Category</title>
</head>
<body>
    <?php
    if(isset($_GET['id']))
    {
        $getid = $_GET['id'];

        $sql1 = "SELECT * FROM category WHERE category_id=$getid";

        $query = $conn->query($sql1);

        $data = mysqli_fetch_assoc($query);

        $category_id = $data['category_id'];
        $category_name = $data['category_name'];
        $category_entrydate = $data['category_entrydate'];
    }

        if(isset($_GET['category_name']))
        {
            $new_category_name = $_GET['category_name'];
            $new_category_entrydate = $_GET['category_entrydate'];
            $new_category_id = $_GET['category_id'];

            $sql1 = "UPDATE category SET 
            category_name = '$new_category_name' ,
            category_entrydate = '$new_category_entrydate'  WHERE category_id = '$new_category_id'";


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
    <form action ="edit_category.php" method ="GET">
        Category : <br>
       <input type = "text" name = "category_name" value = "<?php $category_name ?>"><br><br>
       Category Entry Date : <br>
       <input type = "date" name = "category_entrydate"value = "<?php $category_entrydate ?>"><br><br>
       <input type = "text" name = "category_id" value = "<?php $category_id ?>"hidden><br>
       <input type = "submit" value ="Update">
       
       


    </form>
    
</body>
</html>