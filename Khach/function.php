<?php
//include('../config/db.php');
global $conn;
function count_posts($tl_id)
{
    global $conn;
    $qr = "select count(*) as total from sach where tl_id = $tl_id";
    $query = mysqli_query($conn, $qr);
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        return $row['total'];
    }
    return 0;
}
function count_alls()
{
    global $conn;
    $qr = "select count(*) as total from sach ";
    $query = mysqli_query($conn, $qr);
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        return $row['total'];
    }
    return 0;
}
function get_all_post($limit, $start)
{
    global $conn;
    $sql = "SELECT * from sach ORDER BY rand()  limit {$limit}, {$start}";
    return mysqli_query($conn, $sql);
}
//limit = (số trang-1) * 20
function home($limit, $start)
{
    global $conn;
    $qr = "SELECT * from sach  LIMIT {$limit}, {$start}";
    return mysqli_query($conn, $qr);
}
function allSach($idtl, $limit, $start)
{
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl LIMIT {$limit}, {$start}";
    return mysqli_query($conn, $qr);
}
function MoiNhat($idtl, $limit, $start)
{
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY s_id DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn, $qr);
}
function sptt($idtl, $limit, $start)
{
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY rand() LIMIT {$limit}, {$start} ";
    return mysqli_query($conn, $qr);
}
function BanChay($idtl, $limit, $start)
{
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY luotmua DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn, $qr);
}

function ThapDenCao($idtl, $limit, $start)
{
    global $conn;

    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY (s_gia - (s_gia*s_giamgia)/100) ASC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn, $qr);
}
function CaoDenThap($idtl, $limit, $start)
{
    global $conn;
    $qr = "SELECT * from sach where tl_id = $idtl ORDER BY (s_gia - (s_gia*s_giamgia)/100) DESC LIMIT {$limit}, {$start} ";
    return mysqli_query($conn, $qr);
}
function allTheLoai()
{
    global $conn;
    $qr = "SELECT * from theloai ";
    return mysqli_query($conn, $qr);
}
function search($value)
{
    global $conn;
    $qr = "SELECT * from sach where s_ten LIKE '%$value%' LIMIT 0,5";
    return mysqli_query($conn, $qr);
}
function search_id($value)
{
    global $conn;
    $qr = "SELECT * from sach where s_id = '$value'";
    return mysqli_query($conn, $qr);
}
function SachById($s_id)
{
    global $conn;
    $qr = "SELECT * from sach,theloai,tacgia where 
    sach.tl_id = theloai.tl_id and sach.tg_id = tacgia.tg_id
    and sach.s_id = '$s_id'";
    return mysqli_query($conn, $qr);
}
function insertCart($k_id, $s_id, $sluong, $tt)
{
    global $conn;
    $qr = "INSERT INTO giohang (k_id, s_id, gh_soluong,tongtien)
    VALUES (' $k_id', '$s_id', '$sluong','$tt')";
    return mysqli_query($conn, $qr);
}

function Khach($k_email)
{
    global $conn;
    $qr = mysqli_query($conn, "SELECT * from khach where k_email = '$k_email'");
    $row = mysqli_fetch_assoc($qr);
    return $row['k_id'];
}
function GioHang_Sach($k_id)
{
    global $conn;
    $qr = "SELECT * from giohang,sach where giohang.s_id = sach.s_id
     and giohang.k_id = $k_id and trangthai = 0 order by giohang.s_id DESC";
    return mysqli_query($conn, $qr);
}

function delete_Cart($k_id, $s_id)
{
    global $conn;
    $qr = "DELETE from giohang where k_id = '$k_id' and s_id = '$s_id'";
    return mysqli_query($conn, $qr);
}

function check_GioHang($k_id, $s_id)
{
    global $conn;
    $qr = "SELECT * from giohang,sach where giohang.s_id = sach.s_id and  giohang.s_id = $s_id
     and k_id = $k_id and trangthai = '0' ";
    return mysqli_query($conn, $qr);
}


function update_Gh_Soluong($k_id, $s_id, $sluong)
{
    global $conn;
    $sql = "UPDATE giohang set gh_soluong = $sluong 
    where k_id = $k_id and s_id = $s_id";
    return mysqli_query($conn, $sql);
}

function insert_Donhang($k_id, $note, $tongall)
{
    global $conn;
    $date1 = date("Y/m/d");
    $sql = "Insert into donhang(k_id,hd_date,note,tongtien) values ('$k_id','$date1','$note','$tongall')";
    return mysqli_query($conn, $sql);
    // return $sql;
}
function slt_Donhang()
{
    global $conn;
    $sql = "SELECT * from DonHang order by hd_id DESC LIMIT 1";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($qr);
    return $row['hd_id'];
}

function insert_CTHD($hd_id, $s_id, $sluong)
{
    global $conn;
    $sql = "Insert into chitiethd(hd_id,s_id,sluong) values ('$hd_id','$s_id','$sluong')";
    return mysqli_query($conn, $sql);;
}

function show_allDh($k_id, $start, $donhang1trang)
{
    global $conn;
    $sql = "SELECT  * from donhang where donhang.k_id = '$k_id' order by donhang.hd_id DESC limit $start,$donhang1trang   ";
    return mysqli_query($conn, $sql);
}

function count_all_dh($k_id)
{
    global $conn;
    $sql = "SELECT  count(hd_id) as sl from donhang where donhang.k_id = '$k_id' order by donhang.hd_id DESC  ";
    $qr =  mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($qr)['sl'];
}

