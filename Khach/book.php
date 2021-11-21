<title>Trang chủ</title>
<?php
include('../Parital/header.php');
require('./function.php')
?>
<link rel="stylesheet" href="../CSS/book.css">
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">

  <!-- Sidebar -->

  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
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
                <a id="profile_tch" href="#" class="navbar-brand">Giỏ hàng</a>
                <a href="../Login/logout.php" class="navbar-brand">Đăng xuất</a>
              </form>
            </div>
          </nav>
          <div class="container main-content">
            <?php
            $s_id = $_GET['s_id'];
            $slt = SachById($s_id);
            $row = mysqli_fetch_assoc($slt);
            $sosach1trang = 6;
            $_SESSION['sotrang_moinhat'] = ceil(count_alls() / $sosach1trang);
            $_SESSION['sotrang_tl'] = ceil(count_posts($row['tl_id']) / $sosach1trang)
            ?>
            <div class="title">
              <a href="index.php">Trang chủ</a>
              <i class="fas fa-chevron-right"></i>
              <span><?php echo $row['tl_ten'] ?></span>
              <i class="fas fa-chevron-right"></i>
              <span><?php echo $row['s_ten'] ?></span>
            </div>

            <div class="details-book">
              <div class="row row_details">
                <div class="col-5">
                  <div class="container img_full">
                    <img class="container img-fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                  </div>
                  <div class="container img_small">
                    <img class="container img-fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                    <?php
                    if ($row['anh1'] != '') {
                      echo '<img class="container img-fluid" src="../Image/VanHoc/' . $row['anh1'] . '" alt="">';
                    }
                    ?>
                  </div>
                </div>

                <div class="col-7">
                  <div class="name_book">
                    <h5>Sách - <?php echo $row['s_ten'] ?></h5>
                  </div>
                  <div class="sold">
                    <div class="star">
                      <span>5.0</span> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <div class="danhgia">
                      <span style="text-decoration: underline;">120</span> <span style="color: #827b66;">Đánh giá</span>
                    </div>
                    <div class="solder">
                      <?php echo $row['luotmua'] ?> <span style="color: #827b66;">Đã bán</span>
                    </div>
                  </div>
                  <div class="price">
                    <span style="font-size: 1rem;text-decoration: line-through;
                    color: #929292;margin-right: 10px;margin-left:30px"><?php echo $row['s_gia'] ?>đ</span>
                    <span style="font-size: 1.875rem;color:red;font-weight: 500;"><?php echo $row['s_gia'] - ($row['s_gia'] * $row['s_giamgia']) / 100 ?>đ</span>
                    <?php
                    if ($row['s_giamgia'] > 0) {
                      echo '<span style="margin-left: 15px;font-size: .75rem;color: #fff;text-transform: uppercase;
                      background: #ee4d2d;border-radius: 2px;
                      padding: 2px 4px;font-weight: 600;line-height: 1;white-space: nowrap;">
                      ' . $row['s_giamgia'] . ' % Giảm</span>';
                    }
                    ?>

                  </div>
                  <form action="">
                    <div class="soluong">
                      <span style="color: #827b66;">Số lượng:</span>
                      <input style="margin-left:20px" type="number" min='1' max='5' value="1">
                      <span style="color: #827b66;margin-left:20px"><?php echo $row['soluong'] ?> sản phẩm có sẵn</span>
                    </div>
                    <div style="margin-top: 50px;">
                      <button class="btn btn-danger" type="submit">Thêm vào giỏ hàng</button>
                      <button class="btn btn-success" type="submit" style="margin-left: 30px;">Mua ngay</button>
                    </div>
                  </form>
                  <div class="row thongdiep">
                    <div class="col-12 td_title">

                      <h5>7 ngày miễn phí trả hàng</h5>

                    </div>
                    <div class="col-12 td_title">

                      <h5>Hàng chính hãng 100%</h5>

                    </div>
                    <div class="col-12 td_title">

                      <h5>Miễn phí vận chuyển</h5>

                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row inf_book" style="margin-top: 50px;">
              <div class="inf_book_left">
                <div class="container chitiet">
                  <div class="title">
                    <h4>CHI TIẾT SẢN PHẨM</h4>
                  </div>
                  <div class="noidung">
                    <label for="">Danh mục</label>
                    <span class="nd">
                      <a href="index.php">Trang chủ</a>
                      <i class="fas fa-chevron-right"></i>
                      <span><?php echo $row['tl_ten'] ?></span>
                      <i class="fas fa-chevron-right"></i>
                      <span><?php echo $row['s_ten'] ?></span>
                    </span>
                    <br>
                    <br>
                    <label for="">Thương hiệu</label>
                    <span class="nd">
                      Long Nguyễn
                    </span>
                    <br>
                    <br>
                    <label for="">Nhập khẩu/Trong Nước</label>
                    <span class="nd">
                      Trong nước
                    </span>
                    <br>
                    <br>
                    <label for="">Kho hàng</label>
                    <span class="nd">
                      Hà Nội
                    </span>
                  </div>
                  <div class="title">
                    <h4>MÔ TẢ SẢN PHẨM</h4>
                  </div>
                  <div class="noidung">
                    <span>Tác giả : <?php echo $row['tg_ten'] ?></span>
                    <br>
                    <br>
                    <span>Nhà xuất bản : <?php echo $row['nxb'] ?></span>
                    <br>
                    <br>
                    <span>Năm xuất bản : <?php echo $row['namxuatban'] ?></span>
                    <br>
                    <br>
                    <span>Số trang : <?php echo $row['sotrang'] ?></span>
                    <br><br>
                    <span>Giới thiệu sách : <br><?php echo $row['mota'] ?></span>
                  </div>

                </div>
                <div class="danhgiasp">

                </div>

                <div class="container spkhac">
                  <h6>CÁC SẢN PHẨM KHÁC</h6>
                  <span class="tiep" id="back" style="float:left;z-index:2;margin-top: inherit;">
                    <i class="fas fa-chevron-left fa-4x"></i></span>
                  <span class="tiep" id="next" style="float:right;z-index: 2;margin-top: inherit;">
                    <i class="fas fa-chevron-right fa-4x"></i></span>
                  <div class="row sp_new">
                    <div id="sp_new_tl" style="z-index: 1;">

                    </div>
                  </div>
                </div>

                <div class="container sptt" style="margin-top: 40px;">
                  <h6>CÁC SẢN PHẨM TƯƠNG TỰ</h6>
                  <span class="tiep_tt" id="back_tt" style="float:left;z-index:2;margin-top: inherit;">
                    <i class="fas fa-chevron-left fa-4x"></i></span>
                  <span class="tiep_tt" id="next_tt" style="float:right;z-index: 2;margin-top: inherit;">
                    <i class="fas fa-chevron-right fa-4x"></i></span>
                  <div class="row sp_tt">
                    <div id="sp_tt_tl" style="z-index: 1;">

                    </div>
                  </div>
                </div>
              </div>
              <div class="inf_book_right">
                <h6>Top sản phẩm bán chạy</h6>
                <?php
                $slt_book = BanChay($row['tl_id'], 0, 5);
                if (mysqli_num_rows($slt_book) > 0) {
                  while ($row_book = mysqli_fetch_assoc($slt_book)) { ?>
                    <div class="container book_right">
                      <a href="book.php?s_id=<?php echo $row_book['s_id'] ?>">
                        <img class="img-fluid" src="../Image/VanHoc/<?php echo $row_book['anh'] ?>" alt="">
                        <div class="name_book_tl">
                          <span><?php echo $row_book['s_ten'] ?></span>
                        </div>
                        <span class="price_book_tl">
                          <?php echo $row_book['s_gia'] - ($row_book['s_gia'] * $row_book['s_giamgia']) / 100 ?>đ
                        </span>
                      </a>

                    </div>
                <?php
                  }
                }
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="this" tl_id="<?php echo $row['tl_id'] ?>" sotrang="<?php
                                                              if (isset($_SESSION['sotrang_moinhat'])) {
                                                                echo $_SESSION['sotrang_moinhat'];
                                                              }
                                                              ?>" sotrang_tl=<?php
                                                                              if (isset($_SESSION['sotrang_tl'])) {
                                                                                echo $_SESSION['sotrang_tl'];
                                                                              }
                                                                              ?>></div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sách - <?php echo $row['s_ten'] ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img class="img-fluid" style="width:100%;max-height:500px" src="" alt="">
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <?php
  include('../Parital/foot.php')
  ?>

