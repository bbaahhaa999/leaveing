<?php 
session_start();

unset($_SESSION['alogin']);
session_destroy(); // destroy session
header("location:index2.php"); 
?>