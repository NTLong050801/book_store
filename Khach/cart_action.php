<?php
    include('../config/db.php');
    require('./function.php');
    $s_id = $_POST['s_id'];
    $k_id = $_POST['k_id'];
    $delCart = delete_Cart($k_id, $s_id);
    // $delCart = mysqli_query($conn, "DELETE FROM giohang where k_id = '$k_id' and s_id = '$s_id'");
    if($delCart){
        echo "Xóa thành công";
    }
    else {
        echo "Xóa không thành công";
    }
?>