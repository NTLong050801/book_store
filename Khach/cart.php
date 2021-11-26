<title>Giỏ hàng</title>
<?php
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
                    <div class="container main-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-md-1" scope="col"><input type="checkbox"></th>
                                    <th class="col-md-5" scope="col">Sản phẩm</th>
                                    <th class="col-md-1" scope="col">Đơn giá</th>
                                    <th class="col-md-1" scope="col">Số lượng</th>
                                    <th class="col-md-1" scope="col">Số tiền</th>
                                    <th class="col-md-1" scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $email_kh = $_SESSION['check_login'];
                                    $sql = "SELECT  giohang.s_id as sachID, khach.k_id as idKhach, anh, s_ten, gh_soluong , tongtien FROM giohang, sach, khach where k_email = '$email_kh'  and giohang.k_id = khach.k_id and giohang.s_id = sach.s_id";
                                    $rs = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($rs) > 0){
                                        while($row = mysqli_fetch_array($rs)){
                                        ?>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>
                                                   <img height="50" src="../Image/VanHoc/<?php echo $row['anh']?>" alt="">
                                                   <?php
                                                        echo $row['s_ten'];
                                                   ?>
                                                </td>
                                                <td><?php echo $row['tongtien'] ?></td>
                                                <td><input value="<?php echo $row['gh_soluong'] ?>" type="number" min=0 max=10></td>
                                                <td></td>
                                                <td>
                                                    <button id="btnXoa" s_id = "<?php echo $row['sachID']?>" k_id = "<?php echo $row['idKhach'] ?>" class="btn btn-danger" >Xóa</button>
                                                </td>
                                            </tr>


                                        <?php
                                        }
                                    }
                                    else{
                                        echo "Không có kq";
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

<?php
include('../Parital/foot.php')
?>
<script>
    $(document).ready(function(){
        $('#btnXoa').click(function(){
            s_id = $(this).attr('s_id');
            k_id = $(this).attr('k_id');
            alert(s_id + " " + k_id);
            // $.ajax({
            //     url: "./cart_action.php",
            //     method: "POST",
            //     data: {
            //         s_id: s_id,
            //         k_id: k_id
            //     },
            //     success: function(dt){
            //         alert(dt);
            //     }
            // })
        })
    })
</script>