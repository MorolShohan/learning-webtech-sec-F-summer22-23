<?php
if (isset($_POST['gender'])) {
  $gender = $_POST['gender'];
  if ($gender == "male" || $gender == "female") {
    echo "Valid gender";
  } else {
    echo "Invalid gender";
  }
}
?>

<form action="t4.php" method="post">
<fieldset>
    <legend>GENDER</legend>
  <input type="radio" name="gender" value="male"> Male
  <input type="radio" name="gender" value="female"> Female
  <br><hr>
  <input type="submit" value="Submit">
  </fieldset>
</form>
