<?php
if(isset($_POST["id"]))
{
include("../model/config.php");
 $query = "SELECT * FROM categories WHERE id = '".$_POST["id"]."'";
 $result = mysqli_query($connection, $query);
 while($row = mysqli_fetch_array($result))
 {
  $data["id"] = $row["id"];
  $data["categorie"] = $row["categorie"];
 
 }

 echo json_encode($data);
}
?>