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
    <?php include_once(__DIR__ . './layouts/styles.php'); ?>
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">

    <link href="/king/assets/frontend/css/style.css" type="text/css" rel="stylesheet" />

    <style>
        .Tragop {
            display: inline-block;
            margin-left: 10px;
            background-color: tomato;
            border-radius: 4px 4px 4px 4px;
            -moz-border-radius: 4px 4px 4px 4px;
            -webkit-border-radius: 4px 4px 4px 4px;
            border: 0px solid #000000;
        }

        .KhuyenMai_DichVu {
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .zoom_anh {
            width: 300px;
            height: 500px;
            margin: 0 15px;
            position: relative;
            overflow: hidden;
        }

        .img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center;
            /* background-size: cover; */
            background-size: contain;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- header -->
    <?php include_once(__DIR__ . './layouts/partials/header.php'); ?>
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

        // Truy vấn database
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__ . './dbconnect.php');

        /* --- 
        --- 2.Truy vấn dữ liệu Sản phẩm 
        --- Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
        --- 
        */
        $sp_ma = $_GET['sp_ma'];
        $sqlSelectSanPham = <<<EOT
            SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota_ngan, sp.sp_mota_chitiet, sp.sp_soluong, lsp.lsp_ten
            FROM `sanpham` sp
            JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
            WHERE sp.sp_ma = $sp_ma
EOT;

        // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
        $resultSelectSanPham = mysqli_query($conn, $sqlSelectSanPham);

        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $sanphamRow;
        while ($row = mysqli_fetch_array($resultSelectSanPham, MYSQLI_ASSOC)) {
            $sanphamRow = array(
                'sp_ma' => $row['sp_ma'],
                'sp_ten' => $row['sp_ten'],
                'sp_gia' => $row['sp_gia'],
                'sp_gia_formated' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
                'sp_giacu_formated' => number_format($row['sp_giacu'], 2, ".", ",") . ' vnđ',
                
                'sp_soluong' => $row['sp_soluong'],
                'lsp_ten' => $row['lsp_ten']
            );
        }
        /* --- End Truy vấn dữ liệu Sản phẩm --- */

        //Chi tiết sản phẩm
        $sqlChitiet = "select * from chitietsanpham where sp_ma =". $sp_ma;
        // $sqlChitiet = "SELECT * FROM chitietsanpham WHERE sp_ma = 51;";
        $resultChitiet = mysqli_query($conn, $sqlChitiet);
        $rowChitiet = mysqli_fetch_array($resultChitiet, MYSQLI_ASSOC);
        // var_dump(!is_null($rowChitiet['manhinh'])); die;
        
        
        if(isset($rowChitiet['manhinh'])) {
            $sanphamRow['manhinh'] =$rowChitiet['manhinh'];
        }
        if(isset($rowChitiet['os'])) {
            $sanphamRow['os'] =$rowChitiet['os'];
        }
        if(isset($rowChitiet['camera_sau'])) {
            $sanphamRow['camera_sau'] = $rowChitiet['camera_sau'];
        }
        if(isset($rowChitiet['camera_truoc'])) {
            $sanphamRow['camera_truoc'] = $rowChitiet['camera_truoc'];
        }
        if(isset($rowChitiet['cpu'])) {
            $sanphamRow['cpu'] = $rowChitiet['cpu'];
        }
        if(isset($rowChitiet['ram'])) {
            $sanphamRow['ram'] = $rowChitiet['ram'];
        }
        if(isset($rowChitiet['ocung'])) {
            $sanphamRow['ocung'] = $rowChitiet['ocung'];
        }
        if(isset($rowChitiet['pin'])) {
            $sanphamRow['pin'] = $rowChitiet['pin'];
        }

        
        /* --- 
        --- 3.Truy vấn dữ liệu Hình ảnh Sản phẩm 
        --- 
        */
        $sqlSelect = <<<EOT
            SELECT hsp.hsp_ma, hsp.hsp_tentaptin
            FROM `hinhsanpham` hsp
            WHERE hsp.sp_ma = $sp_ma
