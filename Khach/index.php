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

    .modal-content {
        background-color: #cccccc;
        height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        background-image: url('https://salt.tikicdn.com/cache/w1240/ts/brickv2og/d5/34/de/4f6b20a049d84eb4d0f8df27849f1615.jpg.webp');
        border: 5px red dashed;
        overflow: hidden;
        filter: drop-shadow(0 0 10px white);
    }

    .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .fa-snowflake {
        animation: fall 10s linear forwards;
        color: #fff;
        position: absolute;
        top: -20px;
    }
    @keyframes fall {
        to{
            transform: translate(100vh);
        }
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
                                <a href="donhang.php" class="navbar-brand">Đơn mua</a>

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
    <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <i class="fas fa-snowflake"></i>

                    <div class="hero-text">
                        <!-- <h5>Hello ! Now all book sale !</h5> -->

                    </div>
                    <!-- <img src="https://salt.tikicdn.com/cache/w1240/ts/brickv2og/d5/34/de/4f6b20a049d84eb4d0f8df27849f1615.jpg.webp" alt="" class="img-fluid"> -->
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <?php
    include('../Parital/foot.php')
    ?>
    <script src="../JS/Khach_JS/index.js">

    </script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#exampleModal10').modal('show');
            }, 2000)

            setInterval(function() {
                color = '#' + Math.floor(Math.random() * 16777215).toString(16);
                $('.hero-text').css("color", color)
            }, 500)


            setInterval(function() {
                color = '#' + Math.floor(Math.random() * 16777215).toString(16);
                $('.modal-content').css("border-color", color)
            }, 500)
            setInterval(createSnowFlake,100)
            function createSnowFlake(){
                const snow = document.createElement('i');
                snow.classList.add('fas');
                snow.classList.add('fa-snowflake');
                snow.style.left = Math.random()* window.innerWidth + 'px';
                snow.style.animationDuration = Math.random()*3+2+'s';
                snow.style.opacity = Math.random();
                snow.style.fontSize = Math.random()*10+10+'px';
                document.modal-body.appendChild(snow)
                // setTimeout(() => {
                //     snow.remove()
                // }, 5000);
            }
        })
    </script>
</div>