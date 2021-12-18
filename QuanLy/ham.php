<?php 
//tìm tất cả các  thể loại
function slt_theloai(){
    global $conn;
    $sql = "SELECT * from Theloai ";
    return mysqli_query($conn,$sql);
}

function slt_theloai_id($tl_id){
    global $conn;
    $sql = "SELECT * from Theloai where tl_id = '$tl_id'";
    return mysqli_query($conn,$sql);
}

function slt_tacgia_id($tg_id){
    global $conn;
    $sql = "SELECT * from tacgia where tg_id = '$tg_id'";
    return mysqli_query($conn,$sql);
}
function update_theloai($tl_id,$tl_ten){
    global $conn;
    $slt_tl_ten = "SELECT count(tl_id) as sluong from theloai where tl_ten like '$tl_ten'";
    $qr = mysqli_query($conn,$slt_tl_ten);
    $sl = mysqli_fetch_assoc($qr)['sluong'];
    if($sl == '0'){
        $sql = "UPDATE theloai set tl_ten = '$tl_ten' where tl_id = '$tl_id'";
        mysqli_query($conn,$sql);
        return  1;
    }else{
        return 2;
    }
}

function update_tacgia($tg_id,$tg_ten){
    global $conn;
    $slt_tg_ten = "SELECT count(tg_id) as sluong from tacgia where tg_ten like '$tg_ten'";
    $qr = mysqli_query($conn,$slt_tg_ten);
    $sl = mysqli_fetch_assoc($qr)['sluong'];
    if($sl == '0'){
        $sql = "UPDATE tacgia set tg_ten = '$tg_ten' where tg_id = '$tg_id'";
        mysqli_query($conn,$sql);
        return  1;
    }else{
        return 2;
    }
}

function insert_tl($tl_ten){
    global $conn;
    $sql = "INSERT into theloai(tl_ten) values ('$tl_ten')";
    return mysqli_query($conn,$sql);
}

function insert_tg($tg_ten){
    global $conn;
    $sql = "INSERT into tacgia(tg_ten) values ('$tg_ten')";
    return mysqli_query($conn,$sql);
}

function slt_tacgia(){
    global $conn;
    $sql = "SELECT * from tacgia";
    return mysqli_query($conn,$sql);
}

//slt tất cả loại sách
function Slt_sach($dem,$sosach1trang){
    global $conn;
    $sql = "SELECT * from sach order by s_id DESC limit $dem,$sosach1trang";
    return mysqli_query($conn,$sql);
}

// slt tất cả sách theo thể loại
function slt_sach_tl($tl_id,$dem,$sosach1trang){
    global $conn;
    $sql = "SELECT * from sach where tl_id = '$tl_id'order by s_id DESC limit $dem,$sosach1trang";
    return mysqli_query($conn,$sql);
}

//sắp xếp theo lượt mua cáp đến thấp

function slt_sach_luotmua_desc($tl_id,$dem,$sosach1trang){
    global $conn;
    $sql = "SELECT * from sach where tl_id = '$tl_id'order by luotmua DESC limit $dem,$sosach1trang";
    return mysqli_query($conn,$sql);
}
// thấp đến cao
function slt_sach_luotmua_asc($tl_id,$dem,$sosach1trang){
    global $conn;
    $sql = "SELECT * from sach where tl_id = '$tl_id' order by luotmua asc limit $dem,$sosach1trang";
    return mysqli_query($conn,$sql);
}

//sắp xếp theo số lượng kho mua cáp đến thấp

