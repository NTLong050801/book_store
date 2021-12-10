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
        $arr = [$row['s_ten'], $row['s_gia'], $row['s_giamgia'], $row['nxb'], $row['namxuatban'], $row['sotrang'], $row['mota'], $row['soluong'], $row['luotmua'], $row['ngonngu'], $row['tg_ten'], $row['tl_ten'], $row['anh'], $row['anh1']];
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
        $tl_id = $_POST['tl_id'];
        $tg_id = $_POST['tg_id'];
        $anh = $_POST['anh'];
        $anh1 = $_POST['anh1'];
        if ($anh == '' && $anh1 == '') {
            $sql = "UPDATE sach set s_ten = '$s_ten',s_gia = '$s_gia',s_giamgia = '$s_giamgia',nxb = '$nxb',namxuatban = '$namxuatban',
            sotrang = '$sotrang',mota = '$mota',soluong = '$soluong',ngonngu = '$ngonngu',tl_id = '$tl_id',tg_id = '$tg_id' where s_id = '$s_id'";
        }
        if ($anh != '' && $anh1 != '') {
            $arr = explode("\\", $anh);
            $img = $arr[sizeof($arr) - 1];
            $arr1 = explode("\\", $anh1);
            $img1 = $arr[sizeof($arr) - 1];
            $sql = "UPDATE sach set s_ten = '$s_ten',s_gia = '$s_gia',s_giamgia = '$s_giamgia',nxb = '$nxb',namxuatban = '$namxuatban',
            sotrang = '$sotrang',mota = '$mota',soluong = '$soluong',ngonngu = '$ngonngu',tl_id = '$tl_id',
            tg_id = '$tg_id' , anh = '$img',anh1 = '$img1' where s_id = '$s_id'";
        }
        if ($anh != '' && $anh1 == '') {
            $arr = explode("\\", $anh);
            $img = $arr[sizeof($arr) - 1];
            // $arr1 = explode("\\",$anh);
            // $img1 = $arr[sizeof($arr)-1];
            $sql = "UPDATE sach set s_ten = '$s_ten',s_gia = '$s_gia',s_giamgia = '$s_giamgia',nxb = '$nxb',namxuatban = '$namxuatban',
            sotrang = '$sotrang',mota = '$mota',soluong = '$soluong',ngonngu = '$ngonngu',tl_id = '$tl_id',
            tg_id = '$tg_id' , anh = '$img' where s_id = '$s_id'";
        }
        if ($anh == '' && $anh1 != '') {
            // $arr = explode("\\",$anh);
            // $img = $arr[sizeof($arr)-1];
            $arr1 = explode("\\", $anh);
            $img1 = $arr[sizeof($arr) - 1];
            $sql = "UPDATE sach set s_ten = '$s_ten',s_gia = '$s_gia',s_giamgia = '$s_giamgia',nxb = '$nxb',namxuatban = '$namxuatban',
            sotrang = '$sotrang',mota = '$mota',soluong = '$soluong',ngonngu = '$ngonngu',tl_id = '$tl_id',
            tg_id = '$tg_id' ,anh1 = '$img1' where s_id = '$s_id'";
        }
        $qr = mysqli_query($conn, $sql);
    }
    if ($action == 'Thêm sách') {
        echo $_POST['s_gia'];
        //$check = getimagesize($_FILES["anh"]["tmp_name"]);
        //$img = $_POST['anhchinh'];
        //echo $img;
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


    ?>
    <button class="btn btn-success add_s" style="margin:30px 0;text-align:  center;">Thêm sách</button>
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
            $qr = slt_sach_tl($tl_id, $dem, $sosach1trang);
            if (mysqli_num_rows($qr) > 0) {
                while ($row = mysqli_fetch_assoc($qr)) {

            ?> <tr>

                        <td>
                            <img style="height: 100px;" class="img fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                            <span style="margin-left: 20px"><?php echo $row['s_ten'] ?></span>
                        </td>
                        <td style="color: red;"><?php echo $row['s_gia'] ?>đ</td>
                        <td><?php echo $row['s_giamgia'] ?></td>
                        <td><?php echo $row['soluong'] ?></td>
                        <td><?php echo $row['luotmua'] ?></td>
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
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $tongsotrang; $i++) { ?>
                    <li tl_id=<?php echo $tl_id ?> class="page-item <?php if ($tranghientai == $i) {
                                                                        echo 'active';
                                                                    } ?>" tranghientai=<?php echo $i ?>><a class="page-link" href="#"><?php echo $i ?></a></li>
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
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
<?php
    }
}
?>