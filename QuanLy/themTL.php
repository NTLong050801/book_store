<?php
include('./header_footer/header.php');
include('../config/db.php');
?>

<?php
if (isset($_POST['btnThem'])) {
    $Name = $_POST['Name'];
    $sql = "INSERT INTO theloai(tl_ten) values('$Name')";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        $_SESSION['addOK'] = "<h3 class='text-center text-success'>Thêm thành công</h3>";
        header('location: theloai.php');
    } else {
        $_SESSION['addNotOK'] = "<h3 class='text-center text-success'>Thêm không thành công</h3>";
        header('location: theloai.php');
    }
}
?>



<h2 class='text-center'>Thêm thể loại</h2>

<div class="container">
    <form action="" method="POST">
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                <input name="Name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <button name="btnThem" class="btn btn-success">Thêm</button>
    </form>
</div>
<?php
include('./header_footer/footer.php');
?>