<style>
    .mauNen {
        background-color: blue;
    }
</style>


<div style="background-color: #ccc;">
    <form>
        <input id="target" type="text" value="Hello there">
    </form>
    <?php for ($i = 1; $i <= 10; $i++) {
    ?>
        <div status="<?php echo $i; ?>" class="statuss other<?php echo $i; ?>">
            Trigger number <?php echo $i; ?>
        </div>
    <?php
    } ?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<script>
    let status = parseInt($('.statuss').attr('status'));
    $('.other1').addClass('mauNen');
    $("#target").keydown(function(e) {
        if (e.keyCode == 38) {
            $('.other' + status).removeClass('mauNen');
            status = parseInt(status) - 1;
            $('.other' + status).addClass('mauNen');
            console.log(status);
            if (status < 1) {
                status = 10;
                $('.other1').removeClass('mauNen');
                $('.other10').addClass('mauNen');
            }
        } else
        if (e.keyCode == 40) {
            $('.other' + status).removeClass('mauNen');
            status = parseInt(status) + 1;
            $('.other' + status).addClass('mauNen');
            console.log(status);
            if(status > 10) {
                status = 1;
                $('.other10').removeClass('mauNen');
                $('.other1').addClass('mauNen');
            }
        }


    });
</script>