<title>Giỏ hàng</title>
<link rel="stylesheet" href="../CSS/cart.css">
<?php
include('../Parital/header.php');
require('./function.php')
?>
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">
    <div id="page-content-wrapper">
        <div class="container-fluid" style="background-color: rgb(148 122 126 / 8%);">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a href="index.php"><img src="../Image/logo.png" class="container img-fluid" alt="" style="height: 70px;"></a>
                            <form class="d-flex" style="margin-left: 30%;">
                                <input require id="search_ip" class="form-control me-2" type="search" placeholder="Nhập tên sách" aria-label="Search">
                                <button id="btn_search" class="btn btn-outline-success" type="button">Tìm</button>
                                <div id="list_sach">

                                </div>
                            </form>
                            <form class="d-flex">
                                <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                <a href="donhang.php" class="navbar-brand">Đơn mua</a>

                                <a id="profile_tch" href="cart.php" class="navbar-brand">Giỏ hàng</a>
                                <a href="../Login/logout.php" class="navbar-brand">Đăng xuất</a>
                            </form>
                        </div>
                    </nav>
                    <div class="container main-content">
                        <h4 class="title">Giỏ hàng</h4>
                        <div id="tbl_data">
                            <form action="banking.php" method="POST">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><input id="checkall" type="checkbox"></th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">

                                    </tbody>
                                </table>
                                <div class="" id="thanhtoan">
                                    <span class="checkbox_all">
                                        <input id="checkbox_all" type="checkbox" style="margin-right: 3%;">Chọn tất cả</span><span id="sluong_all"></span>
                                    <span id="delete_all"><i class="fas fa-trash-alt"></i></span>
                                    <label for="">Tổng thanh toán :<span id="ttt">0</span>đ </label>
                                    <button id="buying" name="banking" type="submit" class="btn btn-danger" <?php if (!isset($_SESSION['cb_mualai'])) {
                                                                                                                echo 'disabled';
                                                                                                            } ?>>
                                        Mua hàng</button>
                                </div>
                            </form>

                        </div>

                        <div id="banthich">
                            <h4>Có thể bạn thích</h4>
                            <span class="tiep" id="back" style="float:left;z-index: 2;margin-top: inherit;width:2%">
                                <i class="fas fa-chevron-left fa-2x"></i></span>
                            <span class="tiep" id="next" style="float:right;z-index: 2;margin-top: inherit;width:2%">
                                <i class="fas fa-chevron-right fa-2x"></i></span>
                            <div class="row sp_new">
                                <div class="container" id="sp_new_tl" style="z-index: 1;">

                                </div>
                            </div>
                        </div>

                        <div id="daxem">
                            <h4>Đã xem</h4>
                            <div class="row">
                                <?php
                                if (isset($_SESSION['daxem']) && (is_array($_SESSION['daxem']))) {
                                    $lenght = sizeof($_SESSION['daxem']);
                                    if ($lenght > 7) {
                                        for ($i =  $lenght - 1; $i > $lenght - 7; $i--) {
                                            echo '<div class = "col-2 daxem" style = "text-align: center;background-color: #ccc;border-right: 3px solid #fff;">
                                                <a href="book.php?s_id=' . $_SESSION['daxem'][$i][0] . '">
                                                <div class = "img_daxem" style = "margin-top:5px"><img class = "container img-fluid" src="../Image/VanHoc/' . $_SESSION['daxem'][$i][1] . '" alt=""></div>
                                                    <div class = "price_daxem" style= "color:red">' . $_SESSION['daxem'][$i][2] . 'đ' . '</div>
                                                    </a></div>';
                                        }
                                    } else {
                                        for ($i =  $lenght - 1; $i > -1; $i--) {
                                            echo '<div  class = "col-2 daxem" style = "text-align: center;background-color: #ccc;border-right: 3px solid #fff;">
                                                <a href="book.php?s_id=' . $_SESSION['daxem'][$i][0] . '">
                                                <div class = "img_daxem" style = "margin-top:5px"><img class = "container img-fluid" src="../Image/VanHoc/' . $_SESSION['daxem'][$i][1] . '" alt=""></div>
                                                    <div class = "price_daxem" style= "color:red">' . $_SESSION['daxem'][$i][2] . 'đ' . '</div>
                                                    </a></div>';
                                        }
                                    }
                                }

                                ?>
                            </div>


                        </div>
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sản phẩm tương tự</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button id="huy" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                <button id="xoa" type="button" class="btn btn-primary">Xóa</button>
            </div>

        </div>
    </div>
</div>

