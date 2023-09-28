function isValidEmail(email) {
  const pos = email.indexOf("@");
  if (pos === -1) {
      return false;
  }

  const localPart = email.slice(0, pos);
  const domainPart = email.slice(pos + 1);

  if (domainPart.indexOf(".") === -1) {
      return false;
  }

  if (!localPart || !domainPart) {
      return false;
  }

  return true;
}


function validateForm() {
  var email = document.getElementById("login-form-username").value;
  var password = document.getElementById("login-form-password").value;

    if(!isValidEmail(email)){
    showError("Invalid email address.");
  } else if (password.length < 8) {
    showError("Password must be at least 8 characters long.");
  } else {
    
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/logincheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "email=" + email + "&password="+ password

    xhttp.send(data);
    xhttp.onreadystatechange = function (){
      if(this.readyState == 4 && this.status == 200){
      
          document.getElementById('show').innerHTML = this.responseText;
      }
    
  }
}

function showError(message) {
  var errorDiv = document.getElementById("error");
  errorDiv.innerHTML = message;
}

}