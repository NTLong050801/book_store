<?php 
include('../config/db.php');
unset($_SESSION['check_login']);
header('location:login.php');

?>