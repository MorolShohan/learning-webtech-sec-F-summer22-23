<?php 
    require_once('../model/userModel.php');

    $allUser = getAllUser();

    

?>


<html lang="en">
<head>
    <title>Userlist</title>
</head>
<body>

        <a href="home.php"> Back </a> |
        <a href="../controller/logout.php"> Logout </a>
        <br><br>

        <table border="1">
            <tr>
                <td>Employee Name</td>
                <td>Contact No</td>
                <td>UserName</td>
                <td>Password</td>
                <td>Action</td>
            </tr>
            <?php for($i=0; $i < count($allUser); $i++){ ?>
            <tr>
                <td><?=$allUser[$i]['employee_name']?></td>
                <td><?=$allUser[$i]['contact_no']?></td>
                <td><?=$allUser[$i]['username']?></td>
                <td><?=$allUser[$i]['password']?></td>
                <td> 
                    <a href="edit.php?id=<?=$allUser[$i]['username']?>">Edit</a> | 
                    <a href="delete.php">Delete</a> 
                </td>
            </tr>
            <?php } ?>

        </table>
</body>
</html>