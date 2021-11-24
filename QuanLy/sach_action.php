<?php
function showBookTheLoai()
{
    // $idTL = $_POST['idTL'];
    $idTL = isset($_GET['idtl']) ? $_GET['idtl'] : $_POST['idTL'];
    include('../config/db.php');

    //Đếm số bản ghi
    $sql_dem = "SELECT count(s_id) as total from sach where tl_id = $idTL";
    $rs_dem = mysqli_query($conn, $sql_dem);
    $row_dem = mysqli_fetch_assoc($rs_dem);
    $total_record = $row_dem['total'];

    //Trang hiện tại
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Số bản ghi 1 trang
    $limit = 10;

    //Tổng số trang (ceil là làm tròn lên)
    $total_page = ceil($total_record / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    //Tìm start
    $start = ($current_page - 1) * $limit;

    //Truy vấn lấy dữ liệu

    $sql = "SELECT * FROM sach, tacgia, theloai where theloai.tl_id = '$idTL' and sach.tg_id = tacgia.tg_id and sach.tl_id = theloai.tl_id
    LIMIT $start , $limit";
    $rs = mysqli_query($conn, $sql);

?>
    <table class="table" id="sachTable">
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
        <tbody id="bodyTable">

            <?php
            if (mysqli_num_rows($rs) > 0) {
                while ($row = mysqli_fetch_assoc($rs)) {
            ?>
                    <tr>
                        <td scope="row"><?php echo $row['s_id'] ?></td>
                        <td><?php echo $row['s_ten'] ?></td>
                        <td><?php echo $row['tg_ten'] ?></td>
                        <td><?php echo $row['nxb'] ?></td>
                        <td><img src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="" style="width: 200px;" class="img-fluid"></td>
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
    <div class="container">
        <div class="d-flex justify-content-center ms-2">
            <?php
            if ($current_page > 1 && $total_page > 1) {
                echo '<a  class="ms-2" style="text-decoration: none;" href="sach.php?page=' . ($current_page - 1) . '&idtl='.$idTL.'">Trang trước</a>';
            }

            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<span class="ms-2">' . $i . '</span>';
                } else {
                    echo '<a class="ms-2" style="text-decoration: none;" href="sach.php?page=' . $i .  '&idtl='.$idTL.'">' . $i . '</a>';
                }
            }

            if ($current_page < $total_page && $total_page > 1) {
                echo '<a  class="ms-2" style="text-decoration: none;" href="sach.php?page=' . ($current_page + 1) .  '&idtl='.$idTL.'">Trang sau</a>';
            }
            ?>
        </div>
    </div>
<?php

}



function searchTen()
{
    $txtBooks = $_POST['txtBooks'];

    include('../config/db.php');

    //Đếm số bản ghi
    $sql_dem = "SELECT count(s_id) as total from sach where sach.s_ten LIKE '%$txtBooks%'";
    $rs_dem = mysqli_query($conn, $sql_dem);
    $row_dem = mysqli_fetch_assoc($rs_dem);
    $total_record = $row_dem['total'];

    //Trang hiện tại
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Số bản ghi 1 trang
    $limit = 10;

    //Tổng số trang (ceil là làm tròn lên)
    $total_page = ceil($total_record / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    //Tìm start
    $start = ($current_page - 1) * $limit;

    //Truy vấn lấy dữ liệu

    $sql = "SELECT * FROM sach, tacgia, theloai where sach.s_ten LIKE '%$txtBooks%' and sach.tg_id = tacgia.tg_id and sach.tl_id = theloai.tl_id
    LIMIT $start , $limit";
    $rs = mysqli_query($conn, $sql);
?>
    <table class="table" id="sachTable">
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
        <tbody id="bodyTable">

            <?php
            if (mysqli_num_rows($rs) > 0) {
                while ($row = mysqli_fetch_assoc($rs)) {
            ?>
                    <tr>
                        <td scope="row"><?php echo $row['s_id'] ?></td>
                        <td><?php echo $row['s_ten'] ?></td>
                        <td><?php echo $row['tg_ten'] ?></td>
                        <td><?php echo $row['nxb'] ?></td>
                        <td><img src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="" style="width: 200px;" class="img-fluid"></td>
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
    <div class="container">
        <div class="d-flex justify-content-center ms-2">
            <?php
            if ($current_page > 1 && $total_page > 1) {
                echo '<a  class="ms-2" style="text-decoration: none;" href="sach.php?page=' . ($current_page - 1) . '">Trang trước</a>';
            }

            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<span class="ms-2">' . $i . '</span>';
                } else {
                    echo '<a class="ms-2" style="text-decoration: none;" href="sach.php?page=' . $i . '">' . $i . '</a>';
                }
            }

            if ($current_page < $total_page && $total_page > 1) {
                echo '<a  class="ms-2" style="text-decoration: none;" href="sach.php?page=' . ($current_page + 1) . '">Trang sau</a>';
            }
            ?>
        </div>
    </div>
<?php
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'theloai') {
        showBookTheLoai();
    }
    if ($_POST['action'] == 'search') {
        searchTen();
    }
}
?>