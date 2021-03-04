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
<?php
// Hiển thị tất cả lỗi trong PHP
// Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
// Không nên hiển thị lỗi trên môi trường Triển khai (Production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__ . '/../../../dbconnect.php');

/* --- 
   --- 2. Truy vấn dữ liệu Hình ảnh Sản phẩm theo khóa chính
   --- 
*/
// Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$hsp_ma = $_GET['hsp_ma'];
$sqlSelect = "SELECT * FROM `hinhsanpham` WHERE hsp_ma=$hsp_ma;";
// var_dump($sqlSelect);die;

// Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
$resultSelect = mysqli_query($conn, $sqlSelect);
$hinhsanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

/* --- End Truy vấn dữ liệu Sản phẩm theo khóa chính --- */

// 3. Xóa file cũ để tránh rác trong thư mục UPLOADS
// Đường dẫn để chứa thư mục upload trên ứng dụng web của chúng ta. Các bạn có thể tùy chỉnh theo ý các bạn.
// Ví dụ: các file upload sẽ được lưu vào thư mục ../../../assets/uploads
$upload_dir = __DIR__ . "/../../../assets/uploads/";
// Các hình ảnh sẽ được lưu trong thư mục con `products` để tiện quản lý
$subdir = 'products/';

// Kiểm tra nếu file có tổn tại thì xóa file đi
$old_file = $upload_dir . $subdir . $hinhsanphamRow['hsp_tentaptin'];
if (file_exists($old_file)) {
    // Hàm unlink(filepath) dùng để xóa file trong PHP
    unlink($old_file);
}

// 4. Chuẩn bị câu truy vấn $sql
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$hsp_ma = $_GET['hsp_ma'];
$sql = "DELETE FROM `hinhsanpham` WHERE hsp_ma=" . $hsp_ma;

// 5. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sql);

// 6. Đóng kết nối
mysqli_close($conn);

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:index.php');
?>
<?php 
  else: echo ('<script>location.href = "/king/index.php";</script>');
  endif;
  ?>