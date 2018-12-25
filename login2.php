<?php
include 'mysql.php';
if(!empty($_POST['account']) && !empty($_POST['password'])){
    $account = $_POST['account'];
    $password = $_POST['password'];
    //$_SESSION['account'] = $account;
    $permission_sql = "select permission from user where account ='$account'";
    $db = new db;
    $permission = $db->select($permission_sql);
    session_start();
    $_SESSION['permission']=$permission['permission'];

    $check_sql="select ID from user where account = ? and password = ?"; //防止sql 輸入
    $mysqli = new mysqli('localhost','Ten','tenpercent','ten');
    $login_check=$mysqli->prepare($check_sql);
    $login_check->bind_param("ss",$account,$password);
    $login_check->execute();
    $login_check->bind_result($id);
    $value=$login_check->fetch();
    //echo $value;
    if($value != null){

        echo true;
    }else{

        echo false;
    }    
    

}


?>