<?php
require 'connect.php';

if(isset($_POST["btndangky"])){
    $user_name = $_POST["tendangky"];
    $pass1 = $_POST["matkhau1"];
    $pass2 = $_POST["matkhau2"];
    $email = $_POST["emailad"];
    // kiểm tra xem 2 mật khẩu có giống nhau hay không:
    if($pass1 != $pass2){
        echo "2 mk ko giong nhau";
    }
    else{
        $pass = ($pass1);

		$id= mysqli_query($conn,"
        SELECT MAX(ID)
        FROM admin;
    ");
   	 	$idmoi= $id-> fetch_assoc();
    	$idmoi1 = $idmoi["MAX(ID)"];
		$idmoi1++;
		$pass = md5($pass);

        mysqli_query($conn,"
            insert into admin (ID,TENDANGNHAP,MATKHAU,EMAILADMIN)
            values ('$idmoi1','$user_name', '$pass','$email')
        ");

        echo"dang ky' thanh` cong";
        header("Location: dangnhap.php");

    }
}

?>



<!DOCTYPE html>
<html lang="vi-VN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Đăng kí</title>
	<link href="assets/img/icon/icon-logo.png" rel="shortcut icon">

	<!-- Favicons -->
	<link rel="shortcut icon" href="assets/img/favicon.png">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/admin.css">

</head>

<body>
	<div class="main-wrapper">
	
		<div class="login-page">
			<div class="login-body container">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="dashboard.php">
									<img src="assets/img/logo-icon.png" alt="" class="img-fluid">
								</a>
							</div>
						</div>
						<div class="login-header">
							<h3>Register <span>Thế giới cây cảnh</span></h3>
							<p class="text-muted">Truy cập vào dashboard</p>
						</div>
                        <form action="" method="post">

							<div class="form-group">
								<label class="control-label">Username</label>
								<input class="form-control" type="text" name = "tendangky" placeholder="Nhập tên người dùng" required>
							</div>
							<div class="form-group">
								<label class="control-label">Email</label>
								<input class="form-control" type="text" name = "emailad" placeholder="Nhập Email" required>
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Password</label>
								<input class="form-control" type="password" name = "matkhau1" placeholder="Nhập mật khẩu" required>
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Confirm Password</label>
								<input class="form-control" type="password" name = "matkhau2" placeholder="Nhập lại mật khẩu" required>
							</div>
							<div class="text-center">
								<button class="btn btn-primary btn-block account-btn"  type="submit" name = "btndangky">Đăng kí</button>
							</div>
						</form> 
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">hoặc</span>
								</div>
								  
								<!-- Social Login -->
								<div class="social-login">
									<span>Đăng kí bằng</span>
									<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- jQuery -->
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/admin.js"></script>

</body>

</html>