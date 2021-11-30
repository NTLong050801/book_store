<title>Thanh toán</title>
<?php
include('../Parital/header.php');
require('./function.php')
?>
<style>
    .title {
        margin-top: 20px;
    }

    .address {
        margin-top: 20px;
        border-top: dashed red 2px;
        background-color: #ccc;
    }

    #infor {
        /* display: flex; */
        align-items: center;
        margin-bottom: 15px;
    }

    .name {
        font-weight: 700;
        color: #222;
        width: 30%;
    }

    .title_adr {
        display: flex;
        align-items: center;
        font-size: 1.125rem;
        color: #ee4d2d;
        margin-top: 20px;
        margin-bottom: 20px;
        text-transform: capitalize;
        flex: 1 1 auto;
    }

    .title_adr i {
        margin-right: 15px;
    }

    .adr {
        margin-left: 20px;
        word-break: break-word;
    }

    .sanpham {
        margin-top: 50px;
    }

    .ip_lnhan {
        display: flex;
        width: 30%;
        align-items: center;
        box-shadow: inset 0 2px 0 0 rgb(0 0 0 / 2%);
        border-radius: 2px;
        height: 40px;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border: 1px solid rgba(0, 0, 0, .14);
    }

    #loinhan {
        padding: 4px 12px;
        width: 100%;
        height: 40px;
    }

    .ttt {
        margin-left: 20px;
        font-size: 20px;
        color: #ee4d2d;
    }

    .voucher {
        margin-top: 50px;
        background-color: #ccc;
        padding: 20px;
    }

    .row .pttt {
        margin-top: 50px;
    }

    .change {
        background-color: yellow;
    }

    .pay {
        margin: 10px;

    }

    #thanhtoan {
        width: 30%;
        float: right;
    }

    #thanhtoan label {
        float: left;
        font-size: 14px;
        color: rgba(0, 0, 0, .54);
        display: flex;
        align-items: center;
        margin-top: 3px;
    }

    #thanhtoan span {
        float: right;
    }
