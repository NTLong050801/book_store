<title>Chốt đơn</title>


<?php
// include('../config/db.php');
include('../Parital/header.php');
include('./function.php');
?>
<link rel="stylesheet" href="../CSS/cart.css">

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
                </div>
            </div>


            <!-- Content -->

            <div class="container">
                <div class="row bg-white mt-3">
                <?php
                    $email_kh =  $_SESSION['check_login'];
                    $rs_ttkh = mysqli_query($conn, "SELECT * FROM khach where k_email = '$email_kh'");
                    $ttkh = mysqli_fetch_assoc($rs_ttkh); 
                ?>

                    <p class="p-3" style="color: #ee4d2d; font-size: 24px;"><i class="fas fa-map-marker-alt"></i> Địa chỉ nhận hàng</p>
                    <b class="col-2"><?php echo $ttkh['k_ten']?></b>
                    <p class="col-2"><?php echo $ttkh['k_sdt']?></p>
                    <p class="col-8"><?php echo $ttkh['k_diachi']?></p>
                </div>

                <div class="row bg-white mt-3">
                    Sản phẩm
                </div>

                <div class="row bg-white mt-3">
                    Vocher
                </div>

                <div class="row bg-white mt-3">
                    Phương thức thanh toán
                </div>

                <div class="row bg-white mt-3">
                    Giá tiền và đặt hàng
                </div>


            </div>
            <!-- Content -->



        </div>
    </div>
</div>

<?php
include('../Parital/foot.php')
?>

<?php
include('../Parital/foot.php');
?>