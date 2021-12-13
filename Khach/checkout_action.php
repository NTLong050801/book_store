<?php

function donHang(){
   global $conn;
      $k_id = $_POST['k_id'];
      $cDay = $_POST['cDay'];
      $cMonth = $_POST['cMonth'];
      $cYear = $_POST['cYear'];
      $ghiChu = $_POST['ghiChu'];
      $tongThanhToan = $_POST['tongThanhToan'];
      $date = $cYear."/".$cMonth."/".$cDay;
      $rs = mysqli_query($conn, "INSERT INTO donhang(k_id, hd_date, note, tongTien)
                                 value ('$k_id', '$date', '$ghiChu', '$tongThanhToan')");
      return $rs;
   }

   function chiTietHoaDon(){
      $s_id =  $_POST['s_id'];
      $k_id = $_POST['k_id'];
      
   }
?>