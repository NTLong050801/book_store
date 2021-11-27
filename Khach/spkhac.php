<?php
include('../Parital/header.php');
include('./function.php')
?>
<link rel="stylesheet" href="../CSS/spkhac.css">
<div class="row">

    <?php
    
    $tranghientai = isset($_POST['tranghientai']) ? $_POST['tranghientai'] : 1;
    // $tl_id = $_POST['tl_id'];
    $sosach1trang = 6;
    $limit = ($tranghientai - 1) * $sosach1trang;
    $slt_sach = get_all_post($limit, $sosach1trang);
    // $_SESSION['sotrang'] = ceil(count_posts($tl_id)/$sosach1trang);

    while ($row = mysqli_fetch_assoc($slt_sach)) { ?>
        <div class="col-2 book_id">
            <a href="book.php?s_id=<?php echo $row['s_id'] ?>">
                <div class="content_book_id">
                    <?php
                    if ($row['s_giamgia'] > 0) { ?>
                        <div class="giamgia">
                            <div class="text_gg_id">
                                <h6> <?php echo $row['s_giamgia'] . '%' ?></h6>
                                <span>GIẢM</span>
                            </div>

                        </div>

                    <?php
                    }
                    ?>
                    <img class="container img-fluid" src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="">
                    <div class="container name_id">
                        <span style="font-size: 14px;"><?php echo $row['s_ten'] ?></span>
                    </div>
                    <div class="container price_spkhac">
                        <span class="gia_id">
                            <?php
                            $gia = ceil($row['s_gia']  - ($row['s_gia'] * $row['s_giamgia']) / 100);
                            echo  $gia . 'đ';
                            ?>
                        </span>
                        <span class=" sold_spkhac ">
                            Đã bán <?php echo $row['luotmua'] ?>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
    ?>

</div>