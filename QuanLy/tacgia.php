<?php
include('./header_footer/header.php');
?>
<div class="main-content">
    <?php 
        if(isset($_SESSION['delOK'])){
            echo $_SESSION['delOK'];
            unset($_SESSION['delOK']);
        }

    ?>
    <div class="container-fluid">
        <form class="row g-3 mt-3 d-flex justify-content-center">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Nhập tên tác giả...</label>
                <input type="text" class="form-control" id="inputPassword2" placeholder="Nhập tên tác giả...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn mb-3"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <a href="./themTG.php"><button class="btn btn-success mt-3">Thêm tác giả</button></a>
        <?php
     
        ?>
        <table class="table col-md-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include('../config/db.php');
                $sql = "SELECT * FROM tacgia";
                $rs = mysqli_query($conn, $sql);
                if (mysqli_num_rows($rs) > 0) {
                    while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['tg_id'] ?></th>
                            <td><?php echo $row['tg_ten'] ?></td>
                            <td>
                                <a href="./suaTG.php?id=<?php echo $row['tg_id'] ?>"><button class="btn"><i class="fas fa-edit"></i></button></a>
                                <a href="./xoaTG.php?id=<?php echo $row['tg_id'] ?>"><button class="btn"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include('./header_footer/footer.php');
?>