<?php
include('../config/db.php');
include('./ham.php');
?>
<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    //lấy dữ liệu
    if ($action == 'Sửa') {
        $s_id = $_POST['s_id'];
        $qr = slt_sach_tl_tg($s_id);
        $row = mysqli_fetch_assoc($qr);
        $arr = [$row['s_ten'], $row['s_gia'], $row['s_giamgia'], $row['nxb'], $row['namxuatban'], $row['sotrang'], $row['mota'], $row['soluong'], $row['luotmua'], $row['ngonngu'], $row['tg_ten'], $row['tl_ten'], $row['anh'], $row['anh1'], $row['s_id']];
        echo json_encode($arr);
    }
    if ($action == 'xn sửa') {
        $s_id = $_POST['s_id'];
        $s_ten = $_POST['s_ten'];
        $s_gia = $_POST['s_gia'];
        $s_giamgia = $_POST['s_giamgia'];
        $nxb = $_POST['nxb'];
        $namxuatban = $_POST['namxuatban'];
        $sotrang = $_POST['sotrang'];
        $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        $ngonngu = $_POST['ngonngu'];
        $tl_id = $_POST['sl_tl_id'];
        $tg_id = $_POST['sl_tg_id'];
        $anh = $_FILES['anhchinh']['name'];
        $anh1 = $_FILES['anhphu']['name'];
        $tempname = $_FILES["anhchinh"]["tmp_name"];
        $folder = '../Image/Vanhoc/' . $anh;
        move_uploaded_file($tempname, $folder);

        $tempname_p = $_FILES["anhphu"]["tmp_name"];
        $folder_p = '../Image/Vanhoc/' . $anh1;
        move_uploaded_file($tempname_p, $folder_p);
        if ($anh == '' && $anh1 == '') {
            $sql = "UPDATE sach set s_ten = '$s_ten',s_gia = '$s_gia',s_giamgia = '$s_giamgia',nxb = '$nxb',namxuatban = '$namxuatban',
            sotrang = '$sotrang',mota = '$mota',soluong = '$soluong',ngonngu = '$ngonngu',tl_id = '$tl_id',tg_id = '$tg_id' where s_id = '$s_id'";
        }
        if ($anh != '' && $anh1 != '') {

            $sql = "UPDATE sach set s_ten = '$s_ten',s_gia = '$s_gia',s_giamgia = '$s_giamgia',nxb = '$nxb',namxuatban = '$namxuatban',
            sotrang = '$sotrang',mota = '$mota',soluong = '$soluong',ngonngu = '$ngonngu',tl_id = '$tl_id',
            tg_id = '$tg_id' , anh = '$anh',anh1 = '$anh1' where s_id = '$s_id'";
        }
        if ($anh != '' && $anh1 == '') {
            $sql = "UPDATE sach set s_ten = '$s_ten',s_gia = '$s_gia',s_giamgia = '$s_giamgia',nxb = '$nxb',namxuatban = '$namxuatban',
            sotrang = '$sotrang',mota = '$mota',soluong = '$soluong',ngonngu = '$ngonngu',tl_id = '$tl_id',
            tg_id = '$tg_id' , anh = '$anh' where s_id = '$s_id'";
        }
        if ($anh == '' && $anh1 != '') {
            // $arr = explode("\\",$anh);
            // $anh = $arr[sizeof($arr)-1];
            // $arr1 = explode("\\", $anh);
            // $anh1 = $arr[sizeof($arr) - 1];
            $sql = "UPDATE sach set s_ten = '$s_ten',s_gia = '$s_gia',s_giamgia = '$s_giamgia',nxb = '$nxb',namxuatban = '$namxuatban',
            sotrang = '$sotrang',mota = '$mota',soluong = '$soluong',ngonngu = '$ngonngu',tl_id = '$tl_id',
            tg_id = '$tg_id' ,anh1 = '$anh1' where s_id = '$s_id'";
        }
        $qr = mysqli_query($conn, $sql);
    }
    if ($action == 'Thêm sách') {
        $s_ten = $_POST['s_ten'];
        $s_gia = $_POST['s_gia'];
        $s_giamgia =  $_POST['s_giamgia'];
        $nxb =  $_POST['nxb'];
        $namxuatban =  $_POST['namxuatban'];
        $sotrang =  $_POST['sotrang'];
        $soluong =  $_POST['soluong'];
        $mota =  $_POST['mota'];
        $ngonngu =  $_POST['ngonngu'];
        $slt_tl_id =  $_POST['slt_tl_id'];
        $slt_tg_id = $_POST['slt_tg_id'];
        $anhchinh = $_FILES['anhchinh']['name'];
        $tempname = $_FILES["anhchinh"]["tmp_name"];
        $folder = '../Image/Vanhoc/' . $anhchinh;
        move_uploaded_file($tempname, $folder);
        $anhphu = $_FILES['anhphu']['name'];
        if ($anhchinh != '' && $anhphu == '') {
            $sql = "INSERT INTO `sach`( `s_ten`, `s_gia`, `s_giamgia`, `nxb`, `namxuatban`, `sotrang`, `mota`,
             `soluong`, `ngonngu`, `tg_id`, `tl_id`, `anh`) 
            VALUES ('$s_ten','$s_gia','$s_giamgia','$nxb','$namxuatban','$sotrang','$mota',
            '$soluong','$ngonngu','$slt_tg_id','$slt_tl_id','$anhchinh')";
            $qr = mysqli_query($conn, $sql);
        }
        if ($anhchinh != '' && $anhphu != '') {
            $tempname_p = $_FILES["anhphu"]["tmp_name"];
            $folder_p = '../Image/Vanhoc/' . $anhphu;
            move_uploaded_file($tempname_p, $folder_p);
            $sql1 = "INSERT INTO `sach`( `s_ten`, `s_gia`, `s_giamgia`, `nxb`, `namxuatban`, `sotrang`, `mota`,
             `soluong`, `ngonngu`, `tg_id`, `tl_id`, `anh`,`anh1`) 
            VALUES ('$s_ten','$s_gia','$s_giamgia','$nxb','$namxuatban','$sotrang','$mota',
            '$soluong','$ngonngu','$slt_tg_id','$slt_tl_id','$anhchinh','$anhphu')";
            // echo $sql1;
            $qr = mysqli_query($conn, $sql1);
        }
        if ($anhchinh == '') {
            echo 'Yêu cầu thêm ảnh';
        }
        if (isset($qr)) {
            if ($qr) {
                echo 'Thêm sách thành công';
            } else {
                echo 'Thêm thất bại';
            }
        }
    }
    // load data thể loại
    if ($action == 'ql_tl') { ?>
        <button class="btn btn-success add_tl" style="margin:30px 0;text-align:  center;">Thêm thể loại</button>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col" class="col-1">STT</th>
                    <th scope="col" class="col-6">Tên thể loại</th>
                    <th scope="col" class="col-3">Số lượng sách</th>
                    <th scope="col" class="col-2">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qr = slt_theloai();
                if (mysqli_num_rows($qr) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($qr)) { ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['tl_ten'] ?></td>
                            <td><?php echo count_sach_tl($row['tl_id'])  ?></td>
                            <td>
                                <button class="btn btn-warning update_tl" tl_id=<?php echo $row['tl_id'] ?>>Sửa</button>
                                <button class="btn btn-danger delete_tl" tl_id=<?php echo $row['tl_id'] ?>>Xóa</button>
                            </td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>

    <?php
    }
    // xóa thể loại
    if ($action == 'delete_tl') {
        $tl_id = $_POST['tl_id'];
        $qr =  delete_theloai($tl_id);
        if ($qr) {
            echo 'Xóa thành công';
        } else {
            echo 'Chỉ xóa thể loại khi không có sách ';
        }
    }
    //xóa tác giả
    if ($action == 'delete_tg') {
        $tg_id = $_POST['tg_id'];
        $qr =  delete_tacgia($tg_id);
        if ($qr) {
            echo 'Xóa thành công';
        } else {
            echo 'Chỉ xóa tác giả khi không có sách ';
        }
    }

    // lấy data thể loại
    if ($action == 'get_data_tl') {
        $tl_id = $_POST['tl_id'];
        $qr = slt_theloai_id($tl_id);
        $row = mysqli_fetch_assoc($qr);
        $arr = [$row['tl_id'], $row['tl_ten']];
        echo json_encode($arr);
    }

    //lấy data tác giả
    if ($action == 'get_data_tg') {
        $tg_id = $_POST['tg_id'];
        $qr = slt_tacgia_id($tg_id);
        $row = mysqli_fetch_assoc($qr);
        $arr = [$row['tg_id'], $row['tg_ten']];
        echo json_encode($arr);
    }
    //update thể loại to mysql
    if ($action == 'update_theloai') {
        $tl_id = $_POST['tl_id'];
        $tl_ten = $_POST['tl_ten'];
        $qr = update_theloai($tl_id, $tl_ten);
        // echo $qr;
        if ($qr == '1') {
            echo 'Update thành công';
        }
        // else {
        //     echo 'Thể loại đã tồn tại';
        // }
    }

    //update tác giả to mysql
    if ($action == 'update_tacgia') {
        $tg_id = $_POST['tg_id'];
        $tg_ten = $_POST['tg_ten'];
        $qr = update_tacgia($tg_id, $tg_ten);
        // echo $qr;
        if ($qr == '1') {
            echo 'Update thành công';
        }
        // else {
        //     echo 'Thể loại đã tồn tại';
        // }
    }

    if ($action == 'add_tl') {
        $tl_ten = $_POST['tl_ten'];
        $qr = insert_tl($tl_ten);
        if ($qr) {
            echo 'Thêm thành công';
        }
    }
    if ($action == 'add_tg') {
        $tg_ten = $_POST['tg_ten'];
        $qr = insert_tg($tg_ten);
        if ($qr) {
            echo 'Thêm thành công';
        }
    }

    if ($action == 'ql_tg') { ?>
        <button class="btn btn-success add_tg" style="margin:30px 0;text-align:  center;">Thêm tác giả</button>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col" class="col-1">STT</th>
                    <th scope="col" class="col-6">Tên tác giả</th>
                    <th scope="col" class="col-3">Số lượng sách</th>
                    <th scope="col" class="col-2">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qr = slt_tacgia();
                if (mysqli_num_rows($qr) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($qr)) { ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['tg_ten'] ?></td>
                            <td><?php echo count_sach_tg($row['tg_id'])  ?></td>
                            <td>
                                <button class="btn btn-warning update_tg" tg_id=<?php echo $row['tg_id'] ?>>Sửa</button>
                                <button class="btn btn-danger delete_tg" tg_id=<?php echo $row['tg_id'] ?>>Xóa</button>
                            </td>
                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>

        <?php
    }

    if ($action == "search") {
        $val_search = $_POST['val_search'];
        $qr = search_sach($val_search);
        if (mysqli_num_rows($qr) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($qr)) { ?>
                <div style="cursor: pointer;" class="output_search<?php echo $i ?> alert alert-dark" role="alert"><?php echo preg_replace('/\b(' . $val_search . ')\b/i', '<span style = "color:red">' . $val_search . '</span>', $row['s_ten']) ?></div>
            <?php
                $i++;
            }
        } else { ?>
            <div class="alert alert-danger" role="alert">
                Không có sách này
            </div>
        <?php
        }
    }
    if ($action == 'get_data_search') {
        $vals = $_POST['vals'];
        $qr = search_sach($vals);
        if (mysqli_num_rows($qr) > 0) {
        ?>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col" class="col-6">Tên sách</th>
                        <th scope="col" class="col-1">Giá</th>
                        <th scope="col" class="col-1">% giảm giá</th>
                        <th scope="col" class="col-1">Số lượng </th>
                        <th scope="col" class="col-1">Lượt mua</th>
                        <th scope="col" class="col-6">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($qr)) {

                    ?> <tr>

                            <td>
                                <img style="height: 100px;" class="img fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                                <span style="margin-left: 20px"><?php echo $row['s_ten'] ?></span>
                            </td>
                            <td style="color: red;"><?php echo $row['s_gia'] ?>đ</td>
                            <td><?php echo $row['s_giamgia'] ?></td>
                            <td style="color: blue;<?php if (isset($action_ss)) {
                                                        echo 'background-color: #00e7ff6b;';
                                                    } ?>"><?php echo $row['soluong'] ?></td>
                            <td style="color: #ff00f7;<?php if (isset($action_s)) {
                                                            echo 'background-color: #00e7ff6b;';
                                                        } ?>"><?php echo $row['luotmua'] ?></td>
                            <td>
                                <button class="btn btn-warning sua" tl_id=<?php echo $row['tl_id'] ?> s_id=<?php echo $row['s_id'] ?>>Sửa</button>
                                <button class="btn btn-danger xoa" tl_id=<?php echo $row['tl_id'] ?> s_id=<?php echo $row['s_id'] ?>>Xóa</button>
                            </td>
                            
                        <?php

                    }
                        ?>

                        </tr>

                </tbody>
            </table>
    <?php
        } else {
            echo '<div class="container" style="text-align: center;margin-top:100px">
            <h4 style="color: red;">Không tìm thấy sách này !</h4>
        </div>';
        }
    }
} else {


    if (isset($_POST['s_id'])) {
        $s_id = $_POST['s_id'];
        delete_sach($s_id);
    }

    if (isset($_POST['tl_id'])) {
        $tl_id = $_POST['tl_id'];
    } else {
        $tl_id = 1;
    }
    if (isset($_POST['action_s'])) {
        $action_s = $_POST['action_s'];
        //echo $action_s;
    }
    if (isset($_POST['action_ss'])) {
        $action_ss = $_POST['action_ss'];
        //echo $action_s;
    }

    ?>
    <div class="row">
        <div class='col-4'>
            <button class="btn btn-success add_s" style="margin:30px 0;text-align:  center;">Thêm sách</button>
        </div>

        <div class=" col-4 dropdown">
            <button class="sapxep btn <?php if (isset($action_s)) {
                                            echo 'btn-warning';
                                        } else {
                                            echo 'btn-secondary';
                                        } ?> dropdown-toggle title_luotmua" style="margin:30px 0;text-align:  center;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if (isset($action_s)) {
                    echo 'Lượt mua : ' . $action_s;
                } else {
                    echo 'Sắp xếp theo lượt mua';
                } ?>
            </button>
            <ul class="dropdown-menu luotmua" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Thấp đến cao</a></li>
                <li><a class="dropdown-item" href="#">Cao đến thấp</a></li>
            </ul>
        </div>

        <div class="col-4 dropdown">
            <button class="sapxep btn <?php if (isset($action_ss)) {
                                            echo 'btn-warning';
                                        } else {
                                            echo 'btn-secondary';
                                        } ?> dropdown-toggle title_luotmua" style="margin:30px 0;text-align:  center;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if (isset($action_ss)) {
                    echo 'Số lượng : ' . $action_ss;
                } else {
                    echo 'Sắp xếp theo số lượng trong kho';
                } ?>
            </button>
            <ul class="dropdown-menu sluongkho" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Thấp đến cao</a></li>
                <li><a class="dropdown-item" href="#">Cao đến thấp</a></li>
            </ul>
        </div>
    </div>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col" class="col-6">Tên sách</th>
                <th scope="col" class="col-1">Giá</th>
                <th scope="col" class="col-1">% giảm giá</th>
                <th scope="col" class="col-1">Số lượng </th>
                <th scope="col" class="col-1">Lượt mua</th>
                <th scope="col" class="col-6">Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php
            //nếu ko tồn tại tranghientai truyền sang thì tranghientai = 1;
            if (!isset($_POST['tranghientai'])) {
                $tranghientai = 1;
            } else {
                //trang hiện tại bằng tranghientai truyền sang
                $tranghientai = $_POST['tranghientai'];
            }
            //số sách 1 trang
            $sosach1trang = 10;
            //tổng số sách
            // $tl_id = $_SESSION['tl_id'];
            $tongsosach = count_sach_tl($tl_id);

            // tống số trang
            $tongsotrang = ceil($tongsosach / $sosach1trang);
            $dem = ($tranghientai - 1) * $sosach1trang;
            if (isset($action_s)) {
                if ($action_s == 'Thấp đến cao') {
                    $qr = slt_sach_luotmua_asc($tl_id, $dem, $sosach1trang);
                }
                if ($action_s == 'Cao đến thấp') {
                    $qr = slt_sach_luotmua_desc($tl_id, $dem, $sosach1trang);
                }
            } else if (isset($action_ss)) {
                if ($action_ss == 'Thấp đến cao') {
                    $qr = slt_sach_soluong_asc($tl_id, $dem, $sosach1trang);
                }
                if ($action_ss == 'Cao đến thấp') {
                    $qr = slt_sach_soluong_desc($tl_id, $dem, $sosach1trang);
                }
            } else {
                $qr = slt_sach_tl($tl_id, $dem, $sosach1trang);
            }

            if (mysqli_num_rows($qr) > 0) {
                while ($row = mysqli_fetch_assoc($qr)) {

            ?> <tr>

                        <td>
                            <img style="height: 100px;" class="img fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                            <span style="margin-left: 20px"><?php echo $row['s_ten'] ?></span>
                        </td>
                        <td style="color: red;"><?php echo $row['s_gia'] ?>đ</td>
                        <td><?php echo $row['s_giamgia'] ?></td>
                        <td style="color: blue;<?php if (isset($action_ss)) {
                                                    echo 'background-color: #00e7ff6b;';
                                                } ?>"><?php echo $row['soluong'] ?></td>
                        <td style="color: #ff00f7;<?php if (isset($action_s)) {
                                                        echo 'background-color: #00e7ff6b;';
                                                    } ?>"><?php echo $row['luotmua'] ?></td>
                        <td>
                            <button class="btn btn-warning sua" tl_id=<?php echo $tl_id ?> tranghientai=<?php echo $tranghientai ?> s_id=<?php echo $row['s_id'] ?>>Sửa</button>
                            <button class="btn btn-danger xoa" tl_id=<?php echo $tl_id ?> tranghientai=<?php echo $tranghientai ?> s_id=<?php echo $row['s_id'] ?>>Xóa</button>
                        </td>

                <?php
                }
            }
                ?>

                    </tr>

        </tbody>
    </table>
    <?php
    if ($tongsotrang > 0) { ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li tl_id=<?php echo $tl_id ?> class="page-item <?php if ($tranghientai == 1) {
                                                                    echo 'disabled';
                                                                } ?>" tranghientai=<?php if ($tranghientai > 1) {
                                                                                    echo $tranghientai - 1;
                                                                                } else {
                                                                                    echo '1';
                                                                                }  ?>>
                    <a class="page-link" href="#data_sach" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $tongsotrang; $i++) { ?>
                    <li tl_id=<?php echo $tl_id ?> class="page-item <?php if ($tranghientai == $i) {
                                                                        echo 'active';
                                                                    } ?>" tranghientai=<?php echo $i ?>><a class="page-link" href="#data_sach"><?php echo $i ?></a></li>
                <?php
                }
                ?>
                <li tl_id=<?php echo $tl_id ?> class="page-item <?php if ($tranghientai == $tongsotrang) {
                                                                    echo 'disabled';
                                                                } ?>" tranghientai=<?php if ($tranghientai + 1 <= $tongsotrang) {
                                                                                    echo $tranghientai + 1;
                                                                                } else {
                                                                                    echo $tongsotrang;
                                                                                }  ?>>
                    <a class="page-link" href="#data_sach">Next</a>
                </li>
            </ul>
        </nav>
<?php
    }
}
?>