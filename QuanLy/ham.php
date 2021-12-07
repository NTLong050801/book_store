<?php 
//tìm tất cả các  thể loại
function slt_theloai(){
    global $conn;
    $sql = "SELECT * from Theloai";
    return mysqli_query($conn,$sql);
}

//slt tất cả loại sách
function Slt_sach($dem,$sosach1trang){
    global $conn;
    $sql = "SELECT * from sach order by s_id DESC limit $dem,$sosach1trang";
    return mysqli_query($conn,$sql);
}

// slt tất cả sách theo thể loại
function slt_sach_tl($tl_id){
    global $conn;
    $sql = "SELECT * from sach where tl_id = '$tl_id'order by s_id DESC";
    return mysqli_query($conn,$sql);
}

//đếm tất cả sách
function count_sach(){
    global $conn;
    $sql = "SELECT count(s_id) as tongsach from sach order by s_id DESC";
    $qr = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($qr);
    return $row['tongsach'];
}

function delete_sach($s_id){
    global $conn;
    $sql = "DELETE from Sach where s_id = '$s_id'";
    return mysqli_query($conn,$sql);
}



?>