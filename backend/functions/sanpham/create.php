<!-- Nhúng file cấu hình để xác định được Tên và Tiêu đề của trang hiện tại người dùng đang truy cập -->
<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>

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
          <h1 class="h2">Tạo sản phẩm</h1>
        </div>

        <!-- Block content -->
        <form action="" method="post" name="frmCreate" id="frmCreate">
          <div class="form-group">
            <label for="sp_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" aria-describedby="sp_tenHelp">
            <small id="sp_tenHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="sp_gia">Giá</label>
            <input type="text" class="form-control" id="sp_gia" name="sp_gia" aria-describedby="sp_giaHelp">
            <small id="sp_giaHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="sp_giacu">Giá cũ</label>
            <input type="text" class="form-control" id="sp_giacu" name="sp_giacu" aria-describedby="sp_giacuHelp">
            <small id="sp_giacuHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="sp_mota_ngan">Mô tả ngắn</label>
            <textarea type="text" class="form-control" id="sp_mota_ngan" name="sp_mota_ngan" aria-describedby="sp_mota_nganHelp"></textarea>
            
          </div>
          <div class="form-group">
            <label for="sp_mota_chitiet">Mô tả chi tiết</label>
            <textarea type="text" class="form-control" id="sp_mota_chitiet" name="sp_mota_chitiet" aria-describedby="sp_mota_chitietHelp"></textarea>
            
          </div>
          <div class="form-group">
            <label for="sp_ngaycapnhat">Ngày cập nhật</label>
            <input type="datetime-local" class="form-control" id="sp_ngaycapnhat" name="sp_ngaycapnhat" aria-describedby="sp_ngaycapnhatHelp">
            <small id="sp_ngaycapnhatHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="sp_soluong">Số lượng</label>
            <input type="text" class="form-control" id="sp_soluong" name="sp_soluong" aria-describedby="sp_soluongHelp">
            <small id="sp_soluongHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="lsp_ma">Mã loại sản phẩm</label>
            <input type="text" class="form-control" id="lsp_ma" name="lsp_ma" aria-describedby="lsp_maHelp">
            <small id="lsp_maHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="nsx_ma">Mã nhà sản xuất</label>
            <input type="text" class="form-control" id="nsx_ma" name="nsx_ma" aria-describedby="nsx_maHelp">
            <small id="nsx_maHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="km_ma">Mã khuyến mãi</label>
            <input type="text" class="form-control" id="km_ma" name="km_ma" aria-describedby="km_maHelp">
            <small id="km_maHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <button class="btn btn-primary" name="btnSave">Lưu dữ liệu</button>
        </form>

        <?php
          // Truy vấn database
          // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
          include_once(__DIR__ . '/../../../dbconnect.php');

          // 2. Nếu người dùng có bấm nút "Lưu dữ liệu"
          if(isset($_POST['btnSave'])){
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            $sp_ten = $_POST['sp_ten'];
            $sp_mota = $_POST['sp_mota'];

            // Kiểm tra ràng buộc dữ liệu (Validation)
            // Tạo biến lỗi để chứa thông báo lỗi
            $errors = [];

            // Validate Tên sản phẩm
            // required
            if(empty($sp_ten)){
              $errors['sp_ten'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $sp_ten,
                'msg' => 'Vui lòng nhập tên sản phẩm'
              ];
            }
            // minlength 3
            if (!empty($sp_ten) && strlen($sp_ten) < 5) {
              $errors['sp_ten'][] = [
                'rule' => 'minlength',
                'rule_value' => 5,
                'value' => $sp_ten,
                'msg' => 'Tên sản phẩm phải có ít nhất 5 ký tự'
              ];
            }
            // maxlength 50
            if (!empty($sp_ten) && strlen($sp_ten) > 50) {
              $errors['sp_ten'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $sp_ten,
                'msg' => 'Tên sản phẩm không được vượt quá 50 ký tự'
              ];
            }

            // Validate Diễn giải
            // required
            if (empty($sp_mota)) {
              $errors['sp_mota'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $sp_mota,
                'msg' => 'Vui lòng nhập mô tả sản phẩm'
              ];
            }
            // minlength 3
            if (!empty($sp_mota) && strlen($sp_mota) < 5) {
              $errors['sp_mota'][] = [
                'rule' => 'minlength',
                'rule_value' => 5,
                'value' => $sp_mota,
                'msg' => 'Mô tả sản phẩm phải có ít nhất 5 ký tự'
              ];
            }
            // maxlength 255
            if (!empty($sp_mota) && strlen($sp_mota) > 255) {
              $errors['sp_mota'][] = [
                'rule' => 'maxlength',
                'rule_value' => 255,
                'value' => $sp_mota,
                'msg' => 'Mô tả sản phẩm không được vượt quá 255 ký tự'
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
              $sql = "INSERT INTO `loaisanpham` (sp_ten, sp_mota) VALUES ('$sp_ten', '$sp_mota');";

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
        sp_ten: {
          required: true,
          minlength: 5,
          maxlength: 50
        },
        sp_mota: {
          required: true,
          minlength: 5,
          maxlength: 255
        }
      },
      messages: {
        sp_ten: {
          required: "Vui lòng nhập tên sản phẩm",
          minlength: "Tên sản phẩm phải có ít nhất 5 ký tự",
          maxlength: "Tên sản phẩm không được vượt quá 50 ký tự"
        },
        sp_mota: {
          required: "Vui lòng nhập mô tả cho sản phẩm",
          minlength: "Mô tả cho sản phẩm phải có ít nhất 5 ký tự",
          maxlength: "Mô tả cho sản phẩm không được vượt quá 255 ký tự"
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