<?php
if (isset($_POST['education_degree'])) {
  $education_degree = $_POST['education_degree'];
  if (in_array("high_school", $education_degree)) {
    echo "You have selected high school";
  }
  if (in_array("bachelors", $education_degree)) {
    echo "You have selected college";
  }
  if (in_array("masters", $education_degree)) {
    echo "You have selected bachelors";
  }
  if (in_array("doctorate", $education_degree)) {
    echo "You have selected masters";
  }
}
?>

<form action="t5.php" method="post">
<fieldset>
    <legend>DEGREE</legend>
  <input type="checkbox" name="education_degree[]" value="high_school"> SSC
  <input type="checkbox" name="education_degree[]" value="bachelors"> HSC
  <input type="checkbox" name="education_degree[]" value="masters"> BSc
  <input type="checkbox" name="education_degree[]" value="doctorate"> MSc
  <br><hr>
  <input type="submit" value="Submit">
  </fieldset>
</form>