function slt_sach_soluong_desc($tl_id,$dem,$sosach1trang){
    global $conn;
    $sql = "SELECT * from sach where tl_id = '$tl_id'order by soluong DESC limit $dem,$sosach1trang";
    return mysqli_query($conn,$sql);
}
// thấp đến cao
function slt_sach_soluong_asc($tl_id,$dem,$sosach1trang){
    global $conn;
    $sql = "SELECT * from sach where tl_id = '$tl_id' order by soluong asc limit $dem,$sosach1trang";
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
// đếm sách theo thể loại
function count_sach_tl($tl_id){
    global $conn;
    $sql = "SELECT count(s_id) as tongsach from sach where tl_id = '$tl_id'";
    $qr = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($qr);
    return $row['tongsach'];
}

function count_sach_tg($tg_id){
    global $conn;
    $sql = "SELECT count(s_id) as tongsach from sach where tg_id = '$tg_id'";
    $qr = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($qr);
    return $row['tongsach'];
}

function delete_sach($s_id){
    global $conn;
    $sql = "DELETE from Sach where s_id = '$s_id'";
    return mysqli_query($conn,$sql);
}

function delete_theloai($tl_id){
    global $conn;
    $sql = "DELETE from theloai where tl_id = '$tl_id'";
    return mysqli_query($conn,$sql);
}

function delete_tacgia($tg_id){
    global $conn;
    $sql = "DELETE from tacgia where tg_id = '$tg_id'";
    return mysqli_query($conn,$sql);
}

function slt_sach_tl_tg($s_id){
    global $conn;
    $sql = "SELECT * from sach,theloai,tacgia
    where sach.tl_id = theloai.tl_id and sach.tg_id = tacgia.tg_id and sach.s_id = '$s_id'";
    return mysqli_query($conn,$sql);
}

function search_sach($val_search){
    global $conn;
    $sql = "SELECT * from sach where s_ten like '%$val_search%' order by luotmua limit 0,5";
    return mysqli_query($conn,$sql);
}

function show_all_dh($status){
    global $conn;
    $sql = "SELECT * from donhang,khach 
    where khach.k_id = donhang.k_id 
    and donhang.status = '$status' order by hd_id DESC";
     return mysqli_query($conn,$sql);
}

function sum_sluong($hd_id){
    global $conn;
    $sql = "SELECT sum(sluong) as tongs from chitiethd where hd_id = '$hd_id'";
    $qr = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($qr)['tongs'] ;
}

function count_status_ql($status){
    global $conn;
    $sql = "SELECT count(hd_id) from donhang where donhang.status = $status ";
    $qr = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($qr);
    if($row['count(hd_id)'] > 0){
        return '('.$row['count(hd_id)'].')' ;
    }
}

function dh_date($date_s,$date_e){
    global $conn;
    $sql = "SELECT * from donhang where hd_date between '$date_s' and '$date_e'";
    return mysqli_query($conn,$sql);
}

function dh_date_search($val){
    global $conn;
    $sql = "SELECT * from donhang,khach
    where donhang.k_id = khach.k_id and k_sdt like '$val%'";
    return mysqli_query($conn,$sql);
}

function sum_dh($date_s,$date_e){
    global $conn;
    $sql = "SELECT count(hd_id) as tonghoadon from donhang 
    where hd_date between '$date_s' and '$date_e'";
    $qr = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($qr)['tonghoadon'];
}
function sum_dh_search($val){
    global $conn;
    $sql = "SELECT count(hd_id) as tonghoadon from donhang,khach
    where donhang.k_id = khach.k_id and k_sdt like '$val%'";
    $qr = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($qr)['tonghoadon'];
}

function sum_tien($date_s,$date_e){
    global $conn;
    $sql = "SELECT sum(tongtien) as tongall from donhang 
    where hd_date between '$date_s' and '$date_e'";
    $qr = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($qr)['tongall'];
}

function sum_sach($date_s,$date_e){
    global $conn;
    $sql = "SELECT sum(sluong) as tongsach from donhang,chitiethd 
    where donhang.hd_id = chitiethd.hd_id and hd_date between '$date_s' and '$date_e'";
    $qr = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($qr)['tongsach'];
}

function chitiet_hd_date($date_s,$date_e, $limit,$sohd1trang){
    global $conn;
    $sql = "SELECT * from donhang,khach
    where donhang.k_id = khach.k_id and hd_date between '$date_s' and '$date_e' order by hd_id DESC limit $limit,$sohd1trang";
    return mysqli_query($conn,$sql);
}

function chitiet_hd_date_search($val, $limit,$sohd1trang){
    global $conn;
    $sql = "SELECT * from donhang,khach
    where donhang.k_id = khach.k_id and k_sdt like '$val%' order by hd_id DESC limit $limit,$sohd1trang";
    return mysqli_query($conn,$sql);
}

function slt_email($val){
    global $conn;
    $sql = "SELECT * from users,khach where users.u_email = khach.k_email and users.u_email = '$val' ";
    return mysqli_query($conn,$sql);
}
