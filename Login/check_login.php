<?php 
include('../config/db.php');

if(!isset($_SESSION['check_login'])){
    header('location:../Login/login.php');
}

?>