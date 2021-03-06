<title>Sản phẩm</title>
<link rel="stylesheet" href="../CSS/book.css">
<?php
include('../Parital/header.php');
require('./function.php')
?>
<div id="wrapper" style="overflow: scroll;height:100%;padding-left: 0;">
  <!-- Page Content -->
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
                <a href="donhang.php" class="navbar-brand">Đơn mua</a>

                <a id="profile_tch" href="cart.php" class="navbar-brand"><i class="fas fa-shopping-cart fa-2x"></i></a>
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
            $_SESSION['sotrang_tl'] = ceil(count_posts($row['tl_id']) / $sosach1trang);
            if (!isset($_SESSION['daxem'])) {
              $_SESSION['daxem'] = [];
            };
            $tt = ($row['s_gia'] - ($row['s_gia'] * $row['s_giamgia']) / 100);
            $sp = [$s_id, $row['anh'], $tt];
            $_SESSION['daxem'][] = $sp;
            // var_dump($_SESSION['daxem']);

            ?>
            <?php
            if (isset($_POST['submit'])) {
              $sluong = $_POST['sluong'];
              $gia = ($row['s_gia'] - ($row['s_gia'] * $row['s_giamgia']) / 100);
              $k_email = $_SESSION['check_login'];
              $k_id = Khach($k_email);
              $check = check_GioHang($k_id, $s_id);
              if (mysqli_num_rows($check) > 0) {
                $row = mysqli_fetch_assoc($check);
                $sluong = $sluong + $row['gh_soluong'];
                if ($sluong < 10) {
                  update_Gh_Soluong($k_id, $s_id, $sluong);
                }
              } else {
                $insert = insertCart($k_id, $s_id, $sluong, $tt);
              }
              header('location:cart.php');
            }
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
                      <span class="star_dg" style="color: red;"><?php echo avg_sao($s_id) ?></span>
                      <span class="star_s1"><i class="fas fa-star"></i></span>
                      <span class="star_s2"><i class="fas fa-star"></i></span>
                      <span class="star_s3"><i class="fas fa-star"></i></span>
                      <span class="star_s4"><i class="fas fa-star"></i></span>
                      <span class="star_s5"><i class="fas fa-star"></i></span>
                    </div>
                    <div class="danhgia">
                      <span style="text-decoration: underline;"><?php echo count_danhgia($s_id) ?></span> <span style="color: #827b66;">Đánh giá</span>
                    </div>
                    <div class="solder">
                      <?php echo $row['luotmua'] ?> <span style="color: #827b66;">Đã bán</span>
                    </div>
                  </div>
                  <div class="price">
                    <span style="font-size: 1rem;text-decoration: line-through;
                    color: #929292;margin-right: 10px;margin-left:30px"><?php echo $row['s_gia'] ?>đ</span>
                    <span style="font-size: 1.875rem;color:red;font-weight: 500;"><?php echo  $tt ?>đ</span>
                    <?php
                    if ($row['s_giamgia'] > 0) {
                      echo '<span style="margin-left: 15px;font-size: .75rem;color: #fff;text-transform: uppercase;
                      background: #ee4d2d;border-radius: 2px;
                      padding: 2px 4px;font-weight: 600;line-height: 1;white-space: nowrap;">
                      ' . $row['s_giamgia'] . ' % Giảm</span>';
                    }
                    ?>
                  </div>
                  <form action="" method="POST">
                    <div class="soluong">
                      <span style="color: #827b66;">Số lượng:</span>
                      <input name="sluong" style="margin-left:20px" id="sluong" type="number" min='1' max='10' value="1">
                      <span style="color: #827b66;margin-left:20px"><?php echo $row['soluong'] ?> sản phẩm có sẵn</span>
                    </div>
                    <div style="margin-top: 50px;">
                      <button id="add_cart" s_id=<?php echo $s_id ?> tt=<?php echo $tt ?> class="btn btn-danger" type="button">Thêm vào giỏ hàng</button>
                      <button name="submit" class="btn btn-success" type="submit" style="margin-left: 30px;">Mua ngay</button>

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
                  <div class="container star_ed">
                    <div class="alldiem">
                      <div class="diem"><span><?php echo avg_sao($s_id) ?></span> Trên 5</div>
                      <div>
                        <?php
                        // $avg_sao = ceil(avg_sao($s_id));
                        // for($i = 1;$i<=$avg_sao;$i++){
                        //   // echo '<span style ="color: #ee4d2d;margin:5px"><i class="fas fa-star"></i></span>';
                        // }
                        ?>
                        <span class="star_s1"><i class="fas fa-star"></i></span>
                        <span class="star_s2"><i class="fas fa-star"></i></span>
                        <span class="star_s3"><i class="fas fa-star"></i></span>
                        <span class="star_s4"><i class="fas fa-star"></i></span>
                        <span class="star_s5"><i class="fas fa-star"></i></span>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2 star_cmt color_star_k" sao='5'><span>5 Sao(<?php echo count_sao_sach($s_id, 5) ?>)</span></div>
                      <div class="col-2 star_cmt" sao='4'><span>4 Sao(<?php echo count_sao_sach($s_id, 4) ?>)</span></div>
                      <div class="col-2 star_cmt" sao='3'><span>3 Sao(<?php echo count_sao_sach($s_id, 3) ?>)</span></div>
                      <div class="col-2 star_cmt" sao='2'><span>2 Sao(<?php echo count_sao_sach($s_id, 2) ?>)</span></div>
                      <div class="col-2 star_cmt" sao='1'><span>1 Sao(<?php echo count_sao_sach($s_id, 1) ?>)</span></div>
                      <br>
                      <div class="col-2 star_cmt" sao='0'><span>Có bình luận(<?php echo count_cmt($s_id) ?>)</span></div>
                    </div>
                  </div>
                  <div class="comment">

                  </div>

                </div>

                <div class="container spkhac">
                  <h6>CÁC SẢN PHẨM KHÁC</h6>
                  <span class="tiep" id="back" style="float:left;z-index:2;margin-top: inherit;">
                    <i class="fas fa-chevron-left fa-3x"></i></span>
                  <span class="tiep" id="next" style="float:right;z-index: 2;margin-top: inherit;">
                    <i class="fas fa-chevron-right fa-3x"></i></span>
                  <div class="row sp_new">
                    <div id="sp_new_tl" style="z-index: 1;">

                    </div>
                  </div>
                </div>

                <div class="container sptt" style="margin-top: 40px;">
                  <h6>CÁC SẢN PHẨM TƯƠNG TỰ</h6>
                  <span class="tiep_tt" id="back_tt" style="float:left;z-index:2;margin-top: inherit;">
                    <i class="fas fa-chevron-left fa-3x"></i></span>
                  <span class="tiep_tt" id="next_tt" style="float:right;z-index: 2;margin-top: inherit;">
                    <i class="fas fa-chevron-right fa-3x"></i></span>
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
  <?php
  include('../Parital/foot.php')
  ?>

</div>
<script src="../JS/Khach_JS/book.js"></script>
<script>
  $(document).ready(function() {
    a = Math.round($('.diem span').html())
    for (i = 1; i <= a; i++) {
      $('.star_s' + i).addClass('color_star')
    }
    sao = 5
    load_cmt()

    $(document).on('click', '.page-item', function() {
      if ($(this).hasClass('disabled')) {
      } else {
        tranghientai = $(this).attr('trang');
        load_cmt(sao, tranghientai)
      }
    })

    $('.star_cmt').click(function() {
      sao = $(this).attr('sao');
      $('.star_cmt').removeClass('color_star_k')
      $(this).addClass('color_star_k')
      load_cmt(sao);
    })



    function load_cmt(sao, tranghientai) {
      // action = "5sao";
      s_id = $('#add_cart').attr('s_id');
      $.ajax({
        url: "comment.php",
        method: "POST",
        data: {
          s_id: s_id,
          sao: sao,
          tranghientai: tranghientai
        },
        success: function(dt) {
          $('.comment').html(dt)
        }
      })

    }
  })
</script>