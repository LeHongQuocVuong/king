<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
  // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
  session_start();
}
?>
<!-- Nhúng file cấu hình để xác định được Tên và Tiêu đề của trang hiện tại người dùng đang truy cập -->
<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>



<?php 
  include_once(__DIR__. '/../../../dbconnect.php');
  if(isset($_SESSION['kh_tendangnhap_logged']))
    $kh_tendangnhap = $_SESSION['kh_tendangnhap_logged'];
    else $kh_tendangnhap = '';
  $sql_kh_tendangnhap = <<<EOT
  SELECT *
  FROM khachhang kh
  WHERE kh.kh_tendangnhap = '$kh_tendangnhap';
EOT;
  $result_kh_tendangnhap = mysqli_query($conn, $sql_kh_tendangnhap);
  while ($row_kh_tendangnhap = mysqli_fetch_array($result_kh_tendangnhap, MYSQLI_ASSOC)) {
    $kh_quantri = $row_kh_tendangnhap['kh_quantri'];
  }
  // var_dump($kh_quantri); die;
  if($kh_quantri==1) :
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Nhúng file quản lý phần HEAD -->
  <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
</head>

<body class="d-flex flex-column h-100">
  <!-- header -->
  <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
  <!-- end header -->

  <div class="container-fluid">
    <div class="row">
      <!-- sidebar -->
      <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>
      <!-- end sidebar -->

      <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Sửa Nhà sản xuất</h1>
        </div>
        <?php
          // Truy vấn database
          // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
          include_once(__DIR__ . '/../../../dbconnect.php');
          $nsx_ma = $_GET['nsx_ma'];
          $select = "SELECT nsx_ma, nsx_ten	FROM nhasanxuat WHERE nsx_ma = $nsx_ma;";

          // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
          $resultSelect = mysqli_query($conn,$select);
          $selectRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        ?>

        <!-- Block content -->
        <form action="" method="post" name="frmCreate" id="frmCreate">
          <div class="form-group">
            <label for="nsx_ten">Tên nhà sản xuất</label>
            <input type="text" class="form-control" id="nsx_ten" name="nsx_ten" aria-describedby="nsx_tenHelp" value="<?= $selectRow['nsx_ten']?>">
            <small id="nsx_tenHelp" class="form-text text-muted">Nhập tên nhà sản xuất</small>
          </div>
          
          <button class="btn btn-primary" name="btnSave">Lưu dữ liệu</button>
        </form>

        <?php
          

          // 2. Nếu người dùng có bấm nút "Lưu dữ liệu"
          if(isset($_POST['btnSave'])){
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            $nsx_ten = htmlentities($_POST['nsx_ten']);

            // Kiểm tra ràng buộc dữ liệu (Validation)
            // Tạo biến lỗi để chứa thông báo lỗi
            $errors = [];

            // Validate tên nhà sản xuất
            // required
            if(empty($nsx_ten)){
              $errors['nsx_ten'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $nsx_ten,
                'msg' => 'Vui lòng nhập tên Nhà sản xuất'
              ];
            }
            
            // maxlength 500
            if (!empty($nsx_ten) && strlen($nsx_ten) > 500) {
              $errors['nsx_ten'][] = [
                'rule' => 'maxlength',
                'rule_value' => 500,
                'value' => $nsx_ten,
                'msg' => 'Tên Nhà sản xuất không được vượt quá 500 ký tự'
              ];
            }

            
          }
            ?>

          <!-- Nếu có lỗi VALIDATE dữ liệu thì hiển thị ra màn hình 
          - Sử dụng thành phần (component) Alert của Bootstrap
          - Mỗi một lỗi hiển thị sẽ in theo cấu trúc Danh sách không thứ tự UL > LI
          -->
          <?php if (
            isset($_POST['btnSave'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
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
            // Nếu không có lỗi VALIDATE dữ liệu (tức là dữ liệu đã hợp lệ)
            // Tiến hành thực thi câu lệnh SQL Query Database
            // => giá trị của biến $errors là rỗng
            if (
              isset($_POST['btnSave'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
              && (!isset($errors) || (empty($errors))) // Nếu biến $errors không tồn tại Hoặc giá trị của biến $errors rỗng
            ) {
              // VALIDATE dữ liệu đã hợp lệ
              // Thực thi câu lệnh SQL QUERY
              // Câu lệnh INSERT
              $sql = "UPDATE `nhasanxuat`SET nsx_ten='$nsx_ten' WHERE nsx_ma=$nsx_ma;";

              // Thực thi INSERT
              mysqli_query($conn, $sql) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sql");

              // Đóng kết nối
              mysqli_close($conn);

              // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
              // Điều hướng bằng Javascript
              echo '<script>location.href = "index.php";</script>';
            }
            ?>
          
          

        <!-- End block content -->
      </main>
    </div>
  </div>

  <!-- footer -->
  <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>

  <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
  <!-- <script src="..."></script> -->

  <script>
  $(document).ready(function() {
    $("#frmCreate").validate({
      rules: {
        nsx_ten: {
          required: true,
          minlength: 5,
          maxlength: 500
        },
        lsp_mota: {
          required: true,
          minlength: 5,
          maxlength: 1000
        }
      },
      messages: {
        nsx_ten: {
          required: "Vui lòng nhập tên Nhà sản xuất",
          minlength: "Tên Nhà sản xuất phải có tên nhà sản xuất",
          maxlength: "Tên Nhà sản xuất không được vượt quá 500 ký tự"
        },
        lsp_mota: {
          required: "Vui lòng nhập mô tả cho Nhà sản xuất",
          minlength: "Mô tả cho Nhà sản xuất phải có tên nhà sản xuất",
          maxlength: "Mô tả cho Nhà sản xuất không được vượt quá 1000 ký tự"
        },
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
<?php 
  else: echo ('<script>location.href = "/king/index.php";</script>');
  endif;
  ?>