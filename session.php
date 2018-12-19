<?php
     session_start();
                 
     if(!isset($_SESSION['permission'])){
      
         header('Location:login.php');
      }

?>