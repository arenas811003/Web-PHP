<?php
    //$connection=mysqli_connect("127.0.0.1","Ten","tenpercent","ten");
    
    //mysqli_query($connection,"set names utf8");
    
    //$data=mysqli_query($connection,"select * from Manual where F_NAME = '".'TK'."'");

    //while($row = mysqli_fetch_array($data)){
     //   $name = $row['F_NAME'];
    //    echo $name;
  //  }

class db{

    public $public_value = "public";
    public $host = 'localhost'; //架設的網域
    public $username = 'Ten'; //資料庫帳號
    public $password = 'tenpercent'; //資料庫密碼
    public $database = 'ten'; //資料庫
   

    public function conn(){ 
        //print_r($this->host);
        $connection=mysqli_connect($this->host,$this->username,$this->password,$this->database);
        mysqli_query($connection,"set names utf8");
        return $connection;
    }

    function select($string){
        //echo  $string;
        $data = mysqli_query($this->conn(),$string);
        //$rowcount=mysqli_num_rows($data);
        //print($rowcount);
        $row = mysqli_fetch_assoc($data);
        //printf("%s%s", $row['F_NAME'],$row['F_TYPE']);
        return $row;  
    }

    function select_array($string){
        //echo  $string;
        $row=array();
        $i=0;
        $data = mysqli_query($this->conn(),$string);
        while($list = mysqli_fetch_array($data)){
            $row[$i]=$list;
            $i++;
        }
        return $row;  
    }
    
    function insert($string){
        mysqli_query($this->conn(),$string);
    }
    function delete($string){
        mysqli_query($this->conn(),$string);  
    }
    function update($string){
        mysqli_query($this->conn(),$string);  
    }


}
//$db = new db();
//print_r($db->host);
//exit;
// $string= "select * from manual";
// $db->select($string);

   
?>
