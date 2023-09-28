<?php
if (isset($_POST['blood_group'])) {
  $blood_group = $_POST['blood_group'];
  if ($blood_group == "A" || $blood_group == "B" || $blood_group == "AB" || $blood_group == "O") {
    echo "Valid blood group";
  } else {
    echo "Invalid blood group";
  }
}
?>

<form action="t6.php" method="post">
<fieldset>
    <legend>BLOOD GROUP</legend>
  <select name="blood_group">
    <option value="">Select blood group</option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="AB">AB</option>
    <option value="O">O</option>
  </select>
  <br><hr>
  <input type="submit" value="Submit">
  </fieldset>
</form>
