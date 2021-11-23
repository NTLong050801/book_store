<?php
include('../config/db.php');
// include('../config/db.php');
require('./function.php')
?>
<style>
    .col-xl-2 {
        background-color: #ccc;
        margin: 20px;
        min-height: 200px;
        max-height: 250px;

    }

    .content_book:hover {
        background-color: yellow;
    }

    .col-xl-2 button {
        height: auto;
        bottom: 0;
    }

    .col-xl-2 img {
        min-height: 140px
    }

    .col-xl-2 a {
        color: black;
        text-decoration: none;
    }

    .price {
        font-size: 1rem;
        color: #ee4d2d;
        /* margin-top: 5px; */
    }

    .book_name {
        height: 40px;
        font-size: .75rem;

        word-wrap: break-word;
        overflow: hidden;
        display: -webkit-box;
        text-overflow: ellipsis;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    .content_book {
        margin: 10px;
        position: relative;
        height: 100%;
    }

    .giamgia {
        position: absolute;
        right: 0;
        top: 0;
        z-index: 1;
    }

    .text_gg {
        background-color: rgb(255 212 36 / 90%);
        width: 36 px;
        height: 32 px;
        text-align: center;
    }

    .text_gg h6 {
        color: red;
    }

    .text_gg span {
        color: white;
    }

    .gia_bd {
        color: rgb(0 0 0 / 54%);
        text-decoration: line-through;
        font-size: 12px;

    }

    .star_sold {
        margin-top: 2px;
        margin-left: 0.3125 rem;
        font-size: .75rem;
    }

    .sold {
        color: rgba(0, 0, 0, 0.87);
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        margin-left: 20px;
    }

    .star {
        background: yellow;

    }
</style>
<?php
if (isset($_POST['action'])) {
    $_SESSION['action'] = $_POST['action'];
} 
// else {
//     $_SESSION['action'] = "Phổ biến";
// }
if (isset($_POST['tl_id'])) {
    $_SESSION['tl_id'] = $_POST['tl_id'];
}
// else{
//     $_SESSION['tl_id'] =true;
// }
$tranghientai = isset($_GET['tranghientai']) ? $_GET['tranghientai'] : 1;
$sosach1trang = 10;
// echo $tranghientai;
$limit = ($tranghientai - 1) * $sosach1trang;
if (isset($_SESSION['action'])) {
    $action = $_SESSION['action'];

    if (isset($_SESSION['tl_id'])) {
        $tl_id = $_SESSION['tl_id'];
    } else {
        $tl_id = 'true';
    }


    // if ($action == "Home") {
    //     $slt_sach = home($limit, $sosach1trang);
    // }
    if ($tl_id == 'true') {
        $slt_sach = home($limit, $sosach1trang);
    }
    if ($action == "Phổ biến") {
        $slt_sach = allSach($tl_id, $limit, $sosach1trang);
    }
    if ($action == "Mới nhất") {
        $slt_sach = MoiNhat($tl_id, $limit, $sosach1trang);
    }
    if ($action == "Bán chạy") {
        $slt_sach = BanChay($tl_id, $limit, $sosach1trang);
    }
    if ($action == "Thấp đến cao") {
        $slt_sach = ThapDenCao($tl_id, $limit, $sosach1trang);
    }
    if ($action == "Cao đến thấp") {
        $slt_sach = CaoDenThap($tl_id, $limit, $sosach1trang);
    }
    if ($action == "search") {
        if(isset($_POST['get_search'])){
            $slt_sach = search_id($_POST['get_search']);
            unset($_SESSION['action']);
        }
        // else{
        //     echo '<script>alert("Không tìm thấy sách này !")>/script>';
        // }
       
    }
    if (mysqli_num_rows($slt_sach) > 0) {
        while ($row = mysqli_fetch_assoc($slt_sach)) { ?>
            <div class="col-xl-2">
                <a href="book.php?s_id=<?php echo $row['s_id'] ?>">
                    <div class="content_book">
                        <?php
                        if ($row['s_giamgia'] > 0) { ?>
                            <div class="giamgia">
                                <div class="text_gg">
                                    <h6> <?php echo $row['s_giamgia'] . '%' ?></h6>
                                    <span>GIẢM</span>

                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <div>
                            <img src="../Image/VanHoc/<?php echo $row['anh'] ?>" class="container img-fluid" alt="">
                        </div>
                        <div class="container book_name" style="margin-top: 5px;">
                            <p><?php echo $row['s_ten'] ?></p>
                        </div>
                        <div class="container price">
                            <?php
                            if ($row['s_giamgia'] > 0) {
                                echo "<span class ='gia_bd'>" . $row['s_gia'] . "đ" . "</span>";
                            }
                            ?>
                            <span class="gia">
                                <?php
                                $gia = ceil($row['s_gia']  - ($row['s_gia'] * $row['s_giamgia']) / 100);
                                echo  $gia . 'đ';
                                ?>
                            </span>
                        </div>
                        <div class="container star_sold ">
                            <span class="star"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>
                            <span class="sold">Đã bán : <?php echo $row['luotmua'] ?></span>

                        </div>

                    </div>
                </a>
            </div>

<?php
        }
    }
}

?>




<script>
    // var gia = parseInt($('.price .gia').html())
    // // alert(gia)
    // gia = gia.toLocaleString() + 'đ';
    // $('.price .gia').html(gia)
    // $('.page-item').click(function(){
    //             alert('ok')
    //         })
</script>