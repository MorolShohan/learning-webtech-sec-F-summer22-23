<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<script src = "../js/login.js">
	</script>
	
<link rel="stylesheet" type="text/css" href="style.css" /> 
<title>Admin Login</title>
</head>
<body>
<div class = "login"> <br><br><br><br><br><br><br><br><br>   
	<fieldset><br>
      <legend>Admin Login</legend>
								<form id="login-form" name="login-form"action="../controller/logincheck.php" method="post">
										<label for="login-form-email">Email:</label>
										<input type="email" id="login-form-username" name="email" value="" /><br>
									
										<label for="login-form-password">Password:</label>
										<input type="password" id="login-form-password" name="password" value=""/><br>

										<!-- <button id="login-form-submit" name="submit" value="login">Login</button> -->
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
									


						<div class = "footer"><small>Copyrights &copy; 2023 All Rights Reserved by SHOHAN.</small></div>

					</div>
				</div>

			</div>

		</section>

	</div>



</body>
</html>