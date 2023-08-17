
<html>
<head>
    <title>search</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
 
        <table>
            <tr>
                <td>
                <input type="text" name="search" id="search" placeholder="select a User" onkeyup='liveSearchAJAX()'>
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

<script>
 

    function liveSearchAJAX()
    {  
    let search = document.getElementById("search").value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/hola.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('search='+search);

    xhttp.onreadystatechange = function()
    {
        
        if(this.readyState == 4 && this.status == 200)
        {    
            document.getElementsByTagName("h3")[0].innerHTML = this.responseText;
        }
        
    }
}
</script>

</body>
</html>