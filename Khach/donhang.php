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

    #see_too {
        color: red;
        cursor: pointer;
        text-align: center;
        margin-top: 20px;
        /* margin-right: 40%; */
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

    .sluongdh {
        color: #ee4d2d;
    }

    .sluongdh_xn {
        color: #ee4d2d;
    }

    .star_color {
        color: yellow;
        /* background-color: yellow;  */
        /* border: black 1px solid; */
    }

    .chose_cmt {
        text-align: center;
    }

    .chose_cmt span {
        cursor: pointer;
        border-radius: 15px;
        border: black 2px solid;
        margin: 10px;
    }

    .click_chose_cmt {
        background-color: #ee4d2d;
        color: #fff;
    }
</style>
<?php
$email = $_SESSION['check_login'];
$k_id = Khach($email);
?>
<link rel="stylesheet" href="../CSS/banking.css">
<div id="wrapper" style="height:100%;padding-left: 0;">
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
                            <div class="col-2 view"><span>Chờ xác nhận</span>
                                <p class='sluongdh dh_xn'><?php echo count_status0($k_id, 0) ?></p>
                            </div>
                            <div class="col-2 view"><span>Chờ lấy hàng</span>
                                <p class='sluongdh dh_lh'><?php echo count_status0($k_id, 1) ?></p>
                            </div>
                            <div class="col-2 view"><span>Đang giao</span>
                                <p class='sluongdh dh_dn'><?php echo count_status0($k_id, 2) ?></p>
                            </div>
                            <div class="col-2 view"><span>Đã giao</span>

                            </div>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn hủy không ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                <button id="xnhuy" type="button" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đánh giá sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container modal-body1">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trờ lại</button>
                <button type="button" id="btn_hoanthanh" class="btn btn-primary">Hoàn thành</button>
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

<?php
include('../Parital/foot.php')
?>

