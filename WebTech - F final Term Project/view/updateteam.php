<?php
include("../model/config.php");

if((!isset($_SESSION['userId']) && empty($_SESSION['userId'])) && (!isset($_SESSION['userName']) && empty($_SESSION['userName']))) {

			header('Location: index.php');
	} else {

			$memberId = $_GET['id'];
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


					if( isset($_POST['qualification']) && !empty($_POST['qualification'])){
						
						if (strpos($_POST['qualification'], " ") !== false) {
							$qualification = mysqli_real_escape_string($connection,$_POST['qualification']);
						}else{

							$message_q = '<b class="text-danger text-center">Please enter valid Qualifications field.</b>';
						}

					}else{
						$message_q = '<b class="text-danger text-center">Please fill the Qualifications field.</b>';
					}


					if( isset($_FILES["profilePic"]["name"]) && !empty($_FILES["profilePic"]["name"]) ){
							$target_dir = "images/team/";
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

					if( ( isset($name) && !empty($name) )  && ( isset($newfilename) && !empty($newfilename) ) && ( isset($qualification) && !empty($qualification) )  ){

									$insert_query = "UPDATE `team` set
									 name ='$name',  
									 image = '$newfilename', 
									 qualification = '$qualification' 
									 WHERE id = '$memberId'";

									if(mysqli_query($connection, $insert_query)){
											
											if($del == 'yes'){
											$base_directory = "images/team/";
											if(unlink($base_directory.$_POST['picValue']))
											$delVar = " ";
									}
										 
											header('Location: team.php?back=2');
									}else{
											$submit_message = '<div class="alert alert-danger">
													<strong>Warning!</strong>
													You are not able to submit please try later
											</div>';
									}
							} 
					}


	if(isset($_GET['id'])){

			$memberId = $_GET['id'];
			if( $power == 'yes' ) {

				 $query = "SELECT * FROM `team` WHERE id=$memberId ";

					$result = mysqli_query($connection,$query);

					if(mysqli_num_rows($result) > 0){
							while( $row = mysqli_fetch_assoc($result) ){
									$memberPic = $row["image"];
									$memberName = $row["name"];
									$memberQualification = $row["qualification"];
							}
					}
			}else header('Location: team.php?back=1');    

	} else header('Location: team.php?back=1');

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

            <li><a href="../controller/logout.php">Logout</a></li>   
						<li><a href="adminsearch.php">Search Admin</a></li>    
                        <li><a href="instructorsearch.php">Search Instructor</a></li>    
                        <li><a href="teamsearch.php">Search Team Member</a></li>   
                        <li><a href="jsonsearch2.php">JSON Categorie SEARCH</a></li>     

					</ul>
				</nav>


				<h1>Welcome <strong><?php if(isset($loginName)) echo $loginName; ?></strong></h1>
                    

                <?php
 

                        if(isset($message_name) || isset($message_picture) || isset($submit_message) || isset($message_q) ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Update Member</h3>

                        <form action="" method="post" enctype="multipart/form-data">

                    <div>
                        <label for="fullnameId1">Full Name</label>
                        <input type="text" id="fullnameId1" placeholder="Full Name" value="<?php if(isset($memberName)) echo $memberName; ?>" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>

                    <div>
                    <img src="images/team/<?php if(isset($memberPic)) echo $memberPic; ?>" width="100px" height="100px">
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
                        <input type="tex" id="qualificationid1" placeholder="Qualifications" value="<?php if($memberQualification) echo $memberQualification; ?>" name="qualification" class="form-control">
                        <?php if(isset($message_q)){ echo $message_q; } ?>
                    </div>

                    <input type="hidden" value="<?php if(isset($memberPic)) echo $memberPic; ?>" name="picValue"/>
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>

<?php include('footer.php'); 
}

?>