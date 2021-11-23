<title>Giỏ hàng</title>
<?php
include('../Parital/header.php');
require('./function.php')
?>
<link rel="stylesheet" href="../CSS/cart.css">
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">
    <div id="page-content-wrapper">
        <div class="container-fluid" style="background-color: rgb(148 122 126 / 8%);">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
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
                        <h4 class="title">Giỏ hàng</h4>
                        <div class="data_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Đơn giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k_email = $_SESSION['check_login'];
                                    $k_id = Khach($k_email);
                                    $qr =  GioHang_Sach($k_id);
                                    if (mysqli_num_rows($qr) > 0) {
                                        while ($row = mysqli_fetch_assoc($qr)) { ?>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>
                                                    <div class="row">
                                                        <span class="col-3"> <img class=" container img-fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt=""></span>
                                                        <span class="col-3"><?php echo $row['s_ten'] ?></span>
                                                    </div>
                                                </td>
                                                <!-- đơn giá -->
                                                <td>
                                                    <span id="price" >
                                                    <?php echo $row['tongtien'] ?>đ
                                                    </span>
                                                </td>
                                                <!-- soluong -->
                                                <td>
                                                    <input id_sp = <?php echo $row['s_id'] ?> tien1sach = <?php echo $row['tongtien'] ?> type="number" min =1 max = 5  class="sluong_get" value="<?php echo $row['gh_soluong'] ?>">
                                                </td>
                                                <!-- tongtien -->
                                                <th scope="col">
                                                    <span id="<?php echo $row['s_id'] ?>"><?php echo $row['gh_soluong']*$row['tongtien'] ?>đ</span>
                                                </th>
                                                <th scope="col">Xoá</th>
                                            </tr>

                                    <?php
                                        }
                                    }



                                    ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../Parital/foot.php')
?>
<script>
    $(document).ready(function(){
        $('.sluong_get').change(function(){
            tien1sach = $(this).attr('tien1sach');
            sluong = $(this).val()
            tongtien = tien1sach*sluong;
            id_sp = $(this).attr('id_sp')
            $('#'+id_sp).html(tongtien+'đ')
        })
    })
</script>