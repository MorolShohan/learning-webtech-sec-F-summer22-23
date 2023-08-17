<?php
require_once('../model/user_model.php');
if(isset($_POST['submit'])){
    $projectname=$_POST['projectname'];
    $Featurelist=$_POST['Featurelist'];
    $SpecificationList=$_POST['SpecificationList'];
    $featurearray="";
    $Specificationarray="";
    foreach($Featurelist as $feature){
       $featurearray.=$feature.",";
    }
    foreach($SpecificationList as $Specification){
        $Specificationarray.=$Specification.",";
    }
    $result=addProject($projectname,$featurearray,$Specificationarray);
    if($result){
        echo"Congratulations New Project Has been added";
    }else{
        echo"Failed! Please try again";
    }
}

?>