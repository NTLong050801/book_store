<?php
include('../config/db.php');
include('./function.php');
// include('../Parital/header.php')
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
            <td scope="col"><input class="check" s_id = <?php echo $row['s_id'] ?> type="checkbox"></td>
            <td scope="col">
                <span id="img" style="width:20%;"><img style="max-height:100px" class="img-fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt=""></span>
                <span id="name"><?php echo $row['s_ten'] ?></span>
            </td>
            <td scope="col"><span><?php echo $row['tongtien'] ?></span>đ</td>
            <td scope="col">
                <input id="sluong<?php echo $row['s_id'] ?>" s_id = <?php echo $row['s_id'] ?> price = "<?php echo $row['tongtien'] ?>" class="sluong" type="number" min=1 max=10 value="<?php echo $row['gh_soluong'] ?>">
            </td>
            <td scope="col">
                <span id="tongtien<?php echo $row['s_id'] ?>"><?php echo $tt=$row['tongtien'] * $row['gh_soluong']?></span>đ
            </td>
            <td scope="col" class="delete" id_delete=<?php echo $row['s_id'] ?>><i class="fas fa-trash-alt"></i></td>
        </tr>
<?php
    }
    
    
}

if ($action == 'delete') {
    $s_id = $_POST['s_id'];
    delete_Cart($k_id, $s_id);
}

?>
