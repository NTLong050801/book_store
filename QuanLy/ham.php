<?php 
//tìm tất cả các  thể loại
function slt_theloai(){
    global $conn;
    $sql = "SELECT * from Theloai";
    return mysqli_query($conn,$sql);
}
function slt_sach($start, $limit){
    global $conn;
    $sql = "SELECT * FROM sach LIMIT $start, $limit";
    return mysqli_query($conn,$sql);
}

function total_sach(){
    global $conn;
    $sql = "SELECT count(s_id) as slSach FROM sach";
    return mysqli_query($conn,$sql);
}

function slt_sachp(){

}
?>
