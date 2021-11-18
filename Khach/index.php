<title>Trang chủ</title>
<?php
<<<<<<< HEAD
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
=======
// include('s./config/db.php');
// include("./partial/header.php");
// if(!isset($_SESSION['check_email'])){
//     header('location:./login/login.php');
// }
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-
    oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
<!-- <link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../CSS/style.css"> -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../CSS/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

>>>>>>> minhhn
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
<<<<<<< HEAD
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
=======
                <h2>TEACHER</h2>
            </li>
            <li class="nav-item "> <a href="#"> <i class="fa fa-home"></i>Mục lục 1 </a> </li>

            <li class="nav-item "> <a href="#"> <i class="fa fa-home"></i>Mục lục 1 </a> </li>

>>>>>>> minhhn
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
<<<<<<< HEAD
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
=======
                                <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                <a href="../login/logout.php" class="navbar-brand">Đăng xuất</a>
                            </form>
                        </div>
                    </nav>
                    <div class="main-content">
                        <div class="title">
                            <h3 id="title" style="text-align: center;margin-top:30px">Đây là content</h3>
                        </div>

<<<<<<< Updated upstream
=======
                            </div>
                        </div>
                        <?php
                        $tl_id = $_SESSION['tl_id'];
                        $tongsach = count_posts($tl_id);
                        // echo $tongsach;
                        $sosach1trang = 10;
                        $sotrang = ceil($tongsach / $sosach1trang);
>>>>>>> Stashed changes


>>>>>>> minhhn

                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
<<<<<<< HEAD
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

=======
    // include('./partials/footer.php') 
    ?>

<<<<<<< Updated upstream
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
=======
>>>>>>> minhhn

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
<<<<<<< HEAD
                alert(id)
=======
                // alert(id)
>>>>>>> minhhn
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
<<<<<<< HEAD
    </script>
</div>
=======
>>>>>>> Stashed changes
    </script>
</div>
<!-- /#wrapper -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
>>>>>>> minhhn
