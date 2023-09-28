<?php
include("../model/config.php");

if((!isset($_SESSION['userId']) && empty($_SESSION['userId'])) && (!isset($_SESSION['userName']) && empty($_SESSION['userName']))) {
    
    header('Location: index.php');

}else{

    $loginName = $_SESSION['userName'];
    $loginId = $_SESSION['userId'];
    $power = $_SESSION['adminType'];
    $alertMessage = " ";


      if( isset($_POST['submit']) ){

        if($power == 'yes'){ 
            if( isset($_POST['fullname']) && !empty($_POST['fullname'])){

                if (strpos($_POST['fullname'], " ") !== false) {
                  $name = mysqli_real_escape_string($connection,$_POST['fullname']);
                }else{
                  $message_name = '<b class="text-danger text-center">Please type correct name</b>';
                }

            }else{
                $message_name = '<b class="text-danger text-center">Please fill the name field</b>';
            }


            if( isset($name) && !empty($name)  ){

                $insert_query = "INSERT INTO `categories` (categorie) VALUES ('$name')";

                if(mysqli_query($connection, $insert_query)){
                    
                   
                    header('Location: categorie.php#end');
                }else{
                    $submit_message = '<div class="alert alert-danger">
                        <strong>Warning!</strong>
                        You are not able to submit please try later
                    </div>';
                }
            }

        } else{

             $alertMessage = "<div class='alert alert-danger'> 
                <p>You are not a Sophisticated Admin. So, You cannot right to add any categorie. <strong>THANK YOU.</strong> </p><br>       
                <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a> 
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

    $delCatecorie = $_GET['delid'];

    if($power == 'yes'){
                       
        $alertMessage = "<div class='alert alert-danger'> 
                <p>Are you sure want to delete this Record? No take baacks!</p><br>
                <form action='".htmlspecialchars($_SERVER['PHP_SELF'])."?id=$delCatecorie' method='post'>
                   <input type='submit' class='btn btn-danger btn-sm'
                   name='confirm-delete' value='Yes' delete!>
                   <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Oops, no thanks!</a> 
                </form>
        </div>";
    }else{
        $alertMessage = "<div class='alert alert-danger'> 
        <p>You are not a Sophisticated Admin. So, You cannot right to delete any Record. <strong>THANK YOU.</strong> </p><br>       
        <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a> 
        </div>";
    }
}



if(isset($_GET['back'])){

    $back = $_GET['back'];

    if($back!=2){
            $update_status = "<div class='alert alert-danger'> 
    <p>You are not a Sophisticated Admin. You can update your own record.<strong>THANK YOU.</strong> </p><br>       
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

    // new database query 
    $query = "DELETE FROM `categories` WHERE id='$id'";
    $result = mysqli_query($connection,$query);
    
    if($result){
        // redirect
        header("Location: categorie.php?sucess");
    } else {
                 echo "Error".$query."<br>".mysqli_error($conn);
            }
}


?>

	<div id="wrapper" class="clearfix">

		<div id="vertical-nav">
			<div class="container clearfix">

				<nav>
					<ul>
						<li><a href="home.php"><i class="icon-home2"></i>Home</a></li>

                        <li  class="current"><a href="categorie.php"><i class="icon-book2"></i>Categories</a></li> 

						<li><a href="instructors.php"><i class="icon-guest"></i>Instructors</a></li>

                        <li><a href="team.php"><i class="icon-users"></i>Team</a></li>

                        <li><a href="../controller/logout.php"><i class="icon-line-power"></i>Logout</a></li>    

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

                        if(isset($message_name) || isset($submit_message)){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Insert Course Categories</h3>

                        <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="CourseId1">Course Categorie</label>
                        <input type="text" id="CourseId1" placeholder="Full Name" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>
                    
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>
                        
							
    
    
    <table border 3>
    <tr>
        <th>ID</th>
        <th>Course Categories</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `categories`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
echo "<td>".$row["id"]."</td> <td>".$row["categorie"]."</td>";

echo '<td><a href="updatecategorie.php?id='.$row['id'].'">Update<span class ="icon-trash2"></span></a></td>';
                
                
echo '<td><a href="categorie.php?delid='.$row['id']. '" >
Delete <span class="icon-trash2"></span></a></td>';

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no courses.<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="4" id="end"><div class="text-center"><a href="categorie.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>


                	</div>

				</div>

			</div>

		</section>

<?php include('footer.php'); 

}
?>