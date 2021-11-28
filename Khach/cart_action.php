<?php
    function delSP(){
        include('./function.php');
        include('../config/db.php');
        $s_id = $_POST['s_id'];
        $k_id = $_POST['k_id'];
    // $delCart = delete_Cart($k_id, $s_id);
    $delCart = mysqli_query($conn, "DELETE FROM giohang where k_id = '$k_id' and s_id = '$s_id' ");
    if($delCart){
        echo "Xóa thành công";    
    }
    else {
        echo "Xóa không thành công";
    }
    }

    function updateSL(){
        include('../config/db.php');
        $s_id = $_POST['s_id'];
        $soLuong = $_POST['soLuong'];
        $updateSL = mysqli_query($conn, "UPDATE giohang SET gh_soluong = '$soLuong' where s_id = '$s_id'");
        // if($updateSL){
        //     echo "OK";
        // }
        // else{
        //     echo "Npt ok";
        // }
    }
    if(isset($_POST['action'])){
        if($_POST['action'] == "delSP"){
            delSP();
        }
        if($_POST['action'] == "updateSL"){
            updateSL();
        }
    }
    function showTongTien(){
            
    }
?>