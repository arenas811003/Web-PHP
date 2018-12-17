<?php

    include 'mysql.php';

    $F_TYPE = $_POST['select'];
    $F_NAME = $_POST['add2'];

    $ftype = $_POST['ex-ftype'];//原始資料
    $fname = $_POST['ex-fname'];//原始資料
    $FID = $_POST['FID'];
    $path="location.href='update.php?FID=$FID&F_TYPE=$F_TYPE&F_NAME=$F_NAME'";
    $db = new db;
    if(!empty($_POST['select']) && !empty($_POST['add2'])){    //新增類別、工程、圖片
        
        if($F_TYPE != $ftype || $F_NAME != $fname){//判斷是否有更改過名稱

            $check = "select * from Manual where F_TYPE ='$F_TYPE' and F_NAME ='$F_NAME'" ;
            
            $row=$db->select($check);
            if($row['F_NAME'] != null){
                echo "<script type='text/javascript'>";
                echo "alert('資料已存在');";
                echo "$path";
                echo "</script>";
                
                exit;      
            }
                
        }
          
        $update = "update Manual set F_TYPE= '$F_TYPE',F_NAME='$F_NAME' where FID = $FID";//修改資料
        
        $db->update($update);



        if (!empty($_FILES['file']['name'])){
            
            $dir ="./upload/$F_TYPE-$F_NAME";

            if(is_dir($dir)){
                //scandir回傳值的第一項是「.」，就是目前資料夾的意思，第二項是「..」也就是上一個資料夾
                $files = array_diff(scandir($dir), array('.','..'));//array_diff回傳不相同陣列值,(取得檔案名稱)

                foreach ($files as $file) {
                     unlink("$dir/$file");
                }
                
                rmdir($dir);
            }
            mkdir("./upload/$F_TYPE-$F_NAME",0777);


            $fileCount = count($_FILES['file']['name']);

            for($i=0;$i<=$fileCount-1;$i++){ //新增圖片

                move_uploaded_file($_FILES["file"]["tmp_name"][$i],"upload/$F_TYPE-$F_NAME/".$_FILES["file"]["name"][$i]);
            }
        }  

        echo "<script type='text/javascript'>";
        echo "alert('修改成功');";
        echo "$path";
        echo "</script>";        
           
    
    }else{
            
        echo "<script type='text/javascript'>";
        echo "alert('請輸入類別與工程');";
        echo "$path";
        echo "</script>";
           
        
    }


?>
