
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

        if($power == 'yes'){ 

            
            if( isset($_POST['fullname']) && !empty($_POST['fullname'])){
    
                if(preg_match('/^[A-Za-z\s]+$/',$_POST['fullname'])){
                  $name = mysqli_real_escape_string($connection,$_POST['fullname']);
                }else{
                  $message_name = '<b class="text-danger text-center">Please enter correct name.</b>';
                }
            }else{
                $message_name = '<b class="text-danger text-center">Please fill the name field.</b>';
            }

            
            if(isset($_POST['qualification']) && !empty($_POST['qualification'])){
            
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
            
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
                if($check !== false) {
                    
                    $uploadOk = 1;
                } else {
                    $message_picture  = '<b class="text-danger">File is not an image</b>';
                    $uploadOk = 0;
                }
                
                // Check file size
                if ($_FILES["profilePic"]["size"] > 5000000) {
                    $message_picture =  '<b class="text-danger">Sorry, your file is too large.</b>';
                    $uploadOk = 0;
                }
                
                // Allow certain file formats
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
                <p>You are not a Sophisticated Admin. So, You cannot right to delete any Record <strong>THANK YOU.</strong> </p><br>       
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


include('header.php');

}
?>