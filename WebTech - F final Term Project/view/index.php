<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<script src = "../js/login.js">
	</script>
<title>Admin Login</title>
<style>
	body {
	background-image: url('images/bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

</style>
</head>
<body>
<div class = "form"> <br><br><br><br><br><br><br><br><br>  
<p align = "center">LOGIN</p> 
	<fieldset><br>
	
      
								<form id="login-form" name="login-form"action="../controller/logincheck.php" method="post">
										<label for="login-form-email">Email:</label>
										<input type="email" id="login-form-email" name="email" value="" /><br>
									
										<label for="login-form-password">Password:</label>
										<input type="password" id="login-form-email" name="password" value=""/><br>
										<button onclick="validateform()" id="login-form-submit" name="submit" value="login">Login</button>
		
									
								</form>
</fieldset>

</div>
								
								<?php 

								if(isset($message_pass) || isset($message_mail) || isset($message_found)){ 

									if(isset($message_mail))
										echo "$message_mail <br>";
									if (isset($message_pass)) 
										echo "$message_pass <br>";
									if (isset($message_found)) 
										echo "$message_found";

									}


								?>
									

<br>
						
						<?php
include("footer.php");
						?>

</body>
</html>