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
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    include_once(__DIR__.'/../../../dbconnect.php');

    // 2. Chuẩn bị câu truy vấn $sql
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $dh_ma = $_GET['dh_ma'];

    // 3. Xóa các dòng con (chi tiết Đơn hàng) trước
    $sqlDeleteChiTietDonHang = <<<EOT
    DELETE FROM sanpham_dondathang WHERE dh_ma= $dh_ma
EOT;

    // 3.1. Thực thi câu lệnh DELETE Chi tiết Đơn hàng
    $resultChiTietDonHang = mysqli_query($conn, $sqlDeleteChiTietDonHang);

    // 4. Xóa dòng Đơn hàng
    $sqlDeleteDonHang = <<<EOT
    DELETE FROM dondathang WHERE dh_ma= $dh_ma
EOT;

    // 3.1. Thực thi câu lệnh DELETE Chi tiết Đơn hàng
    $resultDonHang = mysqli_query($conn, $sqlDeleteDonHang);

    // 4. Đóng kết nối
    mysqli_close($conn);
        
    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
?>
<?php 
  else: echo ('<script>location.href = "/king/index.php";</script>');
  endif;
  ?>