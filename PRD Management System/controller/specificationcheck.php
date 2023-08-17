<?php
 require_once('../model/user_model.php');
    if(isset($_POST['submit'])){
        $specificationname=$_POST['specificationname'];
        $ScreenDefinition=$_POST['ScreenDefinition'];
        $UserStory=$_POST['UserStory'];
        $AcceptanceCriteria=$_POST['AcceptanceCriteria'];

        
        $result=addSpecification($specificationname,$ScreenDefinition,$UserStory,$AcceptanceCriteria,$fileName);
        if($result){
        echo"Congratulations New Specification Has been added";
        }else{
        echo"Failed! Please try again";
        }
        
    }

?>