<!DOCTYPE html>
<html lang="en">
<head>
 
  <title>Document</title>
</head>
<body>
  <?php
  $emp = [
    [1,2,3,"A"],
    [1,2,"B","C"],
    [1,"D","E","F"],
   
  ];


  echo $emp[0][0];
  echo $emp[0][1];
  echo $emp[0][2];
  echo $emp[0][3];
  echo "<br>";
  echo $emp[1][0];
  echo $emp[1][1];
  echo $emp[1][2];
  echo $emp[1][3];
  echo "<br>";
  echo $emp[2][0];
  echo $emp[2][1];
  echo $emp[2][2];
  echo $emp[2][3];
 

  


  //print_r($emp);
  ?>
</body>
</html>