<title>Giỏ hàng</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .totalSP {
        width: 80%;
        background-color: #fff;
        position: fixed;
        bottom: 0;
        /* left: 0; */
        /* right: 0; */
        z-index: 1;
    }
</style>


<?php
include('../Parital/header.php');
include('./function.php');
?>
<link rel="stylesheet" href="../CSS/cart.css">

<?php
if (isset($_POST['btnBuys'])) {
    $_SESSION['idSach'] = [];
    if (isset($_POST['checkSP'])) {
        // echo "Đã check";
        // foreach ($_POST['checkSP'] as $sach_id) {
        $sach_id =  $_POST['checkSP'];
        // echo $sach_id;
        if (!isset($_SESSION['idSach'])) {
            $_SESSION['idSach'] = [];
        } else {
            $_SESSION['idSach'] =  $sach_id;
        }
        // }
    } else {
        echo "Chưa check";
    }
    header("location: checkout.php");
}

?>
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
                    <div class="container main-content">
                        <form action="" method="POST">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-md-1" scope="col"><input name="checkAll" class="checkAll" type="checkbox"></th>
                                        <th class="col-md-5" scope="col">Sản phẩm</th>
                                        <th class="col-md-1" scope="col">Đơn giá</th>
                                        <th class="col-md-1" scope="col">Số lượng</th>
                                        <th class="col-md-1" scope="col">Số tiền</th>
                                        <th class="col-md-1" scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="bodySP">
                                    <?php
                                    $email_kh = $_SESSION['check_login'];
                                    $sql = "SELECT  giohang.s_id as sachID, khach.k_id as idKhach, anh, s_ten, gh_soluong , tongtien, tl_id FROM giohang, sach, khach where k_email = '$email_kh'  and giohang.k_id = khach.k_id and giohang.s_id = sach.s_id";
                                    $rs = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($rs) > 0) {
                                        while ($row = mysqli_fetch_array($rs)) {
                                    ?>
                                            <tr>
                                                <td><input s_id="<?php echo $row['sachID'] ?>" k_id="<?php echo $row['idKhach'] ?>" class="checkSP" name="checkSP[]" value="<?php echo $row['sachID'] ?>" type="checkbox"></td>
                                                <td>
                                                    <img height="50" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                                                    <?php
                                                    echo $row['s_ten'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <p id="tongTien<?php echo $row['sachID'] ?>"><?php echo $row['tongtien'] ?></p>
                                                </td>
                                                <td><input s_id="<?php echo $row['sachID'] ?>" k_id="<?php echo $row['idKhach'] ?>" class="soLuong" value="<?php echo $row['gh_soluong'] ?>" type="number" min="0" max="10"></td>
                                                <td>
                                                    <p id="soTien<?php echo $row['sachID'] ?>"><?php echo $row['tongtien'] * $row['gh_soluong'] ?></p>
                                                </td>
                                                <td>
                                                    <button s_id="<?php echo $row['sachID'] ?>" k_id="<?php echo $row['idKhach'] ?>" id="liveToastBtn" class="btn btn-danger btnXoa" style="background-color: #EE4D2D">Xóa</button>

                                                    <!-- Start modal SP tương tự-->
                                                    <div class="row">
                                                        <!-- Button trigger modal -->
                                                        <span class="spTuongTu" tl_id="<?php echo $row['tl_id'] ?>" style="color: #EE4D2D" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Sản phẩm tương tự
                                                        </span>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Sản phẩm tương tự</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body modal-body-sptt row d-flex justify-content-around">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- End modal SP tương tự -->

                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "Không có kq";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- Tính tiền -->
                            <div class="container">
                                <!-- totalSP -->
                                <div class="d-flex mb-3">
                                    <div class="p-2 col-1"><input type="checkbox" name="checkAll" class="checkAll"></div>
                                    <!-- Delete modal -->
                                    <div class="me-auto p-2 col-2">
                                        <!-- Button trigger modal -->
                                        <button disabled type="button" class="btn btn-danger btnDel" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Xóa
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Xóa sản phẩm</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có chắc muốn xóa những sản phẩm nãy không?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger btnXoaAll" data-bs-dismiss="modal">Xóa</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete modal -->
                                    <div class="p-2 col-2">Tổng tiền : <span name="tongTienAll" id="tongTienAll">0đ</span></div>
                                    <!-- <form action="" method="POST"> -->
                                    <div class="p-2 col-2"><button type="submit" disabled name="btnBuys" id="btnBuys" class="btn text-white" style="background-color: #EE4D2D;">Mua hàng</button></div>
                                    <!-- </form> -->
                                </div>
                            </div>

                            <!-- Tính tiền -->
                        </form>
                    </div>
                    <!-- SP khác -->
                    <div class="container" style="margin-bottom: 10rem;;">
                        <div class="row">
                            <h3 class="mt-3 mb-3">Sản phẩm khác</h3>
                            <?php
                            $spKhac = mysqli_query($conn, "SELECT * FROM sach ORDER BY rand() limit 5");
                            if (mysqli_num_rows($spKhac) > 0) {
                                while ($rowSPKhac = mysqli_fetch_assoc($spKhac)) {
                            ?>
                                    <div class="card ms-3" style="width: 18%;">
                                        <img src="../Image/VanHoc/<?php echo $rowSPKhac['anh'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $rowSPKhac['s_ten'] ?></h5>
                                            <p class="card-text"><?php echo $rowSPKhac['s_gia'] - $rowSPKhac['s_gia'] * $rowSPKhac['s_giamgia'] / 100 ?></p>
                                            <a href="./book.php?s_id=<?php echo $rowSPKhac['s_id'] ?>" class="btn btn-primary">Xem</a>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- SP khác -->


                    <!-- SP đã xem -->
                    <div class="container" style="margin-bottom: 10rem;">
                        <div class="row">
                            <h3 class="mt-3 mb-3">Sản phẩm đã xem</h3>
                            <?php
                            if (isset($_SESSION['s_id'])) {
                                $s_id = $_SESSION['s_id'];
                                if (sizeof($s_id) > 5) {
                                    $sizeMax = sizeof($s_id) - 5;
                                } else {
                                    $sizeMax = 0;
                                }
                                for ($i = sizeof($s_id) - 1; $i >= $sizeMax; $i--) {
                                    $s_ids = $s_id[$i];
                                    $spKhac = mysqli_query($conn, "SELECT * FROM sach where s_id = '$s_ids' limit 5");
                                    if (mysqli_num_rows($spKhac) > 0) {
                                        while ($rowSPKhac = mysqli_fetch_assoc($spKhac)) {
                            ?>
                                            <div class="card ms-3" style="width: 18%;">
                                                <img src="../Image/VanHoc/<?php echo $rowSPKhac['anh'] ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $rowSPKhac['s_ten'] ?></h5>
                                                    <p class="card-text"><?php echo $rowSPKhac['s_gia'] - $rowSPKhac['s_gia'] * $rowSPKhac['s_giamgia'] / 100 ?></p>
                                                    <a href="./book.php?s_id=<?php echo $rowSPKhac['s_id'] ?>" class="btn btn-primary">Xem</a>
                                                </div>
                                            </div>


                            <?php
                                        }
                                    }
                                }
                            } else {
                                echo "Bạn chưa xem sản phẩm nào";
                            }
                            ?>

                        </div>
                    </div>
                    <!-- SP đã xem -->

                </div>
            </div>

        </div>
    </div>
</div>



<?php
include('../Parital/foot.php')
?>
<script>
    var toastTrigger = document.getElementById('liveToastBtn')
    var toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', function() {
            var toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        })
    }



    $(document).ready(function() {
        $('.spTuongTu').click(function() {
            tl_id = $(this).attr('tl_id');
            action = "spTuongTu";
            $.ajax({
                url: "./cart_action.php",
                method: "POST",
                data: {
                    tl_id: tl_id,
                    action: action
                },
                success: function(dt) {
                    $('.modal-body-sptt').html(dt);
                }
            })
            // console.log('Minhhn');
        })

        $(document).on('click', '.page-current', function() {
            current_page = $(this).text();
            // alert(current_page);
            tl_id = $(this).attr('tl_id');
            action = "spTuongTu";
            $.ajax({
                url: "./cart_action.php",
                method: "POST",
                data: {
                    tl_id: tl_id,
                    action: action,
                    trangHienTai: current_page
                },
                success: function(dt) {
                    $('.modal-body-sptt').html(dt);
                    $('.page-item' + current_page).addClass('active');
                }
            })
        })

        $(document).on('click', '.next', function() {
            current_page = $('.next button').attr('cr_page');
            current_page = parseInt(current_page) + 1;
            // alert(current_page);
            tl_id = $('.next button').attr('tl_id');
            action = "spTuongTu";
            $.ajax({
                url: "./cart_action.php",
                method: "POST",
                data: {
                    tl_id: tl_id,
                    action: action,
                    trangHienTai: current_page
                },
                success: function(dt) {
                    $('.modal-body-sptt').html(dt);
                    $('.page-item' + current_page).addClass('active');
                }
            })
        })

        $(document).on('click', '.previous', function() {
            current_page = $('.previous button').attr('cr_page');
            current_page = parseInt(current_page) - 1;
            // alert(current_page);
            tl_id = $('.previous button').attr('tl_id');
            action = "spTuongTu";
            $.ajax({
                url: "./cart_action.php",
                method: "POST",
                data: {
                    tl_id: tl_id,
                    action: action,
                    trangHienTai: current_page
                },
                success: function(dt) {
                    $('.modal-body-sptt').html(dt);
                    $('.page-item' + current_page).addClass('active');
                }
            })
        })

        $(document).on('click', '.btnXoa', function() {
            var btnXoa = this;
            s_id = $(this).attr('s_id');
            k_id = $(this).attr('k_id');
            action = "delSP";
            $.ajax({
                url: "./cart_action.php",
                method: "POST",
                data: {
                    s_id: s_id,
                    k_id: k_id,
                    action: action
                },
                success: function(dt) {
                    $(btnXoa).closest('tr').fadeOut(500, function() {
                        $(this).remove();

                        tongThanhToan = 0;
                        $('.checkSP').each(function() {
                            if ($(this).is(':checked')) {
                                s_id = $(this).attr('s_id');
                                tongTienSP = parseInt($('#soTien' + s_id).html());
                                tongThanhToan = tongThanhToan + tongTienSP;

                            } else {
                                // console.log('Lỗi r');
                            }

                        })
                        $('#tongTienAll').html(tongThanhToan + "đ");
                    })


                }
            })
            // console.log('Minhhn');
        })




        $('.btnXoaAll').click(function() {
            // var btnXoaAll = this;
            $('.checkSP').each(function() {
                if ($(this).is(':checked')) {
                    action = "delAllSP";
                    s_id = $(this).attr('s_id');
                    k_id = $(this).attr('k_id');
                    $.ajax({
                        url: "./cart_action.php",
                        method: "POST",
                        data: {
                            s_id: s_id,
                            k_id: k_id,
                            action: action
                        },
                        success: function(dt) {
                            $('.bodySP').closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            })
                        }
                    })

                } else {

                }
            })
        });

        $('.soLuong').change(function() {
            //Tổng tiền SP
            s_id = $(this).attr('s_id');
            k_id = $(this).attr('k_id');
            tongTien = $('#tongTien' + s_id).text();
            soLuong = $(this).val();
            $('#soTien' + s_id).html(tongTien * soLuong);
            action = "updateSL";
            $.ajax({
                url: "./cart_action.php",
                method: "POST",
                data: {
                    s_id: s_id,
                    k_id: k_id,
                    soLuong: soLuong,
                    action: action
                },
                success: function(dt) {
                    // alert(dt);
                }
            })
            $.ajax({
                url: "./cart_action.php",
                method: "POST",
                data: {
                    s_id: s_id,
                    k_id: k_id,
                },
                success: function(dt) {
                    // alert(dt);
                }
            })
            tongThanhToan = 0;
            $('.checkSP').each(function() {
                if ($(this).is(':checked')) {
                    s_id = $(this).attr('s_id');
                    tongTienSP = parseInt($('#soTien' + s_id).html());
                    tongThanhToan = tongThanhToan + tongTienSP;
                    // console.log('OK');
                } else {
                    // console.log('Lỗi r');
                }
                $('#tongTienAll').html(tongThanhToan + "đ");

            })
        })

        $('.checkSP').change(function() {
            var countCheck = $('.checkSP').filter(':checked').length;
            if (countCheck > 0) {
                $('#btnBuys').prop("disabled", false);
                $('.btnDel').prop("disabled", false);
            } else {
                $('#btnBuys').prop("disabled", true);
                $('.btnDel').prop("disabled", true);
            }
        })


        $('.checkSP').click(function() {
            tongThanhToan = 0;
            $('.checkSP').each(function() {
                if ($(this).is(':checked')) {
                    s_id = $(this).attr('s_id');
                    tongTienSP = parseInt($('#soTien' + s_id).html());
                    tongThanhToan = tongThanhToan + tongTienSP;

                } else {
                    // console.log('Lỗi r');
                }

            })
            $('#tongTienAll').html(tongThanhToan + "đ");

            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                $(".checkSP").each(function() {
                    if (!this.checked)
                        isAllChecked = 1;
                })
                if (isAllChecked == 0) {
                    $(".checkAll").prop("checked", true);
                }
            } else {
                $(".checkAll").prop("checked", false);
            }
        })

        $('.checkAll').click(function() {
            if ($(this).is(':checked')) {
                $('#btnBuys').prop("disabled", false);
                $('.btnDel').prop("disabled", false);

                $('.checkSP').prop('checked', true);
                $('.checkAll').prop('checked', true);
                tongThanhToan = 0;
                $('.checkSP').each(function() {
                    if ($(this).is(':checked')) {
                        s_id = $(this).attr('s_id');
                        tongTienSP = parseInt($('#soTien' + s_id).html());
                        tongThanhToan = tongThanhToan + tongTienSP;
                    } else {
                        // console.log('Lỗi r');
                    }
                    $('#tongTienAll').html(tongThanhToan + "đ");
                })
                $('#tongTienAll').html(tongThanhToan + "đ");
            } else {
                $('#btnBuys').prop("disabled", true);
                $('.btnDel').prop("disabled", true);

                $('.checkSP').prop('checked', false);
                $('.checkAll').prop('checked', false);
                $('#tongTienAll').html("0đ");

            }
        })

    })
</script>