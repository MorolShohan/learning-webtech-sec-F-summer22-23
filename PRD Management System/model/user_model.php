<?php
require_once('database.php');
function user($username,$password){
    $conn=dbConnection();
    $sql="select * from user where userName='$username' and password='$password'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function addProject($projectname,$featurearray,$Specificationarray){
    $conn=dbConnection();
    $sql="INSERT INTO project VALUES('','$projectname','$featurearray','$Specificationarray')";
    $result=mysqli_query($conn,$sql);
    return $result;
}


function addFeature($featurename){
    $conn=dbConnection();
    $sql="INSERT INTO feature VALUES('','$featurename')";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function featureName(){
    $conn=dbConnection();
    $sql="SELECT FeatureName FROM feature";
    $result=mysqli_query($conn,$sql);
    return $result;
}

function addSpecification($specificationname,$ScreenDefinition,$UserStory,$AcceptanceCriteria){
    $conn=dbConnection();
    $sql="INSERT INTO specification VALUES('','$specificationname','$ScreenDefinition','$UserStory','$AcceptanceCriteria')";
    $result=mysqli_query($conn,$sql);
    return $result;
}

function SpecificationName(){
    $conn=dbConnection();
    $sql="SELECT SpecificationName FROM specification";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function project(){
    $conn=dbConnection();
    $sql="SELECT * FROM project";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function searchproject($value){
    $conn=dbConnection();
    $sql="SELECT * FROM project where ProjectName LIKE'%$value%'";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function SpecificationSearch($value){
    $conn=dbConnection();
    $sql="SELECT * FROM specification WHERE SpecificationName LIKE'%$value%'";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function countProject(){
    $conn=dbConnection(); 
    $sql="SELECT COUNT(*) as totalnumber FROM project";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function countFeature(){
    $conn=dbConnection(); 
    $sql="SELECT COUNT(*) as totalfeature FROM feature";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function countanalyst(){
    $conn=dbConnection(); 
    $sql="SELECT COUNT(*) as totalanalyst FROM user WHERE Role='Analyst'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

?>