<html>
<head>
    <title>search Admin</title>
    <link rel="stylesheet" href="style.css">
  
</head>
<body>
<center>
 
        <table>
            <tr>
                <td>
                <input type="text" name="search" id="search" placeholder="select a Admin" onkeyup='liveSearchAJAX()'>
                <input type="submit" name="search" id="search" onclick='liveSearchAJAX()'>

                </td>
            </tr>
            <tr>
                <td>
                    <h3 id="info"></h3>
            
                
                <td>
            </tr>
            
        </table>
  
</center>

<button><a href="home.php">Go Back</a></button>
<script src='../js/adminsearch.js'></script>


</body>
</html>