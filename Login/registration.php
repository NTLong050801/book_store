    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../sendEmail/Exception.php';
    require '../sendEmail/PHPMailer.php';
    require '../sendEmail/SMTP.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-
    oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .gradient-custom {

            /* fallback for old browsers */
            background: #f093fb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>
    <title>Đăng ký</title>
</head>

<body>
    <?php
        include('../config/db.php');
            if(isset($_POST['btnSubmit'])){
                $Name = $_POST['Name'];
                $Phone = $_POST['Phone'];
                $Birthday = $_POST['Birthday'];
                $Gender = $_POST['Gender'];
                $Email = $_POST['Email'];
                $Avatar = basename($_FILES['Avatar']['name']);
                $Pass1 = $_POST['Pass1'];
                $Pass2 = $_POST['Pass2'];
                // $code = md5(rand());
                $fileAvatar = "../Image/Avatar".$Avatar;
                $pash_hash = password_hash($Pass1, PASSWORD_DEFAULT);
                //Check email
                $checkMail = mysqli_query($conn, "SELECT * FROM users where u_email = '$Email'");
                if(mysqli_num_rows($checkMail) > 0 ){
                    echo "Email đã tồn tại";
                }
                else{
                    if($Pass1 == $Pass2){
                        if(move_uploaded_file($_FILES['Avatar']['tmp_name'], $fileAvatar)){
                            $inUser = mysqli_query($conn, "INSERT INTO users(u_email, u_pass) VALUES('$Email','$pash_hash')");
                            $inKhach = mysqli_query($conn, "INSERT INTO khach(k_ten, k_gt, k_ngsinh, k_email, k_sdt, k_avatar)
                                                            VALUES ('$Name','$Gender','$Birthday','$Email','$Phone','$fileAvatar')");
                              $_SESSION['check-email'] = "<h3 class='text-success text-center'>Vui lòng kiểm tra email để kích hoạt tài khoản</h3>";
                              header('location:login.php');
  
                              $mail = new PHPMailer(true);
                              try {
                                //Server settings
                                $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                                $mail->isSMTP(); // gửi mail SMTP
                                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                                $mail->SMTPAuth = true; // Enable SMTP authentication
                                $mail->Username = 'aplungduoc1@gmail.com'; // SMTP username
                                $mail->Password = 'ewrrnyxljvripypm'; // SMTP password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                                $mail->Port = 587; // TCP port to connect to
                                $mail->CharSet = 'UTF-8';
                                //Recipients
                                $mail->setFrom('aplungduoc1@gmail.com', 'MinhHN');

                                $mail->addReplyTo('aplungduoc1@gmail.com', 'MinhHN');

                                $mail->addAddress($Email); // Add a recipient
                                // Content
                                $mail->isHTML(true);   // Set email format to HTML
                                $tieude = '[Đăng ký tài khoản] Book Store';
                                $mail->Subject = $tieude;


                                //  Mail body content 
                                $bodyContent = '<h2><p>Xin chào<p></h2>';
                                $bodyContent .= '<p>Nhấn vào đây để kích hoạt <a href="http://localhost/book_store/Login/confirmMail.php?email='.$Email.'">Xác nhận</a></p>';
                                $bodyContent .= '<p>Vui lòng không trả lời thư này .</p>';
                                $bodyContent .= '<p><b>Trân trọng cảm ơn !</b></p>';
                                $bodyContent .= '<p><b>Chào !Thân ái!</b></p>';

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
                    else{
                        echo "Mật khẩu nhập lại chưa đúng";
                    }
                }
            }
    ?>
  
    <section class=" gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form method="POST" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input name="Name" type="text" id="firstName" class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">Họ tên</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input name="Phone" type="tel" id="lastName" class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Số điện thoại</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <input name="Birthday" type="date" class="form-control form-control-lg" id="birthdayDate" />
                                            <label for="birthdayDate" class="form-label">Birthday</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input name="Gender" class="form-check-input" type="radio" id="femaleGender" value="Nữ" checked />
                                            <label class="form-check-label" for="femaleGender">Nữ</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input name="Gender" class="form-check-input" type="radio" id="maleGender" value="Nam" />
                                            <label class="form-check-label" for="maleGender">Nam</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input name="Gender" class="form-check-input" type="radio" id="otherGender" value="Khác" />
                                            <label class="form-check-label" for="otherGender">Khác</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input name="Email" type="email" id="emailAddress" class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Email</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="file" name="Avatar" id="file" class="form-control form-control-lg">
                                            <label class="form-label" for="file">Avatar</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input name="Pass1" type="text" id="pass1" class="form-control form-control-lg" />
                                            <label class="form-label" for="pass1">Mật khẩu</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input name="Pass2" type="text" id="pass2" class="form-control form-control-lg" />
                                            <label class="form-label" for="pass2">Nhập lại mật khẩu</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2 mb-2">
                                    <input name="btnSubmit" class="btn btn-primary btn-lg" type="submit" value="Đăng ký" />
                                </div>
                                <span>Bạn đã có tài khoản? <a href="./login.php">Đăng nhập</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>