<title>Đơn hàng</title>
<!-- <link rel="stylesheet" href="../CSS/book.css"> -->
<?php
include('../Parital/header.php');
include('./ham.php')
?>
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">
    <!-- Page Content -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>Quản lý</h2>
            </li>
            <li id="true" class="nav-item"> <a href="index.php"><i class="fa fa-home"></i>Sách</a> </li>
            <li id="true" class="nav-item"> <a href="donhang.php"><i class="fa fa-home"></i>Đơn hàng</a> </li>

        </ul>
    </div>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php
    include('../Parital/foot.php')
    ?>
</div>