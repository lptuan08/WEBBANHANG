<?php
$email = $msg ='';
if (!empty($_POST)){
    $email = getPost('email');
    $pwd = getPost('password');
    $pwd = getSecurityMD5($pwd);
    $sql = "select * from User where email = '$email' and password = '$pwd'";
    $userExit = executeResult( $sql, true);
    if($userExit == null) {
        $msg = "Đăng nhập không thành công, vui lòng kiểm tra lại";
    }

    else {
       // đăng nhập thành công
       header ('Loacation: ../');
       die( );



    }
}