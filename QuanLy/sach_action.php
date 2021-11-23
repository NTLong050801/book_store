<?php
        function showBookTheLoai(){
            $idTL = $_POST['idTL'];
            include('../config/db.php');
             $sql = "SELECT * FROM sach, tacgia, theloai where theloai.tl_id = '$idTL' and sach.tg_id = tacgia.tg_id and sach.tl_id = theloai.tl_id";
             $rs = mysqli_query($conn, $sql);
             if (mysqli_num_rows($rs) > 0) {
                 while ($row = mysqli_fetch_assoc($rs)) {
             ?>
                     <tr>
                         <td scope="row"><?php echo $row['s_id'] ?></td>
                         <td><?php echo $row['s_ten'] ?></td>
                         <td><?php echo $row['tg_ten'] ?></td>
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
        }
        showBookTheLoai();
        function searchTen(){
            $txtBooks = $_POST['txtBooks'];
            include('../config/db.php');
            $sql = "SELECT * FROM sach, tacgia, theloai where sach.s_ten LIKE '%$txtBooks%' and sach.tg_id = tacgia.tg_id and sach.tl_id = theloai.tl_id";
            $rs = mysqli_query($conn, $sql);
            if (mysqli_num_rows($rs) > 0) {
                while ($row = mysqli_fetch_assoc($rs)) {
            ?>
                    <tr>
                        <td scope="row"><?php echo $row['s_id'] ?></td>
                        <td><?php echo $row['s_ten'] ?></td>
                        <td><?php echo $row['tg_ten'] ?></td>
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
        }
        searchTen();
?>