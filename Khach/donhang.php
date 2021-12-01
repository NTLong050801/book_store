<title>Thanh toán</title>
<?php
include('../Parital/header.php');
require('./function.php')
?>
<style>
    .col-2 span {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;

    }

    .view {
        text-align: center;
    }

    .col-2 span:hover {
        color: red;

    }

    .maucam {
        border-bottom: #ee4d2d solid;
    }

    .search {
        margin-top: 20px;
    }

    .thongbao {
        width: 10%;
        float: right;
        color: #fff;
        margin: 15px;
        background-color: #ee4d2d;
        text-align: center;
        padding: 5px;
        border-radius: 4px;
    }

    .tongtien_get {
        width: 30%;
        float: right;
    }

    .tongtien_get span {
        width: 20%;
        color: red;
        font-size: 20px;
        margin-left: 40%;
    }

    .giagoc {
        margin: 0 4px 0 0;
        -webkit-text-decoration-line: line-through;
        -moz-text-decoration-line: line-through;
        text-decoration-line: line-through;
        color: #000;
        opacity: .26;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: line-through;
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

    .data_show {
        margin-top: 40px;
        margin-bottom: 200px;
        border-top: #ee4d2d solid;
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
                                <a href="donhang.php" class="navbar-brand">Đơn mua</a>
                                <a id="profile_tch" href="cart.php" class="navbar-brand"><i class="fas fa-shopping-cart fa-2x"></i></a>
                                <a href="../Login/logout.php" class="navbar-brand">Đăng xuất</a>
                            </form>
                        </div>
                    </nav>
                    <div class="container main-content">
                        <div class="row" style="margin-top: 40px;">
                            <div class="col-2 view maucam"><span>Tất cả</span></div>
                            <div class="col-2 view"><span>Chờ xác nhận</span></div>
                            <div class="col-2 view"><span>Chờ lấy hàng</span></div>
                            <div class="col-2 view"><span>Đang giao</span></div>
                            <div class="col-2 view"><span>Đã giao</span></div>
                            <div class="col-2 view"><span>Đã hủy</span></div>
                        </div>
                        <div class="search">
                            <input require id="search_ip" class="form-control me-2" type="search" placeholder="Nhập tên sách" aria-label="Search">
                        </div>

                        <div class="data">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



<?php
include('../Parital/foot.php')
?>

<!-- <script src="../JS/Khach_JS/banking.js"></script> -->
<script>
    $(document).ready(function() {
        $('.view').click(function() {
            $('.view').removeClass('maucam')
            $(this).addClass('maucam')
        })
        $('.view span').click(function() {
            view = $(this).html()
            if (view == 'Tất cả') {
                $('.search').css("display", 'block')
            } else {
                $('.search').css("display", 'none')
            }
            action = view;
            load_data()
        })




        action = "Tất cả"
        load_data()

        function load_data() {
            $.ajax({
                url: "process_dh.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function(dt) {
                    $('.data').html(dt)
                    // alert(dt)
                }
            })
        }

        $(document).on('keypress', '#search_ip', function(e) {
            if (e.which == '13') {
                val = $(this).val();
                if (val != '') {
                    $.ajax({
                    url: "process_dh.php",
                    method: "POST",
                    data: {
                        action: action,
                        val: val
                    },
                    success: function(dt) {
                        $('.data').html(dt)
                        // alert(dt)
                    }
                })
                }
                
            }
        })



    })
</script>