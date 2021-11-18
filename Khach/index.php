<title>Trang chủ</title>
<?php
include('../Parital/header.php');
require('./function.php')
?>
<style>
    .nav button {
        margin: 20px;
    }
    .act{
        background-color: #0d6efd;
        color: yellow;
    }
</style>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>Khách</h2>
            </li>
            <li id="true" class="nav-item"> <a href="#"><i class="fa fa-home"></i> Home</a> </li>
            <?php
            $slt_tl = allTheLoai();
            while ($row_tl = mysqli_fetch_assoc($slt_tl)) {
            ?>
                <li id="<?php echo $row_tl['tl_id'] ?>" class="nav-item">
                    <a href="#"><?php echo $row_tl['tl_ten'] ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars"></i></a>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Nhập tên sách" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Tìm</button>
                            </form>
                            <form class="d-flex">

                                <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                <a id="profile_tch" href="#" class="navbar-brand">Giỏ hàng</a>
                                <a href="../Login/logout.php" class="navbar-brand">Đăng xuất</a>
                            </form>
                        </div>
                    </nav>
                    <div class="container main-content">

                        <div style="margin-top: 10px;" class="nav">
                            <button class="btn btn_nav btn-Info">Phổ biến</button>
                            <button class="btn btn_nav">Mới nhất</button>
                            <button class="btn btn_nav">Bán chạy</button>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Giá
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Thấp đến cao</a></li>
                                    <li><a class="dropdown-item" href="#">Cao đến thấp</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <div id="view_book" class="row">

                            </div>
                        </div>
                        <?php
                        $tongsach = count_posts();
                        // echo $tongsach;
                        $sosach1trang = 10;
                        $sotrang = ceil($tongsach / $sosach1trang);

                        ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination text-center" style="margin-left: 40%;">
                                <li id="back" class="page-item ">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $sotrang; $i++) {
                                    echo  '<li id=' . $i . ' class="page-item ">
                    <a class="page-link"  href="#">' . $i . '</a>
                    </li>';
                                }
                                ?>

                                <li id="next" class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

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
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            $('.nav .btn').click('.btn', function() {
                $('.nav .btn').removeClass('btn-Info')
                $(this).addClass('btn-Info')
            })
            $('.dropdown-menu .dropdown-item').click(function() {
                var gia = $(this).html()
                $('#dropdownMenuButton1').html(gia)
            })

            var action = "Phổ biến"
            a = 1;

            $.ajax({
                url: "view_book.php",
                method: "POST",
                data: {
                    action: action,
                },
                success: function(dt) {
                    $('#view_book').html(dt)
                }
            })


            $('.page-item').click(function() {
                a = $(this).attr('id')
                $('.page-item').removeClass('active')
                $(this).addClass('active')
                $.ajax({
                    url: "view_book.php",
                    method: "GET",
                    data: {
                        tranghientai: a
                    },
                    success: function(dt) {
                        $('#view_book').html(dt)
                    }
                })
            })

            $('.nav .btn_nav').click(function() {
                action = $(this).html();
                $.ajax({
                    url: "view_book.php",
                    method: "POST",
                    data: {
                        action: action,
                        tranghientai: a
                    },
                    success: function(dt) {
                        $('#view_book').html(dt)
                    }
                })
            })

            $('.dropdown-item').click(function() {
                action = $(this).html();
                // alert(action);
                // alert(action)
                $.ajax({
                    url: "view_book.php",
                    method: "POST",
                    data: {
                        action: action
                    },
                    success: function(dt) {
                        $('#view_book').html(dt)
                    }
                })
            })
            $('.nav-item').click(function(){
                id = $(this).attr('id');
                $('.nav-item').removeClass('act')
                $(this).addClass('act');
                alert(id)
                $.ajax({
                    url: "view_book.php",
                    method: "POST",
                    data: {
                        tl_id: id
                    },
                    success: function(dt) {
                        $('#view_book').html(dt)
                    }
                })
            })
        })
    </script>
</div>