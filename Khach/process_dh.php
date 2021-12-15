<?php
include('../config/db.php');
include('./function.php');
?>
<?php
$email = $_SESSION['check_login'];
$k_id = Khach($email);
// $_SESSION['action'] = $_POST['action'];
$action = $_POST['action'];
if (isset($_POST['tranghientai'])) {
    $tranghientai = $_POST['tranghientai'];
} else {
    $tranghientai = 1;
}
$donhang1trang = 5;

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
    $tongtrang = ceil(count_all_dh($k_id) / $donhang1trang);
    $start = ($tranghientai - 1) * $donhang1trang;
    if (isset($_POST['hd_id'])) {
        $hd_id = $_POST['hd_id'];
        if ($_POST['status'] == '3') {
            $qr = Chitiethd($hd_id, $k_id);
            while ($row_update = mysqli_fetch_assoc($qr)) {
                $s_id = $row_update['s_id'];
                $sluong = $row_update['sluong'];
                $soluong = ($row_update['soluong']) - $sluong;
                $luotmua = ($row_update['luotmua']) +  $sluong;
                update_soluongs($s_id, $soluong, $luotmua);
            }
        }
        update_status($hd_id, $_POST['status']);
        $show = show_allDh($k_id, $start, $donhang1trang);
    } else {
        $show = show_allDh($k_id, $start, $donhang1trang);
    }
    if (isset($_POST['val'])) {
        $val = $_POST['val'];
        $tongtrang = ceil(count_search_dh($k_id, $val) / $donhang1trang);
        $start = ($tranghientai - 1) * $donhang1trang;
      
        $show = search_dh($k_id, $val, $start, $donhang1trang);
    } else {
        $show = show_allDh($k_id, $start, $donhang1trang);
    }
}
if ($action == 'Chờ xác nhận') {
    $tongtrang = ceil(count_show_allDh_status($k_id, '0') / $donhang1trang);
    $start = ($tranghientai - 1) * $donhang1trang;
    if (isset($_POST['hd_id'])) {
        $hd_id = $_POST['hd_id'];
        update_status($hd_id, $_POST['status']);
        $show = show_allDh_status($k_id, '0', $start, $donhang1trang);
    } else {
        $show = show_allDh_status($k_id, '0', $start, $donhang1trang);
    }
}
if ($action == 'Chờ lấy hàng') {
    $tongtrang = ceil(count_show_allDh_status($k_id, '1') / $donhang1trang);
    $start = ($tranghientai - 1) * $donhang1trang;
    $show = show_allDh_status($k_id, '1', $start, $donhang1trang);
}
if ($action == 'Đang giao') {
    $tongtrang = ceil(count_show_allDh_status($k_id, '2') / $donhang1trang);
    $start = ($tranghientai - 1) * $donhang1trang;
    if (isset($_POST['hd_id'])) {
        $hd_id = $_POST['hd_id'];
        if ($_POST['status'] == '3') {
            $qr = Chitiethd($hd_id, $k_id);
            while ($row_update = mysqli_fetch_assoc($qr)) {
                $s_id = $row_update['s_id'];
                $sluong = $row_update['sluong'];
                $soluong = ($row_update['soluong']) - $sluong;
                $luotmua = ($row_update['luotmua']) +  $sluong;
                update_soluongs($s_id, $soluong, $luotmua);
            }
        }

        update_status($hd_id, $_POST['status']);
        $show = show_allDh_status($k_id, '2', $start, $donhang1trang);
    } else {
        $show = show_allDh_status($k_id, '2', $start, $donhang1trang);
    }
    // $show = show_allDh_status($k_id, '2');
}
if ($action == 'Đã giao') {
    $tongtrang = ceil(count_show_allDh_status($k_id, '3') / $donhang1trang);
    $start = ($tranghientai - 1) * $donhang1trang;
    $show = show_allDh_status($k_id, '3', $start, $donhang1trang);
}
if ($action == 'Đã hủy') {
    $tongtrang = ceil(count_show_allDh_status($k_id, '4') / $donhang1trang);
    $start = ($tranghientai - 1) * $donhang1trang;
    $show = show_allDh_status($k_id, '4', $start, $donhang1trang);
}
if (isset($show)) {
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

                <div class='mualai' sluong_st0=<?php
                                                if ($action == 'Tất cả') {
                                                    echo count_status0($k_id, 1);
                                                } else {
                                                    echo count_status0($k_id, $row['status']);
                                                } ?>>
                    <a href="cart.php"><button class="btn btn-primary btn_mualai" hd_id=<?php echo $row['hd_id'] ?>>Mua lại</button></a>
                    <?php if ($row['status'] == '0') { ?>
                        <button class="btn btn-danger huydh" hd_id=<?php echo $row['hd_id'] ?>>Hủy đơn</button>
                    <?php  } ?>
                    <?php if ($row['status'] == '3') { ?>
                        <button class="btn btn-danger danhgia" hd_id=<?php echo $row['hd_id'] ?>><?php
                                                                                                    $qr = Slt_Danhgia($k_id, $row['hd_id']);
                                                                                                    if (mysqli_num_rows($qr) > 0) {
                                                                                                        echo "Đã đánh giá";
                                                                                                    } else {
                                                                                                        echo "Đánh giá sản phẩm";
                                                                                                    }
                                                                                                    ?></button>
                    <?php  } ?>
                    <?php if ($row['status'] == '2') { ?>
                        <button class="btn btn-danger nhanhang" hd_id=<?php echo $row['hd_id'] ?>>Đã nhận hàng</button>
                    <?php  } ?>

                </div>
            </div>

        <?php

        } ?>
        <div style="  text-align: center;margin-bottom:40px">
            <span id="see_too" action="<?php echo $action ?>" tranghientai='<?php echo ($tranghientai + 1) ?>' style=" color: red;cursor: pointer;
      display:<?php if ($tranghientai == $tongtrang) {
                    echo 'none';
                } ?> ;">Xem thêm</span>
        </div>
    <?php
    } else {
        echo '<div class = "kodh" >
    Chưa có đơn hàng <span class="mualai" sluong_st0 ="0"></span>
    </div>';
    }
}

