<?php
include('../config/db.php');

?>
<style>
    .col-2 {
        background-color: #ccc;
        margin-top:20px;
        text-align: center;
        margin: 20px;
        height: 100%;
    }
    .col-2:hover {
        background-color: yellow;
        margin-top: 2px;
    }
    .col-2 button {
        background-color: red;
        width:100%;color : #fff;
        height:15%;
        clear: both;
    }
    .col-2 img{
        margin-top: 15px;
    }
</style>
<?php
if ($_POST['action'] == "phobien") {
    $slt_sach = mysqli_query($conn, "SELECT * from sach ");
    if (mysqli_num_rows($slt_sach) > 0) {
        While($row = mysqli_fetch_assoc($slt_sach)) { ?>
            <div class="col-2" >
                <div>
                    <img src="../Image/VanHoc/<?php echo $row['anh'] ?>" class="container img-fluid" alt="">
                </div>
                <div class="container book_name" style="margin-top: 5px;">
                    <p><?php echo $row['s_ten'] ?></p>
                </div>
                <div style="color: red;" class="container price">
                    <?php
                    $length = strlen($row['s_gia']);
                    //echo $length;
                    echo substr($row['s_gia'], -6, -3) . '.' . substr($row['s_gia'], -3) . 'đ';
                    ?></p>
                </div>
                <button >
                    Thêm vào giỏ hàng
                </button>
            </div>
<?php
        }
    }
}

?>
<script>
    
</script>