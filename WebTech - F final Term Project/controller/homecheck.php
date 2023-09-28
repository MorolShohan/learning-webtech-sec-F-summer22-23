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

            if(isset($_POST["admin_op"]) && !empty($_POST["admin_op"])){

                $admin_type = $_POST["admin_op"];
            } else {
                $admin_error = '<b class="text-danger text-center">Please select Admin Type option.</b>';
            }       

           
            if( isset($_POST['fullname']) && !empty($_POST['fullname'])){
                    if (strpos($_POST['fullname'], " ") !== false) {
                  $name = mysqli_real_escape_string($connection,$_POST['fullname']);
                }else{
                  $message_name = '<b class="text-danger text-center">Please type correct Name</b>';
                }

              }else{
                  $message_name = '<b class="text-danger text-center">Please fill the Name field</b>';
            }


                if( isset($_POST['email']) && !empty($_POST['email']) ){
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                      $cemail = mysqli_real_escape_string($connection,$_POST['email']);  
                      
                      $query = "SELECT * FROM `admin` WHERE admin_mail='$cemail' ";
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



            if( ( isset($name) && !empty($name) ) && ( isset($admin_type) && !empty($admin_type) ) && ( isset($email) && !empty($email) ) && ( isset($password) && !empty($password) ) && ( isset($newfilename) && !empty($newfilename) ) ){


                $insert_query = "INSERT INTO `admin` (name, admin_mail,  password, profilePic, type) VALUES ('$name','$email','$password','$newfilename','$admin_type')";


                if(mysqli_query($connection, $insert_query)){
                    
                   
                    header('Location: home.php#end');
                }else{
                    $submit_message = '<div class="alert alert-danger">
                        <strong>Warning!</strong>
                        You are not able to signup please try later
                    </div>';
                }

            }       
        } 

    }
}

   


if(isset($_GET['sucess'])){

    $alertMessage = "<div class='alert alert-success'> 
    <p>Record <strong>Deleted</strong> successfully.</p><br>       
    <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a> 
    </div>";

}

if(isset($_GET['delid'])){ 

    $deluser = $_GET['delid'];

    if($power == 'yes'){

       if ($deluser != 1) {
                       
        $alertMessage = "<div class='alert alert-danger'> 
            <p>Are you sure want to delete this Admin? No take baacks!</p><br>
                <form action='".htmlspecialchars($_SERVER['PHP_SELF'])."?id=$deluser' method='post'>
                   <input type='submit' class='btn btn-danger btn-sm'
                   name='confirm-delete' value='Yes' delete!>
                   <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Oops, no thanks!</a> 
                    
                </form>
            </div>";
        } else {

            $alertMessage = "<div class='alert alert-danger'> 
            <p>cannot Delete yourself <strong>THANK YOU.</strong> </p><br>       
            <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a> 
            </div>";
        }        
    }else{
        $alertMessage = "<div class='alert alert-danger'> 
        <p>You are not a Sophisticated Admin. So, You cannot right to delete any Admin <strong>THANK YOU.</strong> </p><br>       
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

   
    $query2 = "SELECT * FROM `admin` WHERE id='$id' ";

    $result2 = mysqli_query($connection, $query2);

    if(mysqli_num_rows($result2) > 0){
    
                   
     while( $row2 = mysqli_fetch_assoc($result2) ){
            
            $base_directory = "images/admin/";
            if(unlink($base_directory.$row2['profilePic']))
                $delVar = " ";  
     }}

    $query = "DELETE FROM `admin` WHERE id='$id'";
    $result = mysqli_query($connection,$query);
    
    if($result){
        
        header("Location: home.php?sucess=1");
    } else {
                 echo "Error".$query."<br>".mysqli_error($conn);
            }
}



    
?>