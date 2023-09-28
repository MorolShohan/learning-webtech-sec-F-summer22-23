<?php 
    require_once('../model/userModel.php');
    $username = $_GET['id'];
    $username = getUser($username);
?>

<html lang="en">
<head>
    <title>Edit User</title>
</head>
<body>
        <form method="POST" action="" enctype="multipart/form-data">
        Employee Name:      <input type="text" name="employee_name" value="<?=$username['employee_name']?>" /> <br>
            Contact No:      <input type="text" name="contact_no" value="<?=$username['contact_no']?>" /> <br>
            username:   <input type="text" name="username" value="<?=$username['username']?>" /><br>
            password:   <input type="password" name="password" value="<?=$username['password']?>" /> <br>
            <input type="submit" name="submit" value="Update" />
        
                        
        </form>    
</body>
</html>