<title>Trang chủ</title>
<?php
include('../Parital/header.php');
include('./ham.php')
?>
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
                        <div class="container" style="margin-top: 50px;margin-left:10px">
                            <div class="row">
                                
                            </div>
                            <div class="data" id="data">

                            </div>
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
     
   
    </script>