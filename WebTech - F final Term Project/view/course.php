<!DOCTYPE html>
<html lang="en">
<head>
  <body>
  <table border 3 align = "center">
    <tr>
        <th>ID</th>
        <th>Course Categories</th>
        <!-- <th>Edit</th>
        <th>Delete</th> -->
    </tr>
    <?php
    include("../model/config.php");

        $query = "SELECT * FROM `categories`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
echo "<td>".$row["id"]."</td> <td>".$row["categorie"]."</td>";

// echo '<td><a href="updatecategorie.php?id='.$row['id'].'">Update<span class ="icon-trash2"></span></a></td>';
                
                
// echo '<td><a href="categorie.php?delid='.$row['id']. '" >
// Delete <span class="icon-trash2"></span></a></td>';

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no courses.<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="4" id="end"><div class="text-center"><a href="categorie.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>

</section>

<?php include('footer.php'); 


?>
  </body>

</html>
