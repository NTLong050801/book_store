<?php
function showSP()
{
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $email_kh = $_SESSION['check_login'];
    $sql = "SELECT  giohang.s_id as sachID, khach.k_id as idKhach, anh, s_ten, gh_soluong , tongtien FROM giohang, sach, khach where k_email = '$email_kh'  and giohang.k_id = khach.k_id and giohang.s_id = sach.s_id";

    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_array($rs)) {
?>
            <tr>
                <td><input s_id="<?php echo $row['sachID'] ?>" k_id="<?php echo $row['idKhach'] ?>" class="checkSP" name="checkSP" type="checkbox"></td>
                <td>
                    <img height="50" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                    <?php
                    echo $row['s_ten'];
                    ?>
                </td>
                <td>
                    <p id="tongTien<?php echo $row['sachID'] ?>"><?php echo $row['tongtien'] ?></p>
                </td>
                <td><input s_id="<?php echo $row['sachID'] ?>" k_id="<?php echo $row['idKhach'] ?>" class="soLuong" value="<?php echo $row['gh_soluong'] ?>" type="number" min="0" max="10"></td>
                <td>
                    <p id="soTien<?php echo $row['sachID'] ?>"><?php echo $row['tongtien'] * $row['gh_soluong'] ?></p>
                </td>
                <td>
                    <button s_id="<?php echo $row['sachID'] ?>" k_id="<?php echo $row['idKhach'] ?>" id="liveToastBtn" class="btn btn-danger btnXoa">Xóa</button>
                </td>
            </tr>

<?php
        }
    }
}

function deleteSP(){
    include('../config/db.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $sql = "DELETE FROM giohang where s_id = '$s_id' and k_id = '$k_id' ";
    $rs = mysqli_query($conn, $sql);
    if($rs){
        echo "Xóa thành công";
    }
    else{
        echo "Xóa không thành công";
    }
}

if(isset($_POST['action'])){
    if($_POST['action']){
        deleteSP();
        // showSP();
    }
}
?>