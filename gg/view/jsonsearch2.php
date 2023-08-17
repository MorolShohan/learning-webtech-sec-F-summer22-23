<?php 
include("../model/config.php");
$query = "SELECT * FROM categories ORDER BY categorie ASC";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 </head>
 <body>
  <div class="container" style="width:900px;">
   <h3 >Search Categorie</h3><br />   
   <div class="row">
    <div class="col-md-4">
     <select name="categorie_list" id="categorie_list" class="form-control">
      <option value="">Select Course</option>
      <?php 
      while($row = mysqli_fetch_array($result))
      {
       echo '<option value="'.$row["id"].'">'.$row["categorie"].'</option>';
      }
      ?>
     </select>
    </div>
    <div class="col-md-4">
     <button type="button" name="search" id="search" class="btn btn-info">Search</button>
    </div>
   </div>
   <br>
   <div class="table-responsive" id="categorie_details" style="display:none">
   <table class="table table-bordered">
    <tr>
     <td width="10%" align="right"><b>ID</b></td>
     <td width="90%"><span id="id"></span></td>
    </tr>
    <tr>
     <td width="10%" align="right"><b>Categorie</b></td>
     <td width="90%"><span id="categorie"></span></td>
    </tr>
   </table>
   </div>
   
  </div>
    <button><a href="home.php">Go Back</a></button>
    <script src='../js/jsonsearch2.js'></script>
</body>
</html>

