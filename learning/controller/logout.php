<?php
        
        session_start();
        if(isset($_COOKIE[session_name() ])){
           setcookie( session_name(), '' ,time()-8640,'/' ); 
        }
        
        
            
        session_unset();
        $_SESSION[]=array();
        session_destroy();
        
        header("Location: ../view/index.php");
?>