
<?php

  
include("../model/config.php");

if((!isset($_SESSION['userId']) && empty($_SESSION['userId'])) && (!isset($_SESSION['userName']) && empty($_SESSION['userName']))) {

    header('Location: index.php');
} else {

    $loginName = $_SESSION['userName'];
    $loginId = $_SESSION['userId'];
    $power = $_SESSION['adminType'];
    $alertMessage = " ";
    
   

    if( isset($_POST['submit']) ){

        
        if( isset($_POST['fullname']) && !empty($_POST['fullname'])){
    
            if (strpos($_POST['fullname'], " ") !== false) {
              $name = mysqli_real_escape_string($connection,$_POST['fullname']);
            }else{
              $message_name = '<b class="text-danger text-center">Please enter correct name.</b>';
            }

        }else{
            $message_name = '<b class="text-danger text-center">Please fill the name field.</b>';
        }

            
        if( isset($_POST['qualification']) && !empty($_POST['qualification'])){
            
            if(preg_match('/^[A-Za-z\s]+$/',$_POST['qualification'])){
                $qualification = mysqli_real_escape_string($connection,$_POST['qualification']);
            }else{

                $message_q = '<b class="text-danger text-center">Please enter valid Qualifications.</b>';
            }

        }else{
           $message_q = '<b class="text-danger text-center">Please fill the Qualifications field.</b>';
        }


            if( isset($_FILES["profilePic"]["name"]) && !empty($_FILES["profilePic"]["name"]) ){
            
                $target_dir = "images/team/";
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
                $message_picture =  '<b class="text-danger">Please Select Your Profile picture</b>';
            }


            if( ( isset($name) && !empty($name) )  && ( isset($newfilename) && !empty($newfilename) ) && ( isset($qualification) && !empty($qualification) )  ){


                $insert_query = "INSERT INTO `team` (name, image, qualification) VALUES ('$name','$newfilename','$qualification')";

                if(mysqli_query($connection, $insert_query)){                        
                   
                    header('Location: team.php#end');
                }else{
                    $submit_message = '<div class="alert alert-danger">
                        <strong>Warning!</strong>
                        You are not able to submit please try later
                    </div>';
                }

            } 

        }else{

             $alertMessage = "<div class='alert alert-danger'> 
            
                </div>";    
        } 

    }

  


if(isset($_GET['sucess'])){
    $alertMessage = "<div class='alert alert-success'> 
    <p>Record Deleted successfully.</p><br>       
    <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a> 
    </div>";
}

if(isset($_GET['delid'])){ 

    $deluser = $_GET['delid'];

    if($power == 'yes'){
                               
        $alertMessage = "<div class='alert alert-danger'> 
            <p>Are you sure want to delete this Record? No take baacks!</p><br>
                <form action='".htmlspecialchars($_SERVER['PHP_SELF'])."?id=$deluser' method='post'>
                   <input type='submit' class='btn btn-danger btn-sm'
                   name='confirm-delete' value='Yes' delete!>
                   <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Oops, no thanks!</a>                         
                </form>
        </div>";
    } else {
        $alertMessage = "<div class='alert alert-danger'> 
        <p>You are not a Sophisticated Admin. So, You cannot right to delete any Record <strong>THANK YOU.</strong> </p><br>       
        <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a> 
        </div>";
    }
}



if(isset($_GET['back'])){

    $back = $_GET['back'];

    if($back!=2){
            $update_status = "<div class='alert alert-danger'> 
    <p>You are not a Sophisticated Admin. You can update your own Record.<strong>THANK YOU.</strong> </p><br>       
    <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a> 
    </div>";
    }else{

        $update_status = "<div class='alert alert-success'> 
    <p>Record Updated successfully.</p><br>       
    <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a> 
    </div>";
    }

} 


if(isset($_POST['confirm-delete'])){

    $id = $_GET['id'];

    
    $query2 = "SELECT * FROM `team` WHERE id='$id' ";

    $result2 = mysqli_query($connection, $query2);

    if(mysqli_num_rows($result2) > 0){
    
                    
         while( $row2 = mysqli_fetch_assoc($result2) ){
                
                $base_directory = "images/team/";
                if(unlink($base_directory.$row2['image']))
                    $delVar = " ";
                  
         }
    }

   
    $query = "DELETE FROM `team` WHERE id='$id'";
    $result = mysqli_query($connection,$query);
    
    if($result){
       
        header("Location: team.php?sucess=1");
    } else {
                 echo "Error".$query."<br>".mysqli_error($conn);
    }
}

?>

<head>
<link rel="stylesheet" href="style.css">
</head>



				<nav class = "navbar">
					<ul class = "nav-list">
						<li><a href="home.php">Home</a></li>

                        <li><a href="categorie.php">Categories</a></li>

						<li><a href="instructors.php">Instructors</a></li>

                        <li class="current"><a href="team.php">Team</a></li>

                        <li><a href="../controller/logout.php">Logout</a></li>    
                        <li><a href="adminsearch.php">Search Admin</a></li>    
                        <li><a href="instructorsearch.php">Search Instructor</a></li>    
                        <li><a href="teamsearch.php">Search Team Member</a></li>   
                        <li><a href="jsonsearch2.php">JSON Categorie SEARCH</a></li>    

					</ul>
                    
				</nav>

			</div>
		</div>

			
		<section id="page-title">

			<div class="container clearfix">
				<h1>Welcome <strong><?php if(isset($loginName)) echo $loginName; ?></strong></h1>
			</div>

			<div id="page-menu-wrap">

				<div class="container clearfix">


				</div>

			</div>

		</section>

		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
			

				<div class="postcontent nobottommargin">
                
                <?php

                    echo $alertMessage; 
                    if(isset($update_status)) echo $update_status;

                        if(isset($message_name) || isset($message_picture) || isset($submit_message)  || isset($message_q) ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Insert Member</h3>

                        <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="fullnameId1">Full Name</label>
                        <input type="text" id="fullnameId1" placeholder="Full Name" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Change Profile Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>
                    <div class="form-group">
                        <label for="qualificationId1">Qualifications</label>
                        <input type="tex" id="qualificationId1" placeholder="Qualifications" name="qualification" class="form-control">
                        <?php if(isset($message_q)){ echo $message_q; } ?>
                    </div>
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>
                        					


    
    
    <table border 3 align = "center">
    <tr>
        <th>ID</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Qualification</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `team`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                      
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
echo "<td>".$row["id"]."</td> <td><img src=images/team/".$row["image"]." width='80px' height='80px'> </td> <td>".$row["name"]."</td><td>".$row["qualification"]."</td>";

echo '<td><a href="updateteam.php?id='.$row['id'].'">Update<span class ="icon-trash2"></span></a></td>';
                
                
echo '<td><a href="team.php?delid='.$row['id']. '" >
Delete <span class="icon-trash2"></span></a></td>';

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no team<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="9" id="end"><div class="text-center"><a href="team.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>


    



					</div>


				</div>

			</div>

		</section>

<?php include('footer.php'); 


?>