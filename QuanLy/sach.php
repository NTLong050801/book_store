<?php
include('./header_footer/header.php');
include('../config/db.php');
?>


<div class="main-content">
    <div class="container-fluid">
        <form class="g-3 mt-3" method="POST">
            <div class="d-flex justify-content-center">
                <div class="col-3 g-3 mt-3">
                    <input type="text" class="form-control" id="inputSach" placeholder="Nhập tên sách...">
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
            //Đếm số bản ghi
            $sql_dem = "SELECT count(s_id) as total from sach";
            $rs_dem = mysqli_query($conn, $sql_dem);
            $row_dem = mysqli_fetch_assoc($rs_dem);
            $total_record = $row_dem['total'];

            //Trang hiện tại
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            //Số bản ghi 1 trang
            $limit = 10;

            //Tổng số trang (ceil là làm tròn lên)
            $total_page = ceil($total_record / $limit);

            if($current_page > $total_page){
                $current_page = $total_page;
            }
            else if($current_page < 1){
                $current_page = 1;
            }

            //Tìm start
            $start = ($current_page - 1 ) * $limit ;

            //Truy vấn lấy dữ liệu
            $sql = "SELECT * FROM sach, tacgia, theloai where sach.tg_id = tacgia.tg_id and sach.tl_id = theloai.tl_id
                    LIMIT $start , $limit";
            $rs = mysqli_query($conn, $sql);
        ?>
        <table class="table" id="sachTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Nhà XB</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Giảm giá</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody id="bodyTable">
                <?php
                if (mysqli_num_rows($rs) > 0) {
                    while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                        <tr>
                            <td scope="row"><?php echo $row['s_id'] ?></td>
                            <td><?php echo $row['s_ten'] ?></td>
                            <td><?php echo $row['tg_ten'] ?></td>
                            <td><?php echo $row['nxb'] ?></td>
                            <td><img src="../Image/VanHoc/<?php echo $row['anh'] ?>" alt="" style="width: 200px;" class="img-fluid"></td>
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
        <div class="container">
            <div class="d-flex justify-content-center ms-2">
                 <?php
                        if($current_page > 1 && $total_page > 1){
                            echo '<a  class="ms-2" style="text-decoration: none;" href="sach.php?page='.($current_page - 1).'">Trang trước</a>';
                        }
                       
                        for($i = 1 ; $i<= $total_page ; $i++){
                           if($i == $current_page){
                            echo '<span class="ms-2">'.$i.'</span>';
                           }
                           else{
                            echo '<a class="ms-2" style="text-decoration: none;" href="sach.php?page='.$i.'">'.$i.'</a>';
                           }
                        }

                        if($current_page < $total_page && $total_page > 1){
                            echo '<a  class="ms-2" style="text-decoration: none;" href="sach.php?page='.($current_page + 1).'">Trang sau</a>';
                        }
                 ?>
            </div>
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
            action = "theloai"
                $.ajax({
                    url: "./sach_action.php",
                    method: "POST",
                    data: {
                        idTL: idTL,
                        action :action
                    },
                    success: function(dt){
                        $("#bodyTable").html(dt);
                    }
                })
        })

        $('#inputSach').keyup(function(){
            var txtBooks = $(this).val();
            action = "search"
            // console.log(txtBooks);
            if(txtBooks != ''){
                $.ajax({
                    url: "./sach_action.php",
                    method: "POST",
                    data: {
                        txtBooks: txtBooks,
                        action : action
                    },
                    dataType: "text",
                    success: function(dt){
                        $("#bodyTable").html(dt);
                    }
                })
            }
            else{

            }
        })

    })

     

    // function searchSach() {
        // var input = document.getElementById('inputSach');
        // var filter = input.value.toUpperCase();
        // var table = document.getElementById('sachTable');
        // var tr = table.getElementsByTagName('tr');


        // for (var i = 0; i < tr.length; i++) {
        //     var td = tr[i].getElementsByTagName('td')[1];
        //     if (td) {
        //         var txtValue = td.textContent || td.innerText;
        //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //             tr[i].style.display = "";
        //         } else {
        //             tr[i].style.display = "none";
        //         }
        //     }
        // }

    // }
</script>