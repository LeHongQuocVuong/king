<?php

    $Username = $_POST['username'];
    $Password = $_POST['pass'];
    $FullName = $_POST['fullname'];

    
?>
<h1>Bạn đã đăng ký thành công</h1>
<ul>
    <li>UserName: <?= $Username?></li>
    <li>Password: <?= $Password?></li>
    <li>FullName: <?= $FullName?></li>
</ul>