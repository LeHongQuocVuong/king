<?php

    $Username = $_GET['username'];
    $Password = $_GET['pass'];

    if($Username == 'vuong' && $Password  == '1234')
        echo '<h1>Dang Nhap Thanh Cong</h1>';
        else echo 'That bai';


?>