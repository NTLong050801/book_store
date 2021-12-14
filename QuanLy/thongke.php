<title>Trang chủ</title>
<?php
include('../Parital/header.php');
include('./ham.php')
?>
<style>
    .maucam {
        border-bottom: #ee4d2d solid;
    }

    .choose {
        cursor: pointer;
        padding: 10px;

    }

    .choose:hover {
        color: red;
    }

    .qr {
        font-family: Lato;
        font-weight: 400;
        background-color: #26282a;
        color: white;
    }

    .kodh {
        background-color: #ee4d2d;
        color: #fff;
        font-size: 20px;
        text-align: center;
        margin: 20%;
        height: 50px;
        border-radius: 20px;
        padding-top: 5px;
    }

    .mualai {
        margin-top: 5px;
        float: right;
        margin: 15px;

    }

    .center {
        margin: 0 auto;
        text-align: center;
    }

    .anim-box {
        position: relative;
        width: 220px;
        height: 70px;
        padding: 5px 30px;
        transition: transform .6s ease-out;
    }

    .anim-box:before,
    .anim-box:after,
    .anim-box>:first-child:before,
    .anim-box>:first-child:after {
        position: absolute;
        width: 10%;
        height: 15%;
        border-color: white;
        border-style: solid;
        content: ' ';
    }

    .anim-box:before {
        top: 0;
        left: 0;
        border-width: 2px 0 0 2px;
    }

    .anim-box:after {
        top: 0;
        right: 0;
        border-width: 2px 2px 0 0;
    }

    .anim-box>:first-child:before {
        bottom: 0;
        right: 0;
        border-width: 0 2px 2px 0;
    }

    .anim-box>:first-child:after {
        bottom: 0;
        left: 0;
        border-width: 0 0 2px 2px;
    }

    .anim-item {
        display: inline-block;
        background-color: white;
        height: 60px;
    }

    .anim-item-sm {
        width: 2px;
        margin-right: 3px;
    }

    .anim-item-md {
        width: 3px;
        margin-right: 2px;
    }

    .anim-item-lg {
        width: 5px;
        margin-right: 5px;
    }

    .anim-box:hover {
        transform: scale(1.0, 1)
    }

    .anim-box:hover .scanner {
        animation-play-state: running;
    }

    .scanner {
        width: 100%;
        height: 3px;
        background-color: red;
        opacity: 0.7;
        position: relative;
        box-shadow: 0px 0px 8px 10px rgba(170, 11, 23, 0.49);
        top: 50%;
        animation-name: scan;
        animation-duration: 4s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        animation-play-state: paused;
    }

    @keyframes scan {
        0% {
            box-shadow: 0px 0px 8px 10px rgba(170, 11, 23, 0.49);
            top: 50%;
        }

        25% {
            box-shadow: 0px 6px 8px 10px rgba(170, 11, 23, 0.49);
            top: 5px;
        }

        75% {
            box-shadow: 0px -6px 8px 10px rgba(170, 11, 23, 0.49);
            top: 98%;
        }
    }

    .dem {
        color: red;
    }