<!-- <script src="../JS/Khach_JS/banking.js"></script> -->
<script>
    $(document).ready(function() {
        action = "Tất cả"
        load_data()

        function load_data() {
            $.ajax({
                url: "process_dh.php",
                method: "POST",
                data: {
                    action: action,
                },
                success: function(dt) {
                    $('.data').html(dt)
                    $('.danhgia').each(function() {
                        if ($(this).html() == "Đã đánh giá") {
                            $(this).prop("disabled", true)
                        }
                    })
                    // alert(dt)
                }
            })
        }
        $('.view').click(function() {
            $('.view').removeClass('maucam')
            $(this).addClass('maucam')
        })
        $('.view span').click(function() {
            view = $(this).html()
            hd_id = $(this).attr('hd_id')

            if (view == 'Tất cả') {
                $('.search').css("display", 'block')
            } else {
                $('.search').css("display", 'none')
            }
            action = view;
            load_data()

            $('.nhanhang').click(function() {
                hd_id = $(this).attr('hd_id')
                // alert(hd_id);
                status = 3;
                $.ajax({
                    url: "process_dh.php",
                    method: "POST",
                    data: {
                        action: action,
                        hd_id: hd_id,
                        status: status
                    },
                    success: function(dt) {
                        $('.data').html(dt)
                        // $('#exampleModal').modal('hide')

                        sluong_st0 = $('.mualai').attr('sluong_st0');
                        // alert(sluong_st0)
                        if (sluong_st0 != '(undefined)' && sluong_st0 != '0') {
                            $('.dh_dn').html(sluong_st0)
                        } else {
                            $('.dh_dn').html('')
                        }

                    }
                })

            })
        })

        $(document).on('keypress', '#search_ip', function(e) {
            if (e.which == '13') {
                val = $(this).val();
                if (val != '') {
                    $.ajax({
                        url: "process_dh.php",
                        method: "POST",
                        data: {
                            action: action,
                            val: val,
                        },
                        success: function(dt) {
                            $('.data').html(dt)
                            $('.danhgia').each(function() {
                                if ($(this).html() == "Đã đánh giá") {
                                    $(this).prop("disabled", true)
                                }
                            })
                        }
                    })
                }

            }
        })

        $(document).on('click', '.huydh', function() {
            $('#exampleModal').modal('show')
            hd_id = $(this).attr('hd_id')
            status = 4;
            $('#xnhuy').click(function() {
                $.ajax({
                    url: "process_dh.php",
                    method: "POST",
                    data: {
                        action: action,
                        hd_id: hd_id,
                        status: status
                    },
                    success: function(dt) {
                        $('.data').html(dt)
                        $('#exampleModal').modal('hide')

                        sluong_st0 = $('.mualai').attr('sluong_st0');
                        // alert(sluong_st0)
                        if (sluong_st0 != '(undefined)' && sluong_st0 != '0') {
                            $('.dh_xn').html(sluong_st0)
                        } else {
                            $('.dh_xn').html('')
                        }

                    }
                })

            })
        })

        $(document).on('click', '.btn_mualai', function() {
            hd_id = $(this).attr('hd_id')
            action = "Mua lại"
            // alert(hd_id)
            $.ajax({
                url: "process_dh.php",
                method: "POST",
                data: {
                    hd_id: hd_id,
                    action: action
                },
                success: function(dt) {
                    // alert(dt)
                }
            })
        })

        $(document).on('click', '.danhgia', function() {
            $('#exampleModal1').modal('show')
            hd_id = $(this).attr('hd_id');
            // alert(hd_id)
            action = "Đánh giá";
            $.ajax({
                url: "process_dh.php",
                method: "POST",
                data: {
                    action: action,
                    hd_id: hd_id
                },
                success: function(dt) {
                    $('.modal-body1').html(dt)
                    $('.star').addClass('star_color')
                    $('#btn_hoanthanh').attr('hd_id', hd_id)
                    // $('.star span i').addClass('star')
                }
            })
        })
        $(document).on('click', '.star', function() {
            val = $(this).attr('val');
            s_id = $(this).attr('s_id');

            $('.star' + s_id).removeClass('star_color')
            for (i = 1; i <= val; i++) {
                $('.star' + s_id + '' + '.star' + i).addClass('star_color')
            }
            action = "cmt_page";
            $.ajax({
                url: "process_dh.php",
                method: "POST",
                data: {
                    val: val,
                    action: action
                },
                success: function(dt) {
                    $('.cmt_page' + s_id).html(dt)
                }
            })
        })
        $(document).on('click', '.chose_cmt span', function() {
            if ($(this).hasClass('click_chose_cmt')) {
                $(this).removeClass('click_chose_cmt')
            } else {
                $(this).addClass('click_chose_cmt')
            }

        })

        $(document).on('click', '#btn_hoanthanh', function() {
            // lấy dữ liệu [k_id,h_id,s_id] = json
            //dùng vòng for lấy số sao của mỗi sách và cmt của môi sách (lưu vào 1 mảng)
            hd_id = $(this).attr('hd_id');
            // alert(hd_id)
            s_ids = []
            cmts = []
            $('.sp_danhgia').each(function() {
                s_ids.push($(this).attr('s_id'))
                cmt = $('#input' + $(this).attr('s_id')).val();
                cmts.push(cmt)
            })
            stars = [];
            for (i = 0; i < s_ids.length; i++) {
                dem = 0;
                $('.star' + s_ids[i]).each(function() {
                    if ($(this).hasClass('star_color')) {
                        dem = dem + 1;
                    }
                })
                stars.push(dem)
            }
            // alert(stars)
            data = [s_ids, stars, cmts]
            //console.log(data)
            arr_all = []
            for (i = 0; i < s_ids.length; i++) {
                arr_chua = []
                for (j = 0; j < data.length; j++) { // chạy 3 lần
                    arr_chua.push(data[j][i])
                }
                arr_all.push(arr_chua)
            }
            // console.log(arr_all)
            action = "update đánh giá"
            $.ajax({
                url: 'process_dh.php',
                method: "POST",
                data: {
                    arr_all: arr_all,
                    hd_id: hd_id,
                    action: action
                },
                success: function(dt) {
                    $('#exampleModal1').modal('hide')
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html("Đánh giá thành công !")
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 2000)
                    action = "Đã giao";
                    load_data()
                }
            })

        })

        $(document).on('click', '.nhanhang', function() {
            hd_id = $(this).attr('hd_id')
            // alert(hd_id);
            status = 3;
            $.ajax({
                url: "process_dh.php",
                method: "POST",
                data: {
                    action: action,
                    hd_id: hd_id,
                    status: status
                },
                success: function(dt) {
                    $('.data').html(dt)
                    // $('#exampleModal').modal('hide')

                    sluong_st0 = $('.mualai').attr('sluong_st0');
                    // alert(sluong_st0)
                    if (sluong_st0 != '(undefined)' && sluong_st0 != '0') {
                        $('.dh_dn').html(sluong_st0)
                    } else {
                        $('.dh_dn').html('')
                    }

                }
            })

        })

        $(document).on('click', '#see_too', function() {
            action = $(this).attr('action');
            tranghientai = $(this).attr('tranghientai')
            $(this).css("display", "none")
            val = $(document).val('#search_ip')
            console.log(val)
            if (val != ' ') {
                $.ajax({
                    url: "process_dh.php",
                    method: "POST",
                    data: {
                        action: action,
                        tranghientai: tranghientai,
                        val: val
                    },
                    success: function(dt) {
                        $('.data').append(dt);

                    }
                })
            } else {
                $.ajax({
                    url: "process_dh.php",
                    method: "POST",
                    data: {
                        action: action,
                        tranghientai: tranghientai,
                    },
                    success: function(dt) {
                        $('.data').append(dt);

                    }
                })
            }

        })


        // $(window).scroll(function() {
        //     x = 1500
        //     action = 'Tất cả'
        //     tranghientai = 1;
        //     if ($(document).scrollTop() > x) {
        //         // action = $(this).attr('action');
        //         // tranghientai = $(this).attr('tranghientai')
        //         // $(this).css("display", "none")
        //         $.ajax({
        //             url: "process_dh.php",
        //             method: "POST",
        //             data: {
        //                 action: action,
        //                 tranghientai: tranghientai,
        //             },
        //             success: function(dt) {
        //                 $('.data').append(dt);
        //             }
        //         })
        //         x = x + 2000
        //         console.log(x);
        //         tranghientai += 1;

        //     }
        // })

    })
</script>