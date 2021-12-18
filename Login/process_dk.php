<?php 
    include('../config/db.php');
    include('../QuanLy/ham.php');
    include('../Khach/function.php');
?>
<?php 
    if(isset($_POST['val'])){
        $val = $_POST['val'];
        $qr = slt_email($val);
        if(mysqli_num_rows($qr)>0){
            echo 'Email tồn tại';
        }
    }
?>