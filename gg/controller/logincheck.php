<?php 

	include("../model/config.php");
	
    
			if($_SERVER['REQUEST_METHOD']=== 'POST'){
			
$email = $_POST['email'];
$password = $_POST['password'];

	    
    	if( (isset($email) && !empty($email)) && (isset($password) && !empty($password)) ){

	        $email = mysqli_real_escape_string($connection, $email);
	        $password = md5(mysqli_real_escape_string($connection, $password));
	        $check_sql = "SELECT * FROM `admin` WHERE admin_mail='$email' AND password = '$password'";
	        $result = mysqli_query($connection, $check_sql);
                       

        	if ($result && mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
						$user = $row;
						$_SESSION['user'] = $user;
						if ($row['type'] === 'yes') {
							$_SESSION['userId'] = $row['id'];
							$_SESSION['userName'] = $row['name'];
							$_SESSION['adminType'] = $row['type'];
							header('Location: ../view/home.php'); 
								exit();
						} else {
							$_SESSION['userId'] = $row['id'];
							$_SESSION['userName'] = $row['name'];
							$_SESSION['adminType'] = $row['type'];
								setcookie('status', 'true', time() + 3600, '/');
								header('Location: ../view/homepage.php');
								exit();
						}

        	if($row <= 0)
        	{

            	$message_found = '<div class="text-danger text-center"><strong>OOP\'s!</strong> email or password not found</div>';
  
        	}
    	}

    }
	}


 ?>