<?php
session_start();
$conn = mysqli_connect('localhost','root','','book_store');
if(!$conn){
    die('Kết nối csdl thất bại');
}

?>