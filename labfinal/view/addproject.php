<html lang="en">
<head>
    <title>Signup Page</title>
</head>
<body>
<a href="home.php"> Back </a> |
        <form method="POST" action="../controller/regCheck.php" enctype="multipart/form-data">
            <fieldset align = "center">
                <legend>Add Project</legend>
            Project Name:   <input type="text" name="name" value="" /><br>
            Project Description:   <input type="text" name="description" value="" /><br>
            <input type="submit" name = "submit" >
            </fieldset>
           
        </form>    
</body>
</html>