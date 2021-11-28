<?php 
//include('../config/db.php');
global $conn;
function count_posts($tl_id)
{
    global $conn;
    $qr = "select count(*) as total from sach where tl_id = $tl_id";
    $query = mysqli_query($conn,$qr );
    if ($query){
        $row = mysqli_fetch_assoc($query);
        return $row['total'];
    }
    return 0;
}
function count_alls()
{
    global $conn;
    $qr = "select count(*) as total from sach ";
    $query = mysqli_query($conn,$qr );
    if ($query){
        $row = mysqli_fetch_assoc($query);
        return $row['total'];
    }
    return 0;
}
function get_all_post($limit, $start)
{
    global $conn;
    $sql = "SELECT * from sach ORDER BY rand()  limit {$limit}, {$start}";
    return mysqli_query($conn,$sql);
}
//limit = (số trang-1) * 20
function home($limit, $start){
    global $conn;
    $qr = "SELECT * from sach  LIMIT {$limit}, {$start}";
    return mysqli_query($conn,$qr) ;
}
function allSach($idtl,$limit, $start){
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl LIMIT {$limit}, {$start}";
    return mysqli_query($conn,$qr) ;
}
function MoiNhat($idtl,$limit, $start){
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY s_id DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}
function sptt($idtl,$limit, $start){
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY rand() LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}
function BanChay($idtl,$limit, $start){
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY luotmua DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}

function ThapDenCao($idtl,$limit, $start){
    global $conn;
    
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY (s_gia - (s_gia*s_giamgia)/100) ASC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}
function CaoDenThap($idtl,$limit, $start){
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY (s_gia - (s_gia*s_giamgia)/100) DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn,$qr) ;
}
function allTheLoai(){
    global $conn;
    $qr = "SELECT * from theloai ";
    return mysqli_query($conn,$qr) ;
}
function search($value){
    global $conn;
    $qr = "SELECT * from sach where s_ten LIKE '%$value%' LIMIT 0,5";
    return mysqli_query($conn,$qr) ;
}
function search_id($value){
    global $conn;
    $qr = "SELECT * from sach where s_id = '$value'";
    return mysqli_query($conn,$qr) ;
}
function SachById($s_id){
    global $conn;
    $qr = "SELECT * from sach,theloai,tacgia where 
    sach.tl_id = theloai.tl_id and sach.tg_id = tacgia.tg_id
    and sach.s_id = '$s_id'";
    return mysqli_query($conn,$qr) ;
}
function insertCart($k_id,$s_id,$sluong,$tt){
    global $conn;
    $qr = "INSERT INTO giohang (k_id, s_id, gh_soluong,tongtien)
    VALUES (' $k_id', '$s_id', '$sluong','$tt')";
    return mysqli_query($conn,$qr);
}

function Khach($k_email){
    global $conn;
    $qr = mysqli_query($conn,"SELECT * from khach where k_email = '$k_email'");
    $row = mysqli_fetch_assoc($qr);
    return $row['k_id'];
}
function GioHang_Sach($k_id){
    global $conn;
    $qr = "SELECT * from giohang,sach where giohang.s_id = sach.s_id
     and giohang.k_id = $k_id ";
     return mysqli_query($conn,$qr);

}

function delete_Cart($k_id,$s_id){
    global $conn;
    $qr = "DELETE from giohang where k_id = '$k_id' and s_id = '$s_id'";
    return mysqli_query($conn,$qr);

}

function check_GioHang($k_id,$s_id){
    global $conn;
    $qr = "SELECT * from giohang,sach where giohang.s_id = sach.s_id and  giohang.s_id = $s_id
     and k_id = $k_id ";
     return mysqli_query($conn,$qr);
}


function update_Gh_Soluong($k_id,$s_id,$sluong){
    global $conn;
    $sql = "UPDATE giohang set gh_soluong = $sluong 
    where k_id = $k_id and s_id = $s_id";
   return mysqli_query($conn,$sql);
}
