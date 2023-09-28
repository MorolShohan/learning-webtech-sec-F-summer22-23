<?php 
include("../model/config.php");

    
    $search = $_POST['search'];
    
   
    if($search == null)
    {
        echo "No selected user";

    }
    else if($search != null )
    {
        if(isset($_POST['search']))
        {    
            $search = $_POST['search'];

           
            $sql= "select * from team where name like '%{$search}%'";
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
                }
                else
                {
                    echo'Data not found';
                }
                
        }
                
    }

?>