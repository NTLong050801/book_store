<?php
include('./header_footer/header.php');
include('../config/db.php');

?>


<div class="main-content">
    <div class="container-fluid">
        <form class="g-3 mt-3" method="POST">
            <div class="d-flex justify-content-center">
                <div class="col-3 g-3 mt-3">
                    <input type="text" class="form-control" id="inputSach" onkeyup="searchSach()" placeholder="Nhập tên sách...">
                </div>
            </div>

            <div class="col-2 mt-3">
                <select id="listTL" name="listTheLoai" class="form-select" aria-label="Default select example">
               <?php
                    $sql_tl = "SELECT * FROM theloai";
                    $rs_tl = mysqli_query($conn, $sql_tl);
                    if (mysqli_num_rows($rs_tl) > 0) {
                        while ($row_tl = mysqli_fetch_assoc($rs_tl)) {
                    ?>
                            <option id="okok" value="<?php echo $row_tl['tl_id'] ?>"><?php echo $row_tl['tl_ten'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </form>
        <a href="./them.php"><button class="btn btn-success mt-3">Thêm sách</button></a>

        <?php
        if (isset($_SESSION['addOK'])) {
            echo $_SESSION['addOK'];
            unset($_SESSION['addOK']);
        }
        ?>
        <?php
        if (isset($_SESSION['delOK'])) {
            echo $_SESSION['delOK'];
            unset($_SESSION['delOK']);
        }

        if (isset($_SESSION['updateOK'])) {
            echo $_SESSION['updateOK'];
            unset($_SESSION['updateOK']);
        }

        if (isset($_SESSION['updateNotOK'])) {
            echo $_SESSION['updateNotOK'];
            unset($_SESSION['updateNotOK']);
        }
        ?>

        <?php 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(s_id) as total from sach');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $result = mysqli_query($conn, "SELECT * FROM sach LIMIT $start, $limit");
 
        ?>
        <div>
        <table class="table" id="sachTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <!-- <th scope="col">Tác giả</th> -->
                    <th scope="col">Nhà XB</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Giảm giá</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
        <tbody id="bodyTable">
                <?php
                // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
                // PHẦN HIỂN THỊ TIN TỨC
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td scope="row"><?php echo $row['s_id'] ?></td>
                            <td><?php echo $row['s_ten'] ?></td>
                            <!-- <td><?php echo $row['tg_ten'] ?></td> -->
                            <td><?php echo $row['nxb'] ?></td>
                            <td><img src="../img/<?php echo $row['anh'] ?>" alt="" style="width: 200px;" class="img-fluid"></td>
                            <td><?php echo $row['s_gia'] ?></td>
                            <td><?php echo $row['s_giamgia'] ?></td>
                            <td>
                                <a href="./sua.php?id=<?php echo $row['s_id'] ?>"><button class="btn"><i class="fas fa-edit"></i></button></a>
                                <a href="./xoa.php?id=<?php echo $row['s_id'] ?>"><button class="btn"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            </table>
        </div>
        <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="test.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="test.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="test.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
        </div>
</div>

<?php
include('./header_footer/footer.php');
?>

<script>
    $(document).ready(function(){
        $('#listTL').click(function(){
            idTL = $('#listTL').val();
                $.ajax({
                    url: "./sach_action.php",
                    method: "POST",
                    data: {
                        idTL: idTL
                    },
                    success: function(dt){
                        $("#bodyTable").html(dt);
                    }
                })
        })
    })

    function searchSach() {
        var input = document.getElementById('inputSach');
        var filter = input.value.toUpperCase();
        var table = document.getElementById('sachTable');
        var tr = table.getElementsByTagName('tr');


        for (var i = 0; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName('td')[1];
            if (td) {
                var txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>