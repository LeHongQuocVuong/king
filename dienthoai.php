<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lê Hồng Quốc Vương</title>

    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . '/layouts/styles.php'); ?>
    <!-- CSS OwlCarousel -->
    <link rel="stylesheet" href="assets/vendor/OwlCarousel/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/OwlCarousel/css/owl.theme.default.min.css" type="text/css">
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">

    <link href="/king/assets/frontend/css/style.css" type="text/css" rel="stylesheet" />

    <style>
        .homepage-slider-img {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }
        .btn.is-checked {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- header -->
    <?php include_once(__DIR__ . '/layouts/partials/header.php'); ?>
    <!-- end header -->

    <main role="main" class="mb-2">
        <!-- Block content -->
        <?php
        // Hiển thị tất cả lỗi trong PHP
        // Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
        // Không nên hiển thị lỗi trên môi trường Triển khai (Production)
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__ . '/dbconnect.php');

        
        // 2. điện thoại
        $dienthoai = <<<EOT
        SELECT sp.sp_ma, sp.sp_ten, sp.lsp_ma, sp.nsx_ma, sp.sp_gia, sp.sp_giacu, sp.sp_soluong, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
        FROM sanpham sp
        JOIN loaisanpham lsp ON sp.lsp_ma = lsp.lsp_ma
        LEFT JOIN hinhsanpham hsp ON sp.sp_ma = hsp.sp_ma
        WHERE sp.lsp_ma = 3
        GROUP BY sp.sp_ma, sp.sp_ten, sp.lsp_ma, sp.nsx_ma, sp.sp_gia, sp.sp_giacu, sp.sp_mota_ngan, sp.sp_soluong, lsp.lsp_ten
        ORDER BY sp.sp_ma DESC;
