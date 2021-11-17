<?php
// include('../config/db.php');
require('./function.php')
?>
<style>
    .col-xl-2 {
        background-color: #ccc;
        /* margin-top: 20px; */
        /* text-align: center; */
        margin: 20px;
        /* position:relative; */
        /* word-wrap: break-word */

    }

    .content_book:hover {
        background-color: yellow;
        /* margin-top: 2px; */
    }

    .col-xl-2 button {
        /* background-color: red;
        width: 100%;
        color: #fff; */
        height: auto;
        /* clear: both; */
        /* position: absolute;
        bottom: 20px;
        right: 20px; */
        /* display: flex; */
        bottom: 0;

    }

    .col-2 img {
        margin-top: 15px;
    }

    .col-xl-2 a {
        color: black;
        text-decoration: none;
    }

    .price {
        font-size: 1rem;
        color: #ee4d2d;
        margin-top: 5px;
    }

    .book_name {
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

        /* display: block; */
        /* padding-right: 10px; */
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
if ($_POST['action'] == "Phổ biến") {
    $slt_sach = allSach();
}
if ($_POST['action'] == "Mới nhất") {
    $slt_sach = MoiNhat();
}
if ($_POST['action'] == "Bán chạy") {
    $slt_sach = BanChay();
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
                            $gia = ceil($row['s_gia']  - ($row['s_gia'] * ($row['s_giamgia'] / 100)));
                            //echo $length;
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
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
<?php
}


?>
<script>
    var gia = parseInt($('.price .gia').html())
    // alert(gia)
    gia = gia.toLocaleString() + 'đ';
    $('.price .gia').html(gia)
    $('.pagination .page-item .page-link').click(function(){
        alert($(this).html())
    })
</script>