</style>
<div id="wrapper" style="overflow: scroll;height:100%">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>Khách</h2>
            </li>
            <li id="true" class="nav-item"> <a href="index.php"><i class="fa fa-home"></i>Sách</a> </li>
            <li id="true" class="nav-item"> <a href="donhang.php"><i class="fa fa-home"></i>Đơn hàng</a> </li>
            <li id="true" class="nav-item"> <a href="thongke.php"><i class="fa fa-home"></i>Thống kê</a> </li>
        </ul>
    </div>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars"></i></a>
                            <form class="d-flex" style="margin-left: 30%;" onsubmit="return false;">
                                <input require id="search_ip" class="form-control me-2" type="text" placeholder="Nhập tên sách" aria-label="Search">
                                <!-- <input type="text" id="search_ip"> -->
                                <button id="btn_search" class="btn btn-outline-success" type="button">Tìm</button>
                                <!-- <button type="submit" hidden></button> -->
                                <div id="list_sach" style="z-index: 4;">

                                </div>
                            </form>
                            <form class="d-flex">
                                <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                <a href="../Login/logout.php" class="navbar-brand">Đăng xuất</a>
                            </form>
                        </div>
                    </nav>
                    <!-- bắt  đầu  content -->
                    <div class="container main-content">
                        <div class="container" style="margin-top: 50px;margin-left:10px">
                            <div class="row">
                                <div class="col-3 form-floating mb-3">
                                    <input type="date" class="form-control" id="ngaybatdau" placeholder="name@example.com">
                                    <label for="floatingInput">Ngày bắt đầu</label>
                                </div>
                                <div class="col-3 form-floating mb-3">
                                    <input type="date" class="form-control" id="ngayketthuc" placeholder="Password" today=<?php echo date('d/m/Y') ?>>
                                    <label for="floatingPassword">Ngày kết thúc</label>
                                </div>
                                <div class="col-5 form-floating">
                                    <input id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <label for="floatingPassword">Tìm kiếm đơn hàng (SDT)</label>
                                </div>
                            </div>
                            <div class="data" id="data">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: #ee4d2d;color:#fff; border-radius: 25px;">
                <br>
                <div class="modal-body3" style="text-align: center;">
                    <h4></h4>
                </div>
                <br>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            // ngày hiện tại
            now = new Date().toLocaleDateString()
            today = Date.parse(now);
            // lấy ra giá trị ngày bắt đầu
            $('#ngaybatdau').change(function() {
                $('#search').val('')
                date_s = $(this).val()
                date_start = Date.parse(date_s)
                if (today < date_start) {
                    $('#ngaybatdau').val(now)
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html('Ngày bắt đầu phải nhỏ hơn ngày hiện tại')
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 2000)
                }
            })

            //lấy ra giá trị ngày kết thúc
            $('#ngayketthuc').change(function() {
                if (typeof(date_s) == 'undefined') {
                    $('#ngayketthuc').val(now)
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html('Bạn chưa chọn ngày bắt đầu')
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 2000)
                }
                // ngày kết thúc
                date_e = $(this).val()
                date_end = Date.parse(date_e);
                if (today > date_end) {
                    if (date_end > date_start) {
                        action = "get_data"
                        $.ajax({
                            url: "process_thongke.php",
                            method: "POST",
                            data: {
                                date_s: date_s,
                                date_e: date_e,
                                action: action
                            },
                            success: function(dt) {
                                $('.data').html(dt)
                            }

                        })
                    } else {
                        $('#ngayketthuc').val(now)
                        $('#exampleModal3').modal('show');
                        $('.modal-body3 h4').html('Ngày kết thúc phải lớn hơn ngày bắt đầu')
                        setTimeout(function() {
                            $("#exampleModal3").modal('hide')
                        }, 2000)
                    }
                } else {
                    $('#ngayketthuc').val(now)
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html('Ngày phải nhỏ hơn ngày hiện tại')
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 2000)
                }
            })

            $(document).on('click', '.page-item', function() {
                if ($(this).hasClass('disabled')) {} else {
                    tranghientai = $(this).attr('tranghientai');
                    date_s = $('#ngaybatdau').val()
                    date_e = $('#ngayketthuc').val()
                    val = $('#search').val()
                    action = 'get_data';
                    if (date_s != '' && date_e != '') {
                        $.ajax({
                            url: "process_thongke.php",
                            method: "POST",
                            data: {
                                date_s: date_s,
                                date_e: date_e,
                                action: action,
                                tranghientai: tranghientai
                            },
                            success: function(dt) {
                                $('.data').html(dt)
                            }

                        })
                    }

                    if (val != '') {
                        $.ajax({
                            url: "process_thongke.php",
                            method: "POST",
                            data: {
                                val: val,
                                action: action,
                                tranghientai: tranghientai
                            },
                            success: function(dt) {
                                $('.data').html(dt)
                            }
                        })
                    }

                }

            })

            $(document).on('click', '.bienlai', function() {
                hd_id = $(this).attr('hd_id')
                $('#bienlai' + hd_id).modal('show')
            })

            $('#search').keyup(function() {
                $('#ngaybatdau').val('')
                $('#ngayketthuc').val('')
                val = $(this).val();
                action = "get_data"
                if (val != '') {
                    $.ajax({
                        url: "process_thongke.php",
                        method: "POST",
                        data: {
                            val: val,
                            action: action,
                        },
                        success: function(dt) {
                            $('.data').html(dt)
                        }
                    })
                }else{
                    $('.data').html('')
                }

            })
        })
    </script>