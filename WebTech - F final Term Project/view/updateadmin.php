<?php


include("../model/config.php");


if((!isset($_SESSION['userId']) && empty($_SESSION['userId'])) && (!isset($_SESSION['userName']) && empty($_SESSION['userName']))) {

    header('Location: index.php');
} else{
    

    $adminId = $_GET['id'];
    $loginName = $_SESSION['userName'];
    $loginId = $_SESSION['userId'];
    $power = $_SESSION['adminType'];

    if( isset($_POST['submit']) ){

        if(isset($_POST["admin_op"]) && !empty($_POST["admin_op"])){

            $admin_type = $_POST["admin_op"];
        } else {
            $admin_error = '<b class="text-danger text-center">Please select Admin Type option.</b>';
        }      
        
        if( isset($_POST['fullname']) && !empty($_POST['fullname'])){
    
            if (strpos($_POST['fullname'], " ") !== false) {
              $name = mysqli_real_escape_string($connection,$_POST['fullname']);
            }else{
              $message_name = '<b class="text-danger text-center">Please type correct name</b>';
            }
        }else{
            $message_name = '<b class="text-danger text-center">Please fill the name field</b>';
        }

        if( isset($_POST['email']) && !empty($_POST['email']) ){
            
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                
                $cemail = mysqli_real_escape_string($connection,$_POST['email']);  
          
                $query = "SELECT * FROM `admin` WHERE id != '$adminId' AND admin_mail='$cemail' ";
                $result = mysqli_query($connection, $query);
                if(mysqli_num_rows($result) > 0){
                        $message_email = '<b class="text-danger text-center">Email already exists try again.</b>';
                }else{
                    $email = mysqli_real_escape_string($connection,$_POST['email']);
                    
                }
            }else{
                  $message_email = '<b class="text-danger text-center">Please type correct email</b>';
            }
        }else{
            $message_email = '<b class="text-danger text-center">Please fill email field</b>';
        }


        if( !isset($_POST['password']) && empty($_POST['password'])){
                $message_pass = '<b class="text-danger text-center">Please fill the password field</b>';
        }
        
        
        if(isset($_POST['c_password']) && !empty($_POST['c_password'])){
                
                if($_POST['c_password'] != $_POST['password']){
                    $message_c_pass = '<b class="text-danger text-center">Please write same password in both fields</b>';
                  }else{
                          if(strlen($_POST['password']) < 6){

                                $message_pass = '<b class="text-danger text-center">your password should be 6 character long</b>';
                            }else{
                                $password = md5(mysqli_real_escape_string($connection,$_POST['password']));
                            }                      
                        }

        }else{
                $message_c_pass = '<b class="text-danger text-center">Please fill the confirm password field field</b>';
        }
           

        if( isset($_FILES["profilePic"]["name"]) && !empty($_FILES["profilePic"]["name"]) ){
            $target_dir = "images/admin/";
            $del = 'yes';

            $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            
            $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
            if($check !== false) {
                
                $uploadOk = 1;
            } else {
                $message_picture  = '<b class="text-danger">File is not an image</b>';
                $uploadOk = 0;
            }
            
            
            if ($_FILES["profilePic"]["size"] > 5000000) {
                $message_picture =  '<b class="text-danger">Sorry, your file is too large.</b>';
                $uploadOk = 0;
            }
           
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $message_picture =  '<b class="text-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed</b>';
                $uploadOk = 0;
            }

            
            if ($uploadOk != 0) {
                $temp = explode(".", $_FILES["profilePic"]["name"]);
                $newfilename = mysqli_real_escape_string($connection,round(microtime(true)) . '.' . end($temp));
                if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_dir . $newfilename)) {

                    
                } else {
                    $message_picture =  '<b class="text-danger">Sorry, there was an error uploading your file';
                }
            }

        }else{
                $newfilename =  $_POST['picValue'];
                $del = 'no';
        }

        
        if( ( isset($name) && !empty($name) ) && ( isset($admin_type) && !empty($admin_type) ) && ( isset($email) && !empty($email) ) && ( isset($password) && !empty($password) ) && ( isset($newfilename) && !empty($newfilename) ) ){

            $check_email = "SELECT * FROM `admin` WHERE id != '$adminId' AND admin_mail = '$email'";

            $check_res = mysqli_query($connection, $check_email);
            if(mysqli_num_rows($check_res) > 0){
                $message_email = '<b class="text-danger text-center">This email already exists try another one</b>';
            }else{

                        $update_query = "UPDATE `admin` SET  
                        name='$name',
                        admin_mail='$email',  
                        password='$password', 
                        profilePic='$newfilename',
                        type = '$admin_type'
                        WHERE id='$adminId'" ;


                        if(mysqli_query($connection, $update_query)){
                            
                            if($del == 'yes'){
                            $base_directory = "images/admin/";
                            if(unlink($base_directory.$_POST['picValue']))
                            $delVar = " ";
                        }

                            header('Location: home.php?back=2');
                        }else{
                            $submit_message = '<div class="alert alert-danger">
                                <strong>Warning!</strong>
                                You are not able to signup please try later
                            </div>';
                        }            
            }
        } 
    }


