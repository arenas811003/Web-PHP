<?php
    session_start();
    unset($_SESSION['permission']);
    header('Location:login.php');
?>