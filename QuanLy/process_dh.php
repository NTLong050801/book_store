<?php
include('../config/db.php');
include('../Khach/function.php');
include('./ham.php');
?>

<?php
if (isset($_POST['action'])) {
    $action = ltrim(rtrim($_POST['action']));
    $status = (int) $_POST['status'];
    $statuss = $status + 1;
    // nếu trạng thái bằng 0 : chờ xác nhận
    // nếu trạng thái bằng 1 : chờ lấy hàng
    // nếu trạng thái bằng 2 : đang giao
    // nếu trạng thái bằng 3 : đã giao
    // nếu trạng thái bằng 4 : đã hủy
    if (isset($_POST['update'])) {
        $update = $_POST['update'];
        $hd_id = $_POST['hd_id'];
        if ($update == 'xn') {
            update_status($hd_id, $statuss);
            // echo'k';
        }
    }
    if ($action == 'Chờ xác nhận') {
        $qr = show_all_dh($status);
        if (mysqli_num_rows($qr) > 0) { ?>
            <table class="table" style="margin-top: 25px;">
                <thead>
                    <tr style="text-align: center;">
                        <!-- <th scope="col">ID Đơn hàng</th> -->
                        <th scope="col" style="width:10%">Khách hàng</th>
                        <th scope="col" style="width:10%">SDT</th>
                        <th scope="col" style="width:10%">Địa chỉ</th>
                        <th scope="col" style="width:40%">Sách</th>
                        <th scope="col" style="width:10%">Tổng tiền</th>
                        <th scope="col" style="width:10%">Ghi chú</th>
                        <th scope="col" style="width:10%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($qr)) { ?>
                        <tr>
                            <th scope="row" style="text-align: center;"><?php echo $row['k_ten'] ?></th>
                            <td style="text-align: center;"><?php echo $row['k_sdt'] ?></td>
                            <td style="text-align: center;"><?php echo $row['k_diachi'] ?></td>
                            <td>
                                <?php
                                $chitiet = Chitiethd($row['hd_id'], $row['k_id']);
                                while ($row_ct = mysqli_fetch_assoc($chitiet)) { ?>
                                    <div style="font-size: 12px;word-wrap: break-word;overflow: hidden;display: -webkit-box;
    text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2;">
                                        <span>
                                            <img src="../Image/VanHoc/<?php echo $row_ct['anh'] ?>" class=" img-fluid" alt="" style="height: 70px;">
                                        </span>
                                        <span>
                                            <?php echo $row_ct['s_ten'] ?>
                                        </span>
                                        <span style="color : red">
                                            x <?php echo $row_ct['sluong'] ?>
                                        </span>
                                    </div>
                                <?php
                                }
                                ?>
                            </td>
                            <td style="text-align: center;"><?php echo $row['tongtien'] ?>đ
                                <br>
                                <span style="color: red;">(<?php echo sum_sluong($row['hd_id']) ?> quyển )</span>
                            </td>
                            <td><?php echo $row['note'] ?></td>
                            <td style="text-align: center;">
                                <button hd_id=<?php echo $row['hd_id'] ?> class="btn btn-secondary bienlai" style="width:100%">Biên lai</button>
                                <br>
                                <br>
                                <button hd_id=<?php echo $row['hd_id'] ?> class="btn btn-danger xn" style="width:100%">Xác nhận</button>
                                <input type="text" id="status" value="0" dem="<?php echo count_status_ql($status) ?>" dem1="<?php echo count_status_ql($statuss) ?>" hidden>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="bienlai<?php echo $row['hd_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ID Đơn hàng : <?php echo $row['hd_id']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="font-size: 13px;">
                                        <h4 style="text-align: center;">BOOK STORE</h4>
                                        <div class="container row">
                                            <div class="col-8">
                                                <div class="container fl">
                                                    <span>Mã vận đơn : <?php echo rand(100000, 999999) ?></span>
                                                    <br>
                                                    <span>Mã đơn hàng : <?php echo $row['hd_id']; ?> </span>
                                                    <br>
                                                    <span>Ngày : <?php echo date('d/m/Y', strtotime($row['hd_date'])); ?> </span>
                                                </div>
                                                <br>
                                                <div class="container send" style="border-bottom: black 2px dashed ;padding-bottom:20px">
                                                    <span>Người gửi : Shop BOOK STORE </span>
                                                    <br>
                                                    <span>Địa chỉ : 175 P. Tây Sơn, Trung Liệt, Đống Đa, Hà Nội</span>
                                                    <br>
                                                    <span>Số điện thoại : 024 3852 2201</span>
                                                    <br>
                                                </div>
                                                <div class="container get" style="border-bottom: black 2px dashed ;padding-bottom:20px">
                                                    <br>
                                                    <span>Người nhận : <?php echo $row['k_ten'] ?></span>
                                                    <br>
                                                    <span>Địa chỉ : <?php echo $row['k_diachi'] ?></span>
                                                    <br>
                                                    <span>SDT : <?php echo $row['k_sdt'] ?></span>
                                                    <br>
                                                </div>
                                                <div class="container">
                                                    <br>
                                                    <span>Sản phẩm : </span>
                                                    <br>
                                                    <?php
                                                    $chitiet = Chitiethd($row['hd_id'], $row['k_id']);
                                                    while ($row_ct = mysqli_fetch_assoc($chitiet)) { ?>
                                                        <span><?php echo $row_ct['s_ten'] ?> -- </span><span style="color: red;"> SL : <?php echo $row_ct['sluong'] ?></span>
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
                                                        <h6 style="font-style:20px ;color:red"><?php echo $row['tongtien'] ?>đ</h6>
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
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else { ?>
            <div class="kodh" id="status" value="0" dem="<?php echo count_status_ql($status) ?>" dem1="<?php echo count_status_ql($statuss) ?>">
                Chưa có đơn hàng <span class="mualai" sluong_st0="0"></span>
            </div>;
        <?php
        }
    }
    if ($action == 'Chờ lấy hàng' || $action == 'Đang vận chuyển' || $action == 'Thành công') {
        $qr = show_all_dh($status);
        if (mysqli_num_rows($qr) > 0) { ?>
        
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Đơn hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">SDT</th>
                        <th scope="col">Số lượng sách</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($qr)) {  ?>
                        <tr>
                            <th scope="row"><?php echo $row['hd_id'] ?></th>
                            <td><?php echo $row['k_ten'] ?></td>
                            <td><?php echo $row['k_sdt'] ?></td>
                            <td><?php echo  sum_sluong($row['hd_id']) ?></td>
                            <td><?php echo $row['tongtien'] ?>đ</td>
                            <td><?php echo $row['note'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['hd_date'])) ?></td>
                            <td>
                                <?php
                                if ($action == 'Chờ lấy hàng') { ?>
                                    <button hd_id=<?php echo $row['hd_id'] ?> class="btn btn-primary xn" style="width:100%">Giao hàng</button>
                                <?php
                                }
                                if ($action == 'Đang vận chuyển') { ?>
                                    <button hd_id=<?php echo $row['hd_id'] ?> disabled class="btn btn-info xn" style="width:100%">Đang vận chuyển</button>
                                <?php   }

                                if ($action == 'Thành công') { ?>
                                    <button hd_id=<?php echo $row['hd_id'] ?> class="btn btn-secondary bienlai" style="width:100%">Biên lai</button>
                                    <br>
                                    <br>
                                    <button hd_id=<?php echo $row['hd_id'] ?> disabled class="btn btn-success xn" style="width:100%">Thành công</button>

                                <?php
                                }
                                ?>
                                <input type="text" id="status" value="<?php
                                                                        if ($action == 'Chờ lấy hàng') {
                                                                            echo '1';
                                                                        }
                                                                        if ($action == 'Đang vận chuyển') {
                                                                            echo '2';
                                                                        }
                                                                        ?>" dem="<?php echo count_status_ql($status) ?>" dem1="<?php echo count_status_ql($statuss) ?>" hidden>
                            </td>
                        </tr>
                        <div class="modal fade" id="bienlai<?php echo $row['hd_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ID Đơn hàng : <?php echo $row['hd_id']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="font-size: 13px;">
                                        <h4 style="text-align: center;">BOOK STORE</h4>
                                        <div class="container row">
                                            <div class="col-8">
                                                <div class="container fl">
                                                    <span>Mã vận đơn : <?php echo rand(100000, 999999) ?></span>
                                                    <br>
                                                    <span>Mã đơn hàng : <?php echo $row['hd_id']; ?> </span>
                                                    <br>
                                                    <span>Ngày : <?php echo date('d/m/Y', strtotime($row['hd_date'])); ?> </span>
                                                </div>
                                                <br>
                                                <div class="container send" style="border-bottom: black 2px dashed ;padding-bottom:20px">
                                                    <span>Người gửi : Shop BOOK STORE </span>
                                                    <br>
                                                    <span>Địa chỉ : 175 P. Tây Sơn, Trung Liệt, Đống Đa, Hà Nội</span>
                                                    <br>
                                                    <span>Số điện thoại : 024 3852 2201</span>
                                                    <br>
                                                </div>
                                                <div class="container get" style="border-bottom: black 2px dashed ;padding-bottom:20px">
                                                    <br>
                                                    <span>Người nhận : <?php echo $row['k_ten'] ?></span>
                                                    <br>
                                                    <span>Địa chỉ : <?php echo $row['k_diachi'] ?></span>
                                                    <br>
                                                    <span>SDT : <?php echo $row['k_sdt'] ?></span>
                                                    <br>
                                                </div>
                                                <div class="container">
                                                    <br>
                                                    <span>Sản phẩm : </span>
                                                    <br>
                                                    <?php
                                                    $chitiet = Chitiethd($row['hd_id'], $row['k_id']);
                                                    while ($row_ct = mysqli_fetch_assoc($chitiet)) { ?>
                                                        <span><?php echo $row_ct['s_ten'] ?> -- </span><span style="color: red;"> SL : <?php echo $row_ct['sluong'] ?></span>
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
                                                        <h6 style="font-style:20px ;color:red"><?php echo $row['tongtien'] ?>đ</h6>
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
                    }
                    ?>

                </tbody>
            </table>
        <?php
        } else { ?>
            <div class="kodh" id="status" value="0" dem="<?php echo count_status_ql($status) ?>" dem1="<?php echo count_status_ql($statuss) ?>">
                Chưa có đơn hàng <span class="mualai" sluong_st0="0"></span>
            </div>;
<?php
        }
    }
} else {
}
?>