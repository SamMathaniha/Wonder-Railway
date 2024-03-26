<?php
session_start(); //start session 
unset($_SESSION["email"]);

session_destroy();
echo "<script> window.location = 'index.php';</script>";
?>