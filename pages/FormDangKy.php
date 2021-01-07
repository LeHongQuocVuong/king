<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
</head>
<body>
    
    <form action="" method="post" name="frmDangKy" id="frmDangKy">
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" >
        <br>
        <label for="pass">Password</label>
        <input type="text" name="pass" id="pass">
        <br>
        <label for="fullname">FullName</label>
        <input type="text" name="fullname" id="fullname">
        <br>
        <input type="submit" name="btnDangKy" id="btnDangKy" value="Đăng ký">
    </form>

    <?php

        if(isset($_POST['btnDangKy'])){
            $Username = $_POST['username'];
            $Password = $_POST['pass'];
            $FullName = $_POST['fullname'];

            echo '<h1>Bạn đã đăng ký thành công</h1>';
            echo '<ul>';
            echo '<li>UserName: ' . $Username . '</li>';
            echo '<li>Password: ' . $Password . '</li>';
            echo '<li>FullName: ' . $FullName . '</li>';
            echo '</ul>';
        }

    ?>

</body>
</html>