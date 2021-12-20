<?php
include('../config/db.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .btn {
            width: 100%;
        }

        .img-fluid {
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center ">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="../Image/logo.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h2>Đăng nhập</h2>
                    <br>
                    <?php
                    if (isset($_SESSION['meseger'])) {
                        echo $_SESSION['meseger'];
                        unset($_SESSION['meseger']);
                        //session_destroy();
                    }
                    if (isset($_SESSION['msg_pass'])) {
                        echo $_SESSION['msg_pass'];
                        unset($_SESSION['msg_pass']);
                    }
                    ?>
                    <div id="meseger"></div>
                    <br>
                    <br>
                    <form id="form" action="" method="post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <div id="email_c"></div>
                            <br>
                            <input required type="email" id="email" class="form-control form-control-lg" name="email" value="<?php
                                                                                                                                ?>" />
                            <label class="form-label" for="email">Email </label>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input required type="password" id="password" class="form-control form-control-lg" name="pass" value="<?php
                                                                                                                                    if (isset($_COOKIE['ck_pass'])) {
                                                                                                                                        echo $_COOKIE['ck_pass'];
                                                                                                                                    }
                                                                                                                                    ?>" />
                            <label class="form-label" for="password">Mật khẩu</label>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input name="check" class="form-check-input" type="checkbox" value="" id="form1Example3" <?php
                                                                                                                            if (isset($_COOKIE['ck_pass'])) {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                            ?> />
                                <label class="form-check-label" for="form1Example3"> Nhớ tài khoản </label>
                            </div>
                            <a id="fg_pass" href="forgot_pass.php">Quên mật khẩu?</a>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Đăng nhập</button>
                        <?php
                        if (isset($_POST['submit'])) {
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $slt_email = mysqli_query($conn, "Select * from users where u_email = '$email'");
                            if (mysqli_num_rows($slt_email) > 0) {
                                $row = mysqli_fetch_assoc($slt_email);
                                $pass_sql = $row['u_pass'];
                                if ($pass == $pass_sql) {
                                    $_SESSION['check_login'] = $email;
                                    // echo $_SESSION['check_login'];
                                    //sinh vien :195
                                    if (isset($_POST['check'])) {
                                        setcookie('ck_email', $email, time() + 60 * 60 * 24);
                                        setcookie('ck_pass', $pass, time() + 60 * 60 * 24);
                                    } else {
                                        setcookie('ck_email', $email, time() - 60 * 60 * 24);
                                        setcookie('ck_pass', $pass, time() - 60 * 60 * 24);
                                    }
                                    if ($row['status'] == 0) {
                                        header('location:../Khach/index.php');
                                    }
                                    if ($row['status'] == 1) {
                                        header('location:../QuanLy/index.php');
                                    }
                                    // if ($row['status'] == 2) {
                                    //     header('location:../admin/index_admin.php');
                                    // }
                                } else {
                                    $_SESSION['meseger'] = '<h5 style = "color : red;">Sai tài khoản hoặc mật khẩu</h5>';
                                    header('location:login.php');
                                }
                            } else {
                                $_SESSION['meseger'] = '<h5 style = "color : red;">Sai tài khoản hoặc mật khẩu</h5>';
                                header('location:login.php');
                            }
                        }

                        ?>
                    
                    <p class="mt-3">Bạn chưa có tài khoản? <a href="./registration.php">Đăng ký</a></p>

                    </form>


                </div>


            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    </script>

</body>

</html>