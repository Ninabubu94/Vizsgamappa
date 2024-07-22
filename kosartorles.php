<?php
session_start();
unset($_SESSION['kosar']);
header('Location: index.php'); 
?>