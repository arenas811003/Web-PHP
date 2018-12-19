<?php
      include 'mysql.php';
      //require 'composer/vendor/autoload.php';
      if(!empty($_POST['ID'])){
          $PID=$_POST['ID'];
          $db = new db;
          $sql = "delete from Pi_list where PID = $PID";
          $db->delete($sql);
          
          echo "已刪除";
          
    }
    if(!empty($_POST['name']) && !empty($_POST['PID'])){  //update pi name
        $describe=$_POST['name'];
        $PID = $_POST['PID'];
        $sql = "update Pi_list set P_DESCRIBE='$describe' where PID =$PID";
        $db = new db;
        $db->update($sql);
        echo true;

    }
    

    if(!empty($_GET['F_TYPE'])){    //select onclick
        $F_TYPE = $_GET['F_TYPE'];
        $F_NAME = "select F_NAME from Manual where F_TYPE ='$F_TYPE'" ;
        $db = new db;
        $row=$db->select_array($F_NAME);
        
        $lengh=count($row);  
        $string="";          
        for($i=0;$i<=$lengh-1;$i++){
            $string=$string."-".$row[$i][0];
            
        }
        $string=$string."-end";
        echo $string;
    }
    
    if(!empty($_POST['F_TYPE']) && !empty($_POST['F_NAME']) && !empty($_POST['PID'])){ // update piwork
        $F_TYPE = $_POST['F_TYPE'];
        $F_NAME = $_POST['F_NAME'];
        $PID = $_POST['PID'];
        $db = new db;
        $FID_sql ="select FID from Manual where F_TYPE = '$F_TYPE' and F_NAME = '$F_NAME'";
        $FID = $db->select($FID_sql);
        $FID = $FID['FID']; 
        $PID_sql = "update Pi_list set P_FID= '$FID' where PID='$PID'";
        $db->update($PID_sql);
        echo true;

    }

?>