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
                        <div class="row" style="text-align: center;margin-top:50px;">
                            <div class="col-2 choose maucam" status='0' title="Chờ xác nhận">
                                <span>Chờ xác nhận</span>
                                <span class="dem dem0" ><?php echo count_status_ql(0);?></span>
                            </div>
                            <div class="col-2 choose" status='1' title="Chờ lấy hàng">
                                <span>Chờ lấy hàng</span>
                                <span class="dem dem1"><?php echo count_status_ql(1);?></span>
                            </div>
                            <div class="col-2 choose" status='2' title="Đang vận chuyển">
                                <span>Đang vận chuyển</span>
                                <span class="dem dem2"><?php echo count_status_ql(2);?></span>
                            </div>
                            <div class="col-2 choose" status='3' title="Thành công">
                                <span>Thành công</span>
                                <span class="dem dem3"><?php echo count_status_ql(3);?></span>
                            </div>
                            <div class="col-2 choose" status='5' title="Đơn hoàn">
                                <span>Đơn hoàn</span>
                                <span class="dem dem5"></span>
                            </div>
                        </div>
                        <div class="table_data" style="margin-top: 50px;">

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
            action = 'Chờ xác nhận'
            cho_xn()
            $(document).on('click', '.xn', function() {
                update = 'xn';
                status = $('#status').val();
                switch (status) {
                    case 0:
                        action == "Chờ xác nhận";
                        break;
                    case 1:
                        action == "Chờ lấy hàng";
                        break;
                    case 2:
                        action == "Đang vận chuyển";
                        break;
                    case 3:
                        action == "Thành công";
                        break;
                    case 5:
                        action == "Đơn hoàn";
                        break;
                }
                hd_id = $(this).attr('hd_id')
                // console.log(action)
                update_status()
                //console.log(hd_id)

            })
            $('.choose').click(function() {
                $('.choose').removeClass('maucam')
                $(this).addClass('maucam');
                action = $(this).attr('title')
                status = $(this).attr('status')
                cho_xn()
            })
            $(document).on('click', '.bienlai', function() {
                hd_id = $(this).attr('hd_id')
                $('#bienlai' + hd_id).modal('show');
            })

            function update_status() {
                $.ajax({
                    url: "process_dh.php",
                    method: "POST",
                    data: {
                        update: update,
                        action: action,
                        status: status,
                        hd_id: hd_id
                    },
                    success: function(dt) {
                        $('.table_data').html(dt);
                        $('#exampleModal3').modal('show');
                        $('.modal-body3 h4').html('Thành công')
                        setTimeout(function() {
                            $("#exampleModal3").modal('hide')
                        }, 2000)
                        dem = $('#status').attr('dem');
                        dem1 = $('#status').attr('dem1');

                        statuss = parseInt(status) + 1;
                        if(dem == '(undefined)'){
                            $('.dem'+status).html(' ');
                        }else{
                            $('.dem'+status).html(dem);
                        }
                        console.log(statuss)
                        if(dem1 == '(undefined)'){
                            $('.dem'+statuss).html(' ');
                        }else{
                            $('.dem'+statuss).html(dem1);
                        }
                    }

                })
            }

            function cho_xn() {
                $.ajax({
                    url: "process_dh.php",
                    method: "POST",
                    data: {
                        action: action,
                        status: status
                    },
                    success: function(dt) {
                        $('.table_data').html(dt);
                    }

                })
            }
        })
    </script>