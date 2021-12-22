<?php
    $Email = $_GET['email'];
    include('../config/db.php');
    $checkUsser = mysqli_query($conn,"SELECT * FROM users where u_email = '$Email'");
    if(mysqli_num_rows($checkUsser) > 0 ){
        $kichHoatUser = mysqli_query($conn, "UPDATE users set kichHoat = 1 where u_email = '$Email'");
        $_SESSION['kichHoatSuccess'] = "<h3 class='text-success text-center'>Kích hoạt tài khoản thành công</h3>";
        header('location: login.php');  
    }
?>