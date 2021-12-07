<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn = mysqli_connect('localhost','root','','book_store');
if(!$conn){
    die('Kết nối csdl thất bại');
}

?>