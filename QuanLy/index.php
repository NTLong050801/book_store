<title>Trang chủ</title>
<?php
include('../Parital/header.php');
include('./ham.php')
?>
<style>
    .cl {}
</style>
<div id="wrapper" style="overflow: scroll;height:100%">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>Khách</h2>
            </li>
            <li id="true" class="nav-item"> <a href="#"><i class="fa fa-home"></i>Sách</a> </li>

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
                            <form class="d-flex" style="margin-left: 30%;">
                                <input require id="search_ip" class="form-control me-2" type="search" placeholder="Nhập tên sách" aria-label="Search">
                                <button id="btn_search" class="btn btn-outline-success" type="button">Tìm</button>
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
                        <!-- dropdown thể loại -->
                        <div class="row" style="text-align: center;">


                            <div class="col-4 btn_theloai">
                                <div class="dropdown" style="margin-top: 50px;">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Văn học
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        // unset($_SESSION['tl_id']);
                                        $qr = slt_theloai();
                                        if (mysqli_num_rows($qr) > 0) {
                                            while ($row = mysqli_fetch_assoc($qr)) { ?>
                                                <li><a class="dropdown-item theloai" tl_id=<?php echo $row['tl_id'] ?> href="#"><?php echo $row['tl_ten'] ?></a></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4 ql_tl">
                                <button class="btn btn-secondary btn_ql_tl" style="margin-top: 50px;">Quản lý thể loại</button>
                            </div>
                            <div class="col-4 ql_tg">
                                <button class="btn btn-secondary btn_ql_tg" style="margin-top: 50px;">Quản lý tác giả</button>
                            </div>
                        </div>
                        <div class="data_sach">

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal xác nhận xóa ? -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary xn_xoa">Xóa</button>
            </div>
        </div>
    </div>
</div>


<!-- modal sửa sách -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="" id="form_update_s">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body2">
                    <div class="data">

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tên sách</span>
                            <input type="text" class="form-control s_ten" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Giá</span>
                            <input type="number" class="form-control s_gia " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Giảm giá</span>
                            <input type="number" name="s_gia" class="form-control s_giamgia" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Nhà xuất bản</span>
                            <input type="text" class="form-control nxb" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Năm xuất bản</span>
                            <input type="number" class="form-control namxuatban" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Số trang</span>
                            <input type="number" class="form-control sotrang" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text">Mô tả</span>
                            <textarea class="form-control mota" aria-label="With textarea"></textarea>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Số lượng trong kho</span>
                            <input type="number" class="form-control soluong" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Số sách đã bán</span>
                            <input readonly type="number" class="form-control luotmua" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Ngôn ngữ</span>
                            <input type="text" class="form-control ngonngu" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Thể loại</span>
                            <select id="sl_tl_id" class="form-select" aria-label="Default select example">
                                <!-- <option selected>Open this select menu</option> -->
                                <?php
                                $qr = slt_theloai();
                                if (mysqli_num_rows($qr) > 0) {
                                    while ($row_tl = mysqli_fetch_assoc($qr)) { ?>
                                        <option class="sl_tl" value="<?php echo $row_tl['tl_id'] ?>"><?php echo $row_tl['tl_ten'] ?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tác giả</span>
                            <select id="sl_tg_id" class="form-select" aria-label="Default select example">
                                <!-- <option selected>Open this select menu</option> -->
                                <?php
                                $qr = slt_tacgia();
                                if (mysqli_num_rows($qr) > 0) {
                                    while ($row_tg = mysqli_fetch_assoc($qr)) { ?>
                                        <option class="sl_tg" value="<?php echo $row_tg['tg_id'] ?>"><?php echo $row_tg['tg_ten'] ?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Ảnh chính</span>
                            <input type="file" class="form-control anh" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Ảnh phụ</span>
                            <input type="file" class="form-control anh1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary xn_sua">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal thêm sách -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data" id="myform" name="myform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sách</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Tên sách</span>
                                    <input type="text" name="s_ten" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Giá</span>
                                    <input type="number" name="s_gia" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">% Giảm giá</span>
                                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Nhà xuất bản</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Năm xuất bản</span>
                                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Số trang</span>
                                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Số lượng</span>
                                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Mô tả</span>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Ngôn ngữ</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Thể loại</span>
                                    <select id="sl_tl_id" class="form-select" aria-label="Default select example">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <?php
                                        $qr = slt_theloai();
                                        if (mysqli_num_rows($qr) > 0) {
                                            while ($row_tl = mysqli_fetch_assoc($qr)) { ?>
                                                <option value="<?php echo $row_tl['tl_id'] ?>"><?php echo $row_tl['tl_ten'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Tác giả</span>
                                    <select id="sl_tg_id" class="form-select" aria-label="Default select example">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <?php
                                        $qr = slt_tacgia();
                                        if (mysqli_num_rows($qr) > 0) {
                                            while ($row_tg = mysqli_fetch_assoc($qr)) { ?>
                                                <option value="<?php echo $row_tg['tg_id'] ?>"><?php echo $row_tg['tg_ten'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Ảnh chính</span>
                                    <input id="file" type="file" name="anhchinh" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Ảnh phụ (nếu có)</span>
                                    <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <input type="text" name="action" value="Thêm sách" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit_add_s">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal sửa thể loại -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data" id="myform" name="myform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update thể loại</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">ID Thể loại</span>
                                    <input type="text" id="tl_id_get" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Tên thể loại</span>
                                    <input type="text" id="tl_ten_get" name="s_ten" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>

                        <input type="text" name="action" value="Thêm sách" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update_theloai">Update thể loại</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- add thể loại -->
<div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data" id="myform" name="myform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thể loại</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Tên thể loại</span>
                                    <input type="text" id="tl_ten_send" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <input type="text" name="action" value="Thêm sách" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_theloai">Thêm thể loại</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add tác giả -->
<div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data" id="myform" name="myform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm tác giả</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Tên tác giả</span>
                                    <input type="text" id="tg_ten_send" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <input type="text" name="action" value="Thêm sách" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_tacgia">Thêm tác giả</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- sửa tác giả -->
<div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data" id="myform" name="myform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa tác giả</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">ID Tác giả</span>
                                    <input type="text" id="tg_id_get" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Tên tác giả</span>
                                    <input type="text" id="tg_ten_get" name="s_ten" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>

                        <input type="text" name="action" value="Thêm sách" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update_tacgia">Update tác giả</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal thông báo -->
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
<script>
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        //tl_id = 1;
        load_data();
        // click nút btn thể loại
        $('.dropdown-menu .theloai').click(function() {
            tranghientai = 1
            theloai = $(this).html();
            // alert(theloai);
            tl_id = $(this).attr('tl_id');
            $('#dropdownMenuButton1').html(theloai);
            // alert(tl_id)
            load_data(tl_id, tranghientai)
        })

        //click vào trang
        $(document).on('click', '.page-item', function() {
            tranghientai = $(this).attr('tranghientai');
            // alert(tranghientai);

            tl_id = $(this).attr('tl_id');
            load_data(tl_id, tranghientai)

        })

        //click nút xóa
        $(document).on('click', '.xoa', function() {
            s_id = $(this).attr('s_id');
            tranghientai = $(this).attr('tranghientai');
            $('#exampleModal').modal('show')
            tl_id = $(this).attr('tl_id');
            $('.xn_xoa').click(function() {
                $.ajax({
                    url: "process_sach.php",
                    method: "POST",
                    data: {
                        s_id: s_id
                    },
                    success: function(dt) {
                        $('#exampleModal').modal('hide')
                        $('#exampleModal3').modal('show');
                        $('.modal-body3 h4').html('Xóa thành công')
                        setTimeout(function() {
                            $("#exampleModal3").modal('hide')
                        }, 2000)
                        load_data(tl_id, tranghientai)
                    }
                })
            })

            //alert(s_id)
        })

        //click sửa
        $(document).on('click', '.sua', function() {
            action = 'Sửa';
            s_id = $(this).attr('s_id');
            tranghientai = $(this).attr('tranghientai');
            tl_id = $(this).attr('tl_id');
            $('#exampleModal2').modal('show')
            $.ajax({
                url: "process_sach.php",
                method: "POST",
                data: {
                    action: action,
                    s_id: s_id,
                },
                dataType: 'json',
                success: function(dt) {
                    // $('#exampleModal2').modal('show')
                    $('#exampleModalLabel2').html(dt[0])
                    $('.data .s_ten').val(dt[0])
                    $('.data .s_gia').val(dt[1])
                    $('.data .s_giamgia').val(dt[2])
                    $('.data .nxb').val(dt[3])
                    $('.data .namxuatban').val(dt[4])
                    $('.data .sotrang').val(dt[5])
                    $('.data .mota').val(dt[6])
                    $('.data .soluong').val(dt[7])
                    $('.data .luotmua').val(dt[8])
                    $('.data .ngonngu').val(dt[9])
                    $('.sl_tl').each(function() {
                        // console.log(dt[11])
                        if ($(this).html() == dt[11]) {

                            $(this).attr('selected', true);
                        }
                    })

                    $('.sl_tg').each(function() {
                        // console.log(dt[11])
                        if ($(this).html() == dt[10]) {

                            $(this).attr('selected', true);
                        }
                    })

                }
            })

            $('.xn_sua').click(function() {
                action = "xn sửa";
                s_ten = $('.s_ten').val()
                s_gia = $('.s_gia').val()
                s_giamgia = $('.s_giamgia').val()
                nxb = $('.nxb').val()
                namxuatban = $('.namxuatban').val()
                sotrang = $('.sotrang').val()
                mota = $('.mota').val()
                soluong = $('.soluong').val()
                ngonngu = $('.ngonngu').val()
                tl_id = $('#sl_tl_id').val();
                tg_id = $('#sl_tg_id').val();
                anh = $('.anh').val()
                anh1 = $('.anh1').val()

                $.ajax({
                    url: "process_sach.php",
                    method: "POST",
                    data: {
                        action: action,
                        s_id: s_id,
                        s_ten: s_ten,
                        s_gia: s_gia,
                        s_giamgia: s_giamgia,
                        nxb: nxb,
                        namxuatban: namxuatban,
                        sotrang: sotrang,
                        mota: mota,
                        soluong: soluong,
                        ngonngu: ngonngu,
                        tl_id: tl_id,
                        tg_id: tg_id,
                        anh: anh,
                        anh1: anh1
                    },
                    success: function(dt) {
                        console.log(dt)
                        load_data(tl_id, tranghientai)
                        $('#exampleModal2').modal('hide')
                        $('#exampleModal3').modal('show');
                        $('.modal-body3 h4').html('Sửa thành công')
                        setTimeout(function() {
                            $("#exampleModal3").modal('hide')
                        }, 2000)
                    }
                })
            })
        })

        $(document).on('click', '.add_s', function() {
            $('#exampleModal4').modal('show')
            action = "Thêm sách"

            $('#submit_add_s').click(function() {
                event.preventDefault();
                form = []
                form.append($('#myform').serialize());
                var file_data = $('#file').prop('files')[0];
                console.log(file_data);
                form.append('file', file_data);
                console.log(form)
                $.ajax({
                    url: "process_sach.php",
                    method: "POST",
                    data: form

                        // action : action
                        ,
                    dataType: "text",
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(dt) {
                        alert(dt)
                    }




                })
            })
        })

        //click quản lý thể loại
        $('.btn_ql_tl').click(function() {
            data_tl()
        })

        //click xóa thể loại
        $(document).on('click', '.delete_tl', function() {
            tl_id = $(this).attr('tl_id');
            action = 'delete_tl';
            $('#exampleModal').modal('show')
            $('.xn_xoa').click(function() {
                $.ajax({
                    url: "process_sach.php",
                    method: "POST",
                    data: {
                        tl_id: tl_id,
                        action: action
                    },
                    success: function(dt) {
                        //alert(dt)
                        $('#exampleModal').modal('hide')
                        $('#exampleModal3').modal('show');
                        $('.modal-body3 h4').html(dt)
                        setTimeout(function() {
                            $("#exampleModal3").modal('hide')
                        }, 2000)
                        data_tl()
                    }
                })
            })
        })

        //click update thể loại

        $(document).on('click', '.update_tl', function() {
            $('#exampleModal5').modal('show');
            tl_id = $(this).attr('tl_id');
            //alert(tl_id);
            action = 'get_data_tl';
            $.ajax({
                url: "process_sach.php",
                method: "POST",
                dataType: 'json',
                data: {
                    tl_id: tl_id,
                    action: action
                },
                success: function(dt) {
                    $('#tl_id_get').val(dt[0])
                    $('#tl_ten_get').val(dt[1])
                }
            })

            $('#update_theloai').click(function() {
                action = "update_theloai"
                tl_ten = $('#tl_ten_get').val();
                if (tl_ten != '') {
                    $.ajax({
                        url: "process_sach.php",
                        method: "POST",
                        data: {
                            action: action,
                            tl_id: tl_id,
                            tl_ten: tl_ten
                        },
                        success: function(dt) {
                            $('#exampleModal5').modal('hide')
                            $('#exampleModal3').modal('show');
                            $('.modal-body3 h4').html(dt)
                            setTimeout(function() {
                                $("#exampleModal3").modal('hide')
                            }, 2000)
                            data_tl()
                        }
                    })
                } else {
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html('Vui lòng nhập tên thể loại')
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 2000)
                }

            })

        })
        // click thêm thể loại

        $(document).on('click', '.add_tl', function() {
            $('#exampleModal6').modal('show');
            $('#add_theloai').click(function() {
                tl_ten = $('#tl_ten_send').val()
                if (tl_ten != '') {
                    action = "add_tl"
                    $.ajax({
                        url: "process_sach.php",
                        method: "POST",
                        data: {
                            action: action,
                            tl_ten: tl_ten
                        },
                        success: function(dt) {
                            $('#exampleModal6').modal('hide')
                            $('#exampleModal3').modal('show');
                            $('.modal-body3 h4').html(dt)
                            setTimeout(function() {
                                $("#exampleModal3").modal('hide')
                            }, 2000)
                            data_tl()
                            $('#tl_ten_send').val('')
                        }
                    })
                } else {
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html('Vui lòng nhập tên thể loại')
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 2000)
                }
            })

        })

        //click ql tác giả

        $('.btn_ql_tg').click(function() {
            data_tg()
        })

        //click add tác giả
        $(document).on('click', '.add_tg', function() {
            $('#exampleModal7').modal('show');
            $('#add_tacgia').click(function() {
                tg_ten = $('#tg_ten_send').val()
                if (tg_ten != '') {
                    action = "add_tg"
                    $.ajax({
                        url: "process_sach.php",
                        method: "POST",
                        data: {
                            action: action,
                            tg_ten: tg_ten
                        },
                        success: function(dt) {
                            $('#exampleModal7').modal('hide')
                            $('#exampleModal3').modal('show');
                            $('.modal-body3 h4').html(dt)
                            setTimeout(function() {
                                $("#exampleModal3").modal('hide')
                            }, 2000)
                            data_tg()
                            $('#tg_ten_send').val('')
                        }
                    })
                } else {
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html('Vui lòng nhập tên thể loại')
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 2000)
                }
            })

        })

        //click delete tác giả
        $(document).on('click', '.delete_tg', function() {
            tg_id = $(this).attr('tg_id');
            action = 'delete_tg';
            $('#exampleModal').modal('show')
            $('.xn_xoa').click(function() {
                $.ajax({
                    url: "process_sach.php",
                    method: "POST",
                    data: {
                        tg_id: tg_id,
                        action: action
                    },
                    success: function(dt) {
                        //alert(dt)
                        $('#exampleModal').modal('hide')
                        $('#exampleModal3').modal('show');
                        $('.modal-body3 h4').html(dt)
                        setTimeout(function() {
                            $("#exampleModal3").modal('hide')
                        }, 2000)
                        data_tg()
                    }
                })
            })
        })

        //click update tác giả
        $(document).on('click', '.update_tg', function() {
            $('#exampleModal8').modal('show');
            tg_id = $(this).attr('tg_id');
            //alert(tg_id);
            action = 'get_data_tg';
            $.ajax({
                url: "process_sach.php",
                method: "POST",
                dataType: 'json',
                data: {
                    tg_id: tg_id,
                    action: action
                },
                success: function(dt) {
                    $('#tg_id_get').val(dt[0])
                    $('#tg_ten_get').val(dt[1])
                }
            })

            $('#update_tacgia').click(function() {
                action = "update_tacgia"
                tg_ten = $('#tg_ten_get').val();
                if (tg_ten != '') {
                    $.ajax({
                        url: "process_sach.php",
                        method: "POST",
                        data: {
                            action: action,
                            tg_id: tg_id,
                            tg_ten: tg_ten
                        },
                        success: function(dt) {
                            $('#exampleModal8').modal('hide')
                            $('#exampleModal3').modal('show');
                            $('.modal-body3 h4').html(dt)
                            setTimeout(function() {
                                $("#exampleModal3").modal('hide')
                            }, 2000)
                            data_tg()
                        }
                    })
                } else {
                    $('#exampleModal3').modal('show');
                    $('.modal-body3 h4').html('Vui lòng nhập tên thể loại')
                    setTimeout(function() {
                        $("#exampleModal3").modal('hide')
                    }, 2000)
                }

            })

        })

        function data_tg() {
            action = 'ql_tg'
            $.ajax({
                url: "process_sach.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function(dt) {
                    $('.data_sach').html(dt);
                }
            })
        }

        function data_tl() {
            action = 'ql_tl'
            $.ajax({
                url: "process_sach.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function(dt) {
                    $('.data_sach').html(dt);
                }
            })
        }

        // có thể truyền tham số tl_id,tranghientai
        function load_data(tl_id, tranghientai) {
            $.ajax({
                url: "process_sach.php",
                method: "POST",
                data: {
                    tl_id: tl_id,
                    tranghientai: tranghientai
                },
                success: function(dt) {
                    $('.data_sach').html(dt);
                }

            })
        }
    })
</script>