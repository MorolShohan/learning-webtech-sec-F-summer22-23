<?php
require_once('../model/user_model.php');
$name= $_REQUEST['name'];
$result=SpecificationSearch($name);
if(mysqli_num_rows($result) > 0) {
   echo" <table border=\"1\">";
    while($row = mysqli_fetch_assoc($result)) {
        $SID=$row["SID"];
        $sn=$row["SpecificationName"];
        $sd=$row["ScreenDefinition"];
        $us=$row["UserStory"];
        $ac=$row["AcceptanceCriteria"];
        $pic=$row["picture"];
        echo"
        <tr><td>Specification ID</td>
        <td>Specification Name</td>
        <td>User Stroy</td>
        <td>AcceptanceCriteria</td>
        <td>UI Screen</td>
        </tr>
        <tr><td>$SID</td>
            <td>$sn</td>
            <td>$us</td>
            <td>$ac</td>
            <td><img src=\"$pic\" width=\"350px\"></td>
        </tr>";
        
    }
   echo" </table>";
}else{
    echo "No Details Found";
}
?>