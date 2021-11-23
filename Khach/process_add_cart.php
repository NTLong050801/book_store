
<?php 
include('../config/db.php');
include('./function.php')
?>

<?php 
    $k_email = $_SESSION['check_login'];
    $k_id = Khach($k_email);
    $sluong = $_POST['sluong'];
    $s_id = $_POST['s_id'];
    $tt = $_POST['tt'];
    $qr = "INSERT INTO giohang (k_id, s_id, gh_soluong,tongtien)
    VALUES (' $k_id', '$s_id', '$sluong','$tt')";
    $insert  = mysqli_query($conn,$qr);
    if($insert){
        echo 'đã thêm vào giỏ hàng';
    }
?>