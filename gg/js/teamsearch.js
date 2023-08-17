function liveSearchAJAX()
{  
let search = document.getElementById("search").value;
let xhttp = new XMLHttpRequest();

xhttp.open('POST', '../controller/fetch3.php', true);
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