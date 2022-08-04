<?php
$fullname = $email = $msg ='';
if (!empty($_POST)){
    $fullname = getPost('fullname');
    $email = getPost('email');
    $pwd = getPost('password');

    //validate (xac nhan) neu cac bien khong rong thi thuc thi cau len ben duoi
    if(empty($fullname) || empty($email) || empty($pwd) || strlen($pwd) < 6) {
	}
    else {
    // validate thanh cong
		// cau truy van chon tat ca tu user dieu khien co email = $email nhan tu POST
		// neu khac rong thi dong nghia voi email chua tung ton tai nen ta xac nhan chen vao database
        $userExit = executeResult("select * from User where email = '$email'", true);
		if ($userExit != null){
			$msg = 'Email đã được đăng ký trên hệ thống';
            
		}
        else {
            //biến luư ngày giờ đăng ký
            $created_at = $updated_at = date('Y-m-d H:i:s');
			//Su dung ma hoa 1 chieu -> md5 -> hack
            // từ thư viện getSecurityMD5 of utility.php
			$pwd = getSecurityMD5($pwd);
            //chèn dữ liệu dùng thư viện đã viết bên dbhelper.
			$sql = "insert into user (fullname, email, password, role_id, created_at, updated_at, deleted) values ('$fullname', '$email', '$pwd', 2, '$created_at', '$updated_at', 0)";
			execute($sql);
			header('Location: login.php');
			die();

        }

    
    
    
    
    }
}