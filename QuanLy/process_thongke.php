<?php
include('../config/db.php');
include('./ham.php');
include('../Khach/function.php');
?>
<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action == 'get_data') {
        if (isset($_POST['val'])) {
            $val = $_POST['val'];
        } else {
            $date_s = $_POST['date_s'];
            $date_e = $_POST['date_e'];
        }
        if (isset($_POST['tranghientai'])) {
            $tranghientai = $_POST['tranghientai'];
        } else {
            $tranghientai = 1;
        }
        $sohd1trang = 10;
        if (isset($_POST['val'])) {
            $tonghoadon = sum_dh_search($val);
        } else {
            $tonghoadon = sum_dh($date_s, $date_e);
        }

        $sotrang = ceil($tonghoadon / $sohd1trang);
        $limit = ($tranghientai - 1) * $sohd1trang;
        if (isset($_POST['val'])) {
            $qr = dh_date_search($val);
        } else {
            $qr = dh_date($date_s, $date_e);
        }

        if (mysqli_num_rows($qr) > 0) { ?>
            <?php
            if (!isset($_POST['val'])) { ?>
                <div class="container title">
                    <span>Tổng đơn hàng : </span><span style="color:  red;"><?php echo sum_dh($date_s, $date_e) ?> đơn hàng</span>
                    <br>
                    <span>Tổng số sách bán được : </span><span style="color:  red;"><?php echo sum_sach($date_s, $date_e) ?> quyển sách</span>
                    <br>
                    <span>Tổng tiền : </span><span style="color: red;"><?php echo sum_tien($date_s, $date_e) ?>đ</span>
                </div>
            <?php
            }
            ?>
            <div class="table_dh" style="margin-top: 50px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">ID Đơn hàng</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">SDT</th>
                            <th scope="col">Số lượng sách</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Ngày mua</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['val'])) {
                            $query = chitiet_hd_date_search($val, $limit, $sohd1trang);
                        } else {
                            $query = chitiet_hd_date($date_s, $date_e, $limit, $sohd1trang);
                        }

                        $i = (($tranghientai - 1) * $sohd1trang) + 1;
                        while ($row_dh = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><?php echo $row_dh['hd_id'] ?></td>
                                <td><?php echo $row_dh['k_ten'] ?></td>
                                <?php
                                if (isset($_POST['val'])) { ?>
                                    <td><?php echo preg_replace('/(' . $val . ')/i', '<span style = "color:red">' . $val . '</span>', $row_dh['k_sdt']) ?></td>
                                <?php
                                } else { ?>
                                    <td><?php echo $row_dh['k_sdt'] ?></td>
                                <?php     }
                                ?>
                                <td><?php echo sum_sluong($row_dh['hd_id']) ?></td>
                                <td><?php echo $row_dh['tongtien'] ?></td>
                                <td><?php echo $row_dh['hd_date'] ?></td>
                                <td><?php echo $row_dh['note'] ?></td>
                                <td>
                                    <button hd_id=<?php echo $row_dh['hd_id'] ?> class="btn btn-secondary bienlai" style="width:100%">Hóa đơn</button>
                                </td>

                            </tr>
                            <div class="modal fade" id="bienlai<?php echo $row_dh['hd_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ID Đơn hàng : <?php echo $row_dh['hd_id']; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="font-size: 13px;">
                                            <h4 style="text-align: center;">BOOK STORE</h4>
                                            <div class="container row">
                                                <div class="col-8">
                                                    <div class="container fl">
                                                        <span>Mã vận đơn : <?php echo rand(100000, 999999) ?></span>
                                                        <br>
                                                        <span>Mã đơn hàng : <?php echo $row_dh['hd_id']; ?> </span>
                                                        <br>
                                                        <span>Ngày : <?php echo date('d/m/Y', strtotime($row_dh['hd_date'])); ?> </span>
                                                    </div>
                                                    <br>
                                                    <div class="container get" style="border-bottom: black 2px dashed ;padding-bottom:20px">
                                                        <br>
                                                        <span>Tên khách : <?php echo $row_dh['k_ten'] ?></span>
                                                        <br>
                                                        <span>Địa chỉ : <?php echo $row_dh['k_diachi'] ?></span>
                                                        <br>
                                                        <span>SDT : <?php echo $row_dh['k_sdt'] ?></span>
                                                        <br>
                                                    </div>
                                                    <div class="container">
                                                        <br>
                                                        <span>Sản phẩm : </span>
                                                        <br>
                                                        <?php
                                                        $chitiet = Chitiethd($row_dh['hd_id'], $row_dh['k_id']);
                                                        while ($row_ct = mysqli_fetch_assoc($chitiet)) { ?>
                                                            <span><?php echo $row_ct['s_ten'] ?> -- </span>
                                                            <span style="color: red;"> SL : <?php echo $row_ct['sluong'] ?> --</span>
                                                            <span style="color: red;"> Giá : <?php echo $row_ct['s_gia'] ?>đ</span>
                                                            <br>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="qr">
                                                        <div class='spacer'></div>
                                                        <div class='anim-box center spacer'>
                                                            <div></div>
                                                            <div class='scanner'></div>
                                                            <div class='anim-item anim-item-sm'></div>
                                                            <div class='anim-item anim-item-lg'></div>
                                                            <div class='anim-item anim-item-lg'></div>
                                                            <div class='anim-item anim-item-sm'></div>
                                                            <div class='anim-item anim-item-lg'></div>
                                                            <div class='anim-item anim-item-sm'></div>
                                                            <div class='anim-item anim-item-md'></div>
                                                            <div class='anim-item anim-item-sm'></div>
                                                            <div class='anim-item anim-item-md'></div>
                                                            <div class='anim-item anim-item-lg'></div>
                                                            <div class='anim-item anim-item-sm'></div>
                                                            <div class='anim-item anim-item-sm'></div>
                                                            <div class='anim-item anim-item-lg'></div>
                                                            <div class='anim-item anim-item-sm'></div>
                                                            <div class='anim-item anim-item-lg'></div>
                                                        </div>
                                                        <div class='spacer'></div>
                                                    </div>
                                                    <div style="text-align: center;margin-top:50px">
                                                        <h5>Tổng thanh toán</h5>
                                                        <div>
                                                            <h6 style="font-style:20px ;color:red"><?php echo $row_dh['tongtien'] ?>đ</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }

                        ?>

                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example" style="text-align: center;">
                <ul class="pagination">
                    <li class="page-item <?php if ($tranghientai == '1') {
                                                echo 'disabled';
                                            } ?> " tranghientai="<?php echo ($tranghientai - 1); ?>">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $sotrang; $i++) { ?>
                        <li class="page-item <?php
                                                if ($tranghientai == $i) {
                                                    echo 'active';
                                                }
                                                ?> " tranghientai="<?php echo $i ?>"><a class="page-link" href="#data"><?php echo $i ?></a></li>
                    <?php  }
                    ?>

                    <li class="page-item <?php if ($tranghientai == $sotrang) {
                                                echo 'disabled';
                                            } ?>" tranghientai="<?php echo ($tranghientai + 1); ?>">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>


        <?php
        } else { ?>
            <div class="kodh" id="status">
                Chưa có đơn hàng <span class="mualai"></span>
            </div>;
<?php        }
    }
}
?>