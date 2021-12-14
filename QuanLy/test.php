<?php
include('../Parital/header.php')
?>
<style>
    .fas{
        color: red;
    }
</style>
<div class="tim">
    <i class="far fa-heart"></i>
</div>

<?php
    include('../Parital/foot.php')
?>
<script>
    $(document).ready(function(){
        $('.tim i').click(function(){
            if($(this).hasClass('far')){
                $(this).removeClass('far')
                $(this).addClass('fas')
                // $(this).css("color","red")  
            }else{
                $(this).removeClass('fas')
                $(this).addClass('far') 
            }
        })
    })
</script>