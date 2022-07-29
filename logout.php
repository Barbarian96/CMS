<?php
session_start();
$_SESSION['logedin']  = 'no';
header("location:index.php");
?>