<?php 
include("../model/config.php");

    
    $typedText = $_POST['typedText'];
    
   
    if($typedText == null)
    {
        echo "No selected user";

    }
    else if($typedText != null )
    {
        if(isset($_POST['typedText']))
        {    
            $typedText = $_POST['typedText'];

            // $con = getConnection();
            $sql= "select * from team where name like '%{$typedText}%'";
            $result = mysqli_query($connection, $sql);
            $count= mysqli_num_rows($result);




                if($count >0)
                {
                    echo
                    '<table border="1">
                        <tr>
                            <th>ID</th> 
                            <th>Name</th>
                      
                            <th>Qualification</th>
                            
                        </tr>
                        <tr>';
                        while($row=mysqli_fetch_array($result))
                           { echo '<td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['qualification'].'</td>
                            
                        </tr>'; }
                   echo '</table>';
                  //  echo json_encode($row);
                }
                else
                {
                    echo'Data not found';
                }
                
        }
                
    }

?>