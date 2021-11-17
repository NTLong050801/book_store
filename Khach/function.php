<?php 
include('../config/db.php');
global $conn;
// Lấy tổng số sách
function count_posts()
{
    global $conn;
    $query = mysqli_query($conn, 'select count(*) as total from sach');
    if ($query){
        $row = mysqli_fetch_assoc($query);
        return $row['total'];
    }
    return 0;
}
function get_all_post($limit, $start)
{
    global $conn;
    $sql = "select * from sach limit {$limit}, {$start}";
    // $query = mysqli_query($conn, $sql);
 
    // $result = array();
 
    // if ($query) {
    //     while ($row = mysqli_fetch_assoc($query)) {
    //         $result[] = $row;
    //     }
    // }
 
    return mysqli_query($conn,$sql);
}
function allSach(){
    global $conn;
    $qr = "SELECT * from sach LIMIT 0,20";
    return mysqli_query($conn,$qr) ;
}
function MoiNhat(){
    global $conn;
    $qr = "SELECT * from sach ORDER BY s_id DESC ";
    return mysqli_query($conn,$qr) ;
}
function BanChay(){
    global $conn;
    $qr = "SELECT * from sach ORDER BY luotmua DESC ";
    return mysqli_query($conn,$qr) ;
}
?>