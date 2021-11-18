<?php 
// include('../config/db.php');
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
//limit = (số trang-1) * 20
function allSach($limit, $start){
    global $conn;
    $qr = "SELECT * from sach LIMIT {$limit}, {$start}";
    return mysqli_query($conn,$qr) ;
}
function MoiNhat($limit, $start){
    global $conn;
    $qr = "SELECT * from sach ORDER BY s_id DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}
function BanChay($limit, $start){
    global $conn;
    $qr = "SELECT * from sach ORDER BY luotmua DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}

function ThapDenCao($limit, $start){
    global $conn;
    
    $qr = "SELECT * from sach ORDER BY (s_gia - (s_gia*s_giamgia)/100) ASC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}
function CaoDenThap($limit, $start){
    global $conn;
    $qr = "SELECT * from sach ORDER BY (s_gia - (s_gia*s_giamgia)/100) DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}
?>