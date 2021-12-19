<?php
// session_start();
include('../config/db.php');
include('../QuanLy/ham.php');
include('../Khach/function.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './Email/Exception.php';
require './Email/PHPMailer.php';
require './Email/SMTP.php';
?>
<!-- <style>
    .login {
        width: 100%;
    }

    .img-fluid {
        border-radius: 20px;
    }

    .check_input {
        color: red;
    }

    .err {
        color: red;
        font-size: 12px;
    }
</style> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center ">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="../Image/logo.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h2>Đăng ký</h2>
                    <br>
                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Họ Tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hoten" required name="k_ten" value="<?php
                                                                                                                if (isset($_COOKIE['coo_k_ten'])) {
                                                                                                                    echo $_COOKIE['coo_k_ten'];
                                                                                                                }
                                                                                                                ?>">
                            </div>
                            <span class="col-sm-1 col-form-label check_input"></span>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Giới tính</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input checked class="form-check-input" type="radio" name="k_gioitinh" id="inlineRadio1" value="Nam">
                                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="k_gioitinh" id="inlineRadio2" value="Nữ">
                                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Ngày sinh</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input id="k_ngaysinh" type="date" id="k_ngsinh" name="k_ngsinh" value="<?php
                                                                                                            // if (isset($_COOKIE['coo_k_ngsinh'])) {
                                                                                                            //     echo $_COOKIE['coo_k_ngsinh'];
                                                                                                            // }
                                                                                                            ?>">
                                    <div class="err err_ngsinh"></div>
                                </div>
                            </div>
                            <span class="col-sm-1 col-form-label check_input check_ngsinh"></span>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" name="k_email" class="form-control" id="k_email" required>
                                <div class="err err_email"></div>
                            </div>
                            <span class="col-sm-1 col-form-label check_input check_email"></span>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="k_pass" class="form-control" id="pass" required>
                            </div>
                            <span class="col-sm-1 col-form-label check_input"></span>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Pass again</label>
                            <div class="col-sm-8">
                                <input type="password" name="k_pass_again" class="form-control" id="pass_again" required>
                                <div class="err err_pass"></div>
                            </div>
                            <span class="col-sm-1 col-form-label check_input check_pass"></span>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Điện thoại</label>
                            <div class="col-sm-8">
                                <input type="text" name="k_sdt" class="form-control" id="inputPassword" required>
                            </div>
                            <span class="col-sm-1 col-form-label check_input"></span>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" name="k_diachi" class="form-control" id="inputPassword" required>
                            </div>
                            <span class="col-sm-1 col-form-label check_input"></span>
                        </div>
                        <button type="submit" id="btn_dky" name="btn_dk" class="btn btn-success">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
                    if (isset($_POST['btn_dk'])) {
                        $k_ten = $_POST['k_ten'];
                        setcookie("coo_k_ten", $k_ten, time() + 60 * 5);
                        $k_gioitinh = $_POST['k_gioitinh'];
                        $k_ngsinh = $_POST['k_ngsinh'];
                        setcookie("coo_k_ngsinh", $k_ngsinh, time() + 60 * 5);
                        $k_email = $_POST['k_email'];
                        $k_pass = $_POST['k_pass'];
                        $k_pass_again = $_POST['k_pass_again'];
                        $k_sdt = $_POST['k_sdt'];
                        $k_diachi = $_POST['k_diachi'];
                        $qr = slt_email($k_email);
                        if (mysqli_num_rows($qr) > 0) {
                        } else {
                            if ($k_pass == $k_pass_again) {
                                setcookie("code", mt_rand(1000, 9999), time() + 300);
                                if (isset($_COOKIE['code'])) {
                                    $code = $_COOKIE['code'];
                                    $code_k = md5($code);
                                    $mail = new PHPMailer(true);
                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                                        $mail->isSMTP(); // gửi mail SMTP
                                        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                                        $mail->SMTPAuth = true; // Enable SMTP authentication
                                        $mail->Username = 'loglog050801@gmail.com'; // SMTP username
                                        $mail->Password = 'kmpzyvxwqrgezkgw'; // SMTP password
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                                        $mail->Port = 587; // TCP port to connect to
                                        $mail->CharSet = 'UTF-8';
                                        //Recipients
                                        $mail->setFrom('loglog050801@gmail.com', 'Mã xác nhận đăng ký tài khoả đăng ký tài khoản');

                                        $mail->addReplyTo('loglog050801@gmail.com', 'Mã xác nhận đăng ký tài khoản');

                                        $mail->addAddress($k_email); // Add a recipient
                                        // Content
                                        $mail->isHTML(true);   // Set email format to HTML
                                        $tieude = '[Mã xác nhận] Lấy lại mật khẩu - Trường DH Thủy Lợi';
                                        $mail->Subject = $tieude;
                                        // Mail body content 
                                        $bodyContent = '<p>Thân gửi người dùng . </h1>';
                                        $bodyContent .= '<p>Vui lòng nhấn vào linh sau để kích hoạt tài khoản :"</p>';
                                        $bodyContent .= '<p>Nhấn vào đây để kích hoạt <a href="http://localhost:88/finsh/book_store/Login/process_dk.php?email=' . $k_email . '&code=' . $code_k . '">Xác nhận</a></p>';
                                        $bodyContent .= '<p>Note: Mã xác nhận tồn tại trong 5 phút .</p>';
                                        $bodyContent .= '<p>Chú ý: Không trả lời thư này.Xin trân trọng cảm ơn !</p>';
                                        $bodyContent .= '<p><b>Thân mến!</b></p>';
                                        $mail->Body = $bodyContent;
                                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                        if ($mail->send()) {
                                            echo 'Thư đã được gửi đi';
                                            
                                        } else {
                                            echo 'Lỗi. Thư chưa gửi được';
                                        }
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                }
                             
                            }
                        }
                    }
                    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#k_email').blur(function() {
                val = $(this).val()
                $.ajax({
                    url: "process_dk.php",
                    method: "POST",
                    data: {
                        val: val
                    },
                    success: function(dt) {
                        if (dt != '') {
                            $('.check_email').html('*')
                            $('.err_email').html(dt)
                        } else {
                            $('.err_email').html(dt)
                            $('.check_email').html('')
                        }
                    }
                })
            })

            $('#pass_again').blur(function() {
                pass = $('#pass').val();
                pass_again = $(this).val();
                if (pass == pass_again) {
                    $('.check_pass').html('')
                    $('.err_pass').html('')
                } else {
                    $('.check_pass').html('*')
                    $('.err_pass').html('Mật khẩu xác nhận không khớp.')
                }

            })

            $('#k_ngsinh').blur(function() {
                ngsinh = new Date($(this).val())
                ngsinh_par = Date.parse(ngsinh)
                now = new Date().toLocaleDateString()
                now_par = Date.parse(now)
                if (ngsinh_par > now_par) {
                    $('.check_ngsinh').html('*')
                    $('.err_ngsinh').html('Ngày sinh không thể hơn ngày hiện tại .')
                } else {
                    $('.check_ngsinh').html('*')
                    $('.err_ngsinh').html('Ngày sinh không thể hơn ngày hiện tại .')
                }

            })


        })
    </script>

</body>

</html>