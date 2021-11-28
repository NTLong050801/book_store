<title>Giỏ hàng</title>
<link rel="stylesheet" href="../CSS/cart.css">
<?php
include('../Parital/header.php');
require('./function.php')
?>
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">
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
                                <a id="profile_tch" href="cart.php" class="navbar-brand">Giỏ hàng</a>
                                <a href="../Login/logout.php" class="navbar-brand">Đăng xuất</a>
                            </form>
                        </div>
                    </nav>
                    <div class="container main-content">
                        <h4 class="title">Giỏ hàng</h4>
                        <div id="tbl_data">
                            <form action="banking.php" method="POST">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><input id="checkall" type="checkbox"></th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Số tiền</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">

                                    </tbody>
                                </table>
                                <div class="" id="thanhtoan">
                                    <span class="checkbox_all">
                                        <input id="checkbox_all" type="checkbox" style="margin-right: 3%;">Chọn tất cả</span>
                                    <span id="delete_all"><i class="fas fa-trash-alt"></i></span>
                                    <label for="">Tổng thanh toán :<span id="ttt">0</span>đ </label>
                                    <a href=""><button id="buying" name="banking" type="submit" class="btn btn-danger">Mua hàng</button></a>
                                </div>
                            </form>
                        </div>

                        <div id="banthich">
                            <h4>Có thể bạn thích</h4>
                            <span class="tiep" id="back" style="float:left;z-index: 2;margin-top: inherit;width:2%">
                                <i class="fas fa-chevron-left fa-2x"></i></span>
                            <span class="tiep" id="next" style="float:right;z-index: 2;margin-top: inherit;width:2%">
                                <i class="fas fa-chevron-right fa-2x"></i></span>
                            <div class="row sp_new">
                                <div class="container" id="sp_new_tl" style="z-index: 1;">

                                </div>
                            </div>
                        </div>

                        <div id="daxem">
                            <h4>Đã xem</h4>
                            <div class="row">
                                <?php
                                if (isset($_SESSION['daxem']) && (is_array($_SESSION['daxem']))) {
                                    $lenght = sizeof($_SESSION['daxem']);
                                    if ($lenght > 7) {
                                        for ($i =  $lenght - 1; $i > $lenght - 7; $i--) {
                                            echo '<div class = "col-2 daxem" style = "text-align: center;background-color: #ccc;border-right: 3px solid #fff;">
                                                <a href="book.php?s_id=' . $_SESSION['daxem'][$i][0] . '">
                                                <div class = "img_daxem" style = "margin-top:5px"><img class = "container img-fluid" src="../Image/VanHoc/' . $_SESSION['daxem'][$i][1] . '" alt=""></div>
                                                    <div class = "price_daxem" style= "color:red">' . $_SESSION['daxem'][$i][2] . 'đ' . '</div>
                                                    </a></div>';
                                        }
                                    } else {
                                        for ($i =  $lenght - 1; $i > -1; $i--) {
                                            echo '<div  class = "col-2 daxem" style = "text-align: center;background-color: #ccc;border-right: 3px solid #fff;">
                                                <a href="book.php?s_id=' . $_SESSION['daxem'][$i][0] . '">
                                                <div class = "img_daxem" style = "margin-top:5px"><img class = "container img-fluid" src="../Image/VanHoc/' . $_SESSION['daxem'][$i][1] . '" alt=""></div>
                                                    <div class = "price_daxem" style= "color:red">' . $_SESSION['daxem'][$i][2] . 'đ' . '</div>
                                                    </a></div>';
                                        }
                                    }
                                }

                                ?>
                            </div>


                        </div>
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sản phẩm tương tự</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                
            </div> -->
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button id="huy" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                <button id="xoa" type="button" class="btn btn-primary">Xóa</button>
            </div>

        </div>
    </div>
</div>

<?php
include('../Parital/foot.php')
?>
<script src="../JS/Khach_JS/cart.js"></script>