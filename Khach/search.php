<?php 
    include('../config/db.php');
    include('./function.php');
    $value = $_POST['value'];
    $slt_sach = search($value);
    if(mysqli_num_rows($slt_sach) > 0){
        while($row = mysqli_fetch_assoc($slt_sach)){ ?>
       
  <li class="list-group-item" style=""><?php echo $row['s_ten'] ?></li>
 
<?php
        }
    }
    else{
       echo '<li class="list-group-item">Không có sách này</li>';
    }
?>
<script>
   
</script>