<?php
 include("../model/config.php");
 if((!isset($_SESSION['userId']) && empty($_SESSION['userId'])) && (!isset($_SESSION['userName']) && empty($_SESSION['userName']))) {

			 header('Location: index.php');
	 } else{

			 $categorieId1 = $_GET["id"];
			 $loginName = $_SESSION['userName'];
			 $loginId = $_SESSION['userId'];
			 $power = $_SESSION['adminType'];

		

			 if( isset($_POST['submit']) ){
					 
					 
					 if( isset($_POST['fullname']) && !empty($_POST['fullname'])){
			 
						if (strpos($_POST['fullname'], " ") !== false) {
								 $name = mysqli_real_escape_string($connection,$_POST['fullname']);
							 }else{
								 $message_name = '<b class="text-danger text-center">Please type correct name</b>';
							 }

					 }else{
							 $message_name = '<b class="text-danger text-center">Please fill the name field</b>';
					 }


					 if(  isset($name) && !empty($name) ){

									 $insert_query = "UPDATE `categories` SET
									 categorie = '$name'
									 WHERE id = '$categorieId1' ";


									 if(mysqli_query($connection, $insert_query)){
											 
											
											 header('Location: categorie.php?back=2');
									 }else{
											 $submit_message = '<div class="alert alert-danger">
													 <strong>Warning!</strong>
													 You are not able to submit please try later
											 </div>';
									 }
					 }
	 }

	



	 if(isset($_GET['id'])){

			 $categorieId1 = $_GET["id"];

			 if($power == 'yes') {

					$query = "SELECT * FROM `categories` WHERE id='$categorieId1' ";

					 $result = mysqli_query($connection,$query);

							 if(mysqli_num_rows($result) > 0){
										 while( $row = mysqli_fetch_assoc($result) ){

									 $coursename = $row["categorie"];
															 
							 }
					 }
			 }else header('Location: categorie.php?back=1');    

	 } else header('Location: categorie.php?back=1');
 
 
?>

<head>
<link rel="stylesheet" href="style.css">
</head>
					<nav class = "navbar">
					<ul class = "nav-list">
						<li><a href="home.php">Home</a></li>

            <li  class="current"><a href="categorie.php"></i>Categories</a></li>

						<li><a href="instructors.php">Instructors</a></li>

            <li><a href="team.php">Team</a></li>

            <li><a href="logout.php">Logout</a></li>    
						<li><a href="adminsearch.php">Search Admin</a></li>    
                        <li><a href="instructorsearch.php">Search Instructor</a></li>    
                        <li><a href="teamsearch.php">Search Team Member</a></li>   
                        <li><a href="jsonsearch2.php">JSON Categorie SEARCH</a></li>    

					</ul>
				</nav>

	
				<h1>Welcome <strong><?php if(isset($loginName)) echo $loginName; ?></strong></h1>
	</div>
                    

                <?php

                        if(isset($message_name) ||  isset($submit_message)){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Update Course Categorie</h3>

                        <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="CourseId1">Course Name</label>
                        <input type="text" id="CourseId1" placeholder="Full Name" value="<?php if(isset($coursename)) echo $coursename; ?>" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>
                    
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="Submit">Submit</button>
                    </div>
                </form>

		</section>

<?php include('footer.php'); 

}

?>