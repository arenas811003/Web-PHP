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
    $check_sql="select ID from user where account = '$account' and password = '$password'";
    $login_check=$db->select($check_sql);
    if($login_check['ID'] != null){

        echo true;
    }else{

        echo false;
    }    
    


}



?>