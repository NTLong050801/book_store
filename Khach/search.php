<?php
include('../config/db.php');
include('./function.php');
$value = $_POST['value'];
// $idSach = $_POST['idSach'];
// $slt_name_sach = SachById($idSach);
// $nameSach = mysqli_fetch_array($slt_name_sach);


$slt_sach = search($value);
$i = 1;
$slSach = mysqli_num_rows($slt_sach);
if ($slSach > 0) {
    while ($row = mysqli_fetch_assoc($slt_sach)) { ?>
        <li status="<?php echo $i ?>" class="list-group-item book-row<?php echo $i ?>" id="<?php echo $row['s_id'] ?>"><?php echo $row['s_ten'] ?></li>
<?php
        $i++;
    }
} else {
    echo '<li class="list-group-item">Không có sách này</li>';
}
?>
<div id="val_ip">

</div>
<script>
    // $(document).ready(function() {
        $('#list_sach li').click(function() {
            val_ip = $(this).html();
            id_ip = $(this).attr('id');
            $('#val_ip').attr('get_ip', val_ip);
            $('#val_ip').attr('id_ip', id_ip);
        })
</script>