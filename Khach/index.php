<title>Trang chủ</title>
<?php
include('../Parital/header.php');
require('./function.php')
?>
<style>
    .nav button {
        margin: 20px;
    }

    .act {
        background-color: #0d6efd;
        color: yellow;
    }

    .d-flex {
        position: relative;
    }

    #list_sach {
        position: absolute;
        top: calc(100% - 1 px);
        left: 0 px;
        width: calc(100% - 120 px);
        list-style: none;
        margin-top: 50px;
        background-color: rgb(255, 255, 255);
        border-radius: 0 px 0 px 3 px 3 px;
        border-top: 1 px solid rgb(225, 225, 225);
        box-shadow: rgb(0 0 0 / 28%) 0px 6px 12px 0px;
        z-index: 1;
        display: none;
        min-width: 250px;
    }

    .list-group-item:hover {
        cursor: pointer;
        background-color: #6c757d;

    }

    #page h6:hover {
        cursor: pointer;
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
                            <form class="d-flex" style="margin-left: 30%;">
                                <input require id="search_ip" class="form-control me-2" type="search" placeholder="Nhập tên sách" aria-label="Search">
                                <button id="btn_search" class="btn btn-outline-success" type="button">Tìm</button>
                                <div id="list_sach" style="z-index: 4;">

                                </div>
                            </form>
                            <form class="d-flex">

                                <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                <a href="donhang.php" class="navbar-brand" >Đơn mua</a>

                                <a id="profile_tch" href="cart.php" class="navbar-brand"><i class="fas fa-shopping-cart fa-2x"></i></a>
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
                        <br>

                        <div id="page">
                            <?php
                            if (isset($_SESSION['tl_id'])) {
                                $tl_id =  $_SESSION['tl_id'];
                            } else {
                                $tl_id = true;
                            }
                            // $tl_id = $_POST['tl_id'];
                            $tongsach = count_posts($tl_id);
                            // echo $tongsach;
                            $sosach1trang = 10;
                            $sotrang = ceil($tongsach / $sosach1trang);

                            ?>
                            <div id="page_get" tranghientai='1' sotrang='<?php echo $sotrang ?>'>

                            </div>
                            <h6 style="text-align: center;">Xem thêm <i class="fas fa-chevron-down"></i></h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    include('../Parital/foot.php')
    ?>
    <script src="../JS/Khach_JS/index.js"></script>
</div>