<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
</head>
<body>
    
    <form action="" method="get" name="frmDangNhap" id="frmDangNhap">
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" >
        <br>
        <label for="pass">Password</label>
        <input type="text" name="pass" id="pass">
        <br>
        <input type="submit" name="btnDangNhap" id="btnDangNhap" value="Đăng nhập">
    </form>

    <?php
        if(isset($_GET['btnDangNhap'])){    //Bien $_GET['btnDangNhap'] co ton tai thi xu ly
            $Username = $_GET['username'];
            $Password = $_GET['pass'];

            if($Username == 'vuong' && $Password  == '1234')
                echo '<h1>Dang Nhap Thanh Cong</h1>';
                else echo 'That bai';

        }
    ?>

</body>
</html>