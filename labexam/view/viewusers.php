<?php
require_once('../model/dblist.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Users</title>
</head>
<body>
  <?php
$sql = "SELECT * from users";
$query= $con->query($sql);
echo "< border = '2'><tr><th>id</th><th>name</th><th>usertype</th></tr>";

while($data = mysqli_fetch_assoc($query))
{
  $id = $data['id'];
  $name = $data['name'];
  $usertype = $data['usertype'];

  echo "<tr>
  <td>$id</td>
  <td>$name</td>
  <td>$usertype</td>";
  
}

    echo "</tr></table>"
  ?>

  <button><a href="adminhomepage.php">Go Home</a></button>
</body>
</html>