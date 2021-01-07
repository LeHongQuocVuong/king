<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách loại sản phẩm</title>
</head>
<body>
    <h1>Danh sách loại sản phẩm</h1>
    <?php
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        require_once('dbconnect.php');
        // 2. Chuẩn bị QUERY
        $sql = "INSERT INTO loaisanpham (lsp_ten,lsp_mota) VALUES (N'Loại 1',N'Mô tả');";
        // //Kiểm tra câu lệnh
        // var_dump($sql);
        // die;    //Dừng chương trình để xem kết quả

        // 3. Thực thi
        mysqli_query($conn,$sql);
        echo 'Đã thực hiện';
    ?>



    
</body>
</html>