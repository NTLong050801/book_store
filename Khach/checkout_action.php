<?php
// include('../config/db.php');
// $conn;
function donHang(){
   include('../config/db.php');
      $k_id = $_POST['k_id'];
      // $sl_kh = mysqli_query($conn, "SELECT * FROM khach where k_email = '$k_email'");
      // $tt_kh = mysqli_fetch_assoc($sl_kh);
      // $k_id = $tt_kh['k_id'];
      $cDay = $_POST['cDay'];
      $cMonth = $_POST['cMonth'];
      $cYear = $_POST['cYear'];
      $ghiChu = $_POST['ghiChu'];
      $tongThanhToan = $_POST['tongThanhToan'];
      $date = $cYear."/".$cMonth."/".$cDay;
      $sql = "INSERT INTO donhang(k_id, hd_date, note, tongtien)
      values ('$k_id', '$date', '$ghiChu', '$tongThanhToan')";
      $rs = mysqli_query($conn, $sql);
      if($rs){
         echo "OK dh";
      }
      else{
         echo "ohtb";
      }
      return $rs;
   }

   function chiTietHoaDon(){
      include('../config/db.php');
      $slt_hdid = mysqli_query($conn, "SELECT hd_id FROM donhang ORDER BY hd_id desc LIMIT 1");
      $hd_id = mysqli_fetch_assoc($slt_hdid)['hd_id'];
      $s_id =  $_POST['s_id'];
      $soLuong =  $_POST['soLuong'];
      $chiTietHD = mysqli_query($conn, "INSERT INTO chitiethd(hd_id, s_id, sluong)
                                          VALUES ('$hd_id', '$s_id', '$soLuong')");
      if($chiTietHD){
         echo "OK cthd";
      }
      else{
         echo "Ko ok";
      }
   }

   function delSPGH(){
      include('../config/db.php');
      $k_id =  $_POST['k_ida'];
      $s_id =  $_POST['s_id'];
      $delSPGH = mysqli_query($conn, "DELETE FROM giohang where k_id = '$k_id' and s_id='$s_id' ");
      if($delSPGH){
         echo "Xóa ok";
      }
      else{
         echo "Xóa ko ok";
      }
   }
   if(isset($_POST['action']) == "insert_dh"){
      donHang();
   }
   if(isset($_POST['action']) == "insert_ctdh"){
      chiTietHoaDon();
   }
   if(isset($_POST['action']) == "del_gh"){
      delSPGH();
   }
   // donHang();
   // chiTietHoaDon();
?>