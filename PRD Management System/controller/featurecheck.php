<?php
    require_once('user_model.php');
    if(isset($_POST['submit'])){
        $featurename=$_POST['featurename'];
        $result=addFeature($featurename);
        if($result){
            echo"Congratulations New Feature Has been added";
        }else{
            echo"Failed! Please try again";
        }
    }
?>