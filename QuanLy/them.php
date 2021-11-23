<?php
include('./header_footer/header.php');
include('../config/db.php');
?>

<?php
if (isset($_POST['btnThem'])) {
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
    $images2 = basename($_FILES['images2']['name']);
    $fileImg = "../Image/VanHoc/" . $images;
    $fileImg2 = "../Image/VanHoc/" . $images2;
    move_uploaded_file($_FILES['images2']['tmp_name'], $fileImg2);
    if (move_uploaded_file($_FILES['images']['tmp_name'], $fileImg)) {

        $sql = "INSERT INTO sach(s_ten,nxb, tg_id, tl_id, namxuatban, sotrang, soluong, ngonngu,anh, anh1, s_gia, s_giamgia, mota)
            VALUES ('$Name','$nhaXB','$TacGia','$TheLoai','$namXB','$SoTrang','$SoLuong','$NgonNgu','$images','$images2','$Gia','$GiamGia','$MoTa')";
        $rs = mysqli_query($conn, $sql);
        // echo $sql;
        if ($rs) {
            $_SESSION['addOK'] = "<h3 class='text-center text-success'>Thêm thành công</h3>";
            header('location: sach.php');
        } else {
            echo "Thêm không thành công";
        }
    }
}
?>



<h2 class='text-center'>Thêm sách</h2>

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                <input name="Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Nhà Xuất Bản</label>
                <input name="nhaXB" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Tác Giả</label>
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
                <input name="namXB" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Số trang</label>
                <input name="SoTrang" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                <input name="SoLuong" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Ngôn ngữ</label>
                <input name="NgonNgu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                <input name="images" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Ảnh thứ 2</label>
                <input name="images2" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Giá</label>
                <input name="Gia" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ms-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Giảm giá</label>
                <input name="GiamGia" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                <textarea name="MoTa" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>

        <button name="btnThem" class="btn btn-success">Thêm</button>
    </form>
</div>
<?php
include('./header_footer/footer.php');
?>