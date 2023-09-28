<?php
if (isset($_POST['dob'])) {
  $dob = $_POST['dob'];
  $pattern = '/^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/';
  if (!preg_match($pattern, $dob)) {
    echo "Invalid date of birth";
  } else {
    echo "Valid date of birth";
  }
}
?>

<form action="t3" method="post">
<fieldset>
    <legend>DATE OF BIRTH</legend>
  <input type="date" name="dob" placeholder="Enter your date of birth">
  <br><hr>
  <input type="submit" value="Submit">
</fieldset>
</form>
