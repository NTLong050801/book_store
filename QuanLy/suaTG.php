<?php
include('./header_footer/header.php');
include('../config/db.php');
?>

<?php
    $id = $_GET['id'];
if (isset($_POST['btnSua'])) {
    $Name = $_POST['Name'];
    $sql = "UPDATE tacgia set tg_ten = '$Name' where tg_id = '$id'";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        $_SESSION['updateTGOK'] = "<h3 class='text-center text-success'>Sửa thành công</h3>";
        header('location: tacgia.php');
    } else {
        echo "Sửa không thành công";
    }
}
?>
<?php
    $sql2 = "SELECT * FROM tacgia where tg_id = '$id'";
    $rs2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($rs2);
?>


<h2 class='text-center'>Thêm tác giả</h2>

<div class="container">
    <form action="" method="POST">
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Tên tác giả</label>
                <input value="<?php echo $row2['tg_ten'] ?>" name="Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <button name="btnSua" class="btn btn-success">Sửa</button>
    </form>
</div>
<?php
include('./header_footer/footer.php');
?>