</style>
<link rel="stylesheet" href="../CSS/banking.css">
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">
    <div id="page-content-wrapper">
        <div class="container-fluid" style="background-color: rgb(148 122 126 / 8%);">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a href="index.php"><img src="../Image/logo.png" class="container img-fluid" alt="" style="height: 70px;"></a>
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
                    <div class="container main-content">
                        <!-- <h4 class="title">Thanh toán</h4> -->
                        <?php
                        $k_email = $_SESSION['check_login'];
                        $k_id = Khach($k_email);
                        $qr = mysqli_query($conn, "SELECT * from khach where k_email = '$k_email'");
                        $row = mysqli_fetch_assoc($qr);
                        ?>
                        <div class="address">

                        </div>

                        <div class="sanpham">
                            <!-- <h4>Sản phẩm</h4> -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Đơn giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (!empty($_POST['check'])) {
                                        $sluong_sp = 0;
                                        $ttt = 0;
                                        foreach ($_POST['check'] as $s_id) {
                                            $rows = mysqli_fetch_assoc(check_GioHang($k_id, $s_id));
                                    ?>
                                            <tr>
                                                <td>
                                                    <span id="img" style="width:20%;"><img style="max-height:100px" class="img-fluid" src="../Image/VanHoc/<?php echo $rows['anh'] ?>" alt=""></span>
                                                    <span id="name" class="names" sluong=<?php echo $rows['gh_soluong'] ?> s_id=<?php echo $rows['s_id'] ?>><?php echo $rows['s_ten'] ?></span>
                                                </td>
                                                <td><span><?php echo $gia = $rows['tongtien'] ?></span>đ</td>
                                                <td><span><?php echo $sluong = $rows['gh_soluong'];
                                                            $sluong_sp += $sluong ?></span></td>
                                                <td><span><?php echo $ttien = ($gia * $sluong);
                                                            $ttt += $ttien  ?></span>đ</td>
                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <div class=" row tongtien">
                                <label for="loinhan" class="col-1" style="margin-top: 5px;">Lời nhắn:</label>
                                <span class="ip_lnhan col-4"><input type="text" name="loinhan" id="loinhan" placeholder="Lời nhắn cho người bán"></span>
                                <span class="col-4" style="margin-left: 20%;">
                                    <label for="" style="font-size: 14px;color: #929292;}">Tổng số tiền(<?php echo $sluong_sp ?> sản phẩm) :</label>
                                    <span class="ttt" id="ttt"><?php echo $ttt ?></span>đ
                                </span>
                            </div>

                            <div class="voucher">
                                <span><i class="fas fa-dollar-sign"></i> Voucher của shop</span>
                                <span><button id="btn_voucher" class="btn btn-secondary" style="float: right;">Chọn voucher</button></span>
                            </div>

                            <div class="row pttt">
                                <div class="col-3">
                                    <h4>Phương thức thanh toán</h4>
                                </div>
                                <div class="col-9">
                                    <button class="pay">Thẻ ATM Nội địa</button>
                                    <button class="pay">Ví momo</button>
                                    <button class="pay">Thanh toán khi nhận hàng</button>
                                </div>

                            </div>
                            <div id="thanhtoan">
                                <label for="">Tổng tiền hàng:</label><span><?php echo $ttt ?>đ</span>
                                <br>
                                <label for="">Giảm giá:</label><span id="giamgia">0đ</span>
                                <br>
                                <br>
                                <label for="">Tổng thanh toán:</label>
                                <span class="ttt" id="tongall"><?php echo $ttt ?>đ</span>
                                <br>
                                <br>
                                <a href="donhang.php">
                                    <button id="dathang" class="btn btn-success" style="float: right;">ĐẶT HÀNG</button></a>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voucher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex">
                    <input id="ip_magg" class="form-control me-2" type="search" placeholder="Nhập vào đây longdz để đc giảm giá 99%" aria-label="Search">
                    <button id="btn_apdung" class="btn btn-outline-success" type="button">Áp dụng</button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên mã giảm giá</th>
                            <th scope="col">Điều kiện</th>
                            <th scope="col">Ngày hết hạn</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Giảm giá 10%</td>
                            <td>Tổng tiền lớn hơn 150k</td>
                            <td></td>
                            <td><button class="btn btn-secondary use_voucher" ptgiamgia="10" value="150000">Sử dụng</button></td>
                        </tr>
                        <tr>
                            <td>Giảm giá 20%</td>
                            <td>Tổng tiền lớn hơn 250k</td>
                            <td></td>
                            <td><button class="btn btn-secondary use_voucher" ptgiamgia="20" value="250000">Sử dụng</button></td>
                        </tr>
                        <tr>
                            <td>Giảm giá 30%</td>
                            <td>Tổng tiền lớn hơn 350k</td>
                            <td></td>
                            <td><button class="btn btn-secondary use_voucher" ptgiamgia="30" value="350000">Sử dụng</button></td>
                        </tr>
                        <tr>
                            <td>Giảm giá 40%</td>
                            <td>Tổng tiền lớn hơn 550k</td>
                            <td></td>
                            <td><button class="btn btn-secondary use_voucher" ptgiamgia="40" value="550000">Sử dụng</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['k_email'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Họ và tên</label>
                        <div class="col-sm-10">
                            <input id="k_ten" type="text" class="form-control" value="<?php echo $row['k_ten'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input id="k_sdt" type="text" class="form-control" value="<?php echo $row['k_sdt'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input id="k_diachi" type="text" class="form-control" value="<?php echo $row['k_diachi'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name="change" id="btn_change" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #ee4d2d;color:#fff">
            <br>
            <div class="modal-body3" style="text-align: center;">
                <h4></h4>
            </div>
            <br>
        </div>
    </div>
</div>
<?php
include('../Parital/foot.php')
?>
<!-- <script src="../JS/Khach_JS/banking.js"></script> -->
<script>
    $(document).ready(function() {
        data_khach()
        $(document).on('click', "#change", function() {
            $('#exampleModal1').modal("show")
            k_id = $(this).attr("k_id")
            $('#btn_change').click(function() {
                action = "update_khach";
                k_ten = $("#k_ten").val()
                k_sdt = $("#k_sdt").val()
                k_diachi = $("#k_diachi").val()
                $.ajax({
                    url: "data_cart.php",
                    method: "POST",
                    data: {
                        action: action,
                        k_ten: k_ten,
                        k_sdt: k_sdt,
                        k_diachi: k_diachi
                    },
                    success: function(dt) {
                        $('#exampleModal1').modal("hide")
                        data_khach()
                    }
                })
            })
        })

        function data_khach() {
            action = "data_khach";
            $.ajax({
                url: "data_cart.php",
                method: "POST",
                data: {
                    action: action,
                },
                success: function(dt) {
                    $('.address').html(dt)
                }
            })
        }
        $('#btn_voucher').click(function() {
            // ttt = parseInt( $('#ttt').html())
            ttt = parseInt($('#ttt').html())
            $('#exampleModal').modal("show")
            $('.use_voucher').each(function() {
                giatri = $(this).attr("value")
                if (ttt < giatri) {
                    $(this).css("display", "none")
                }
            })
            $('.use_voucher').click(function() {
                ttt = parseInt($('#ttt').html())
                $('.use_voucher').each(function() {
                    if ($(this).hasClass("btn-success")) {
                        $(this).removeClass("btn-success")
                        $(this).addClass("btn-secondary")
                    }
                })
                if ($(this).hasClass("btn-secondary")) {
                    $(this).removeClass("btn-secondary")
                    $(this).addClass("btn-success")
                }
                ptgiamgia = $(this).attr("ptgiamgia")
                tiengiam = parseInt(ttt * (ptgiamgia / 100))
                ttt = ttt - tiengiam
                $('#giamgia').html(tiengiam + 'đ')
                $('#tongall').html(ttt + 'đ')
                $('#exampleModal').modal("hide")
                $('#btn_voucher').removeClass("btn-secondary")
                $('#btn_voucher').addClass("btn-primary")
                $('#exampleModal3').modal('show');
                $('.modal-body3 h4').html("Đã sử dụng voucher")
                setTimeout(function() {
                    $("#exampleModal3").modal('hide')
                }, 1500)
            })

            $('#btn_apdung').click(function() {
                ttt = parseInt($('#ttt').html())
                magg = $('#ip_magg').val();

                if (magg == "longdz") {
                    ptgiamgia = 99
                    tiengiam = parseInt(ttt * (ptgiamgia / 100))
                    ttt = ttt - tiengiam
                    $('#giamgia').html(tiengiam + 'đ')
                    $('#tongall').html(ttt + 'đ')
                    $('#exampleModal').modal("hide")
                    $('#btn_voucher').removeClass("btn-secondary")
                    $('#btn_voucher').addClass("btn-primary")
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html("Đã sử dụng voucher")
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 1500)

                } else {
                    $('#exampleModal').modal("hide")
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html("Mã giảm giá không tồn tại")
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 1500)
                    magg = $('#ip_magg').val('');
                    $('#giamgia').html('0đ')
                    $('#tongall').html(ttt + 'đ')
                }
                $('.use_voucher').each(function() {
                    if ($(this).hasClass("btn-success")) {
                        $(this).removeClass("btn-success")
                        $(this).addClass("btn-secondary")
                    }
                })

            })

        })
        pay = ''
        $('.pay').mouseover(function() {
            $(this).addClass("change")
            $(this).click(function() {
                $('.pay').removeClass("btn-primary")
                $(this).addClass("btn-primary")
                $('#dathang').attr('disabled', false)
            })
        })
        $('.pay').mouseleave(function() {
            $(this).removeClass("change")
        })
        $('#dathang').attr('disabled', true)
        $('#dathang').click(function() {
            dem = 0
            s_ids = []
            action = 'insert_dh';
            note = $('#loinhan').val();
            a = $('#tongall').html()
            tongall = parseInt(a.slice(0,-1))
            // alert(a)
            $.ajax({
                url: "process_dh.php",
                method: "POST",
                data: {
                    action: action,
                    note: note,
                    tongall : tongall
                    // s_ids: s_ids
                },
                success: function(dt) {
                    // alert(dt);
                }
            })
            action = "delete_giohang";
            $('.names').each(function() { 
                s_id = $(this).attr('s_id');
                // s_ids = s_ids.push(s_id)
                sluong = $(this).attr('sluong');
                console.log(s_id)
                $.ajax({
                    url: "process_dh.php",
                    method: "POST",
                    data: {
                        s_id: s_id,
                        sluong: sluong,
                        action: action
                    },
                    success: function(dt) {
                        // alert(dt)
                    }
                })
            })
        })

    })
</script>