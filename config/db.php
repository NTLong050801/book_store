<?php
session_start();
define('URL', 'http://localhost:8080/CSE485_K61_BTL_N16/BTL/admin/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','');
define('DB_NAME', 'book_store');
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
//$connn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASS, DB_NAME) or die(mysqli_connect_error());
// $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_connect_error());
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_connect_error());
