<?php
include('../config/db.php');
include('./ham.php');
?>
<table class="table ">
    <thead>
        <tr>
            <th scope="col" class="col-6">Tên sách</th>
            <th scope="col" class="col-1">Giá</th>
            <th scope="col" class="col-1">% giảm giá</th>
            <th scope="col" class="col-1">số lượng </th>
            <th scope="col" class="col-1">lượt mua</th>
            <th scope="col" class="col-6">thao tác</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        if(!isset($_POST['tranghientai']))
        {
            $tranghientai = 1 ;
        }else{
            $tranghientai= $_POST['tranghientai'];
        }
        $sosach1trang = 10;
        $tongsosach = count_sach();
        $tongsotrang =ceil($tongsosach/$sosach1trang);
        $dem =($tranghientai -1 )* $sosach1trang;
        if(isset($_POST['tl_id']))
        {
            $tl_id =$_POST['tl_id'];
            $qr = slt_sach_tl($tl_id);
        }else 
        {
            $qr = slt_sach($dem,$sosach1trang);
        }
        if (mysqli_num_rows($qr) > 0) {
            while ($row = mysqli_fetch_assoc($qr)) {

        ?> <tr>

                    <td>
                        <img style="height: 100px;" class="img fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                        <span style="margin-left: 20px"><?php echo $row['s_ten'] ?></span>
                    </td>
                    <td style="color: red;"><?php echo $row['s_gia'] ?>đ</td>
                    <td><?php echo $row['s_giamgia'] ?></td>
                    <td><?php echo $row['soluong'] ?></td>
                    <td><?php echo $row['luotmua'] ?></td>
                    <td>
                        <button class="btn btn-danger sua">sửa</button>
                        <button class="btn btn-warning xoa" <?php echo $s_id?>>xóa</button>
                    </td>

            <?php
            }
        }
            ?>

                </tr>

    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item <?php if ($tranghientai == 1) {
                                    echo 'disabled';
                                } ?>" tranghientai=<?php echo $tranghientai - 1 ?>>
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php
        for ($i = 1; $i <= $tongsotrang; $i++) { ?>
            <li class="page-item <?php if ($tranghientai == $i) {
                                        echo 'active';
                                    } ?>" tranghientai=<?php echo $i ?>><a class="page-link" href="#"><?php echo $i ?></a></li>
        <?php
        }
        ?>
        <li class="page-item <?php if ($tranghientai == $tongsotrang) {
                                    echo 'disabled';
                                } ?>" tranghientai=<?php if($tranghientai + 1 <= $tongsotrang){
                                    echo $tranghientai + 1;
                                }  ?>>
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>