if(isset($_GET['id'])){

    if( $power == 'yes' || $loginId==$adminId) {

       $query = "SELECT * FROM `admin` WHERE id='$adminId' ";

        $result = mysqli_query($connection,$query);

        if(mysqli_num_rows($result) > 0){
              while( $row = mysqli_fetch_assoc($result) ){

            $adminPic = $row["profilePic"];
            $adminName = $row["name"];
            $adminMail = $row["admin_mail"];
            $adminType = $row["type"];
        
         }
        }
    }else header('Location: home.php?back=1');    

} else header('Location: home.php?back=1');



?>

<head>
<link rel="stylesheet" href="style.css">
</head>
                    <nav class = "navbar">
					<ul class = "nav-list">
						<li class="current"><a href="home.php">Home</a></li>

                        <li><a href="categorie.php">Categories</a></li>

						<li><a href="instructors.php">Instructors</a></li>

                        <li><a href="team.php">Team</a></li>

                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="adminsearch.php">Search Admin</a></li>    
                        <li><a href="instructorsearch.php">Search Instructor</a></li>    
                        <li><a href="teamsearch.php">Search Team Member</a></li> 
                        <li><a href="jsonsearch2.php">JSON Categorie SEARCH</a></li>    

					</ul>
				</nav>

			</div>
		</div>

			
		<section>

			<div>
				<h1>Welcome <strong><?php if(isset($loginName)) echo $loginName; ?></strong></h1>
			</div>


		</section>

	

                    

                <?php

              

                        if(isset($message_name) || isset($message_picture) || isset($message_pass) || isset($message_c_pass) || isset($submit_message) || isset($admin_error)){
                           echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";
                            
                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Update Admin</h3>

                        <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="nameId">Full Name</label>
                        <input type="text" id="nameId" placeholder="Full Name" value="<?php if(isset($adminName)) echo $adminName; ?>" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>

                    <div>                    
                       <label>Admin Type</label>
                        <select name="admin_op">
                        <option value="">Select Option</option>
                        
                        <option <?php if($adminType == 'yes') { ?> selected <?php } ?> value="yes" >Yes Sophisticated</option>
                        
                        <option <?php if($adminType == 'no') { ?> selected <?php } ?> value="no">Not Sophisticated</option>

                        </select>
                    <?php if(isset($admin_error)) echo $admin_error; ?>
                    </div>

                    <div>
                        <label for="emailId">Email</label>
                        <input type="email" id="emailId" placeholder="Email" value="<?php 
                        if(isset($adminMail)) echo $adminMail; ?>" name="email" class="form-control" title="someone@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        <?php if(isset($message_email)){ echo $message_email; } ?>
                    </div>
                    <div>
                            <img src="images/admin/<?php if(isset($adminPic)) echo $adminPic; ?>" width="100 px" height="100 px">
                    </div>
                    <div>       
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                           Change Profile Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>
                    <div>
                        <label for="passwordId1">Password</label>
                        <input type="password" id="passwordId1" placeholder="Password" name="password" class="form-control" required minlength="6">
                        <?php if(isset($message_pass)){ echo $message_pass; } ?>
                    </div>
                    <div>
                        <label for="passwordid2">Confirm Password</label>
                        <input type="password" id="passwordid2" placeholder="Confirm Password" name="c_password" class="form-control" required minlength="6">
                        <?php if(isset($message_c_pass)){ echo $message_c_pass; } ?>
                    </div>

                    <input type="hidden" value="<?php if(isset($adminPic)) echo $adminPic; ?>" name="picValue" />
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>

		</section>

<?php include('footer.php'); 
}
?>