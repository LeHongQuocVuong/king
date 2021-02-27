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
    <title>Đăng nhâp</title>

    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . './layouts/styles.php'); ?>
    
    <!-- Liên kết CSS Bootstrap -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Font awesome -->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- CSS OwlCarousel -->
    <link rel="stylesheet" href="assets/vendor/OwlCarousel/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/OwlCarousel/css/owl.theme.default.min.css" type="text/css">
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="assets/css/DangNhap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">

    <style>
        
    </style>
</head>

<body>
    <!-- header -->
    <?php include_once(__DIR__ . './layouts/partials/header.php'); ?>
    <!-- end header -->
    <?php
    // Đã đăng nhập rồi -> điều hướng về trang chủ
    if (isset($_SESSION['kh_tendangnhap_logged']) && !empty($_SESSION['kh_tendangnhap_logged'])) :
    ?>
        <h2>Bạn đã đăng nhập rồi. <a href="/king/backend/">Bấm vào đây để quay về trang chủ.</a></h2>
    <?php else : ?>   
    <!-- Vuejs -->
    <div id="app">

        

        <!-- Đăng nhập -->
        <div class="container-md p-md-4">
            <div class="row">
                <div class="col-md-4 d-none d-md-block d-lg-block bg-white p-md-5 border-right">
                    <div class="DangNhap_left">
                        <div class="row">
                            <h2>Đăng nhập</h2>
                        </div>
                        <div class="row">
                            <p>Đăng nhập để theo dõi đơn hàng, lưu
                                danh sách sản phẩm yêu thích, nhận
                                nhiều ưu đãi hấp dẫn.</p>
                        </div>
                        <div class="row">
                            <img src="assets/img/icon/DangNhap.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    


                </div>
                <div class="col-md-8 bg-white p-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab"
                                        aria-controls="home" aria-selected="true">Đăng                                        nhập</a>
                                </li>
                                
                            </ul>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div >
                                <div class="tab-pane fade show active p-3">

                                    <form action="" method="post" name="frmLogin" id="frmLogin">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="kh_tendangnhap">Tên đăng nhập</label>
                                            </div>
                                            <div class="col-md-9">

                                                <div class="form-group">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Tên đăng nhập"
                                                            name="kh_tendangnhap" id="kh_tendangnhap" required autofocus title="Vui lòng nhập Tên đăng nhập">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="pass">Password</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control" id="kh_matkhau"
                                                            name="kh_matkhau" placeholder="Mật khẩu" required title="Vui lòng nhập mật khẩu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-10">
                                                <div class="row py-2">
                                                    <div class="col-md-12">
                                                        <a href="/king/dangky.php" class="text-primary">Đăng ký</a>
                                                    </div>
                                                </div>

                                                <div class="row py-2">
                                                    <div class="col-md-12">
                                                        <button name="btnDangNhap" class="btn btn-warning btn-block">
                                                            Đăng nhập</button>
                                                    </div>
                                                </div>

                                                <div class="row py-2">
                                                    <div class="col-md-12">
                                                        <button type="button"
                                                            class="btn btn-primary btn-block btn-DangNhap" data-toggle="modal" data-target="#TaoTaiKhoan">
                                                            <div class="row">
                                                                <div class="col-md-1 d-none d-lg-block">
                                                                    <i class="fa fa-facebook border-dark border-right px-3 py-2"
                                                                        style="width: 55px;" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="col-md-11 py-1">
                                                                    Đăng nhập bằng Facebook
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row py-2">
                                                    <div class="col-md-12">
                                                        <button type="button"
                                                            class="btn btn-danger btn-block btn-DangNhap" data-toggle="modal" data-target="#TaoTaiKhoan">
                                                            <div class="row">
                                                                <div class="col-md-1 d-none d-lg-block">
                                                                    <i class="fa fa-google-plus border-dark border-right px-3 py-2 "
                                                                        style="width: 55px;" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="col-md-11 py-1">
                                                                    Đăng nhập bằng Google
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row py-2">
                                                    <div class="col-md-12">
                                                        <button type="button"
                                                            class="btn btn-primary btn-block btn-DangNhap" data-toggle="modal" data-target="#TaoTaiKhoan">
                                                            <div class="row">
                                                                <div class="col-md-1 d-none d-lg-block">
                                                                    <i class="fa fa-twitter border-dark border-right px-3 py-2 "
                                                                        style="width: 55px;" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="col-md-11 py-1">
                                                                    Đăng nhập bằng Twitter
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </form>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid d-none d-md-block" style="background-color: white; margin-top: 10px;">
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
            include_once(__DIR__ . '../dbconnect.php');

            if(isset($_POST['btnDangNhap'])){
                $kh_tendangnhap = addslashes($_POST['kh_tendangnhap']);
                $kh_matkhau = addslashes($_POST['kh_matkhau']);
                // Câu lệnh SELECT Kiểm tra đăng nhập...
                $sqlSelect = <<<EOT
                SELECT *
                FROM khachhang kh
                WHERE kh.kh_tendangnhap = '$kh_tendangnhap' AND kh.kh_matkhau = '$kh_matkhau';
EOT;
                // var_dump($sqlSelect);die;
                // Thực thi SELECT
                $result = mysqli_query($conn, $sqlSelect);

                // Sử dụng hàm `mysqli_num_rows()` để đếm số dòng SELECT được
                // Nếu có bất kỳ dòng dữ liệu nào SELECT được <-> Người dùng có tồn tại và đã đúng thông tin USERNAME, PASSWORD
                if (mysqli_num_rows($result) > 0) {

                    // Lưu thông tin Tên tài khoản user đã đăng nhập
                    $_SESSION['kh_tendangnhap_logged'] = $kh_tendangnhap;

                    echo 'Đăng nhập thành công!';
                    // Điều hướng (redirect) về trang chủ
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if($row['kh_quantri'])
                        echo '<script>location.href = "/king/backend/pages/dashboard.php";</script>';
                    else echo '<script>location.href = "/king/index.php";</script>';
                } else {
                    echo '<h2 style="color: red;">Đăng nhập thất bại!</h2>';
                }
            }
        endif;
        ?>

    </div>
    <!-- Hết div Vuejs -->

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
    <script src="assets/js/DangNhap.js"></script>

    <script>
        
    </script>

</body>

</html>