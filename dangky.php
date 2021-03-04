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
    <title>Đăng ký</title>
    <!-- Nhúng file quản lý phần HEAD -->
  <?php //include_once(__DIR__ . '/backend/layouts/head.php'); ?>
    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . '/layouts/styles.php'); ?>
    
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
                            <h2>Đăng ký</h2>
                        </div>
                        <div class="row">
                            <p>Tạo tài khoản để theo dõi đơn hàng, lưu
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
                                        aria-controls="home" aria-selected="true">Đăng ký</a>
                                </li>
                                
                            </ul>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div >
                                <div class="tab-pane fade show active p-3">

                                    <form action="" method="post" name="frmCreate" id="frmCreate">
                                        <div class="form-group">
                                            <label for="kh_tendangnhap">Tên đăng nhập</label>
                                            <input type="text" class="form-control" id="kh_tendangnhap" name="kh_tendangnhap" placeholder="Tên đăng nhập" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="kh_matkhau">Mật khẩu</label>
                                            <input type="text" class="form-control" id="kh_matkhau" name="kh_matkhau" placeholder="Mật khẩu" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="kh_ten">Tên khách hàng</label>
                                            <input type="text" class="form-control" id="kh_ten" name="kh_ten" placeholder="Tên khách hàng" value="">
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Giới tính</label><br />
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="kh_gioitinh" id="kh_gioitinh-1" class="custom-control-input" value="1" checked>
                                            <label class="custom-control-label" for="kh_gioitinh-1">Nam</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="kh_gioitinh" id="kh_gioitinh-2" class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="kh_gioitinh-2">Nữ</label>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label for="kh_diachi">Địa chỉ</label>
                                            <input type="text" class="form-control" id="kh_diachi" name="kh_diachi" placeholder="Địa chỉ" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="kh_dienthoai">Điện thoại</label>
                                            <input type="text" class="form-control" id="kh_dienthoai" name="kh_dienthoai" placeholder="Điện thoại" value="">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="kh_email">Email</label>
                                            <input type="text" class="form-control" id="kh_email" name="kh_email" placeholder="Email"?>
                                        </div>

                                        <div class="form-group">
                                            <label for="kh_ngaysinh">Ngày sinh</label>
                                            <input type="date" class="form-control" value="2020-09-20" name="kh_ngaysinh" id="kh_ngaysinh">
                                        </div>

                                        <div class="form-group">
                                            <label for="kh_cmnd">Chứng minh nhân dân</label>
                                            <input type="text" class="form-control" id="kh_cmnd" name="kh_cmnd" placeholder="Chứng minh nhân dân">
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Quyền quản trị</label><br />
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="kh_quantri" id="kh_quantri-1" class="custom-control-input" value="0" checked>
                                                <label class="custom-control-label" for="kh_quantri-1">Khách hàng</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="kh_quantri" id="kh_quantri-2" class="custom-control-input" value="1">
                                                <label class="custom-control-label" for="kh_quantri-2">Quản trị</label>
                                            </div>
                                        </div> -->

                                        <input type="hidden" name="kh_quantri" value="0"/>

                                        
                                            <div class="row py-2">
                                                <div class="col-md-12">
                                                    <button name="btnDangky" class="btn btn-warning btn-block">
                                                        Đăng ký
                                                    </button>
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
            include_once(__DIR__ . './dbconnect.php');

            if(isset($_POST['btnDangky'])){
                $kh_tendangnhap = htmlentities($_POST['kh_tendangnhap']);
                $kh_matkhau = htmlentities($_POST['kh_matkhau']);
                $kh_ten = htmlentities($_POST['kh_ten']);
                $kh_gioitinh = htmlentities($_POST['kh_gioitinh']);
                $kh_diachi = htmlentities($_POST['kh_diachi']);
                $kh_dienthoai = htmlentities($_POST['kh_dienthoai']);
                $kh_email = htmlentities($_POST['kh_email']);
                $kh_ngaysinh = htmlentities($_POST['kh_ngaysinh']);
                $kh_cmnd = htmlentities($_POST['kh_cmnd']);
                $kh_quantri = htmlentities($_POST['kh_quantri']);

                // Kiểm tra ràng buộc dữ liệu (Validation)
                // Tạo biến lỗi để chứa thông báo lỗi
                $errors = [];

                // Validate Tên đăng nhập_____________
                // required
                if(empty($kh_tendangnhap)){
                $errors['kh_tendangnhap'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $kh_tendangnhap,
                    'msg' => 'Vui lòng nhập tên đăng nhập'
                ];
                }
                // Validate Tên mật khẩu_____________
                // required
                if(empty($kh_matkhau)){
                $errors['kh_matkhau'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $kh_matkhau,
                    'msg' => 'Vui lòng nhập mật khẩu'
                ];
                }
                // Validate Tên _____________
                // required
                if(empty($kh_ten)){
                $errors['kh_ten'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $kh_ten,
                    'msg' => 'Vui lòng nhập tên'
                ];
                }
                // Validate Giới tính_____________
                // required
                // if(empty($kh_gioitinh)){
                // $errors['kh_gioitinh'][] = [
                //     'rule' => 'required',
                //     'rule_value' => true,
                //     'value' => $kh_gioitinh,
                //     'msg' => 'Vui lòng nhập giới tính'
                // ];
                // }
                // Validate Địa chỉ_____________
                // required
                if(empty($kh_diachi)){
                $errors['kh_diachi'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $kh_diachi,
                    'msg' => 'Vui lòng nhập địa chỉ'
                ];
                }
                // Validate Số điện thoại_____________
                // required
                if(empty($kh_dienthoai)){
                $errors['kh_dienthoai'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $kh_dienthoai,
                    'msg' => 'Vui lòng nhập số điện thoại'
                ];
                }
                // Validate Email_____________
                // required
                if(empty($kh_email)){
                $errors['kh_email'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $kh_email,
                    'msg' => 'Vui lòng nhập Email'
                ];
                }
                // Validate Ngày sinh_____________
                // required
                if(empty($kh_ngaysinh)){
                $errors['kh_ngaysinh'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $kh_ngaysinh,
                    'msg' => 'Vui lòng nhập ngày sinh'
                ];
                }
                // Validate Chứng minh nhân dân_____________
                // required
                if(empty($kh_cmnd)){
                $errors['kh_cmnd'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $kh_cmnd,
                    'msg' => 'Vui lòng nhập chứng minh nhân dân'
                ];
                }
                // Validate Quyền quản trị_____________
                // required
                // if(empty($kh_quantri)){
                // $errors['kh_quantri1'][] = [
                //     'rule' => 'required',
                //     'rule_value' => true,
                //     'value' => $kh_quantri,
                //     'msg' => 'Vui lòng nhập Quyền quản trị'
                // ];
                // }
            }
                ?>
                
                <!-- Nếu có lỗi VALIDATE dữ liệu thì hiển thị ra màn hình 
                - Sử dụng thành phần (component) Alert của Bootstrap
                - Mỗi một lỗi hiển thị sẽ in theo cấu trúc Danh sách không thứ tự UL > LI
                -->
                <?php if (
                    isset($_POST['btnDangky'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
                    && isset($errors)         // Nếu biến $errors có tồn tại
                    && (!empty($errors))      // Nếu giá trị của biến $errors không rỗng
                ) : ?>
                    <div id="errors-container" class="alert alert-danger face my-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        <?php foreach ($errors as $fields) : ?>
                            <?php foreach ($fields as $field) : ?>
                                <li><?php echo $field['msg']; ?></li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                    </div>
                <?php endif; ?>

                <?php
                                    // 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
                    // Nếu không có lỗi VALIDATE dữ liệu (tức là dữ liệu đã hợp lệ)
                        // Tiến hành thực thi câu lệnh SQL Query Database
                        // => giá trị của biến $errors là rỗng
                    if (isset($_POST['btnDangky'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
                    && (!isset($errors) || (empty($errors))) // Nếu biến $errors không tồn tại Hoặc giá trị của biến $errors rỗng
                    ) {
                    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
                    
                    // Câu lệnh INSERT
                    $sql = <<<EOT
                    INSERT INTO khachhang
                    (kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_dienthoai, kh_email, kh_ngaysinh, kh_cmnd, kh_quantri)
                    VALUES ('$kh_tendangnhap', '$kh_matkhau', '$kh_ten', $kh_gioitinh, '$kh_diachi', '$kh_dienthoai', '$kh_email', '$kh_ngaysinh', '$kh_cmnd', $kh_quantri);
EOT;
// var_dump($sql);die;
                    mysqli_query($conn, $sql);
                    // Đóng kết nối
                    mysqli_close($conn);

                    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
                    echo "<script>location.href = 'dangnhap.php';</script>";
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
    <!-- <script src="assets/js/DangNhap.js"></script> -->
    <!-- footer -->
  <?php include_once(__DIR__ . '/layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/layouts/scripts.php'); ?>
    <script src="/king/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
    $("#frmCreate").validate({
      rules: {
        kh_tendangnhap: {
          required: true
        },
        kh_matkhau: {
          required: true
        },
        kh_ten: {
          required: true
        },
        // kh_gioitinh: {
        //   required: true
        // },
        kh_diachi: {
          required: true          
        },
        kh_dienthoai: {
          required: true          
        },
        kh_email: {
          required: true          
        },
        kh_ngaysinh: {
          required: true          
        },
        // kh_thangsinh: {
        //   required: true          
        // },
        // kh_namsinh: {
        //   required: true          
        // },
        kh_cmnd: {
          required: true          
        },
        // kh_quantri: {
        //   required: true
        // }
      },
      messages: {
        kh_tendangnhap: {
          required: "Vui lòng nhập tên đăng nhập"
          },
        kh_matkhau: {
          required: "Vui lòng nhập mật khẩu"
        },
        kh_ten: {
          required: "Vui lòng nhập tên khách hàng"
        },
        // kh_gioitinh: {
        //   required: "Vui lòng nhập giới tính"
        //   },
        kh_diachi: {
          required: "Vui lòng nhập địa chỉ"
          },
        kh_dienthoai: {
          required: "Vui lòng nhập số điện thoại"
          },
        kh_email: {
          required: "Vui lòng nhập Email"
          },
        kh_ngaysinh: {
          required: "Vui lòng nhập ngày sinh"
          },
        // kh_thangsinh: {
        //   required: "Vui lòng nhập tháng sinh"
        //   },
        // kh_namsinh: {
        //   required: "Vui lòng nhập năm sinh"
        //   },
        kh_cmnd: {
          required: "Vui lòng nhập chứng minh nhân dân"
          },
        
        //   kh_quantri: {
        //   required: "Vui lòng nhập địa chỉ"
        // }
      },
      errorElement: "em",
      errorPlacement: function(error, element) {
        // Thêm class `invalid-feedback` cho field đang có lỗi
        error.addClass("invalid-feedback");
        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.parent("label"));
        } else {
          error.insertAfter(element);
        }
      },
      success: function(label, element) {},
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
      }
    });
  });
        
    </script>

</body>

</html>