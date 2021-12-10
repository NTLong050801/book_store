<title>Trang chủ</title>
<?php
include('../Parital/header.php');
include('./ham.php')
?>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>Khách</h2>
            </li>
            <li id="true" class="nav-item"> <a href="#"><i class="fa fa-home"></i>Sách</a> </li>

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
                            <form class="d-flex" style="margin-left: 30%;">
                                <input require id="search_ip" class="form-control me-2" type="search" placeholder="Nhập tên sách" aria-label="Search">
                                <button id="btn_search" class="btn btn-outline-success" type="button">Tìm</button>
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

                    <div class="btn-theloai">
                        <!-- dropdown theloai -->
                        <div class="container main-content">
                            <div class="dropdown" style="margin-top: 50px;">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tất cả
                                </button>
                                <ul class="dropdown-menu theloai" aria-labelledby="dropdownMenuButton1">
                                    <?php
                                    $qr = slt_theloai();
                                    if (mysqli_num_rows($qr) > 0) {
                                        while ($row = mysqli_fetch_assoc($qr)) { ?>
                                            <li><a class="dropdown-item theloai" tl_id=<?php echo $row['tl_id'] ?> href="#"><?php echo $row['tl_ten'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>


                            </div>

                            </ul>
                            <div class="data_sach">

                            </div>
                        </div>

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
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    })
    $('.dropdown-menu .theloai').click(function() {
        tl_id = $(this).attr('tl_id');
        load_data(tl_id);
        theloai = $(this).html();
        $('#dropdownMenuButton1').html(theloai);
    })
    load_data();
    $(document).on('click', '.page-item', function() {
        tranghientai = $(this).attr('tranghientai');
        if (tranghientai > 0) {
            $.ajax({
                url: "process_sach.php",
                method: "POST",
                data: {
                    tranghientai: tranghientai
                },
                success: function(dt) {
                    $('.data_sach').html(dt);
                }

            })
        }
        //alert(tranghientai);
        // load_data('',tranghientai)

    })

    function load_data(tl_id, tranghientai) {
        $.ajax({
            url: "process_sach.php",
            method: "POST",
            data: {
                tl_id: tl_id,
                tranghientai: tranghientai
            },
            success: function(dt) {
                $(".data_sach").html(dt)
            }
        })
    }
</script>