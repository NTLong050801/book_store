<?php
include('./header_footer/header.php');
?>
<div class="main-content">
    <?php 
        if(isset($_SESSION['delOK'])){
            echo $_SESSION['delOK'];
            unset($_SESSION['delOK']);
        }
        if(isset($_SESSION['delNotOK'])){
            echo $_SESSION['delNotOK'];
            unset($_SESSION['delNotOK']);
        }
        if(isset($_SESSION['addOK'])){
            echo $_SESSION['addOK'];
            unset($_SESSION['addOK']);
        }
          if(isset($_SESSION['addNotOK'])){
            echo $_SESSION['addNotOK'];
            unset($_SESSION['addNotOK']);
        }

        if(isset($_SESSION['UpdateOK'])){
            echo $_SESSION['UpdateOK'];
            unset($_SESSION['UpdateOK']);
        }
          if(isset($_SESSION['UpdateNotOK'])){
            echo $_SESSION['UpdateNotOK'];
            unset($_SESSION['UpdateNotOK']);
        }
    ?>
    <div class="container-fluid">
        <form class="row g-3 mt-3 d-flex justify-content-center">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Nhập tên thể loại...</label>
                <input type="text" class="form-control" id="inputPassword2" placeholder="Nhập tên thể loại...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn mb-3"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <a href="./themTL.php"><button class="btn btn-success mt-3">Thêm thể loại</button></a>
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
                $sql = "SELECT * FROM theloai";
                $rs = mysqli_query($conn, $sql);
                if (mysqli_num_rows($rs) > 0) {
                    while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['tl_id'] ?></th>
                            <td><?php echo $row['tl_ten'] ?></td>
                            <td>
                                <a href="./suaTL.php?id=<?php echo $row['tl_id'] ?>"><button class="btn"><i class="fas fa-edit"></i></button></a>
                                <a href="./xoaTL.php?id=<?php echo $row['tl_id'] ?>"><button class="btn"><i class="fas fa-trash-alt"></i></button></a>
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
