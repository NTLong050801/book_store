<title>Chốt đơn</title>

<?php
// include('../config/db.php');
include('../Parital/header.php');
include('./function.php');
?>
<link rel="stylesheet" href="../CSS/cart.css">

<style>
    .border-orange {
        border: 1px solid #ee4d2d;
    }
</style>
<!-- Sidebar -->
<!-- <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>Khách</h2>
            </li>
            <li id="true" class="nav-item"> <a href="./index.php"><i class="fa fa-home"></i> Home</a> </li>

        </ul>
    </div> -->
<!-- /#sidebar-wrapper -->
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">
    <div id="page-content-wrapper">
        <div class="container-fluid" style="background-color: rgb(148 122 126 / 8%);">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <!-- <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars"></i></a> -->
                            <form class="d-flex" style="margin-left: 50%;">
                                <input require id="search_ip" class="form-control me-2" type="search" placeholder="Nhập tên sách" aria-label="Search">
                                <button id="btn_search" class="btn btn-outline-success" type="button">Tìm</button>
                                <div id="list_sach">

                                </div>
                            </form>
                            <form class="d-flex">
                                <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                <a id="profile_tch" href="cart.php" class="navbar-brand">Giỏ hàng</a>
                                <a href="../Login/logout.php" class="navbar-brand">Đăng xuất</a>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>


            <!-- Content -->

            <div class="container">
                <!-- Start thông tin cá nhân -->
                <div class="row bg-white mt-3">
                    <?php
                    $email_kh =  $_SESSION['check_login'];
                    $rs_ttkh = mysqli_query($conn, "SELECT * FROM khach where k_email = '$email_kh'");
                    $ttkh = mysqli_fetch_assoc($rs_ttkh);
                    ?>
                    <p class="p-3" style="color: #ee4d2d; font-size: 24px;"><i class="fas fa-map-marker-alt"></i> Địa chỉ nhận hàng</p>
                    <b class="col-2 ms-3"><?php echo $ttkh['k_ten'] ?></b>
                    <p class="col-2"><?php echo $ttkh['k_sdt'] ?></p>
                    <p class="col-auto"><?php echo $ttkh['k_diachi'] ?></p>
                </div>
                <!-- End thông tin cá nhân -->

                <!-- Start table sản phẩm -->

                <div class="row bg-white mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-5" scope="col">Sản phẩm</th>
                                <th class="col-md-1" scope="col">Đơn giá</th>
                                <th class="col-md-1" scope="col">Số lượng</th>
                                <th class="col-md-1" scope="col">Số tiền</th>
                            </tr>
                        </thead>
                        <tbody class="bodySP">
                            <?php
                            if (isset($_SESSION['idSach'])) {
                                $sach_ids = $_SESSION['idSach'];
                                for ($i = 0; $i < sizeof($sach_ids); $i++) {
                                    $email_kh = $_SESSION['check_login'];
                                    $sql = "SELECT  giohang.s_id as sachID, khach.k_id as idKhach, anh, s_ten, gh_soluong , tongtien, tl_id FROM giohang, sach, khach where k_email = '$email_kh' and sach.s_id = '$sach_ids[$i]' and giohang.k_id = khach.k_id and giohang.s_id = sach.s_id";
                                    $rs = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($rs) > 0) {
                                        while ($row = mysqli_fetch_array($rs)) {
                            ?>
                                            <tr class="soDong" s_id="<?php echo $sach_ids[$i] ?>" soLuong="<?php echo $row['gh_soluong'] ?>">
                                                <td>
                                                    <img height="50" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                                                    <?php
                                                    echo $row['s_ten'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <p id="tongTien<?php echo $row['sachID'] ?>"><?php echo $row['tongtien'] ?></p>
                                                </td>
                                                <td>
                                                    <p s_id="<?php echo $row['sachID'] ?>" k_id="<?php echo $row['idKhach'] ?>" class="soLuong"><?php echo $row['gh_soluong'] ?></p>
                                                </td>
                                                <td>
                                                    <p class="tongTienA" id="soTien<?php echo $row['sachID'] ?>"><?php echo $row['tongtien'] * $row['gh_soluong'] ?></p>
                                                </td>
                                            </tr>
                            <?php
                                        }
                                    } else {
                                        echo "Không có kq";
                                    }
                                }
                                // print json_encode($sach_ids);
                            } else {
                                echo "Không ok";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- End table sản phẩm -->

                <!-- Start vocher -->
                <div class="row bg-white mt-3">
                    <!-- Button trigger modal -->
                    <h5 style="cursor: pointer;" class="text-primary text-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Chọn voucher
                    </h5>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chọn voucher</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3 ms-2">
                                        <input class="col-9 me-2 p-1 nhapVoucher" type="text" placeholder="Nhập voucher...">
                                        <button style="background-color: #ee4d2d;" class="btn col-2 text-white btnUseVoucher">Áp dụng</button>
                                    </div>
                                    <div class="card mb-3 outputVoucher" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-1 d-flex align-items-center">
                                                <input class="ms-2 voucherCheck" type="radio" value="GIAMGIA10" name="voucherCheck">
                                            </div>
                                            <div class="col-md-4">
                                                <img src="../img/avatar.jpg" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title">Giảm giá 10%</h5>
                                                    <p class="card-text">Giảm giá đơn hàng này 10%</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 mt-2">
                                            <div class="col-md-1 d-flex align-items-center">
                                                <input class="ms-2 voucherCheck" type="radio" value="GIAMGIA15" name="voucherCheck">
                                            </div>
                                            <div class="col-md-4">
                                                <img src="../img/avatar.jpg" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title">Giảm giá 15%</h5>
                                                    <p class="card-text">Giảm giá đơn hàng này 10%</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 mt-2">
                                            <div class="col-md-1 d-flex align-items-center">
                                                <input class="ms-2 voucherCheck" type="radio" value="GIAMGIA20" name="voucherCheck">
                                            </div>
                                            <div class="col-md-4">
                                                <img src="../img/avatar.jpg" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title">Giảm giá 20%</h5>
                                                    <p class="card-text">Giảm giá đơn hàng này 10%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" style="background-color: #ee4d2d;" class="btn btn-primary btnGiamGia">Chọn voucher</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End vocher -->

                <!-- Start chọn cách thanh toán -->
                <div class="row bg-white mt-3">
                    <div class="row d-flex justify-content-around">
                        <button class="btn btn-pay col-3">
                            Thanh toán qua ngân hàng
                        </button>
                        <button class="btn btn-pay col-3">
                            Thanh toán qua momo
                        </button>
                        <button class="btn btn-pay col-3">
                            Thanh toán khi nhận hàng
                        </button>
                    </div>
                </div>
                <!-- End chọn cách thanh toán -->
                <div class="row mt-3 d-flex justify-content-end">
                    Ghi chú:
                    <input type="text" name="" class="ms-1 ghiChu col-4">
                </div>
                <!-- Start đặt hàng -->
                <div class="row bg-white mt-3">
                    <div class="text-end">
                        <p class="tongTienHang"></p>
                        <p class="tongGiamGia">Giảm giá: 0đ</p>
                        <p>Tổng thanh toán:
                        <h3 class="tongThanhToan"></h3>
                        </p>
                            <a href="./purchase.php">
                            <button s_id="<?php
                                        for ($i = 0; $i < sizeof($sach_ids); $i++) {
                                            echo $sach_ids[$i];
                                        }
                                        ?>" k_id="<?php echo $ttkh['k_id']; ?>" style="width: 10rem; background-color: #ee4d2d;" class="btn text-white btnDatHang">
                                        Đặt hàng</button>
                            </a>
                    </div>
                </div>
                <!-- End đặt hàng -->

            </div>
            <!-- Content -->



        </div>
    </div>
</div>

<?php
include('../Parital/foot.php')
?>

<script>
    let currentDate = new Date();
    let cDay = currentDate.getDate();
    let cMonth = currentDate.getMonth() + 1;
    let cYear = currentDate.getFullYear();
    let now = new Date().toLocaleDateString();

    $(document).ready(function() {
        tongTienAll = 0;
        $('.tongTienA').each(function() {
            //  tongTien = $(this).html();
            //  console.log(tongTien);
            tongTienA = parseFloat($(this).text());
            tongTienAll = tongTienAll + tongTienA;
        })
        $('.tongTienHang').html('Tổng tiền hàng: ' + tongTienAll + "đ");
        $('.tongThanhToan').html(tongTienAll + "đ");

        $('.btnUseVoucher').click(function() {
            var maVoucher = $('.nhapVoucher').val();
            $('.outputVoucher').html(
                `
                <div class="row g-0">
                                            <div class="col-md-1 d-flex align-items-center">
                                                <input class="ms-2 voucherCheck" type="radio" value="${maVoucher}" name="voucherCheck">
                                            </div>
                                            <div class="col-md-4">
                                                <img src="../img/avatar.jpg" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title">Giảm giá 10%</h5>
                                                    <p class="card-text">Giảm giá đơn hàng này 10%</p>
                                                </div>
                                            </div>
                                        </div>
                `
            );
        })


        $('.btnGiamGia').click(function() {
            $('.voucherCheck').each(function() {
                if ($(this).is(':checked')) {
                    voucherCheck = $(this).val();
                    if (voucherCheck == "GIAMGIA10") {
                        giamGia = 0.1;
                    }
                    if (voucherCheck == "GIAMGIA15") {
                        giamGia = 0.15;
                    }
                    if (voucherCheck == "GIAMGIA20") {
                        giamGia = 0.2;
                    }
                    console.log(voucherCheck);
                } else {
                    $('.tongGiamGia').html('Giảm giá: 0đ');
                    $('.tongThanhToan').html(tongTienAll + "đ");
                }
            })
            
            $('.tongGiamGia').html('Giảm giá: ' + tongTienAll * giamGia + "đ");
            $('.tongThanhToan').html(tongTienAll - tongTienAll * giamGia + "đ");
        })
        $('.btn-pay').each(function() {
            $('.btn-pay').click(function() {
                $('.btn-pay').removeClass('border-orange');
                $(this).addClass('border-orange');
            })
        })
        $(document).on('click', '.btnDatHang', function() {
            k_id = $(this).attr('k_id');
            ghiChu = $('.ghiChu').val();
            tongThanhToan = parseFloat($('.tongThanhToan').html());
            action = "insert_dh";
            $.ajax({
                url: "checkout_action.php",
                method: "POST",
                data: {
                    // s_id: s_id,
                    k_id: k_id,
                    cDay: cDay,
                    cMonth: cMonth,
                    cYear: cYear,
                    ghiChu: ghiChu,
                    tongThanhToan: tongThanhToan,
                    action: action
                },
                success: function(dt) {
                    // console.log(dt);
                }
            })

            // function listSach(s_id, soLuong){
            //     $.ajax({
            //         url: "checkout_action.php",
            //         method: "POST",
            //         data: {
            //             s_id: s_id,
            //             soLuong: soLuong,
            //             action: action
            //         },
            //         success: function(dt) {
            //             console.log(dt);
            //         }
            //     })
            //    }
            action = "insert_ctdh";
            $('.soDong').each(function() {
                s_id = $(this).attr('s_id');
                soLuong = $(this).attr('soLuong');
                // soLuong = ($('.soLuong').html());
                $.ajax({
                    url: "checkout_action.php",
                    method: "POST",
                    data: {
                        s_id: s_id,
                        soLuong: soLuong,
                        action: action
                    },
                    success: function(dt) {
                        console.log(dt);
                    }
                })
            })

            // function listSachdel(k_id, s_id, soLuong){
            //     $.ajax({
            //         url: "checkout_action.php",
            //         method: "POST",
            //         data: {
            //             k_id: k_id,
            //             s_id: s_id,
            //             soLuong: soLuong,
            //             action: action
            //         },
            //         success: function(dt) {
            //             console.log(dt);
            //         }
            //     })
            //    }
            action = "del_gh";
            $('.soDong').each(function() {
                s_id = $(this).attr('s_id');
                soLuong = $(this).attr('soLuong');
                $.ajax({
                    url: "checkout_action.php",
                    method: "POST",
                    data: {
                        k_ida: k_id,
                        s_id: s_id,
                        soLuong: soLuong,
                        action: action
                    },
                    success: function(dt) {
                        console.log(dt);
                    }
                })
            })
          
        })
    })
</script>