EOT;

        // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
        $result = mysqli_query($conn, $sqlSelect);

        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $danhsachhinhanh = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $danhsachhinhanh[] = array(
                'hsp_ma' => $row['hsp_ma'],
                'hsp_tentaptin' => $row['hsp_tentaptin']
            );
        }
        /* --- End Truy vấn dữ liệu Hình ảnh sản phẩm --- */

        // Hiệu chỉnh dữ liệu theo cấu trúc để tiện xử lý
        $sanphamRow['danhsachhinhanh'] = $danhsachhinhanh;
        // var_dump($danhsachhinhanh[0]['hsp_tentaptin']);die;
        // var_dump($sanphamRow['danhsachhinhanh'][0]['hsp_tentaptin']);die;
        ?>




        <!-- Điện thoại -->
        <div class="container" style="background-color: white;">
            <!-- Vùng ALERT hiển thị thông báo -->
            <div id="alert-container" class="alert alert-warning alert-dismissible fade d-none" role="alert">
                <div id="thongbao">&nbsp;</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row py-2 border-bottom">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>
                                <?= $sanphamRow['lsp_ten'] . ' ' .$sanphamRow['sp_ten']?>
                            </h3>
                        </div>
                        <div class="col-md-2 d-none d-md-block pt-2" style="color: gold;">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>

                        </div>
                        <div class="col-md-2 d-none d-md-block pt-2" style="color: aqua;">
                            30 Đánh giá
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-none d-md-block text-right pt-1">
                    <button type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        Like
                    </button>
                    <button type="button" class="btn btn-primary btn-sm">
                        Share
                    </button>
                </div>

            </div>
            <div class="row py-4">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="zoom_anh" data-image="/king/assets/uploads/products/<?=$sanphamRow['danhsachhinhanh'][0]['hsp_tentaptin']?>"></div>
                            <!-- <img :src="dt[0].hinhanh" class="img-fluid item" alt=""> -->
                            <p class="text-black-50 text-center pt-2">Hình ảnh sản phẩm</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post" action="">
                        <?php
                        $hinhsanphamdautien = empty($sanphamRow['danhsachhinhanh'][0]) ? '' : $sanphamRow['danhsachhinhanh'][0];
                        ?>
                        <input type="hidden" name="sp_ma" id="sp_ma" value="<?= $sanphamRow['sp_ma'] ?>" />
                        <input type="hidden" name="sp_ten" id="sp_ten" value="<?= $sanphamRow['sp_ten'] ?>" />
                        <input type="hidden" name="sp_gia" id="sp_gia" value="<?= $sanphamRow['sp_gia'] ?>" />
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="<?= empty($hinhsanphamdautien) ? '' : $hinhsanphamdautien['hsp_tentaptin'] ?>" />

                        <div class=" row">
                            
                                <h4 class="price">Giá hiện tại: <span style="color:red"><?= $sanphamRow['sp_gia_formated'] ?></span></h4>
                                <small class="text-muted">Giá cũ: <s><span><?= $sanphamRow['sp_giacu_formated'] ?></span></s></small>
                                
                                <div class="form-group row m-auto pt-2">
                                    <label for="soluong">Số lượng đặt mua:</label>
                                    <input type="number" class="form-control" id="soluong" name="soluong">
                                </div>
                                <div class="action row m-auto py-2">
                                    <button class="add-to-cart btn btn-primary" id="btnThemVaoGioHang">Thêm vào giỏ hàng</button>
                                    <button class="like btn btn-success" href="#"><span class="fa fa-heart"></span></button>
                                </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 KhuyenMai_DichVu">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row border-bottom">
                                            <div class="col-md-12" style="background-color: #f6f6f6;">
                                                <h5>
                                                    KHUYẾN MÃI TRỊ GIÁ 6.000.000₫
                                                </h5>
                                                <div class="text-black-50">
                                                    Giá và khuyến mãi dự kiến áp dụng đến 22/09
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row py-2 border-bottom">
                                            <div class="col-md-12">
                                                <p>
                                                    <i class="fa fa-check-circle" aria-hidden="true"
                                                        style="color: #3fb846;"></i>
                                                    Giảm giá 3,000,000đ
                                                </p>
                                                <p>
                                                    <i class="fa fa-check-circle" aria-hidden="true"
                                                        style="color: #3fb846;"></i>
                                                    Lên đời iPhone thời thượng, tài trợ đổi mới 3,000,000đ
                                                </p>
                                                <p>
                                                    <i class="fa fa-check-circle" aria-hidden="true"
                                                        style="color: #3fb846;"></i>
                                                    Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến
                                                    mãi khác)
                                                </p>
                                                <p>
                                                    <i class="fa fa-check-circle" aria-hidden="true"
                                                        style="color: #3fb846;"></i>
                                                    Phụ kiện Apple mua kèm giảm đến 20% (không áp dụng đồng thời KM khác).
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <b>Chọn thêm các dịch vụ miễn phí</b>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Giao ngay từ cửa
                                                        hàng gần bạn nhất</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Chuyển danh bạ,
                                                        dữ liệu qua máy mới</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">Mang thêm điện
                                                        thoại khác để bạn xem</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        
                    </form>
                        
                </div>
                <div class="col-md-4 px-4">
                    <div class="row">
                        <div class="col-md-12 border">
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <img src="assets/img/icon/trong-hop-co.png" alt="" style="height: 20px;">
                                </div>
                                <div class="col-md-11">
                                    Máy, Sạc, Cáp, Tai nghe, Sách hướng dẫn
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <img src="assets/img/icon/bao-hanh-chinh-hang.png" alt="" style="height: 20px;">
                                </div>
                                <div class="col-md-11">
                                    Bảo hành chính hãng 12 tháng.
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-1">
                                    <img src="assets/img/icon/1-doi-1.png" alt="" style="height: 20px;">
                                </div>
                                <div class="col-md-11">
                                    Lỗi là đổi mới trong 1 tháng
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row border-top py-4">
                <div class="col-md-8">
                    <h5>Đặc điểm nổi bật của <?= $sanphamRow['sp_ten']?> </h5>
                    <!-- Slider -->
                    <div id="Slider_Iphone" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#Slider_Iphone" data-slide-to="0" class="active"></li>
                          <li data-target="#Slider_Iphone" data-slide-to="1"></li>
                          <li data-target="#Slider_Iphone" data-slide-to="2"></li>
                          <li data-target="#Slider_Iphone" data-slide-to="3"></li>
                          <li data-target="#Slider_Iphone" data-slide-to="4"></li>
                          <li data-target="#Slider_Iphone" data-slide-to="5"></li>
                          <li data-target="#Slider_Iphone" data-slide-to="6"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="/king/assets/img/slider/slider_Iphone/-iphone-11-pro-max-thietke.jpg" class="d-block img-fluid" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="/king/assets/img/slider/slider_Iphone/vi-vn-iphone-11-pro-max-tongquan.jpg" class="d-block img-fluid" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="/king/assets/img/slider/slider_Iphone/vi-vn-iphone-11-pro-max-tinhnang.jpg" class="d-block img-fluid" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="/king/assets/img/slider/slider_Iphone/vi-vn-iphone-11-pro-max-mausac.jpg" class="d-block img-fluid" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="/king/assets/img/slider/slider_Iphone/vi-vn-iphone-11-pro-max-3camera.gif" class="d-block img-fluid" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="/king/assets/img/slider/slider_Iphone/vi-vn-iphone-11-pro-max-anhchup.gif" class="d-block img-fluid" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="/king/assets/img/slider/slider_Iphone/vi-vn-iphone-11-pro-max-dophangiai.gif" class="d-block img-fluid" alt="...">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#Slider_Iphone" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#Slider_Iphone" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="row border-bottom">
                        <div class="col-md-12">
                            <h5>
                                Thông số kỹ thuật
                            </h5>
                        </div>
                    </div>
                    <?php if(isset($rowChitiet['manhinh'])):?>
                        <div class="row border-bottom">
                            <div class="col-md-4 text-black-50">
                                Màn hình:
                            </div>
                            <div class="col-md-8">
                                <?= $rowChitiet['manhinh']; ?>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php if(isset($rowChitiet['os'])):?>
                    <div class="row border-bottom">
                        <div class="col-md-4 text-black-50">
                            Hệ điều hành:
                        </div>
                        <div class="col-md-8">
                            <?= $rowChitiet['os']; ?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if(isset($rowChitiet['camera_sau'])):?>
                    <div class="row border-bottom">
                        <div class="col-md-4 text-black-50">
                            Camera sau:
                        </div>
                        <div class="col-md-8">
                            <?= $rowChitiet['camera_sau']; ?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if(isset($rowChitiet['camera_truoc'])):?>
                    <div class="row border-bottom">
                        <div class="col-md-4 text-black-50">
                            Camera trước:
                        </div>
                        <div class="col-md-8">
                            <?= $rowChitiet['camera_truoc']; ?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if(isset($rowChitiet['cpu'])):?>
                    <div class="row border-bottom">
                        <div class="col-md-4 text-black-50">
                            CPU:
                        </div>
                        <div class="col-md-8">
                            <?= $rowChitiet['cpu']; ?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if(isset($rowChitiet['ram'])):?>
                    <div class="row border-bottom">
                        <div class="col-md-4 text-black-50">
                            RAM:
                        </div>
                        <div class="col-md-8">
                            <?= $rowChitiet['ram']; ?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if(isset($rowChitiet['ocung'])):?>
                    <div class="row border-bottom">
                        <div class="col-md-4 text-black-50">
                            Ổ cứng:
                        </div>
                        <div class="col-md-8">
                            <?= $rowChitiet['ocung']; ?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>        

        <!-- End block content -->
    </main>

    <!-- footer -->
    <?php include_once(__DIR__ . './layouts/partials/footer.php'); ?>
    <!-- end footer -->

    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
    <?php include_once(__DIR__ . './layouts/scripts.php'); ?>

    <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
    <script>
        function addSanPhamVaoGioHang() {
            // Chuẩn bị dữ liệu gởi
            var dulieugoi = {
                sp_ma: $('#sp_ma').val(),
                sp_ten: $('#sp_ten').val(),
                sp_gia: $('#sp_gia').val(),
                hinhdaidien: $('#hinhdaidien').val(),
                soluong: $('#soluong').val(),
            };
            // console.log((dulieugoi));

            // Gọi AJAX đến API ở URL `/king/frontend/api/giohang-themsanpham.php`
            $.ajax({
                url: '/king/frontend/api/giohang-themsanpham.php',
                method: "POST",
                dataType: 'json',
                data: dulieugoi,
                success: function(data) {
                    console.log(data);
                    var htmlString =
                        `Sản phẩm đã được thêm vào Giỏ hàng. <a href="/king/giohang.php">Xem Giỏ hàng</a>.`;
                    $('#thongbao').html(htmlString);
                    // Hiện thông báo
                    $('.alert').removeClass('d-none').addClass('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    var htmlString = `<h1>Không thể xử lý</h1>`;
                    $('#thongbao').html(htmlString);
                    // Hiện thông báo
                    $('.alert').removeClass('d-none').addClass('show');
                }
            });
        };

        // Đăng ký sự kiện cho nút Thêm vào giỏ hàng
        $('#btnThemVaoGioHang').click(function(event) {
            event.preventDefault();
            addSanPhamVaoGioHang();
        });

        // Zoom ảnh
        $(function () {
                var zoom = function (elm) {
                    elm
                        .on('mouseover', function () {
                            $(this).children('.img').css({ 'transform': 'scale(2)' });
                        })
                        .on('mouseout', function () {
                            $(this).children('.img').css({ 'transform': 'scale(1)' });
                        })
                        .on('mousemove', function (e) {
                            $(this).children('.img').css({ 'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 + '%' });
                        })
                }

                $('.zoom_anh').each(function () {
                    $(this)
                        .append('<div class="img"></div>')
                        .children('.img').css({ 'background-image': 'url(' + $(this).data('image') + ')' });
                    zoom($(this));
                })
            })
    </script>
</body>

</html>