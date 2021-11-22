<?php
session_start();
$id = $_GET['id'];
include('../config/db.php');
$sql_del = "DELETE FROM theloai where tl_id = '$id'";
$rs_del = mysqli_query($conn, $sql_del);
if ($rs_del) {
    $_SESSION['delOK'] = "<h4 class='text-center text-success'>Xóa thành công thể loại ".$id."</h4>";
    header('location: theloai.php');
} else {
    $_SESSION['delNotOK'] = "<h4 class='text-center text-danger'>Xóa không thành công thể loại ".$id."</h4>";
    header('location: theloai.php');
}
?>