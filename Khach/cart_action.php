<?php

function spTuongTu(){
    include('../config/db.php');
    $tl_id = $_POST['tl_id'];
    $spTuongTu = "SELECT * FROM sach , giohang , theloai where theloai.tl_id = sach.tl_id and sach.s_id = giohang.s_id and sach.tl_id = '$tl_id' LIMIT 5";
    $rsSPTuongTu = mysqli_query($conn, $spTuongTu);
    if (mysqli_num_rows($rsSPTuongTu) > 0) {
        while ($rowSPTT = mysqli_fetch_assoc($rsSPTuongTu)) {
    ?>
            <div class="card mb-3" style="width: 80%;">
                <img src="../Image/VanHoc/<?php echo $rowSPTT['anh']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rowSPTT['s_ten']?></h5>
                    <p class="card-text"><?php echo $rowSPTT['s_gia']?></p>
                    <a href="#" class="btn btn-primary">Mua</a>
                </div>
            </div>
    <?php
        }
    }
}

function delSP(){
    // include('./function.php');
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $delCart = mysqli_query($conn, "DELETE FROM giohang where k_id = '$k_id' and s_id = '$s_id' ");
    // $delCart = delete_Cart($k_id, $s_id);
    if ($delCart) {
        echo "Xóa thành công";
    } else {
        echo "Xóa không thành công";
    }
}
function delAllSP()
{
    // include('./function.php');
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $delCart = mysqli_query($conn, "DELETE FROM giohang where k_id = '$k_id' and s_id = '$s_id' ");
    if ($delCart) {
        echo "Xóa thành công";
    } else {
        echo "Xóa không thành công";
    }
}
function updateSL()
{
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $soLuong = $_POST['soLuong'];
    $updateSL = mysqli_query($conn, "UPDATE giohang SET gh_soluong = '$soLuong' where s_id = '$s_id' and k_id = '$k_id'");
    // if($updateSL){
    //     echo "OK";
    // }
    // else{
    //     echo "Npt ok";
    // }
}

function updateTienHD()
{
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $updateTienHD = mysqli_query($conn, "UPDATE giohang SET tongTienHoaDon = gh_soluong*tongtien where s_id='$s_id' and k_id = '$k_id'");
}
if (isset($_POST['action'])) {
    if ($_POST['action'] == "delSP") {
        delSP();
    }
    if ($_POST['action'] == "delAllSP") {
        delAllSP();
    }
    if ($_POST['action'] == "updateSL") {
        updateSL();
        updateTienHD();
    }
    if ($_POST['action'] == "spTuongTu") {
        spTuongTu();
    }
}
