<?php
include('../config/db.php');
include('./function.php');
$value = $_POST['value'];
$slt_sach = search($value);
if (mysqli_num_rows($slt_sach) > 0) {
    while ($row = mysqli_fetch_assoc($slt_sach)) { ?>
        <li class="list-group-item" id="<?php echo $row['s_id'] ?>" ><?php echo $row['s_ten'] ?></li>

<?php
    }
} else {
    echo '<li class="list-group-item">Không có sách này</li>';
}
?>
<div id="val_ip">

</div>
<script>
    $('#list_sach li').click(function() {
        val_ip = $(this).html();
        id_ip = $(this).attr('id');
        $('#val_ip').attr('get_ip', val_ip);
        $('#val_ip').attr('id_ip', id_ip);
    })
</script>