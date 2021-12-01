<?php
include('../config/db.php');
include('./function.php');
?>
<?php
$email = $_SESSION['check_login'];
$k_id = Khach($email);
$action = $_POST['action'];
if ($action == 'delete_giohang') {
    $hd_id = slt_Donhang();
    $s_id = $_POST['s_id'];
    $sluong = $_POST['sluong'];
    delete_Cart($k_id, $s_id);
    insert_CTHD($hd_id, $s_id, $sluong);
}
if ($action == 'insert_dh') {
    $note = $_POST['note'];
    $tongall = $_POST['tongall'];
    $qr = insert_Donhang($k_id, $note, $tongall);
}

if ($action == 'Tất cả') {
    if(isset($_POST['val'])){
        $val = $_POST['val'];
        $show = search_dh($k_id,$val);
    }else{
        $show = show_allDh($k_id);
    }
   
}
if ($action == 'Chờ xác nhận') {
    $show = show_allDh_status($k_id, '0');
}
if ($action == 'Chờ lấy hàng') {
    $show = show_allDh_status($k_id, '1');
}
if ($action == 'Đang giao') {
    $show = show_allDh_status($k_id, '2');
}
if ($action == 'Đã giao') {
    $show = show_allDh_status($k_id, '3');
}
if ($action == 'Đã hủy') {
    $show = show_allDh_status($k_id, '4');
}
if (mysqli_num_rows($show) > 0) {
    while ($row = mysqli_fetch_assoc($show)) {

        // nếu trạng thái bằng 0 : chờ xác nhận
        // nếu trạng thái bằng 1 : chờ lấy hàng
        // nếu trạng thái bằng 2 : đang giao
        // nếu trạng thái bằng 3 : đã giao
        // nếu trạng thái bằng 4 : đã hủy
?>

        <div class="data_show">
            <span class='thongbao'><?php
                                    if ($row['status'] == '0') {
                                        echo 'Chờ xác nhận';
                                    }
                                    if ($row['status'] == '1') {
                                        echo 'Chờ lấy hàng';
                                    }
                                    if ($row['status'] == '2') {
                                        echo 'Đang giao';
                                    }
                                    if ($row['status'] == '3') {
                                        echo 'Đã giao';
                                    }
                                    if ($row['status'] == '4') {
                                        echo 'Đã hủy';
                                    }
                                    ?></span>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" style="width:70%">Tên sách</th>
                        <th scope="col" style="width:10%">Số lượng</th>
                        <th scope="col" style="width:10%">Giá gốc</th>
                        <th scope="col" style="width:10%">Giá bán</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $hd_id = $row['hd_id'];
                    $chitiet = Chitiethd($hd_id, $k_id);
                    while ($row_sp = mysqli_fetch_assoc($chitiet)) { ?>
                        <tr>
                            <td>
                                <img style="width:150px" class='container img-fluid' src="../Image/VanHoc/<?php echo $row_sp['anh'] ?>" alt="">
                                <span><?php echo $row_sp['s_ten'] ?></span>
                            </td>
                            <td><?php echo $row_sp['sluong'] ?></td>
                            <td class="giagoc"><?php echo $giagoc = $row_sp['s_gia'] ?>đ</td>
                            <td style="color: red;"><?php echo $giaban = $giagoc - $giagoc * ($row_sp['s_giamgia']) / 100 ?>đ</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class='tongtien_get'>
                <label for="">Tổng số tiền </label><span><?php echo $row['tongtien'] ?>đ</span>
            </div>
            <br>
            <br>

            <div class='mualai'>
            <button class="btn btn-primary">Mua lại</button>
                <?php if($row['status'] == '0'){ ?>
                     <button class="btn btn-danger">Hủy đơn</button>
              <?php  }?>
               
            </div>
        </div>



<?php

    }
} else {
    echo '<div class = "kodh">
    Chưa có đơn hàng
    </div>';
}





?>