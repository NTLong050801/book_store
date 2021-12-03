<?php

function pageRecord()
{
    include('../config/db.php');
    $tl_id = $_POST['tl_id'];

    $sql_phanTrang = mysqli_query($conn, "SELECT count(sach.s_id) as slSach FROM sach , giohang , theloai where theloai.tl_id = sach.tl_id and sach.s_id = giohang.s_id and sach.tl_id = '$tl_id'");
    $rowSL = mysqli_fetch_assoc($sql_phanTrang);
    $slSach = $rowSL['slSach'];

    $limit = 5;
    $total_page = ceil($slSach / $limit);

    echo $total_page;
    // if($current_page > $total_page){
    //     $current_page = $total_page;
    // }
    // else if($current_page < 1){
    //     $current_page = 1;
    // }
}


function spTuongTu()
{
    include('../config/db.php');
    $tl_id = $_POST['tl_id'];
    $_SESSION['tl_id'] = $tl_id;
    if (isset($_POST['trangHienTai'])) {
        $current_page = $_POST['trangHienTai'];
    } else {
        $current_page = 1;
    }

    $sql_phanTrang = mysqli_query($conn, "SELECT count(sach.s_id) as slSach FROM sach where  sach.tl_id = '$tl_id'");
    $rowSL = mysqli_fetch_assoc($sql_phanTrang);
    $slSach = $rowSL['slSach'];
    $limit = 5;
    $current_pages = ($current_page - 1) * $limit;
    $total_page = ceil($slSach / $limit);
    $i;

    $spTuongTu = "SELECT DISTINCT s_id, anh , s_ten , s_gia , sach.tl_id as idTL FROM sach where sach.tl_id = '$tl_id' LIMIT $current_pages,$limit";
    $rsSPTuongTu = mysqli_query($conn, $spTuongTu);
    if (mysqli_num_rows($rsSPTuongTu) > 0) {
        while ($rowSPTT = mysqli_fetch_assoc($rsSPTuongTu)) {
?>
            <div class="card mb-3" style="width: 18%;">
                <img style="width:100%;" src="../Image/VanHoc/<?php echo $rowSPTT['anh'] ?>" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rowSPTT['s_ten'] ?></h5>
                    <p class="card-text"><?php echo $rowSPTT['s_gia'] - $rowSPTT['s_gia']*$rowSPTT['s_giamgia'] / 100 ?></p>

                    <a href="book.php?s_id=<?php echo $rowSPTT['s_id']?>" class="btn btn-primary">Mua</a>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <!-- Phân trang -->

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <?php

            for ($i = 1; $i <= $total_page; $i++) {
            ?>
                <li class="page-item"><a tl_id="<?php echo $_SESSION['tl_id'] ?>" class="page-link page-current" href="#"><?php echo $i; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    <!-- Phân trang -->
<?php
}

function delSP()
{
    // include('./function.php');
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $delCart = mysqli_query($conn, "DELETE FROM giohang where k_id = '$k_id' and s_id = '$s_id' ");
    // $delCart = delete_Cart($k_id, $s_id);
    if ($delCart) {
        echo "Xóa thành công";
    } else {
        echo "Xóa không thành công";
    }
}
function delAllSP()
{
    // include('./function.php');
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $delCart = mysqli_query($conn, "DELETE FROM giohang where k_id = '$k_id' and s_id = '$s_id' ");
    if ($delCart) {
        echo "Xóa thành công";
    } else {
        echo "Xóa không thành công";
    }
}
function updateSL()
{
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $soLuong = $_POST['soLuong'];
    $updateSL = mysqli_query($conn, "UPDATE giohang SET gh_soluong = '$soLuong' where s_id = '$s_id' and k_id = '$k_id'");
    // if($updateSL){
    //     echo "OK";
    // }
    // else{
    //     echo "Npt ok";
    // }
}

function updateTienHD()
{
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $updateTienHD = mysqli_query($conn, "UPDATE giohang SET tongTienHoaDon = gh_soluong*tongtien where s_id='$s_id' and k_id = '$k_id'");
}
if (isset($_POST['action'])) {
    if ($_POST['action'] == "delSP") {
        delSP();
    }
    if ($_POST['action'] == "delAllSP") {
        delAllSP();
    }
    if ($_POST['action'] == "updateSL") {
        updateSL();
        updateTienHD();
    }
    if ($_POST['action'] == "spTuongTu") {
        // pageRecord();
        spTuongTu();
    }
}
