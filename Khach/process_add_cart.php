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
    $check = check_GioHang($k_id,$s_id);
    if(mysqli_num_rows($check) > 0){
        $row = mysqli_fetch_assoc($check);
        $sluong = $sluong + $row['gh_soluong'];
        if($sluong < 10){
            update_Gh_Soluong($k_id,$s_id,$sluong);
            echo "Sản phẩm này đã có trong giỏ hàng ! Chúng tôi đã cập nhật lại số lượng của bạn";
        }else{
            echo "Tối đa 10 sản phẩm";
        }
    }
    else{
        $insert= insertCart($k_id,$s_id,$sluong,$tt);
        echo 'Đã thêm vào giỏ hàng';
    }
    
    
       
    
    //avc
?>