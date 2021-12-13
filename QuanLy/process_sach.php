<?php
include('../config/db.php');
include('./ham.php');
?>

<?php

if(isset($_POST['trangHienTai'])){
     $current_page = $_POST['trangHienTai'];
}
else{
    $current_page = 1;
}

$limit = 10;
$tongSoSach = total_sach();
$slSach = mysqli_fetch_assoc($tongSoSach)['slSach'];
$total_pages = ceil($slSach / $limit);
$start = ($current_page - 1) * $limit;

?>

<table class="table">
    <thead>
        <tr>
            <th class="col-4" scope="col">Tên sách</th>
            <th class="col-2" scope="col">Giá</th>
            <th class="col-1" scope="col">Giảm giá</th>
            <th class="col-1" scope="col">Số lượng</th>
            <th class="col-1" scope="col">Lượt mua</th>
            <th class="col-4" scope="col">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $qr = slt_sach($start, $limit);
        if (mysqli_num_rows($qr) > 0) {
            while ($row = mysqli_fetch_assoc($qr)) {
        ?>
                <tr>
                    <td>
                        <img style="width: 100px;;" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                        <?php
                        echo $row['s_ten'] ?>
                    </td>
                    <td><?php echo $row['s_gia'] ?></td>
                    <td><?php echo $row['s_giamgia'] ?></td>
                    <td><?php echo $row['soluong'] ?></td>
                    <td><?php echo $row['luotmua'] ?></td>
                    <td>
                        <div class="btn btn-info">Sửa</div>
                        <div class="btn btn-danger">Xóa</div>
                    </td>
                </tr>

        <?php
            }
        }
        ?>


    </tbody>
</table>


<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"
     <?php if($current_page == 1){echo "disabled";}?>
     cr_page="<?php  if($current_page > 1){echo $current_page - 1;} else{ echo "1";} ?>">
    <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
    </a>
   
    </li>
    <?php
        for($i = 1 ; $i<=$total_pages ; $i++){
     ?>
    <li cr_page = "<?php echo $i?>" class="page-item <?php if($current_page == $i) {echo "active";}?>"><a class="page-link" href="#"><?php echo $i?></a></li>
    <?php
}
  ?>
    <li class="page-item"  <?php if($current_page == $total_pages){echo "disabled";}?>
    cr_page="<?php  if($current_page < $total_pages){echo $current_page + 1;} else{ echo $total_pages;} ?>">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>