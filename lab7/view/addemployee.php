<html lang="en">
<head>
    <title>Signup Page</title>
</head>
<body>
<a href="home.php"> Back </a> |
        <form method="POST" action="../controller/regCheck.php" enctype="multipart/form-data">
            <fieldset align = "center">
                <legend>Add Employee</legend>
            Employee Name:   <input type="text" name="employee_name" value="" /><br>
            Contact No:   <input type="text" name="contact_no" value="" /> <br>
            User Name:      <input type="text" name="username" value="" /> <br>
            Password:      <input type="password" name="password" value="" /> <br>
                        <input type="submit" name="submit" value="Submit" />
                        <a href="home.php"> Login </a> 
            </fieldset>
           
        </form>    
</body>
</html>