<?php
    require 'composer/vendor/autoload.php';
    include 'mysql.php';
    if(!empty($_FILES["file"]["name"])){
        //print_r($_FILES['file']['type']);
        $filename = $_FILES["file"]["name"];
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xls');
        $reader->setReadDataOnly(TRUE);
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload_excel/".$_FILES["file"]["name"]);//上傳excel檔
        $excel_path="C:/xampp/htdocs/upload_excel/";
        $spreadsheet = $reader->load($excel_path.$filename); //载入excel表格
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow(); // 總行數
        $highestColumn = $worksheet->getHighestColumn(); // 總列數
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);//總欄數
        // print_r($highestRow);
        // print_r($highestColumnIndex);
        $db= new db;
        for ($row = 1; $row <= $highestRow; $row++) { 
            $F_TYPE = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $F_NAME = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

            $Manual = "select FID from Manual where F_TYPE = '$F_TYPE' and F_NAME='$F_NAME'";
            
            $FID=$db->select($Manual);
            if($FID['FID'] == null){ 
                $Manual_= "insert into Manual(F_TYPE,F_NAME)VALUES('$F_TYPE','$F_NAME')";                
                //print_r($insert);
                $db->insert($Manual_);   
            }

            $TYPE = "select FID from TYPE where F_TYPE ='$F_TYPE'";
            $FID_= $db->select($TYPE);
            //print("FID=".$FID_);
            if($FID_['FID'] == null){ 
                $TYPE_= "insert into TYPE(F_TYPE)VALUES('$F_TYPE')";                
                $db->insert($TYPE_);   
            }
             
        }      
        echo true;

    }else{
        echo false;

    }
    
        
?>