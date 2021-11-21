<?php
session_start();
$id = $_GET['id'];
include('../config/db.php');
$sql = "DELETE FROM tacgia where tg_id = '$id'";
$rs = mysqli_query($conn, $sql);
if($rs){
    // echo "Xóa thành công";
    $_SESSION['delOK'] = "<h3 class='text-success mt-3'>Xóa thành công tác giả có mã tác giả ".$id."</h3>";
    header('location: tacgia.php');
}
else{
    echo "Xóa không thành công";
}

?>