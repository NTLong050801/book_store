<title>Giỏ hàng</title>
<?php
include('../Parital/header.php');
require('./function.php')
?>
<link rel="stylesheet" href="../CSS/cart.css">
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">
    <div id="page-content-wrapper">
        <div class="container-fluid" style="background-color: rgb(148 122 126 / 8%);">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
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
                        <h4 class="title">Giỏ hàng</h4>

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
                            <label for="">Tổng thanh toán :<span id="ttt">0</span>đ </label>
                            <button class="btn btn-danger">Mua hàng</button>
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
<script>
    $(document).ready(function() {
        fetch_data()

        function fetch_data() {
            // action = "get_data"
            // alert(action);
            $.ajax({
                url: "data_cart.php",
                method: "POST",
                data: {

                },
                success: function(dt) {
                    if (dt != '') {
                        $('#data').html(dt)
                        //alert(dt)
                    }
                    if (dt == '') {
                        $('.main-content').html('<div><label for="">Giỏ hàng của bạn còn trống</label><br><a href="index.php"><button class="btn btn-success">Mua ngay</button></a></div>')
                    }


                }
            })

        }


        $(document).on('click', '.delete', function() {
            s_id = $(this).attr('id_delete');
            var action = "delete"
            $.ajax({
                url: "data_cart.php",
                method: "POST",
                data: {
                    s_id: s_id,
                    action: action
                },
                success: function(dt) {
                    // alert(dt)
                    fetch_data();
                }
            })
        })
        // thay đổi số lượng
        $(document).on('change', '.sluong', function() {
            ttt = 0;
            sluong = $(this).val();
            if (sluong > 10) {
                sluong = 10;
                $(this).val('10');
            }
            gia = $(this).attr('price');
            s_id = $(this).attr('s_id');
            tongtien = sluong * gia;
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
        // click all
        $(document).on('click', '#checkall', function() {
            ttt = 0;
            if ($(this).is(':checked')) {
                $(this).attr('checked', true)
                console.log('1')
                $('.check').each(function() {
                    $(this).prop("checked", true)
                    s_id = $(this).attr('s_id');
                    tongthanhtoan(s_id)

                })
            } else {
                $(this).removeAttr('checked')
                $('.check').each(function() {
                    $(this).prop("checked", false)
                    ttt = 0;
                    $('#ttt').html(ttt)

                })
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
            // nêu đếm bằng tổng số checkbox thì checkbox đầu checked
            if (dem == check_length) {
                $('#checkall').prop('checked', true)
            } else {
                $('#checkall').prop('checked', false)

            }
            ttt = 0;

            // tính tiền khi click checkbox
            $('.check').each(function() {
                if ($(this).prop("checked") == true) {
                    s_id = $(this).attr('s_id');
                    tongthanhtoan(s_id);
                }

            })
            if (dem == -4) {
                ttt = 0;
                $('#ttt').html(ttt)
            }

        })









    })
</script>