function count_show_allDh_status($k_id, $status)
{
    global $conn;
    global $conn;
    $sql = "SELECT count(hd_id) as sl from donhang where donhang.k_id = '$k_id' and status ='$status' 
    order by donhang.hd_id DESC ";
    $qr =  mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($qr)['sl'];
}

function show_allDh_status($k_id, $status, $start, $donhang1trang)
{
    global $conn;
    $sql = "SELECT  * from donhang where donhang.k_id = '$k_id' and status ='$status' 
    order by donhang.hd_id DESC limit $start,$donhang1trang  ";
    return mysqli_query($conn, $sql);
}

function Chitiethd($dh_id, $k_id)
{
    global $conn;
    $sql = "SELECT  * from donhang,chitiethd,sach
    where donhang.hd_id = chitiethd.hd_id and sach.s_id = chitiethd.s_id
    and donhang.hd_id = '$dh_id' and donhang.k_id = '$k_id' order by donhang.hd_id DESC  ";
    return mysqli_query($conn, $sql);
}

function search_dh($k_id, $val, $start, $donhang1trang)
{
    global $conn;
    $sql = "SELECT * from sach,chitiethd,donhang 
    where donhang.hd_id = chitiethd.hd_id and sach.s_id = chitiethd.s_id
    and donhang.k_id = '$k_id' and sach.s_ten like '$val%'  order by donhang.hd_id DESC limit $start,$donhang1trang ";
    return mysqli_query($conn, $sql);
    // if(mysqli_num_rows($qr)> 0){
        
    // }
}

function count_search_dh($k_id, $val)
{
    global $conn;
    $sql = "SELECT count(donhang.hd_id) as sl from sach,chitiethd,donhang 
    where donhang.hd_id = chitiethd.hd_id and sach.s_id = chitiethd.s_id
    and donhang.k_id = '$k_id' and sach.s_ten like '$val%'  order by donhang.hd_id DESC";
    $qr =  mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($qr)['sl'];
}


function update_status($hd_id, $status)
{
    global $conn;
    $sql = "Update donhang set status = $status where hd_id = '$hd_id' ";
    return mysqli_query($conn, $sql);
}

function count_status0($k_id, $status)
{
    global $conn;
    $sql = "SELECT count(hd_id) from donhang where k_id = '$k_id' and donhang.status = $status ";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($qr);
    if ($row['count(hd_id)'] > 0) {
        return '(' . $row['count(hd_id)'] . ')';
    }
}
function InsertDanhGia($k_id, $hd_id, $s_id, $sao, $cmt)
{

    global $conn;
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT into danhgia values ('$k_id','$hd_id','$s_id','$sao','$date','$cmt') ";
    return mysqli_query($conn, $sql);
}

function Slt_Danhgia($k_id, $hd_id)
{
    global $conn;
    $sql = "SELECT * from danhgia where k_id = $k_id and hd_id = '$hd_id'";
    return mysqli_query($conn, $sql);
}

function count_sao_sach($s_id, $sao)
{
    global $conn;
    $sql = "SELECT count(hd_id) as sluong_sao from danhgia where s_id = '$s_id' and sao = '$sao'";
    $qr = mysqli_query($conn, $sql);
    if (mysqli_num_rows($qr) > 0) {
        $row = mysqli_fetch_assoc($qr);
        return $row['sluong_sao'];
    } else {
        return 0;
    }
}

function count_cmt($s_id)
{
    global $conn;
    $sql = "SELECT count(hd_id) as sluong_sao from danhgia where s_id = '$s_id' and cmt != ''";
    $qr = mysqli_query($conn, $sql);
    if (mysqli_num_rows($qr) > 0) {
        $row = mysqli_fetch_assoc($qr);
        return $row['sluong_sao'];
    } else {
        return 0;
    }
}

function count_danhgia($s_id)
{
    global $conn;
    $sql = "SELECT count(s_id) as sl_danhgia from danhgia where s_id = '$s_id'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($qr);
    $sluong = $row['sl_danhgia'];
    if ($sluong == 0) {
        return 100;
    } else {
        return $sluong;
    }
}
function slt_cmt($s_id, $limit)
{
    global $conn;
    $sql = "SELECT * from danhgia,khach where danhgia.k_id = khach.k_id 
    and danhgia.s_id = '$s_id' and cmt != '' order by danhgia.hd_id DESC LIMIT $limit,5";
    return mysqli_query($conn, $sql);
}


function avg_sao($s_id)
{
    global $conn;
    $sql = "SELECT avg(sao) as avg_sao from danhgia where s_id = '$s_id'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($qr);
    if ($row['avg_sao'] > 0) {

        return number_format($row['avg_sao'], 1, '.', '');
    } else {
        return number_format(5, 1, '.', '');
    }
}

function sao_Khach($s_id, $sao, $limit)
{
    global $conn;
    $sql = "SELECT * from danhgia,khach where danhgia.k_id = khach.k_id 
    and danhgia.s_id = '$s_id' and sao = '$sao' order by hd_id DESC LIMIT $limit,5";
    return mysqli_query($conn, $sql);
}

function update_soluongs($s_id, $soluong, $luotmua)
{
    global $conn;
    $sql = "UPDATE sach set soluong = '$soluong', luotmua = '$luotmua' 
    where s_id = '$s_id'";
    return mysqli_query($conn, $sql);
}
