<?php
require_once('../model/user_model.php');
$result=countProject();
$result1=countFeature();
$result2=countanalyst();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <center>
    <font>Admin Dashboard</font>
    <br><br><br>
    <font <?php echo $result["totalnumber"] ?></font><br>
    <font >Total Feature: <?php echo $result1["totalfeature"] ?></font><br>
    <font >Total Analyst: <?php echo $result2["totalanalyst"] ?></font><br><br><br>
    <table>
            <tr><td><a href="View_all_project.php">View All Project</a></td></tr>
            <tr><td><a href="search_project.html">Search Project</a></td></tr>
            <tr align="right"><td><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></td></tr>
        </table>
    </center>
</body>
</html>