<?php
include('../config/db.php');
include('./function.php');
?>
<?php
if (isset($_POST['sao'])) {
    $sao = $_POST['sao'];
} else {
    $sao = 5;
}

if(isset($_POST['tranghientai'])){
    $tranghientai = $_POST['tranghientai'];
}else{
    $tranghientai = 1;
}
$limit = ($tranghientai-1)*5;
$s_id = $_POST['s_id'];
$tongtrang = ceil(count_sao_sach($s_id,$sao)/5);
if($sao == '0'){
    $tongtrang = ceil(count_cmt($s_id)/5);
}
$qr = sao_Khach($s_id, $sao,$limit);
if($sao == '0'){
    $qr = slt_cmt($s_id,$limit);
}
if (mysqli_num_rows($qr) > 0) {
    while ($row = mysqli_fetch_assoc($qr)) { ?>
        <div class="container cmt_k" style="margin-top: 20px;border-bottom: #ccc 1px solid;">
            <div class="row">
                <div class="col-1">
                    <img style="height: 50px;width: 50px;border-radius: 50%;" class="img-fluid" src="../Image/avatar/<?php echo $row['k_avatar'] ?>" alt="">
                </div>
                <div class="col-11">
                    <div class="k_id">
                        <?php echo $row['k_ten'] ?>
                    </div>
                    <div class="star_cmt_k" style="margin-top: 5px;">
                        <?php
                        for ($i = 1; $i <= $row['sao']; $i++) {
                            echo '<span class="star_cmt_k color_star"><i class="fas fa-star"></i></span>';
                        }
                        ?>
                    </div>
                    <div class="nd_cmt">
                        <?php echo $row['cmt'] ?>
                    </div>
                    <div class="date_cmt" >
                        <?php echo date("d/m/Y",strtotime($row['date_cmt'])) ?>
                    </div>

                </div>
            </div>
        </div>

    <?php
    }
    ?>
    <nav aria-label="Page navigation example" style="float: right;">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php
                for($i=1;$i<= $tongtrang ; $i++){ ?>
                    <li class="page-item <?php if($tranghientai == $i){
                        echo 'active';
                    } ?> " trang = '<?php echo $i ?>'><a class="page-link " href="#"><?php echo $i ?></a></li>
                <?php
                }
            ?>
            
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
<?php
}else{
    ?>
    <div class="container cmt_k" style="margin-top: 20px;border-bottom: #ccc 1px solid;text-align: center;margin-bottom:50px">
            <span style="font-size: 20px ;color:red">Không có khách hàng nào đánh giá</span>
        </div>
    <?php
}
?>