<?php 
//tìm tất cả các  thể loại
function slt_theloai(){
    global $conn;
    $sql = "SELECT * from Theloai";
    return mysqli_query($conn,$sql);
}
// in ra tất cả sách 
// function slt_sach(){
//     global $conn;
//     $sql = "SELECT * from sach";
//     return mysqli_query($conn,$sql);
// }
function delete_sach($s_id){
    global $conn ;
    $sql ="DELETE FROM sach WHERE s_id=$s_id";
    return mysqli_query($conn,$sql);
    
}
function slt_sach_tl($tl_id)
{
    global $conn;
    $sql = " select * from sach where tl_id = '$tl_id'";
    return mysqli_query($conn,$sql);
}
// slt tất cả sách
function Slt_sach($dem,$sosach1trang)
{
    global $conn;
    $sql = "SELECT * FROM SACH   order  by s_id DESC limit  $dem,$sosach1trang";
    return mysqli_query($conn,$sql);
}
function count_sach()
{
global $conn;
$sql = "SELECT count(s_id) as tongsach from sach order by s_id DESC ";
$qr = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($qr);
return $row['tongsach'];
}

?>