
<?php
        include 'mysql.php';
        //require 'composer/vendor/autoload.php';
        if(!empty($_POST['FID'])){
            $FID=$_POST['FID'];
            $db = new db;
            $sql = "delete from Manual where FID = '$FID'";
            $db->delete($sql);
            
            echo "已刪除";
        }


?>