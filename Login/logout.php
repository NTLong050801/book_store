<?php 
include('../config/db.php');
unset($_SESSION['check_login']);
session_destroy();
header('location:login.php');

?>