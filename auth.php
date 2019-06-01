<?php
session_start();






if(!(isset($_SESSION['enroll']))) {
    header('Location: login.php');
  }
  
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
 
?>



