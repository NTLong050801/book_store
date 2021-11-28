<?php
include('../config/db.php');
include('./function.php');
// include('../Parital/header.php')a
?>
<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = "get_data";
}
$email = $_SESSION['check_login'];
$k_id = Khach($email);
$qr = GioHang_Sach($k_id);
if ($action == 'get_data') {
    while ($row = mysqli_fetch_assoc($qr)) { ?>

        <tr>
            <td scope="col"><input name="check[]" value="<?php echo $row['s_id'] ?>" class="check" s_id=<?php echo $row['s_id'] ?> type="checkbox"></td>
            <td scope="col">
                <a href="./book.php?s_id=<?php echo $row['s_id'] ?>" style="text-decoration: none;">
                    <span id="img" style="width:20%;"><img style="max-height:100px" class="img-fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt=""></span>
                    <span id="name"><?php echo $row['s_ten'] ?></span>
                </a>
            </td>
            <td scope="col"><span><?php echo $row['tongtien'] ?></span>đ</td>
            <td scope="col">
                <input id="sluong<?php echo $row['s_id'] ?>" s_id=<?php echo $row['s_id'] ?> price="<?php echo $row['tongtien'] ?>" class="sluong" type="number" min=1 max=10 value="<?php echo $row['gh_soluong'] ?>">
            </td>
            <td scope="col">
                <span id="tongtien<?php echo $row['s_id'] ?>"><?php echo $tt = $row['tongtien'] * $row['gh_soluong'] ?></span>đ
            </td>
            <td scope="col" style="text-align: center;">
                <span class="delete" id_delete=<?php echo $row['s_id'] ?>><i class="fas fa-trash-alt"></i></span><br><br>
                <span id="sptt" id_tl=<?php echo $row['tl_id'] ?> style="cursor: pointer;">Sản phẩm tương tự <i class="fas fa-chevron-down"></i></span>
            </td>
        </tr>

    <?php
    }
}

if ($action == 'delete') {
    $s_id = $_POST['s_id'];
    delete_Cart($k_id, $s_id);
}

if ($action == 'delete_all') {
    $s_ids = $_POST['s_ids'];
    var_dump($s_ids);
    for ($i = 0; $i < sizeof($s_ids); $i++) {
        $s_id = $s_ids[$i];
        // echo $s_id;
        $qr = delete_Cart($k_id, $s_id);
    }
}

if ($action == 'update') {
    $s_id = $_POST['s_id'];
    $sluong = $_POST['sluong'];
    update_Gh_Soluong($k_id, $s_id, $sluong);
}

if ($action == "data_khach") {

    $slt = mysqli_query($conn, "SELECT * from Khach where k_id = '$k_id'");
    $row = mysqli_fetch_assoc($slt);
    ?>
    <div class="container">
        <div class="title_adr">
            <i class="fas fa-map-marker-alt"></i> <span>Địa Chỉ Nhận Hàng</span>
        </div>
        <div class="row infor">
            <span class="name col-3"><?php echo $row['k_ten'] . ' - ' . $row['k_sdt'] ?></span>
            <span class="adr col-7"><?php echo $row['k_diachi'] ?></span>
            <button id="change" k_id=<?php echo $row['k_id'] ?> class="btn btn-success change_adr col-1">Thay đổi</button>
        </div>
        <br>
    </div>
<?php
}
if ($action == "update_khach") {
    $k_ten = $_POST['k_ten'];
    $k_sdt = $_POST['k_sdt'];
    $k_diachi = $_POST['k_diachi'];
    $sql = "UPDATE khach set k_ten = '$k_ten',k_sdt = '$k_sdt', k_diachi = '$k_diachi' where k_id = '$k_id' ";
    $qr = mysqli_query($conn,$sql);
}

?>