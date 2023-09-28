<?php
include("../model/config.php");

if((!isset($_SESSION['userId']) && empty($_SESSION['userId'])) && (!isset($_SESSION['userName']) && empty($_SESSION['userName']))) {

    header('Location: index.php');
} else {

    $instructorId = $_GET['id'];
    $loginName = $_SESSION['userName'];
    $loginId = $_SESSION['userId'];
    $power = $_SESSION['adminType'];


    if( isset($_POST['submit']) ){

        
        if( isset($_POST['fullname']) && !empty($_POST['fullname'])){
    
            if (strpos($_POST['fullname'], " ") !== false) {
              $name = mysqli_real_escape_string($connection,$_POST['fullname']);
            }else{
              $message_name = '<b class="text-danger text-center">Please enter correct Name.</b>';
            }

        }else{
            $message_name = '<b class="text-danger text-center">Please fill the Name field.</b>';
        }

        
        if( isset($_POST['email']) && !empty($_POST['email']) ){
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $cmail = mysqli_real_escape_string($connection,$_POST['email']);  
              
              $query = "SELECT * FROM `teacher` WHERE id != '$instructorId' AND mail='$cmail' ";
              $result = mysqli_query($connection, $query);
                if(mysqli_num_rows($result) > 0){
                    $message_email = '<b class="text-danger text-center">Email already exists try again.</b>';
                }else{
                    $email = mysqli_real_escape_string($connection,$_POST['email']);                    
                }
            }else{
                $message_email = '<b class="text-danger text-center">Please enter correct email.</b>';
            }
        }else{
            $message_email = '<b class="text-danger text-center">Please fill email field.</b>';
        }

      
        if( isset($_POST['phone']) && !empty($_POST['phone'])){
            
        
                $phone = mysqli_real_escape_string($connection,$_POST['phone']);
            }else{
                    $message_ph = '<b class="text-danger text-center">Please enter valid phone number.</b>';
            }
             
        }else{
                $message_ph = '<b class="text-danger text-center">Please fill the Phone field.</b>';
        } 

      
        if( isset($_POST['description']) && !empty($_POST['description']) ){
            
            
                $description = mysqli_real_escape_string($connection,$_POST['description']);
            

        }else{
            $message_des = '<b class="text-danger text-center">Please fill the Description field.</b>';
        }     

      
        if( isset($_POST['qualification']) && !empty($_POST['qualification'])){            
            if(preg_match('/^[A-Za-z\s]+$/',$_POST['qualification'])){
                $qualification = mysqli_real_escape_string($connection,$_POST['qualification']);
            }else{

                $message_q = '<b class="text-danger text-center">Please enter valid Qualifications field.</b>';
            }
        }else{
            $message_q = '<b class="text-danger text-center">Please fill the Qualifications field.</b>';
        }


        if( isset($_FILES["profilePic"]["name"]) && !empty($_FILES["profilePic"]["name"]) ){
            $target_dir = "images/instructor/";
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
            // $newfilename =  $_POST['picValue'];
            $del = 'no';
        }



        if( ( isset($name) && !empty($name) ) && ( isset($email) && !empty($email) ) && ( isset($newfilename) && !empty($newfilename) ) && ( isset($phone) && !empty($phone) ) && ( isset($description) && !empty($description) ) && ( isset($qualification) && !empty($qualification) )  ){

                $insert_query = "UPDATE `teacher` set
                 name ='$name', 
                 mail ='$cmail', 
                 phone = '$phone', 
                 image = '$newfilename', 
                 qualification = '$qualification', 
                 description =  '$description'
                 WHERE id = '$instructorId'";

                if(mysqli_query($connection, $insert_query)){
                    
                    if($del == 'yes'){
                    $base_directory = "images/instructor/";
                    if(unlink($base_directory.$_POST['picValue']))
                    $delVar = " ";
                }
                   
                    header('Location: instructors.php?back=2');
                }else{
                    $submit_message = '<div class="alert alert-danger">
                        <strong>Warning!</strong>
                        You are not able to submit please try later
                    </div>';
                }
            } 
        }


if(isset($_GET['id'])){

    $instructorId = $_GET['id'];
    if( $power == 'yes' ) {

       $query = "SELECT * FROM `teacher` WHERE id=$instructorId ";

        $result = mysqli_query($connection,$query);

        if(mysqli_num_rows($result) > 0){
              while( $row = mysqli_fetch_assoc($result) ){

            $teacherPic = $row["image"];
            $teacherName = $row["name"];
            $teacherMail = $row["mail"];
            $teacherPhone = $row["phone"];
            $teacherdes = $row["description"];
            $teacherqualification = $row["qualification"];

        
         }
        }
    }else header('Location: instructors.php?back=1');    

} else header('Location: instructors.php?back=1');




?>

<head>
<link rel="stylesheet" href="style.css">
</head>
                    <nav class = "navbar">
					<ul class = "nav-list">
						<li><a href="home.php">Home</a></li>

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

			<div 
				<h1>Welcome <strong><?php if(isset($loginName)) echo $loginName; ?></strong></h1>
</div>

		</section>

                <?php
 

                        if(isset($message_name) || isset($message_picture) || isset($message_picture) || isset($submit_message) || isset($message_q) || isset($message_des) || isset($message_ph)){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                             

                        }

                 ?>
                 
						<h3>Update Instructor</h3>

                        <form action="" method="post" enctype="multipart/form-data">

                    <div>
                        <label for="fullnameId1">Full Name</label>
                        <input type="text" id="fullnameId1" placeholder="Full Name" value="<?php if(isset($teacherName)) echo $teacherName; ?>" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>

                    <div>
                        <label for="emailId1">Email</label>
                        <input type="email" id="emailId1" placeholder="Email" value="<?php if(isset($teacherMail)) echo $teacherMail; ?>" name="email" class="form-control" title="someone@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        <?php if(isset($message_email)){ echo $message_email; } ?>
                    </div>

                    <div>
                    <img src="images/instructor/<?php if(isset($teacherPic)) echo $teacherPic; ?>" width="100px" height="100px">
                    </div>

                    <div>
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Profile Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>

                    <div>
                        <label for="qualificationid1">Qualifications</label>
                        <input type="tex" id="qualificationid1" placeholder="Qualifications" value="<?php if($teacherqualification) echo $teacherqualification; ?>" name="qualification" class="form-control">
                        <?php if(isset($message_q)){ echo $message_q; } ?>
                    </div>

                    <div>
                        <label for="phoneId1">Phone</label>
                        <input type="text" id="phoneId1" placeholder="Phone" value="<?php if(isset($teacherPhone)) echo $teacherPhone; ?>" name="phone" class="form-control">
                        <?php if(isset($message_ph)){ echo $message_ph; } ?>
                    </div>

                    <div>
                		<label for="descriptionId1">Description</label>
                		<textarea id="descriptionId1" placeholder="Description" class="form-control"
                		 name="description"><?php if(isset($teacherdes)) echo $teacherdes; ?></textarea>
             		</div>
             		<?php if(isset($message_des)){ echo $message_des; } ?>
                    <input type="hidden" value="<?php if(isset($teacherPic)) echo $teacherPic; ?>" name="picValue"/>
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>

		</div>


				</div>

			</div>

		</section>

<?php include('footer.php'); 


?>