if (isset($_POST['hd_id'])) {
    $hd_id = $_POST['hd_id'];
    $qr = Chitiethd($hd_id, $k_id);
    $_SESSION['cb_mualai'] = [];
    while ($row = mysqli_fetch_assoc($qr)) {
        $check_gh = check_GioHang($k_id, $row['s_id']);
        $_SESSION['cb_mualai'][] = $row['s_id'];
        if (mysqli_num_rows($check_gh) > 0) {
        } else {
            $tt = $row['s_gia'] - $row['s_gia'] * ($row['s_giamgia']) / 100;
            $qr_insert = insertCart($k_id, $row['s_id'], $row['sluong'], $tt);
        }
    }
}

if ($action == "Đánh giá") {
    $hd_id = $_POST['hd_id'];
    $qr = Chitiethd($hd_id, $k_id);
    while ($row = mysqli_fetch_assoc($qr)) { ?>
        <br>
        <div class="sp_danhgia" s_id='<?php echo $row['s_id'] ?>'>
            <img src="../Image/VanHoc/<?php echo $row['anh'] ?>" style="height: 70px;" class="img-fluid" alt="">
            <span class="s_ten"><?php echo $row['s_ten'] ?></span>
        </div>
        <br>
        <div class="star_dgia" style="text-align: center;">
            <span class="star star<?php echo $row['s_id'] ?> star1" s_id='<?php echo $row['s_id'] ?>' val='1'><i class="fas fa-star fa-3x"></i></span>
            <span class="star star<?php echo $row['s_id'] ?> star2" s_id='<?php echo $row['s_id'] ?>' val='2'><i class="fas fa-star fa-3x"></i></span>
            <span class="star star<?php echo $row['s_id'] ?> star3" s_id='<?php echo $row['s_id'] ?>' val='3'><i class="fas fa-star fa-3x"></i></span>
            <span class="star star<?php echo $row['s_id'] ?> star4" s_id='<?php echo $row['s_id'] ?>' val='4'><i class="fas fa-star fa-3x"></i></span>
            <span class="star star<?php echo $row['s_id'] ?> star5" s_id='<?php echo $row['s_id'] ?>' val='5'><i class="fas fa-star fa-3x"></i></span>
        </div>
        <br>
        <div class="cmt_page<?php echo $row['s_id'] ?>" style="height:100px">
            <div class="row chose_cmt">
                <span class="col-4 ">Chất lượng tuyệt vời</span>
                <span class="col-3">Đóng gói đẹp</span>
                <span class="col-4">Phục vụ nhiệt tình</span>
                <span class="col-5">Xứng đáng 5 sao</span>
                <span class="col-5">Thời gian giao hàng rất nhanh</span>
            </div>
        </div>
        <br>
        <div class="cmt_khach">
            <div class="input-group">
                <!-- <span class="input-group-text">Chia sẻ của bạn về sản phẩm</span> -->
                <textarea id="input<?php echo $row['s_id'] ?>" placeholder="Hãy chia sẻ những điều bạn thích về sách" class="form-control" aria-label="With textarea"></textarea>
            </div>
        </div>
        <?php
    }
}

