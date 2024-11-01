<?php
session_start(); 

if (!isset($_SESSION['email'])) {
   
    header("Location: ../paginas_cadastros/login.php"); 
    exit();
}
?>

