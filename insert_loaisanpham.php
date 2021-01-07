<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Loại sản phẩm</title>
</head>
<body>
    <h1>Thêm Loại sản phẩm</h1>
    <form action="" method="post" name="frmThemLSP" id="frmThemLSP">
        Tên loại: 
        <input type="text" name="lsp_ten" id="lsp_ten"> <br>
        Mô tả:
        <textarea name="lsp_mota" id="lsp_mota"></textarea> <br>
        <button name="btnThem" id="btnThem">Thêm</button>
    </form>

    <?php
        //Nếu người dùng bấm thêm
        if(isset($_POST['btnThem'])){
            //Kết nối dữ liệu
            include_once('dbconnect.php');
            //Câu lệnh sql
            $tenLSP = $_POST['lsp_ten'];
            $motaLSP = $_POST['lsp_mota'];
            $sql = "INSERT INTO loaisanpham (lsp_ten,lsp_mota) VALUES (N'$tenLSP',N'$motaLSP');";
            //thực thi
            mysqli_query($conn,$sql);
        }
    ?>
</body>
</html>