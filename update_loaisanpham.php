<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật Loại sản phẩm</title>
</head>
<body>
    <h1>Cập nhật Loại sản phẩm</h1>
    <form action="" method="post" name="frmThemLSP" id="frmThemLSP">
        Mã loại:
        <input type="text" name="lsp_ma" id="lsp_ma"> <br>
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
            $ma = $_POST['lsp_ma'];
            $tenLSP = $_POST['lsp_ten'];
            $motaLSP = $_POST['lsp_mota'];
            //here doc: END OF TEXT: viết câu lệnh có xuống dòng cho đẹp
            //EOT; phải ở đầu dòng mới đúng 
            $sql = <<<EOT
            UPDATE loaisanpham
	            SET
                    lsp_ten='$tenLSP',
                    lsp_mota='$motaLSP'
	            WHERE lsp_ma=$ma
EOT;
            //thực thi
            mysqli_query($conn,$sql);
        }
    ?>
</body>
</html>