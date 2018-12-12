<?php
    include 'mysql.php';



    if(!empty($_GET['add'])) {    //新增類別
        $F_TYPE = $_GET['add'];
        $check = "select * from TYPE where F_TYPE = '$F_TYPE'" ;
        //print_r($check);
        $db=new db;
        $row=$db->select($check);
        if($row['F_TYPE'] == null){
            $insert = "insert into Type(F_TYPE)VALUE('$F_TYPE')";
            $db->insert($insert);
            echo true; //js 判斷
        }else{
            echo false;
        }
        exit;
    }

    
    if(!empty($_GET['delete'])) {  //刪除類別
        $F_TYPE = $_GET['delete'];
        $delete = "delete from Type where F_TYPE =  '$F_TYPE'" ;
        //print_r($check);
        $db=new db;
        $db->delete($delete);
        echo true;//js 判斷
        exit;
         
    }
        
    if(!empty($_POST['select']) && !empty($_POST['add2'])){    //新增類別、工程、圖片
        $F_TYPE = $_POST['select'];
        $F_NAME = $_POST['add2'];
        
        $check = "select * from Manual where F_TYPE ='$F_TYPE' and F_NAME ='$F_NAME'" ;
        $db = new db;
        $row=$db->select($check);
        //print($row['F_NAME']);
        if($row['F_NAME'] != null){
            echo "<script type='text/javascript'>";
            echo "alert('資料已存在');";
            echo "location.href='add.php';";
            echo "</script>";  
        }else{
            $insert = "insert into Manual(F_NAME,F_TYPE)VALUE('$F_NAME','$F_TYPE')";//新增資料
            $db->insert($insert);
            if (!empty($_FILES['file']['name'])){ //新增圖片
                move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
            }  
            echo "<script type='text/javascript'>";
            echo "alert('新增成功');";
            echo "location.href='add.php';";
            echo "</script>";        
        }   

       
       
    }else{
        
            echo "<script type='text/javascript'>";
            echo "alert('請輸入類別與工程');";
            echo "location.href='add.php';";
            echo "</script>";
            exit;
          
    }
        

    

?>