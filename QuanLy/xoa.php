<?php
session_start();
$id = $_GET['id'];
include('../config/db.php');
$sql = "DELETE FROM sach where s_id = '$id'";
$rs = mysqli_query($conn, $sql);
if($rs){
    // echo "Xóa thành công";
    $_SESSION['delOK'] = "<h3 class='text-success mt-3'>Xóa thành công sách có mã sách: ".$id."</h3>";
    header('location: sach.php');
}
else{
    echo "Xóa không thành công";
}

?>