if ($action == 'cmt_page') {
    $val =  $_POST['val'];
    switch ($val) {
        case '1': ?>
            <div class="row chose_cmt">
                <span class="col-4">Chất lượng rất kém</span>
                <span class="col-3">Đóng gói rất kém</span>
                <span class="col-4">Phục vụ chán</span>
                <span class="col-5">Rất không đáng tiền</span>
                <span class="col-5">Thời gian giao hàng chậm</span>
            </div>
        <?php
            break;
        case '2': ?>
            <div class="row chose_cmt">
                <span class="col-4">Chất lượng kém</span>
                <span class="col-3">Đóng gói kém</span>
                <span class="col-4">Phục vụ lỏng lẻo</span>
                <span class="col-5">Không đáng tiền</span>
                <span class="col-5">Thời gian giao hàng chậm</span>
            </div>
        <?php
            break;
        case '3': ?>
            <div class="row chose_cmt">
                <span class="col-4">Chất lượng tạm được</span>
                <span class="col-3">Đóng gói tạm được</span>
                <span class="col-4">Phục vụ tạm</span>
                <span class="col-5">Giá cả chấp nhận được</span>
                <span class="col-5">Thời gian giao hàng tạm</span>
            </div>
        <?php
            break;
        case '4': ?>
            <div class="row chose_cmt">
                <span class="col-4">Chất lượng tốt</span>
                <span class="col-3">Đóng gói chắc chắn</span>
                <span class="col-4">Phục vụ khá tốt</span>
                <span class="col-5">Đáng đồng tiền</span>
                <span class="col-5">Thời gian giao hàng nhanh</span>
            </div>
        <?php
            break;
        case '5': ?>
            <div class="row chose_cmt">
                <span class="col-4 ">Chất lượng tuyệt vời</span>
                <span class="col-3">Đóng gói đẹp</span>
                <span class="col-4">Phục vụ nhiệt tình</span>
                <span class="col-5">Xứng đáng 5 sao</span>
                <span class="col-5">Thời gian giao hàng rất nhanh</span>
            </div>
<?php
    }
}
if ($action == 'update đánh giá') {
    $hd_id = $_POST['hd_id'];
    $arr_all = $_POST['arr_all'];
    //print_r($arr_all) ;
    for ($i = 0; $i < sizeof($arr_all); $i++) {
        $s_id = $arr_all[$i][0];
        $sao = $arr_all[$i][1];
        $cmt = $arr_all[$i][2];
        // echo $cmt;
        $qr =  InsertDanhGia($k_id, $hd_id, $s_id, $sao, $cmt);
        // if($qr){
        //     echo $s_id;
        // }
    }
}




?>