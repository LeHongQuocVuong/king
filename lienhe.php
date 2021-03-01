<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>

    <!-- Liên kết CSS Bootstrap -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Font awesome -->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- CSS OwlCarousel -->
    <link rel="stylesheet" href="assets/vendor/OwlCarousel/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/OwlCarousel/css/owl.theme.default.min.css" type="text/css">
    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . './layouts/styles.php'); ?>
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="/king/assets/css/app.css" type="text/css">

    <link href="/king/assets/frontend/css/style.css" type="text/css" rel="stylesheet" />
    <style>
        .input {
            position: relative;
            z-index: 1;
            display: inline-block;
            /* margin: 1em; */
            max-width: 350px;
            width: calc(100% - 2em);
            vertical-align: top;
            font-size: 25px;
        }

        .input__field {
            position: relative;
            display: block;
            /* float: right; */
            padding: 0.8em;
            width: 60%;
            border: none;
            border-radius: 0;
            background: #f0f0f0;
            color: #aaa;
            font-weight: bold;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            -webkit-appearance: none;
            /* for box shadows to show on iOS */
        }

        .input__field:focus {
            outline: none;
        }

        .input__label {
            display: inline-block;
            /* float: right; */
            padding: 0 1em;
            width: 40%;
            color: #6a7989;
            font-weight: bold;
            font-size: 70.25%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .input__label-content {
            position: relative;
            display: block;
            padding: 1.6em 0;
            width: 100%;
        }

        .graphic {
            position: absolute;
            top: 0;
            left: 0;
            fill: none;
        }

        .icon {
            color: #ddd;
            font-size: 150%;
        }

        /* Hoshi */
        .input--hoshi {
            overflow: hidden;
        }

        .input__field--hoshi {
            /* margin-top: 1em; */
            padding: 0.85em 0.15em;
            width: 100%;
            background: transparent;
            color: #595F6E;
        }

        .input__label--hoshi {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 0 0.25em;
            width: 100%;
            height: calc(100% - 1em);
            text-align: left;
            pointer-events: none;
        }

        .input__label-content--hoshi {
            position: absolute;
        }

        .input__label--hoshi::before,
        .input__label--hoshi::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: calc(100% - 10px);
            border-bottom: 1px solid #B9C1CA;
        }

        .input__label--hoshi::after {
            margin-top: 2px;
            border-bottom: 4px solid red;
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
            -webkit-transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
        }

        .input__label--hoshi-color-1::after {
            border-color: hsl(200, 100%, 50%);
        }

        .input__label--hoshi-color-2::after {
            border-color: hsl(160, 100%, 50%);
        }

        .input__label--hoshi-color-3::after {
            border-color: hsl(20, 100%, 50%);
        }

        .input__label--hoshi-color-4::after {
            border-color: rgb(239, 255, 100);
        }

        .input__field--hoshi:focus+.input__label--hoshi::after,
        .input--filled .input__label--hoshi::after {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .input__field--hoshi:focus+.input__label--hoshi .input__label-content--hoshi,
        .input--filled .input__label-content--hoshi {
            -webkit-animation: anim-1 0.3s forwards;
            animation: anim-1 0.3s forwards;
        }

        @-webkit-keyframes anim-1 {
            50% {
                opacity: 0;
                -webkit-transform: translate3d(1em, 0, 0);
                transform: translate3d(1em, 0, 0);
            }

            51% {
                opacity: 0;
                -webkit-transform: translate3d(-1em, -40%, 0);
                transform: translate3d(-1em, -40%, 0);
            }

            100% {
                opacity: 1;
                -webkit-transform: translate3d(0, -40%, 0);
                transform: translate3d(0, -40%, 0);
            }
        }

        @keyframes anim-1 {
            50% {
                opacity: 0;
                -webkit-transform: translate3d(1em, 0, 0);
                transform: translate3d(1em, 0, 0);
            }

            51% {
                opacity: 0;
                -webkit-transform: translate3d(-1em, -40%, 0);
                transform: translate3d(-1em, -40%, 0);
            }

            100% {
                opacity: 1;
                -webkit-transform: translate3d(0, -40%, 0);
                transform: translate3d(0, -40%, 0);
            }
        }
    </style>

</head>

<body>
    <!-- header -->
    <?php include_once(__DIR__ . './layouts/partials/header.php'); ?>
    <!-- end header -->        

        <!-- Liên Hệ -->
        <div class="container p-4" style="background-color: white;">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Liên hệ</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form name="frmLienHe" id="frmLienHe" method="post" action="#" novalidate="true">

                                
                                <div class="form-row border-right text-center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <section class="content"> -->
                                            <span class="input input--hoshi">
                                                <input class="input__field input__field--hoshi" type="text" id="input-4"
                                                    name="txtHoTen" id="txtHoTen"/>
                                                <label
                                                    class="input__label input__label--hoshi input__label--hoshi-color-1"
                                                    for="input-4">
                                                    <span class="input__label-content input__label-content--hoshi">Họ
                                                        tên</span>
                                                </label>
                                            </span>
                                            <span class="input input--hoshi">
                                                <input class="input__field input__field--hoshi" type="text" id="input-5"
                                                    name="txtEmail" id="txtEmail" />
                                                <label
                                                    class="input__label input__label--hoshi input__label--hoshi-color-2"
                                                    for="input-5">
                                                    <span
                                                        class="input__label-content input__label-content--hoshi">Email</span>
                                                </label>
                                            </span>
                                            <span class="input input--hoshi">
                                                <input class="input__field input__field--hoshi" type="text" id="input-6"
                                                    name="txtSoDienThoai" id="txtSoDienThoai" />
                                                <label
                                                    class="input__label input__label--hoshi input__label--hoshi-color-3"
                                                    for="input-6">
                                                    <span class="input__label-content input__label-content--hoshi">Số
                                                        điện thoại</span>
                                                </label>

                                            </span>
                                            <span class="input input--hoshi">
                                                <input class="input__field input__field--hoshi" type="text" id="input-6"
                                                    name="txtTieude" id="txtTieude" />
                                                <label
                                                    class="input__label input__label--hoshi input__label--hoshi-color-3"
                                                    for="input-6">
                                                    <span class="input__label-content input__label-content--hoshi">Tiêu đề</span>
                                                </label>

                                            </span>
                                            <span class="input input--hoshi">
                                                <!-- <input type="text" name="txtLoiNhan" id="txtLoiNhan"
                                                    class="input__field input__field--hoshi"
                                                    v-model="loinhan"> -->
                                                <textarea name="txtLoiNhan" id="txtLoiNhan"
                                                    class="input__field input__field--hoshi"
                                                    ></textarea>
                                                <label
                                                    class="input__label input__label--hoshi input__label--hoshi-color-4"
                                                    for="input-7">
                                                    <span class="input__label-content input__label-content--hoshi">
                                                        Lời nhắn
                                                    </span>
                                                </label>

                                            </span>
                                            <!-- </section> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row pt-2">
                                    <div class="col">
                                        <button  name="btnGoiLoiNhan" type="submit" class="btn btn-primary btn-block">Gởi lời nhắn</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row border-bottom">
                        <div class="col-md-12">
                            <h1>Thông tin liên hệ</h1>
                        </div>
                    </div>
                    <div class="row border-bottom">
                        <div class="col-md-12 p-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <b>Điện thoại: </b>
                                </div>
                                <div class="col-md-10">
                                    <a href="tel:+84354685880">0354685880</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <b>Email: </b>
                                </div>
                                <div class="col-md-10">
                                    <a href="mailto:lhqvuongd20084@cusc.ctu.edu.vn">lhqvuongd20084@cusc.ctu.edu.vn</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <b>Facebook: </b>
                                </div>
                                <div class="col-md-10">
                                    <a
                                        href="https://www.facebook.com/lehongquocvuong">https://www.facebook.com/lehongquocvuong</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 embed-responsive embed-responsive-16by9" 
                            style="-webkit-box-shadow: 10px 10px 23px 0px rgba(0,0,0,0.75);
                            -moz-box-shadow: 10px 10px 23px 0px rgba(0,0,0,0.75);
                            box-shadow: 10px 10px 23px 0px rgba(0,0,0,0.75);">
                            <iframe class="embed-responsive-item"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1964.494223602636!2d105.75573176903617!3d10.017811498888394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088498a039def%3A0x9e4ebb7466f1bf92!2zSOG6u20gMTAyLCBIxrBuZyBM4bujaSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1600836479932!5m2!1svi!2s"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>


        </div>

        <div class="container-fluid  d-none d-md-block" style="background-color: white; margin-top: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row" style="padding: 10px;">
                            <h4>CÁCH THỨC THANH TOÁN</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-2 icon-pay icon-bg" style="background-position: -740px -768px;"></div>
                            <div class="col-md-2 icon-pay icon-bg" style="background-position: -309px -768px;"></div>
                            <div class="col-md-2 icon-pay icon-bg" style="background-position: -262px -828px;"></div>
                            <div class="col-md-2 icon-pay icon-bg" style="background-position: -189px -829px;"></div>
                            <div class="col-md-2 icon-pay icon-bg" style="background-position: -554px -830px;"></div>
                            <div class="col-md-2 icon-pay icon-bg" style="background-position: -896px -527px;"></div>
                        </div>

                        <div class="row" style="padding: 10px;">
                            <h4>LIÊN HỆ</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <a href="https://www.facebook.com/lehongquocvuong" class="btn" title="Facebook">
                                    <img src="assets/img/icon/face.png" alt="" style="height: 40px;">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="" class="btn" title="Youtube">
                                    <img src="assets/img/icon/youtube.png" alt="" style="height: 40px;">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="" class="btn" title="Zalo">
                                    <img src="assets/img/icon/zalo.png" alt="" style="height: 40px;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row" style="padding: 10px;">
                                    <h4>DỊCH VỤ GIAO HÀNG</h4>
                                </div>
                                <div class="row">
                                    <div class="m-2"
                                        style="background-image: url(assets/img/icon/ListLogo2.png);background-position: -142px -951px; width: 198px; height: 55px; background-size: 1000px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 m-2"
                                        style="background-image: url(assets/img/icon/ListLogo2.png);background-position: -499px -533px; width: 92px; height: 38px; background-size: 600px;">
                                    </div>
                                    <div class="col-md-4 m-2"
                                        style="background-image: url(assets/img/icon/ListLogo2.png);background-position: -0px -220px; width: 89px; height: 40px; background-size: 509px;">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4 mt-2"
                                        style="background-image: url(assets/img/icon/ListLogo2.png);background-position: -172.5px -266px; width: 81px; height: 38px; background-size: 500px;">
                                    </div>

                                    <div class="col-md-8 mt-2"><img src="assets/img/icon/LogoBest.png" alt=""
                                            style="height: 30px" class="img-fluid"></div>
                                </div>
                                <div class="row m-2">
                                    <img src="assets/img/icon/LogoAha.png" alt="" style="height: 30px">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="padding: 10px;">
                                    <h4>CHỨNG NHẬN</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <img src="assets/img/icon/ChungNhan.png" alt="" style="height: 60px;">
                                    </div>
                                    <div class="col-md-6 my-4">
                                        <img src="assets/img/icon/ChungNhan4.png" alt="" style="height: 40px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <img src="assets/img/icon/ChungNhan2.png" alt="" style="height: 80px;">
                                    </div>
                                    <div class="col-md-6 my-4">
                                        <img src="assets/img/icon/ChungNhan5.png" alt="" style="height: 40px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <img src="assets/img/icon/ChungNhan3.png" alt="" style="height: 42px;">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Back to top -->
        <button id="myBtn" title="Go to top"><i class="fa fa-caret-up" aria-hidden="true"></i></button>

        <?php
        // Load các thư viện (packages) do Composer quản lý vào chương trình
        require_once __DIR__.'./vendor/autoload.php';

        // Sử dụng thư viện PHP Mailer
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        if (isset($_POST['btnGoiLoiNhan'])) {
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            $Hoten = $_POST['txtHoTen'];
            $email = $_POST['txtEmail'];
            $sdt = $_POST['txtSoDienThoai'];
            $title = $_POST['txtTieude'];
            $message = $_POST['txtLoiNhan'];

            // Gởi mail kích hoạt tài khoản
            $mail = new PHPMailer(true);                                // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 2;                                   // Enable verbose debug output
                $mail->isSMTP();                                        // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                 // Enable SMTP authentication
                // $mail->Username = 'vuongb1706555@student.ctu.edu.vn'; // SMTP username
                // $mail->Password = 'ckznrfbqahckajwc';                   // SMTP password
                $mail->Username = 'hotro.nentangtoituonglai@gmail.com'; // SMTP username
                $mail->Password = 'yjkkdiyfjwksktot';                   // SMTP password
                $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                      // TCP port to connect to
                $mail->CharSet = "UTF-8";

                // Bật chế bộ tự mình mã hóa SSL
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                //Recipients
                // $mail->setFrom('vuongb1706555@student.ctu.edu.vn', 'Mail Liên hệ');
                $mail->setFrom('hotro.nentangtoituonglai@gmail.com', 'Mail Liên hệ');
                $mail->addAddress('lehongquocvuong@gmail.com');               // Add a recipient
                $mail->addReplyTo($email);
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');        // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name

                //Content
                $mail->isHTML(true);                                    // Set email format to HTML

                // Tiêu đề Mail
                $mail->Subject = "[Có người liên hệ] - $title";         

                // Nội dung Mail
                // Lưu ý khi thiết kế Mẫu gởi mail
                // - Chỉ nên sử dụng TABLE, TR, TD, và các định dạng cơ bản của CSS để thiết kế
                // - Các đường link/hình ảnh có sử dụng trong mẫu thiết kế MAIL phải là đường dẫn WEB có thật, ví dụ như logo,banner,...
                $body = <<<EOT
    Có người liên hệ cần giúp đỡ. <br />
    Họ và tên: $Hoten   <br />
    Email của khách: $email <br />
    Số điện thoại của khách: $sdt <br />
    Nội dung: <br />
    $message
EOT;
                $mail->Body    = $body;

                $mail->send();
            } catch (Exception $e) {
                echo 'Lỗi khi gởi mail: ', $mail->ErrorInfo;
            }
            echo "<script>alert('Đã gửi');</script>";
        }
        ?>

    

    <!-- Liên kết Jquery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <!-- Liên kết PopperJS -->
    <script src="assets/vendor/popperjs/popper.min.js"></script>
    <!-- Liên kết Bootstrap -->
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <!-- OwlCarousel -->
    <script src="assets/vendor/OwlCarousel/js/owl.carousel.min.js"></script>
    <!-- Vuejs -->
    <script src="assets/vendor/vuejs/vue.js"></script>
    <!-- Custom script - Các file js do mình tự viết -->
    <script src="assets/js/app.js"></script>

    <script src="assets/vendor/TextInputEffects/js/classie.js"></script>
    <script>
        (function () {
            // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
            if (!String.prototype.trim) {
                (function () {
                    // Make sure we trim BOM and NBSP
                    var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                    String.prototype.trim = function () {
                        return this.replace(rtrim, '');
                    };
                })();
            }

            [].slice.call(document.querySelectorAll('.input__field')).forEach(function (inputEl) {
                // in case the input is already filled..
                if (inputEl.value.trim() !== '') {
                    classie.add(inputEl.parentNode, 'input--filled');
                }

                // events:
                inputEl.addEventListener('focus', onInputFocus);
                inputEl.addEventListener('blur', onInputBlur);
            });

            function onInputFocus(ev) {
                classie.add(ev.target.parentNode, 'input--filled');
            }

            function onInputBlur(ev) {
                if (ev.target.value.trim() === '') {
                    classie.remove(ev.target.parentNode, 'input--filled');
                }
            }
        })();
    </script>
</body>

</html>