</div>

<script>
  $(document).ready(function() {
    $('.img_small img').mouseover(function() {
      name_src = $(this).attr('src');
      $('.img_full img').attr('src', name_src)
      $('.img_small img').click(function() {
        $('#exampleModal').modal('show')
        $('.modal-body img').attr('src', name_src)
      })
      $('.img_full img').click(function() {
        $('#exampleModal').modal('show')
        $('.modal-body img').attr('src', name_src)
      })
    })

    $(".thongdiep > div:gt(0)").hide();
    setInterval(function() {
      $('.thongdiep > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('.thongdiep');
    }, 5000);

    a = 1
    a1 = 1
    sotrang = $('#this').attr('sotrang')
    sotrang_tt = $('#this').attr('sotrang')
    tl_id = $('#this').attr('tl_id')
    if (a = 1) {
      $('#back').css("display", "none")
    }
    if (a1 = 1) {
      $('#back_tt').css("display", "none")
    }
    // if (a == sotrang) {
    //   $('#next').css("display", "none")
    // }
    $('.spkhac .tiep').click(function() {
      b = $(this).attr('id');
      if (b == 'next') {
        a = a + 1;
        $('#back').css("display", "")
        if (a == sotrang) {
          $('#next').css("display", "none")
        }
      }
      if (b == 'back') {
        a = a - 1;
        $('#next').css("display", "")
        if (a == 1) {
          $('#back').css("display", "none")
        }
      }
      $.ajax({
        url: "spkhac.php",
        method: "POST",
        data: {
          tl_id: tl_id,
          tranghientai: a
        },
        success: function(dt) {
          $('#sp_new_tl').html(dt)
        }
      })
    })

    $('.sptt .tiep_tt').click(function() {
      b1 = $(this).attr('id');
      // alert(b1)
      if (b1 == 'next_tt') {
        a1 = a1 + 1;
        $('#back_tt').css("display", "")
        if (a1 == sotrang_tt) {
          $('#next_tt').css("display", "none")
        }
      }
      if (b1 == 'back_tt') {
        a1 = a1 - 1;
        $('#next_tt').css("display", "")
        if (a1 == 1) {
          $('#back_tt').css("display", "none")
        }
      }
      $.ajax({
        url: "sptt.php",
        method: "POST",
        data: {
          tl_id: tl_id,
          tranghientai: a1
        },
        success: function(dt) {
          $('#sp_tt_tl').html(dt)
        }
      })
    })




    $.ajax({
      url: "spkhac.php",
      method: "POST",
      data: {
        tl_id: tl_id,
        tranghientai: a,
      },
      success: function(dt) {
        $('#sp_new_tl').html(dt)
      }
    })
    $.ajax({
      url: "sptt.php",
      method: "POST",
      data: {
        tl_id: tl_id,
        tranghientai: a,
      },
      success: function(dt) {
        $('#sp_tt_tl').html(dt)
      }
    })
  })
</script>