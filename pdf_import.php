<?php 
    require 'composer/vendor/autoload.php';
    include 'mysql.php';

    if(!empty($_FILES["file"]["name"])){
        $filetype = $_FILES['file']['type'];    
        $fileCount = count($_FILES['file']['name']);
        $filename = $_FILES["file"]["name"];
        //print_r($filename[0]);  
        if($filename[0] != null && $filetype[0] == "image/jpeg"){
            
            //print($filename[0]);           
            $db= new db;
            $str = "";

            for($i=0;$i<=$fileCount-1;$i++){
                
                $F_TYPE = explode("-",$filename[$i]);//[[TYPE],[NAME.jpg]]
                $F_NAME =$F_TYPE[1];
                $F_NAME = explode(".",$F_NAME)[0];//[[NAME],[jpg]]
                //print($F_TYPE[0].$F_NAME);    
                $sql="select FID from Manual where F_TYPE ='$F_TYPE[0]' and F_NAME ='$F_NAME'";
                $FID=$db->select($sql); 
                if($FID != null){
                    move_uploaded_file($_FILES["file"]["tmp_name"][$i],"upload/".$_FILES["file"]["name"][$i]);

                }else{
                    //print($i.$filename[$i]);
                    $str = $str."+".$filename[$i];           
                }        
            }
            
            $str=$str."+end";
            echo $str;

        }else{

            echo false;
        }
    }           

?>