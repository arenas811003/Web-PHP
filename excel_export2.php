<?php

include 'mysql.php';

if(!empty($_GET['F_TYPE'])){    
    $F_TYPE = $_GET['F_TYPE'];
    $F_NAME = "select F_NAME from Manual where F_TYPE ='$F_TYPE'" ;
    $db = new db;
    $row=$db->select_array($F_NAME);
    
    $lengh=count($row);  
    $string="";          
    for($i=0;$i<=$lengh-1;$i++){
        $string=$string."-".$row[$i][0];
        //echo "<option>".$row[$i][0]."</option>";
    }
    $string=$string."-end";
    echo $string;
}

   



?>  
       
        
        
       
 
    
    
    
   
    
   

                                   
