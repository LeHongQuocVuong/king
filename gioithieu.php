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
    <title>Giới thiệu</title>

    <!-- Liên kết CSS Bootstrap -->
    <link href="/king/assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Font awesome -->
    <link rel="stylesheet" href="/king/assets/vendor/font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . './layouts/styles.php'); ?>
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="/king/assets/css/app.css" type="text/css">

    <link href="/king/assets/frontend/css/style.css" type="text/css" rel="stylesheet" />

    <!-- Aos -->
    <link rel="stylesheet" href="/king/assets/vendor/aos/aos.css" type="text/css">
    

    <style>
        .GioiThieu {
            background: #082330;
            background-size: 0.12em 100%;
            font: 16em/1 Arial;
        }

        .text--line {
            font-size: 700px;
        }

        .svg1 {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .text-copy {
            fill: none;
            stroke: white;
            stroke-dasharray: 7% 28%;
            stroke-width: 7px;
            -webkit-animation: stroke-offset 9s infinite linear;
            animation: stroke-offset 9s infinite linear;
        }

        .text-copy:nth-child(1) {
            stroke: #360745;
            stroke-dashoffset: 7%;
        }

        .text-copy:nth-child(2) {
            stroke: #D61C59;
            stroke-dashoffset: 14%;
        }

        .text-copy:nth-child(3) {
            stroke: #E7D84B;
            stroke-dashoffset: 21%;
        }

        .text-copy:nth-child(4) {
            stroke: #EFEAC5;
            stroke-dashoffset: 28%;
        }

        .text-copy:nth-child(5) {
            stroke: #1B8798;
            stroke-dashoffset: 35%;
        }

        @-webkit-keyframes stroke-offset {
            50% {
                stroke-dashoffset: 35%;
                stroke-dasharray: 0 87.5%;
            }
        }

        @keyframes stroke-offset {
            50% {
                stroke-dashoffset: 35%;
                stroke-dasharray: 0 87.5%;
            }
        }
    </style>


</head>

<body>
    <!-- header -->
    <?php include_once(__DIR__ . './layouts/partials/header.php'); ?>
    <!-- end header -->

        <!-- Tính năng Marketing -->
        <div class="container marketing">
            <!-- Giới thiệu -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row mt-2" style="height: 200px;" data-aos="flip-up">
                        <div class="col-md-12 GioiThieu">
                            <svg class="svg1" viewBox="0 0 2500 500">
                                <symbol id="s-text">

                                    <text text-anchor="middle" x="50%" y="68%" class="text--line2">
                                        Giới thiệu
                                    </text>

                                </symbol>

                                <g class="g-ants">
                                    <use xlink:href="#s-text" class="text-copy"></use>
                                    <use xlink:href="#s-text" class="text-copy"></use>
                                    <use xlink:href="#s-text" class="text-copy"></use>
                                    <use xlink:href="#s-text" class="text-copy"></use>
                                    <use xlink:href="#s-text" class="text-copy"></use>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="row py-2" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                        <div class="col-md-12 text-center" style="font-size: 20px;">
                            Trang web là đồ án của sinh viên Lê Hồng Quốc Vương, MSSV: B1706555, Trường đại học Cần Thơ
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/CbLXZbc-z3g"
                                class="embed-responsive-item"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Three columns of text below the carousel -->
            <div class="row text-center pt-2">
                <div class="col-lg-4 aos-init aos-animate" data-aos="slide-left">
                    <img class="bd-placeholder-img rounded-circle" src="/king/assets/img/icon/icon-1.png">
                    <h2>Đặt hàng</h2>
                    <p>Chọn sản phẩm bạn yêu thích, và Đặt hàng.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4 aos-init aos-animate" data-aos="slide-up">
                    <img class="bd-placeholder-img rounded-circle img-fluid" src="/king/assets/img/icon/icon-2.png">
                    <h2>Tạo đơn hàng</h2>
                    <p>Theo dõi đơn hàng của bạn.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4 aos-init aos-animate" data-aos="slide-right">
                    <img class="bd-placeholder-img rounded-circle img-fluid" src="/king/assets/img/icon/icon-3.png">
                    <h2>Giao hàng</h2>
                    <p>Giao hàng tận nơi.</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->
            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7 aos-init aos-animate" data-aos="zoom-out-right">
                    <h2 class="featurette-heading">Đặt hàng, Tạo đơn hàng, Giao hàng <span class="text-muted">Nhanh
                            chóng</span>
                    </h2>
                    <p class="lead">Nơi mua sắm tuyệt vời cho mọi lứa tuổi.</p>
                </div>
                <div class="col-md-5 aos-init aos-animate" data-aos="zoom-out-left">
                    <img src="/king/assets/img/marketing/marketing-1.png" class="img-fluid">
                </div>
            </div>

            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7 order-md-2 aos-init aos-animate" data-aos="fade-right" data-aos-offset="300">
                    <h2 class="featurette-heading">Báo cáo Doanh thu tuyệt vời <span class="text-muted">Theo dõi đơn
                            hàng của
                            bạn.</span></h2>
                    <p class="lead">Hệ thống theo dõi đơn hàng chi tiết, thông tin mọi lúc mọi nơi.</p>
                </div>
                <div class="col-md-5 order-md-1 aos-init aos-animate" data-aos="zoom-out">
                    <img src="/king/assets/img/marketing/marketing-2.png" class="img-fluid">
                </div>
            </div>

            <hr class="featurette-divider">
            <!-- /END THE FEATURETTES -->
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
                                    <img src="/king/assets/img/icon/face.png" alt="" style="height: 40px;">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="" class="btn" title="Youtube">
                                    <img src="/king/assets/img/icon/youtube.png" alt="" style="height: 40px;">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="" class="btn" title="Zalo">
                                    <img src="/king/assets/img/icon/zalo.png" alt="" style="height: 40px;">
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

                                    <div class="col-md-8 mt-2"><img src="/king/assets/img/icon/LogoBest.png" alt=""
                                            style="height: 30px" class="img-fluid"></div>
                                </div>
                                <div class="row m-2">
                                    <img src="/king/assets/img/icon/LogoAha.png" alt="" style="height: 30px">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="padding: 10px;">
                                    <h4>CHỨNG NHẬN</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <img src="/king/assets/img/icon/ChungNhan.png" alt="" style="height: 60px;">
                                    </div>
                                    <div class="col-md-6 my-4">
                                        <img src="/king/assets/img/icon/ChungNhan4.png" alt="" style="height: 40px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <img src="/king/assets/img/icon/ChungNhan2.png" alt="" style="height: 80px;">
                                    </div>
                                    <div class="col-md-6 my-4">
                                        <img src="/king/assets/img/icon/ChungNhan5.png" alt="" style="height: 40px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <img src="/king/assets/img/icon/ChungNhan3.png" alt="" style="height: 42px;">
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


    
    <!-- Liên kết Jquery -->
    <script src="/king/assets/vendor/jquery/jquery.min.js"></script>
    
    <!-- Liên kết Bootstrap -->
    <script src="/king/assets/vendor/bootstrap/js/bootstrap.js"></script>
    
    <!-- Aos -->
    <script src="/king/assets/vendor/aos/aos.js"></script>
    <!-- Custom script - Các file js do mình tự viết -->
    <!-- <script src="/king/assets/js/app.js"></script> -->
    <!-- footer -->
    <?php include_once(__DIR__ . './layouts/partials/footer.php'); ?>
    <!-- end footer -->

    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
    <?php include_once(__DIR__ . './layouts/scripts.php'); ?>

    <script>
        AOS.init();
    </script>

</body>

</html>