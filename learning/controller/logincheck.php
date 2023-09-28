<?php 

	include("../model/config.php");
	
    
    // if(isset($_POST['submit'])){
			if($_SERVER['REQUEST_METHOD']=== 'POST'){
			

    	
	    // if( isset($_POST['email']) && !empty($_POST['email']) ){
			// 			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	    //           $email = $_POST['email'];
	    //         }else{
	    //           $message_mail = '<b class="text-danger text-center">Please type correct Email</b>';
	            	
	    //         }
	    //     }else{
	    //       $message_mail = '<b class="text-danger text-center">Please fill Email field</b>';
	    	
	    // }

		
	    // if(isset($_POST['password']) && !empty($_POST['password'])){
	    //     if(strlen($_POST['password']) < 6){
	    //         $message_pass= '<b class="text-danger text-center">Your Password should be 6 character long</b>';
	            
	    //     }else{
	    //         $password = $_POST['password'];
	    //     }
	    // }else{
	    //     $message_pass = '<b class="text-danger text-center">Please fill Password field</b>';   	
	    // }
			// echo "here";
			// die();
$email = $_POST['email'];
$password = $_POST['password'];

	    
    	if( (isset($email) && !empty($email)) && (isset($password) && !empty($password)) ){

	        $email = mysqli_real_escape_string($connection, $email);
	        $password = md5(mysqli_real_escape_string($connection, $password));
	        $check_sql = "SELECT * FROM `admin` WHERE admin_mail='$email' AND password = '$password'";
	        $result = mysqli_query($connection, $check_sql);
                       
            if($result){
                
                while($row = mysqli_fetch_assoc($result)){
                    
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userName'] = $row['name'];
                    $_SESSION['adminType'] = $row['type'];
                    header('Location: ../view/home.php');                    
                }
            
        	}

        	
        	if($row <= 0)
        	{

            	$message_found = '<div class="text-danger text-center"><strong>OOP\'s!</strong> email or password not found</div>';
  
        	}
    	}

    }


 ?>