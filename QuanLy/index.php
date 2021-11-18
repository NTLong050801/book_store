
<?php
include('../config/db.php');
include('./header_footer/header.php');
?>
<div class="main-content">
    <div class="container-fluid">
        <a href="./them.php"><button class="btn btn-success mt-3">Thêm sách</button></a>
        <?php
        if (isset($_SESSION['delOK'])) {
            echo $_SESSION['delOK'];
            unset($_SESSION['delOK']);
        }
        if (isset($_SESSION['addOK'])) {
            echo $_SESSION['addOK'];
            unset($_SESSION['addOK']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Nhà XB</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Năm xuất bản</th>
                    <th scope="col">Số trang</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ngôn ngữ</th>
                    <th scope="col">Lượt mua</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Giảm giá</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>

                <?php
               
                $sql = "SELECT * FROM sach, tacgia, theloai where sach.tg_id = tacgia.tg_id and sach.tl_id = theloai.tl_id";
                $rs = mysqli_query($conn, $sql);
                if (mysqli_num_rows($rs) > 0) {
                    while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['s_id'] ?></th>
                            <td><?php echo $row['s_ten'] ?></td>
                            <td><?php echo $row['tg_ten'] ?></td>
                            <td><?php echo $row['nxb'] ?></td>
                            <td><?php echo $row['tl_ten'] ?></td>
                            <td><?php echo $row['namxuatban'] ?></td>
                            <td><?php echo $row['sotrang'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['mota'] ?></td>
                            <td><?php echo $row['ngonngu'] ?></td>
                            <td><?php echo $row['luotmua'] ?></td>
                            <td><img src="../img/<?php echo $row['anh']?>" alt="" class="img-fluid"></td>
                            <td><?php echo $row['s_gia'] ?></td>
                            <td><?php echo $row['s_giamgia'] ?></td>
                            <td>
                                <a href="./sua.php?id=<?php echo $row['s_id'] ?>"><button class="btn"><i class="fas fa-edit"></i></button></a>
                                <a href="./xoa.php?id=<?php echo $row['s_id'] ?>"><button class="btn"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include('./header_footer/footer.php');
?>
<script>
     $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
</script>

