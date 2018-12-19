<?php
        include 'mysql.php';
        //require 'composer/vendor/autoload.php';
        if(!empty($_POST['ID'])){
            $FID=$_POST['ID'];
            $db = new db;
            $sql = "delete from User where ID = $FID";
            $db->delete($sql);
            
            echo "已刪除";
            
        }
        
        if(!empty($_POST['name']) && !empty($_POST['account']) && !empty($_POST['password']) && !empty($_POST['email']) && isset($_POST['select'])){
            $username=$_POST['name'];
            $account=$_POST['account'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $permission = $_POST['select'];
            $db = new db;
            
            $check_sql="select * from user where account = '$account'";
            $check=$db->select($check_sql);
           
            //echo $check['account'];
            if($check['account'] == null){
                
                $insert_sql="insert into user(username,account,password,email,permission)values('$username','$account','$password','$email','$permission')";
                $db->insert($insert_sql);

                echo true;
            }else{
    
                echo false;
            }
        }

        if(!empty($_POST['up-name']) && !empty($_POST['up-account']) && !empty($_POST['up-password']) && !empty($_POST['up-email']) && !empty($_POST['up-select'])){
            $username=$_POST['up-name'];
            $account=$_POST['up-account'];
            $password=$_POST['up-password'];
            $email=$_POST['up-email'];
            $permission = $_POST['up-select'];
            
            if($permission == '主控端'){
                $permission = '0';
            }
            if($permission == '主管端'){
                $permission = 1;
            }
            if($permission == "客戶端"){
                $permission = 2;
            }

            $db = new db;

            $update_sql="update user set username='$username',password='$password',email='$email',permission='$permission' where account = '$account' ";
            $db->update($update_sql);

            echo true;
        }
?>