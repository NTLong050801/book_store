<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row card-show">
            <?php
            include('../config/db.php');
            $sql = "SELECT * FROM sach where tl_id = '9'";
            $rs = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($rs)) {
                $_SESSION['s_id'] = $row['s_id'];
            ?>
                <div class="card" style="width: 18rem;">
                    <img src="../Image/VanHoc/<?php echo $row['anh']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['s_ten']?></h5>
                        <p class="card-text"><?php echo $row['mota']?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <div s_id = "<?php echo $_SESSION['s_id']?>" class="btn btn-success btnAddSP">Thêm SP</div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
                $('.btnAddSP').click(function(){
                   s_id = $(this).attr('s_id');
                   console.log(s_id);
                })
        })
    </script>


</body>

</html>