EOT;

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $resultdienthoai = mysqli_query($conn, $dienthoai);

        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $datadienthoai = [];
        while ($rowdienthoai = mysqli_fetch_array($resultdienthoai, MYSQLI_ASSOC)) {
            $datadienthoai[] = array(
                'sp_ma' => $rowdienthoai['sp_ma'],
                'sp_ten' => $rowdienthoai['sp_ten'],
                'lsp_ma' => $rowdienthoai['lsp_ma'],
                'nsx_ma' => $rowdienthoai['nsx_ma'],
                'sp_gia' => $rowdienthoai['sp_gia'],
                'sp_giacu' => number_format($rowdienthoai['sp_giacu'], 0, ".", ","),
                'sp_soluong' => $rowdienthoai['sp_soluong'],
                'lsp_ten' => $rowdienthoai['lsp_ten'],
                'hsp_tentaptin' => $rowdienthoai['hsp_tentaptin'],
            );
        }

        ?>

        <!-- Slider -->
        <div class="container my-2">
            <div class="row">
                <div class="col-md-8" style="padding: unset;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/king/assets/img/slider/banner1.png" class="d-block img-fluid slider" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/king/assets/img/slider/banner2.png" class="d-block  img-fluid slider" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/king/assets/img/slider/banner3.png" class="d-block  img-fluid slider" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/king/assets/img/slider/banner4.png" class="d-block  img-fluid slider" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/king/assets/img/slider/banner5.png" class="d-block  img-fluid slider" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/king/assets/img/slider/banner6.png" class="d-block  img-fluid  slider" alt="...">
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 homenew" style="background-color: white;">
                    <div class="row">
                        <div class="col-md-12 border-bottom mb-3">
                            <h2>
                                <a href="#">Tin công nghệ</a>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <img src="/king/assets/img/slider/qc1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <img src="/king/assets/img/slider/qc2.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Điện thoại nổi bật -->
            <div class="container NoiBat">

                <div class="row NoiBat-Title">
                    <div class="col-md-4 pt-2">
                        <h5>ĐIỆN THOẠI NỖI BẬT NHẤT</h5>
                    </div>
                    <div class="col-md-8 d-none d-md-block">
                        <div class="row">
                            <div class="col-md-2 NoiBat-a">
                                <a href="dienthoai.php">Samsung Galaxy Mới</a>

                            </div>
                            <div class="col-md-2 pt-2 NoiBat-a"><a href="dienthoai.php">Iphone Pro Max</a>
                            </div>
                            <div class="col-md-2 pt-2 NoiBat-a"><a href="dienthoai.php">Iphone 11</a></div>
                            <div class="col-md-2 pt-2 NoiBat-a"><a href="dienthoai.php">Redmi Note</a></div>
                            <div class="col-md-2 pt-2 NoiBat-a"><a href="dienthoai.php">Oppo Reno 4</a></div>
                            <div class="col-md-2 pt-2 NoiBat-a"><a href="dienthoai.php">Xem tất cả</a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pl-0 a-product">
                        <a href="">
                            <img src="assets/img/product/1_dt_NoiBat.jpg" alt="" style="width: 555px;" class="img-fluid">
                            
                        </a>
                    </div>
                    <?php for($i=0;$i<3;$i++):?>
                        <div class="col-md-2 a-product">
                            <a href="./detail.php?sp_ma=<?= $datadienthoai[$i]['sp_ma'] ?>">
                                <!-- Nếu có hình sản phẩm thì hiển thị -->
                                <?php if (!empty($datadienthoai[$i]['hsp_tentaptin'])) : ?>
                                    <img src="/king/assets/uploads/products/<?= $datadienthoai[$i]['hsp_tentaptin'] ?>" alt=""
                                        class="img-carousel" style="width: 150px; height: 150;">
                                <!-- Nếu không có hình sản phẩm thì hiển thị ảnh mặc định -->
                                <?php else : ?>
                                    <img src="/king/assets/uploads/products/default-image_600.png" alt=""
                                        class="img-carousel" style="width: 150px; height: 150;">   
                                <?php endif; ?>
                                <h6><?= $datadienthoai[$i]['sp_ten'] ?></h6>
                                <small>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5"><strong style="color: red; "><?= $datadienthoai[$i]['sp_gia'] ?></strong>
                                        </div>
                                        <div class="col-md-5"><del><?= $datadienthoai[$i]['sp_giacu'] ?></del></div>
                                    </div>
                                </small>
                                <label class="Tragop">Trả góp 0%</label>
                            </a>
                        </div>
                    <?php endfor; ?>  
                </div>
                <div class="row">
                    <div class="col-md-6 pl-0 a-product">
                        <a href="">
                            <img src="assets/img/product/1_dt_NoiBat2.jpg" alt="" style="width: 555px;" class="img-fluid">
                            
                        </a>
                    </div>
                    <?php for($i=3;$i<6;$i++):?>
                        <div class="col-md-2 a-product">
                            <a href="./detail.php?sp_ma=<?= $datadienthoai[$i]['sp_ma'] ?>">
                                <!-- Nếu có hình sản phẩm thì hiển thị -->
                                <?php if (!empty($datadienthoai[$i]['hsp_tentaptin'])) : ?>
                                    <img src="/king/assets/uploads/products/<?= $datadienthoai[$i]['hsp_tentaptin'] ?>" alt=""
                                        class="img-carousel" style="width: 150px; height: 150;">
                                <!-- Nếu không có hình sản phẩm thì hiển thị ảnh mặc định -->
                                <?php else : ?>
                                    <img src="/king/assets/uploads/products/default-image_600.png" alt=""
                                        class="img-carousel" style="width: 150px; height: 150;">   
                                <?php endif; ?>
                                <h6><?= $datadienthoai[$i]['sp_ten'] ?></h6>
                                <small>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5"><strong style="color: red; "><?= $datadienthoai[$i]['sp_gia'] ?></strong>
                                        </div>
                                        <div class="col-md-5"><del><?= $datadienthoai[$i]['sp_giacu'] ?></del></div>
                                    </div>
                                </small>
                                <label class="Tragop">Trả góp 0%</label>
                            </a>
                        </div>
                    <?php endfor; ?>  
                </div>

            </div>

        <!-- Hãng điện thoại -->
        <div class="container pt-2 filters">
            
            <div class="btn-group button-group flex-wrap flex-md-nowrap" role="group" aria-label="Basic example" data-filter-group="HDT">

                <button type="button" class="btn btn-outline-primary" data-type=".type1" title="Iphone">
                    <img src="assets/img/logo/iPhone.jpg" class="img-fluid d-none d-sm-block" alt="">
                    <div class="d-sm-none d-block">Iphone</div>
                </button>


                <button type="button" class="btn btn-outline-primary" data-type=".type2" title="Samsung">
                    <img src="assets/img/logo/Samsung.jpg" class="img-fluid d-none d-sm-block" alt="">
                    <div class="d-sm-none d-block">Samsung</div>
                </button>


                <button type="button" class="btn btn-outline-primary" data-type=".type3" title="Xiaomi">
                    <img src="assets/img/logo/Xiaomi.jpg" class="img-fluid d-none d-sm-block" alt="">
                    <div class="d-sm-none d-block">Xiaomi</div>
                </button>


                <button type="button" class="btn btn-outline-primary" data-type=".type4" title="Realme">
                    <img src="assets/img/logo/Realme.png" class="img-fluid d-none d-sm-block" alt="">
                    <div class="d-sm-none d-block">Realme</div>
                </button>


                <button type="button" class="btn btn-outline-primary" data-type=".type5" title="Vsmart">
                    <img src="assets/img/logo/Vsmart.png" class="img-fluid d-none d-sm-block" alt="">
                    <div class="d-sm-none d-block">Vsmart</div>
                </button>


                <button type="button" class="btn btn-primary is-checked" data-type=".all" title="Tất cả">
                    Tất cả
                </button>



            </div>
            <!-- Mức giá -->

            <div class="row text-center pt-2" style="background-color: white;">
                <div class="col-md-2 text-md-right pt-1">Chọn mức giá:</div>

                <div class="col-md-6 pl-0">
                    <div class="btn-group button-group" role="group" aria-label="Basic example" data-filter-group="Gia">
                        <button type="button" class="btn btn-primary btnGia btnGia0 is-checked" data-type=".btnGiaAll"
                            title="Tất cả">
                            Tất cả
                        </button>
                        <button type="button" class="btn btn-primary btnGia btnGia1" data-type=".Duoi7"
                            title="Dưới 7 triệu">
                            Dưới 7 triệu
                        </button>
                        <button type="button" class="btn btn-primary btnGia btnGia2" data-type=".7_13"
                            title="Từ 7 triệu đến 13 triệu">
                            Từ 7 triệu đến 13 triệu
                        </button>
                        <button type="button" class="btn btn-primary btnGia btnGia3" data-type=".Tren13"
                            title="Trên 13 triệu">
                            Trên 13 triệu
                        </button>


                    </div>
                </div>
                
            </div>

        </div>




        <!-- Điện thoai -->
        <div class="container">
            <div class="Title-IsoTope bg-white h2 pt-3 row" style="padding: unset; margin-bottom: unset;">
                Tất cả
            </div>
            <div class="row row-cols-1 row-cols-md-4 bg-white IsoTope">
                <?php foreach($datadienthoai as $dienthoai): ?>
                    <div class="col a-product border pb-3 all btnGiaAll
                        <?php if($dienthoai['nsx_ma']==1) echo "type1 ";
                                elseif($dienthoai['nsx_ma']==2) echo "type2 ";
                                    elseif($dienthoai['nsx_ma']==3) echo "type3 ";
                                        elseif($dienthoai['nsx_ma']==12) echo "type4 ";
                                            elseif($dienthoai['nsx_ma']==11) echo "type5 ";
                                if($dienthoai['sp_gia'] <7000000 ) echo "Duoi7";
                                    elseif($dienthoai['sp_gia'] <13000000 ) echo "7_13";
                                        else echo "Tren13";
                            ?>
                        ">
                        <a href="./detail.php?sp_ma=<?= $dienthoai['sp_ma'] ?>">
                            <!-- Nếu có hình sản phẩm thì hiển thị -->
                            <?php if (!empty($dienthoai['hsp_tentaptin'])) : ?>
                                <img src="/king/assets/uploads/products/<?= $dienthoai['hsp_tentaptin'] ?>" alt=""
                                style="width: 180px; height: 180px;" class="img-fluid">
                            <!-- Nếu không có hình sản phẩm thì hiển thị ảnh mặc định -->
                            <?php else : ?>
                                <img src="/king/assets/uploads/products/default-image_600.png" alt=""
                                    class="img-carousel" style="width: 150px; height: 150;">   
                            <?php endif; ?>
                            <h6><?= $dienthoai['sp_ten'] ?></h6>
                            <small>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <strong style="color: red; "><?= number_format($dienthoai['sp_gia'], 0, ".", ",") ?></strong>
                                        </div>
                                        <div class="col-md-5"><del><?= $dienthoai['sp_giacu'] ?></del></div>
                                    </div>
                            </small>
                            <label class="Tragop">Trả góp 0%</label>
                            <img src="assets/img/icon/icon_BH.png" alt="" class="BaoHanh" style="left: 210px;">
                        </a>
                    </div>
                <?php endforeach;?>
                

            </div>
        </div>
        
            
        <div class="container-fluid d-none d-md-block" style="background-color: white; margin-top: 10px;">
            <div class="row">
                <div class="container-fluid d-none d-md-block" style="background-color: #f1faf3;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 border-right py-1 text-center">
                                <img src="assets/img/logo/GiaoHang.png" style="width: 35px; height: 34px;" alt="">
                                <span>Giao hàng nhanh chóng</span>
                            </div>
                            <div class="col-md-3 border-right py-1 text-center">
                                <img src="assets/img/logo/thanhtoan.png" style="width: 35px; height: 34px;" alt="">
                                <span>Thanh toán: tiền mặt, trả góp</span>
                            </div>
                            <div class="col-md-3 border-right py-1 text-center">
                                <img src="assets/img/logo/Loi.png" style="width: 35px; height: 34px;" alt="">
                                <span>Lỗi đổi tại nhà nhanh chóng</span>
                            </div>
                            <div class="col-md-3 py-1 text-center">
                                <img src="assets/img/logo/HoTro.png" style="width: 35px; height: 34px;" alt="">
                                <span>Hỗ trợ suốt thời gian sử dụng.</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row" style="padding: 10px;">
                                <h4>CÁCH THỨC THANH TOÁN</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-2 icon-pay icon-bg" style="background-position: -740px -768px;">
                                </div>
                                <div class="col-md-2 icon-pay icon-bg" style="background-position: -309px -768px;">
                                </div>
                                <div class="col-md-2 icon-pay icon-bg" style="background-position: -262px -828px;">
                                </div>
                                <div class="col-md-2 icon-pay icon-bg" style="background-position: -189px -829px;">
                                </div>
                                <div class="col-md-2 icon-pay icon-bg" style="background-position: -554px -830px;">
                                </div>
                                <div class="col-md-2 icon-pay icon-bg" style="background-position: -896px -527px;">
                                </div>
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


        </div>

        <!-- Back to top -->
        <button id="myBtn" title="Go to top"><i class="fa fa-caret-up" aria-hidden="true"></i></button>

        <!-- End block content -->
    </main>

    <!-- footer -->
    <?php include_once(__DIR__ . '/layouts/partials/footer.php'); ?>
    <!-- end footer -->

    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
    <?php include_once(__DIR__ . '/layouts/scripts.php'); ?>
    <!-- OwlCarousel -->
    <script src="assets/vendor/OwlCarousel/js/owl.carousel.min.js"></script>
    <!-- Isotope -->
    <script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
    <!-- swiper -->
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    
    <!-- Custom script - Các file js do mình tự viết -->
    <script src="/king/assets/js/app.js"></script>
    <script>
        var HDT = '';
        $(document).ready(function () {
            // Isotope__________________________

            var $grid = $('.IsoTope').isotope({
                itemSelector: '.a-product',
            });

            // store filter for each group
            var filters = {};

            $('.filters').on('click', '.btn', function (event) {
                var $button = $(event.currentTarget);
                // get group key
                var $buttonGroup = $button.parents('.button-group');
                var filterGroup = $buttonGroup.attr('data-filter-group');
                // set filter for group
                filters[filterGroup] = $button.attr('data-type');
                // combine filters
                var filterValue = concatValues(filters);
                // set filter for Isotope
                $grid.isotope({ filter: filterValue });
            });

            // flatten object by concatting values
            function concatValues(obj) {
                var value = '';
                for (var prop in obj) {
                    value += obj[prop];
                }
                return value;
            }

            // change is-checked class on buttons
            $('.button-group').each(function (i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'button', function (event) {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    var $button = $(event.currentTarget);
                    $button.addClass('is-checked');
                });
            });
        });

    </script>
</body>

</html>