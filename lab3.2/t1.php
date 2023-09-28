<?php 
$n=$ns='';
if(isset($_POST['s']))  
{
  $n=trim($_POST['n']);
  $nc='/^[[A-Za-z ]{2-50}*$/';

  if(preg_match($nc,$n)&& strlen($n)>0)
  {
    $ns="Ok";
  }
  else
  {
    $ns="**check name";
  }

}

    ?>
<html>
<head>
  <title>Name Validation</title>
</head>
<body>
<form method ="POST" action="">
  <fieldset>
    <legend>NAME</legend>
    <label for="name"></label>
    <input type="text" name="n" value="<?php echo $n; ?>">
    <span><?php echo $ns; ?></span><br><hr>
    <input type="submit" name="s">
  </fieldset>
</form>
</body>
</html>