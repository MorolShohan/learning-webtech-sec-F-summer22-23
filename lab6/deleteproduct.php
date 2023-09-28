<!-- //<?php//
//require_once("connection.php");
//$getid = $_GET['name'];

//$sql = "DELETE FROM products WHERE name = $getid";
//if (mysqli_query($conn, $sql)) {
//  echo "Product deleted successfully";
//} else {
 // echo "Error deleting product: " . mysqli_error($conn);
//}

//mysqli_close($conn);
//?> //  -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="buying_price">Buying price</label>
    <input type="text" name="buying_price" id="buying_price">
    <br>
    <label for="selling_price">Selling price</label>
    <input type="text" name="selling_price" id="selling_price">
    <br>
    <input type="submit" name="Submit" value="delete">
</form>
<button><a href ="view.php">Back to Dashboard </a></button><br><br>
</body>
</html>