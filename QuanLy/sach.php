<?php
include('./header_footer/header.php');
?>
<div class="main-content">
    <div class="container-fluid">
        <form class="row g-3 mt-3 d-flex justify-content-center">

            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Nhập tên sách...</label>
                <input type="text" class="form-control" id="inputPassword2" placeholder="Nhập tên sách...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn mb-3"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <a href="./them.php"><button class="btn btn-success mt-3">Thêm sách</button></a>

        <?php
        if (isset($_SESSION['addOK'])) {
            echo $_SESSION['addOK'];
            unset($_SESSION['addOK']);
        }
        ?>
        <?php
        if (isset($_SESSION['delOK'])) {
            echo $_SESSION['delOK'];
            unset($_SESSION['delOK']);
        }

        if (isset($_SESSION['updateOK'])) {
            echo $_SESSION['updateOK'];
            unset($_SESSION['updateOK']);
        }

        if (isset($_SESSION['updateNotOK'])) {
            echo $_SESSION['updateNotOK'];
            unset($_SESSION['updateNotOK']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Nhà XB</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Giảm giá</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include('../config/db.php');
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
                            <td><img src="../img/<?php echo $row['anh'] ?>" alt="" style="width: 200px;" class="img-fluid"></td>
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