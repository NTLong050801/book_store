<<<<<<< HEAD
<title>Quản lý</title>
<?php
<<<<<<< HEAD:QuanLy/index.php
    include('../Parital/header.php')
=======
// include('s./config/db.php');
// include("./partial/header.php");
// if(!isset($_SESSION['check_email'])){
//     header('location:./login/login.php');
// }
session_start();
>>>>>>> minhhn:QuanLy/header_footer/header.php
?>
<!-- <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-
    oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
<!-- <link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../CSS/style.css"> -->
<<<<<<< HEAD:QuanLy/index.php


<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
=======
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
>>>>>>> minhhn:QuanLy/header_footer/header.php
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../CSS/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
<<<<<<< HEAD:QuanLy/index.php
                <h2>Khách</h2>
=======
                <h2>Nhân viên</h2>
>>>>>>> minhhn:QuanLy/header_footer/header.php
            </li>
            <li class="nav-item "><a href="#"> <i class="fa fa-home"></i>Sách</a></li>

            <li class="nav-item "><a href="#"> <i class="fa fa-home"></i>Tác giả</a></li>

            <li class="nav-item "><a href="#"> <i class="fa fa-home"></i>Thể loại</a></li>

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
                                <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                <a href="../Login/logout.php" class="navbar-brand">Đăng xuất</a>
                            </form>
                        </div>
<<<<<<< HEAD:QuanLy/index.php
                    </nav>
                    <div class="main-content">
                        <div class="title">
                            <h3 id="title" style="text-align: center;margin-top:30px">
                            Đây là trang quản lý</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    // include('./partials/footer.php') 
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</div>
=======
                    </nav>
>>>>>>> minhhn:QuanLy/header_footer/header.php
=======
<?php
include('./header_footer/header.php');
?>
<div class="main-content">
    <div class="container-fluid">
        <a href="./them.php"><button class="btn btn-success mt-3">Thêm sách</button></a>
        <?php
        if (isset($_SESSION['delOK'])) {
            echo $_SESSION['delOK'];
            unset($_SESSION['delOK']);
        }
        if (isset($_SESSION['addOK'])) {
            echo $_SESSION['addOK'];
            unset($_SESSION['addOK']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Nhà XB</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Năm xuất bản</th>
                    <th scope="col">Số trang</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ngôn ngữ</th>
                    <th scope="col">Lượt mua</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Giảm giá</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include('../config/db.php');
                $sql = "SELECT * FROM sach, tacgia, theloai where sach.tg_id = tacgia.tg_id and sach.tl_id = theloai.tl_id";
                $rs = mysqli_query($conn, $sql);
                if (mysqli_num_rows($rs) > 0) {
                    while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['s_id'] ?></th>
                            <td><?php echo $row['s_ten'] ?></td>
                            <td><?php echo $row['tg_ten'] ?></td>
                            <td><?php echo $row['nxb'] ?></td>
                            <td><?php echo $row['tl_ten'] ?></td>
                            <td><?php echo $row['namxuatban'] ?></td>
                            <td><?php echo $row['sotrang'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['mota'] ?></td>
                            <td><?php echo $row['ngonngu'] ?></td>
                            <td><?php echo $row['luotmua'] ?></td>
                            <td><img src="../img/<?php echo $row['anh']?>" alt="" class="img-fluid"></td>
                            <td><?php echo $row['s_gia'] ?></td>
                            <td><?php echo $row['s_giamgia'] ?></td>
                            <td>
                                <a href="./sua.php?id=<?php echo $row['s_id'] ?>"><button class="btn"><i class="fas fa-edit"></i></button></a>
                                <a href="./xoa.php?id=<?php echo $row['s_id'] ?>"><button class="btn"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include('./header_footer/footer.php');
?>
>>>>>>> minhhn
