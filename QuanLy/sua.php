<?php
include('./header_footer/header.php');
include('../config/db.php');
?>

<?php
    $id = $_GET['id'];
if (isset($_POST['btnSua'])) {
    $Name = $_POST['Name'];
    $nhaXB = $_POST['nhaXB'];
    $TacGia = $_POST['TacGia'];
    $TheLoai = $_POST['TheLoai'];
    $namXB = $_POST['namXB'];
    $SoTrang = $_POST['SoTrang'];
    $SoLuong = $_POST['SoLuong'];
    $NgonNgu = $_POST['NgonNgu'];
    $Gia = $_POST['Gia'];
    $GiamGia = $_POST['GiamGia'];
    $MoTa = $_POST['MoTa'];
    $images = basename($_FILES['images']['name']);
    $fileImg = "../img/" . $images;
    // if (move_uploaded_file($_FILES['images']['tmp_name'], $fileImg)) {

        $sql = "UPDATE sach
                SET s_ten = '$Name',nxb = '$nhaXB', tg_id = '$TacGia' , tl_id = '$TheLoai', namxuatban = '$namXB',
                 sotrang = '$SoTrang', soluong = '$SoLuong', ngonngu = '$NgonNgu' ,anh = '$images' , s_gia = '$Gia', s_giamgia = '$GiamGia', mota = '$MoTa'              
                WHERE s_id = '$id'";
          $rs = mysqli_query($conn, $sql);
        if ($rs) {
            $_SESSION['updateOK'] = "<h3 class='text-center text-success'>Sửa thành công</h3>";
            header('location: sach.php');
        } else {
            $_SESSION['updateNotOK'] = "<h3 class='text-center text-success'>Sửa không thành công</h3>";
            header('location: sach.php');
        }
    }

// }
?>
<?php
    $sql2 = "SELECT * FROM sach where s_id = '$id'";
    $rs2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($rs2);
?>

<h2 class='text-center'>Thêm sách</h2>

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">ID</label>
                <input readonly value="<?php echo $row2['s_id']?>" name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-3 ms-3">
                <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                <input value="<?php echo $row2['s_ten']?>" name="Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Nhà Xuất Bản</label>
                <input value="<?php echo $row2['nxb']?>" name="nhaXB" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">TacGia</label>
                <select name="TacGia" class="form-select" aria-label="Default select example">
                    <?php
                    $sql_tacGia = "SELECT * FROM tacgia";
                    $rs_tacGia = mysqli_query($conn, $sql_tacGia);
                    if (mysqli_num_rows($rs_tacGia) > 0) {
                        while ($row_tacGia = mysqli_fetch_assoc($rs_tacGia)) {
                            echo "<option value='" . $row_tacGia['tg_id'] . "'>" . $row_tacGia['tg_ten'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Thể loại</label>
                <select name="TheLoai" class="form-select" aria-label="Default select example">
                    <?php
                    $sql_theLoai = "SELECT * FROM theloai";
                    $rs_theLoai = mysqli_query($conn, $sql_theLoai);
                    if (mysqli_num_rows($rs_theLoai) > 0) {
                        while ($row_theLoai = mysqli_fetch_assoc($rs_theLoai)) {
                            echo "<option value='" . $row_theLoai['tl_id'] . "'>" . $row_theLoai['tl_ten'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Năm xuất bản</label>
                <input value="<?php echo $row2['namxuatban']?>" name="namXB" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Số trang</label>
                <input value="<?php echo $row2['sotrang']?>" name="SoTrang" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                <input value="<?php echo $row2['soluong']?>" name="SoLuong" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Ngôn ngữ</label>
                <input value="<?php echo $row2['ngonngu']?>" name="NgonNgu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <!-- <img src="../img/" alt="" style="height:200px; width: auto;"> -->
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                <input name="images" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Giá</label>
                <input value="<?php echo $row2['s_gia']?>" name="Gia" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Giảm giá</label>
                <input value="<?php echo $row2['s_giamgia']?>" name="GiamGia" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                <textarea name="MoTa" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row2['mota']?></textarea>
            </div>
        </div>

        <button name="btnSua" class="btn btn-success">Sửa</button>
    </form>
</div>
<?php
include('./header_footer/footer.php');
?>