<?php
include('../Parital/foot.php')
?>
<!-- <script src="../JS/Khach_JS/cart.js"></script> -->
<script>
    $(document).ready(function() {
        fetch_data()
        ttt = 0
        function fetch_data() {
            $.ajax({
                url: "data_cart.php",
                method: "POST",
                data: {

                },
                success: function(dt) {
                    if (dt != '') {
                        $('#data').html(dt)
                        //alert(dt)
                        dem = 0;
                        $('.check').each(function() {
                            if ($(this).prop("checked") == true) {
                                s_id = $(this).attr('s_id');
                                
                                tiensp = parseInt($('#tongtien' + s_id).html())
                                ttt = ttt + tiensp;

                            }
                            dem = dem + 1;

                        })
                        $('#ttt').html(ttt)
                        $('#sluong_all').html('('+dem+')')
                    }
                    if (dt == '') {
                        $('#tbl_data').html('<div><label for="">Giỏ hàng của bạn còn trống</label><br><a href="index.php"><button class="btn btn-success">Mua ngay</button></a></div>')
                    }
                }
            })

        }



        $(document).on('click', '.delete', function() {
            s_id = $(this).attr('id_delete');
            var action = "delete"
            s_ids = [];
            $('.check').each(function() {
                if ($(this).prop("checked") == true) {
                    s_ids.push($(this).attr("s_id"));
                }
            })
            $.ajax({
                url: "data_cart.php",
                method: "POST",
                data: {
                    s_id: s_id,
                    action: action,
                },
                success: function() {
                    // alert(dt)
                    $.ajax({
                        url: "data_cart.php",
                        method: "POST",
                        data: {},
                        success: function(dt) {
                            if (dt != '') {
                                $('#data').html(dt)
                                //alert(dt)

                                $('.check').each(function() {
                                    for (i = 0; i < s_ids.length; i++) {
                                        x = $(this).attr("s_id")
                                        if (x == s_ids[i]) {
                                            $(this).prop("checked", true)
                                            // console.log(x)
                                        }
                                    }

                                })
                                dem = 0;
                                ttt = 0
                                $('.check').each(function() {
                                    if ($(this).prop("checked") == true) {
                                        s_id = $(this).attr('s_id');
                                        dem = dem + 1;
                                        tiensp = parseInt($('#tongtien' + s_id).html())
                                        ttt = ttt + tiensp;

                                    }
                                    if (dem == 0) {
                                        ttt = 0;

                                    }
                                })
                                $('#ttt').html(ttt);
                            }
                            if (dt == '') {
                                $('#tbl_data').html('<div><label for="">Giỏ hàng của bạn còn trống</label><br><a href="index.php"><button class="btn btn-success">Mua ngay</button></a></div>')
                            }
                        }
                    })

                }
            })

        })
        //click xóa all
        $('#delete_all').click(function() {
            // check = confirm("Bạn có chắc chắn muốn xóa ?")
            s_ids = []
            dem = 0;
            $('.check').each(function() {
                if ($(this).prop("checked") == true) {
                    s_ids.push($(this).attr("s_id"));
                    dem = dem + 1;
                }
            })

            if (dem == 0) {
                $('#exampleModal1').modal('show')
                $('.modal-body').html("Vui lòng chọn sản phẩm")
                $('#huy').html('OK bro !')
                $('#xoa').css("display", "none")
            } else {
                $('#exampleModal1').modal('show')
                $('.modal-body').html("Bạn có muốn bỏ " + dem + " sản phẩm ?")
                $('#huy').html('Thôi')
                $('#xoa').css("display", "block")
                $('#xoa').click(function() {
                    var action = "delete_all"
                    $.ajax({
                        url: "data_cart.php",
                        method: "POST",
                        data: {
                            s_ids: s_ids,
                            action: action
                        },
                        success: function(dt) {
                            //  alert(dt)
                            fetch_data();
                            $('#ttt').html('0')
                            $('#exampleModal1').modal('hide')
                        }
                    })
                })
            }

        })
        // thay đổi số lượng
        $(document).on('change', '.sluong', function() {
            ttt = 0;
            action = "update"
            sluong = $(this).val();
            if (sluong > 10) {
                sluong = 10;
                $(this).val('10');
            }
            gia = $(this).attr('price');
            s_id = $(this).attr('s_id');
            tongtien = sluong * gia;
            $.ajax({
                url: "data_cart.php",
                method: "POST",
                data: {
                    action: action,
                    sluong: sluong,
                    s_id: s_id
                },
                success: function(dt) {
                    // fetch_data()
                }
            })
            $('#tongtien' + s_id).html(tongtien)
            $('.check').each(function() {
                if ($(this).prop('checked') == true) {
                    s_id = $(this).attr('s_id');
                    tiensp = parseInt($('#tongtien' + s_id).html())
                    ttt = ttt + tiensp;
                    $('#ttt').html(ttt)
                }

            })
        })

        tong = 0;
        ttt = 0;
        // click alll
        $(document).on('click', '#checkall', function() {
            ttt = 0;
            if ($(this).is(':checked')) {
                $(this).attr('checked', true)

                $('#checkbox_all').prop("checked", true)
                // console.log('1')
                $('.check').each(function() {
                    $(this).prop("checked", true)
                    s_id = $(this).attr('s_id');
                    tongthanhtoan(s_id)

                })
                $('#buying').attr("disabled", false)
            } else {
                $(this).removeAttr('checked')
                $('#checkbox_all').prop("checked", false)

                $('.check').each(function() {
                    $(this).prop("checked", false)
                    ttt = 0;
                    $('#ttt').html(ttt)

                })
                $('#buying').attr("disabled", true)
            }
        })

        $(document).on('click', '#checkbox_all', function() {
            ttt = 0;
            if ($(this).is(':checked')) {
                $(this).attr('checked', true)
                $('#checkall').prop("checked", true)
                $('.check').each(function() {
                    $(this).prop("checked", true)
                    s_id = $(this).attr('s_id');
                    tongthanhtoan(s_id)

                })
                $('#buying').attr("disabled", false)
            } else {
                $(this).removeAttr('checked')
                $('#checkall').prop("checked", false)
                $('.check').each(function() {
                    $(this).prop("checked", false)
                    ttt = 0;
                    $('#ttt').html(ttt)

                })
                $('#buying').attr("disabled", true)
            }
        })
        // hàm tính tổng
        function tongthanhtoan(s_id) {

            tiensp = parseInt($('#tongtien' + s_id).html())
            ttt = ttt + tiensp;
            $('#ttt').html(ttt)
        }

        // click từng checkbox
        $(document).on('click', '.check', function() {
            if ($(this).is(':checked')) {
                $(this).prop("checked", true)
                // s_id = $(this).attr('s_id');
                // tongthanhtoan(s_id);

            } else {
                $(this).prop("checked", false)
            }
            check_length = $('.check').length
            dem = 0
            $('.check').each(function() {

                if ($(this).prop('checked') == true) {
                    dem = dem + 1;


                } else {
                    dem = dem - 1
                    // console.log(dem)
                }

            })
            console.log(dem)
            console.log(check_length)
            // nêu đếm bằng tổng số checkbox thì checkbox đầu checked
            if (dem == check_length) {
                $('#checkall').prop('checked', true)
                $('#checkbox_all').prop('checked', true)
            } else {
                $('#checkall').prop('checked', false)
                $('#checkbox_all').prop('checked', false)

            }
            if (dem == -check_length) {
                $('#buying').attr("disabled", true)
            } else {
                $('#buying').attr("disabled", false)
            }
            ttt = 0;

            // tính tiền khi click checkbox
            $('.check').each(function() {
                if ($(this).prop("checked") == true) {
                    s_id = $(this).attr('s_id');
                    tongthanhtoan(s_id);
                }

            })
            if (dem == -check_length) {
                ttt = 0;
                $('#ttt').html(ttt)
            }

        })

        $(document).on('click', '#sptt', function() {
            id_tl = $(this).attr('id_tl');
            $('#exampleModal').modal('show')
            action = "sptt"
            $.ajax({
                url: "sptt.php",
                method: "POST",
                data: {
                    tl_id: id_tl,
                    action: action
                },
                success: function(dt) {
                    $('.modal-body').html(dt)
                    $('.book_id').css("margin-top", "20px")
                }
            })
        })
        a = 1;

        function get_banthich() {
            $.ajax({
                url: "spkhac.php",
                method: "POST",
                data: {
                    // tl_id: tl_id,
                    tranghientai: a
                },
                success: function(dt) {
                    $('#sp_new_tl').html(dt)
                }
            })
        }
        get_banthich()


        $('.tiep i').mouseover(function() {
            $(this).addClass('fa-3x')

        })
        $('.tiep i').mouseleave(function() {
            $(this).removeClass('fa-3x')

        })
        if (a = 1) {
            $('#back').css("display", 'none')
        }
        $('#next').click(function() {
            a = a + 1;
            if (a < 7 || a > 1) {
                get_banthich()
                if (a == 6) {
                    $(this).css("display", 'none')
                }
                $('#back').css("display", '')
            }

        })
        $('#back').click(function() {
            a = a - 1;
            if (a > 0) {
                get_banthich()
                if (a == 1) {
                    $('#back').css("display", 'none')
                }
            }
        })
        ttt = 0;







        // alert('okj')

    })
</script>