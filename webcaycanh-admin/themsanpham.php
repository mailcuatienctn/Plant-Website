<?php 

if(isset($_POST["btnluu"])){
    require 'connect.php';

    $linkanh = $_POST["linkanh"];
	$linkanh = "img/product/".$linkanh;
    $tensanpham = $_POST["tensanpham"];
    $tendanhmuc = $_POST["tendanhmuc"];
    $gianhap = $_POST["gianhap"];
	$giaban = $_POST["giaban"];
	$ngaynhap = $_POST["ngaynhap"];
    $tenncc = $_POST["tenncc"];
    $soluong = $_POST["soluong"];
    $mota = $_POST["mota"];

	$madanhmuc= mysqli_query($conn,"
	SELECT MADANHMUC
	FROM danhmuc
	WHERE TENDANHMUC = '$tendanhmuc';
	");
   	 	$madanhmucmoi= $madanhmuc-> fetch_assoc();
    	$madanhmucmoi1 = $madanhmucmoi["MADANHMUC"];
		(int)$madanhmucmoi1;


		$id= mysqli_query($conn,"
        SELECT MAX(MASANPHAM)
        FROM sanpham;
    ");
   	 	$idmoi= $id-> fetch_assoc();
    	$idmoi1 = $idmoi["MAX(MASANPHAM)"];
		$idmoi1++;

		
	$mancc = mysqli_query($conn,"
	SELECT *
	FROM nhacuncap
	WHERE TENNCC = '$tenncc';
	");
	$idncc= $mancc-> fetch_assoc();
    $idncc = $idncc["MANCC"];
	// var_dump($tensanpham);

	// $madanhmuc1 = $madanhmuc -> fetch_assoc();
	$sql = "SELECT * FROM sanpham";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$tensanphamdb =(string) $row['TENSANPHAM'];
		$soluongdb =(int) $row['SOLUONG'];
		// var_dump($tensanphamdb);
		if($tensanpham == $tensanphamdb){
			mysqli_query($conn,"
			UPDATE sanpham
			SET soluong = $soluong + $soluongdb
			WHERE TENSANPHAM = '$tensanpham';
	");
	exit();
		}
	}

	

    mysqli_query($conn,"
    insert into sanpham (MASANPHAM,ANHSANPHAM,TENSANPHAM,MADANHMUC,GIABAN,GIANHAP,SOLUONG,MOTASANPHAM,NGAYNHAP,MANCC)
    values ('$idmoi1','$linkanh','$tensanpham','$madanhmucmoi1','$giaban','$gianhap','$soluong','$mota','$ngaynhap','$idncc')
");


}

?>
<!DOCTYPE html>
<html lang="vi-VN">
<head>

<style>
  /* Sử dụng display: none; */
  .hidden-element {
    display: none;
  }

  /* Hoặc sử dụng visibility: hidden; */
  .hidden-element2 {
    visibility: hidden;
  }
</style>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Thêm sản phẩm</title>
	<link href="assets/img/icon/icon-logo.png" rel="shortcut icon">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Animate CSS -->
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<!-- Select CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/admin.css">
	<script src="assets/js/tinymce/tinymce.min.js"></script>
    <script src="assets/js/tinymce.js"></script>

</head>

<body>
	<div class="main-wrapper">
	
		<!-- Header -->
		<div class="header">
			<div class="header-left"> 
				<a href="dashboard.php" class="logo logo-small">
					<img src="assets/img/logo-icon.png" alt="Logo" width="30" height="30">
				</a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fas fa-align-left"></i>
			</a>
			<a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
				<i class="fas fa-align-left"></i>
			</a>
			
			<ul class="nav user-menu">
				<!-- Notifications -->
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="far fa-bell"></i>  <span class="badge badge-pill"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Thông Báo</span>
							<a href="javascript:void(0)" class="clear-noti"> xóa tất cả </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="assets/img/customer/ong.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Ung Thành Vũ đã gửi phản hồi</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">15 Tháng Chín 2020 10:20</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="notification-detail.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="assets/img/customer/user21.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Nguyễn Hoàng Sơn đã gửi phản hồi</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">13 Tháng Chín 2020 15:56</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="assets/img/customer/user22.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Biên Bá Hiền đã gửi phản hồi</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">12 Tháng Chín 2020 06:05 </span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user23.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Ngô Thế Huân đã gửi phản hồi</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">11 Tháng Chín 2020 12:04 </span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user24.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Dương Dĩnh đã gửi phản hồi</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">10 Tháng Chín 2020 08:42</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user25.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Lưu Thi Thi đã gửi phản hồi</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">9 Tháng Chín 2020 11:01 </span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user26.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Trương Tân Thành đã gửi phản hồi</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">8 Tháng Chín 2020 06:23 </span>
												</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="admin-notification.html">Tất cả Thông báo</a>
						</div>
					</div>
				</li>
				<!-- /Notifications -->				
				<!-- User Menu -->
				<li class="nav-item dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="admin-profile.html">Thông tin cá nhân</a>
						<a class="dropdown-item" href="login.html">Đăng xuất</a>
					</div>
				</li>
				<!-- /User Menu -->
				
			</ul>
		</div>
		<!-- /Header -->
		
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-logo">
                <a href="dashboard.php">
                    <img src="assets/img/logo-icon.png" class="img-fluid" alt="">
                </a>
            </div>
            <div class="sidebar-inner">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="dashboard.html"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-tasks"></i> <span>Quản lí</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="danhmuc.php">Danh mục</a></li>
                                <li><a href="quanlysanpham.php" class="active">Sản phẩm</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="coupon-code-type.html">Loại mã giảm giá</a></li>
                                <li><a href="coupon-code.html">Mã giảm giá</a></li>
                                <li><a href="ratingstype.html">Loại đánh giá</a></li>
                                <li><a href="email.html">Email</a></li>
								<li><a href="email.html">Email</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fas fa-shopping-cart"></i><span>Bán hàng</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="total-report.html">Danh sách đặt hàng</a></li>
                                <li><a href="shipments.html">Vận chuyển</a></li>
                                <li><a href="return-request.html">Bảo hành</a></li>
                                <li><a href="review-reports.html">Đánh giá sản phẩm</a></li>
                                
                                
                            </ul>
                        </li>
                        
                        <li class="submenu">
                            <a href="#"><i class="fas fa-users"></i><span>Người dùng</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="users.html">Khách hàng</a></li>
								<li><a href="admin-list.html">Danh sách admin</a></li>
								<li><a href="service-list.html">Nhà cung cấp</a></li>
                                
                            </ul>
                        </li>
                        <li> 
                            <a href="admin-profile.html"><i class="fas fa-user-plus"></i> <span>Thông tin cá nhân</span></a>
                        </li>
                        <li>
                            <a href="settings.html"><i class="fas fa-cog"></i> <span>Thiết lập</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->
        
        <div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Thêm sản phẩm</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="product.html">Sản phẩm</a></li>
								<li class="breadcrumb-item active">Thêm sản phẩm</li>
							</ul>
						</div>
						
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
                            <form action="" method="post">

									<div class="form-group">
										<label>Ảnh</label>
										<input class="form-control" type="file" name = "linkanh">
									</div>
									<div class="form-group">
										<div class="avatar">
											<img class="avatar-img rounded" alt="" src="">
										</div>
									</div>
									<div class="form-group">
										<label>Tên sản phẩm</label>
										<input class="form-control" type="text" name = "tensanpham" value="">
									</div>

									<div>
									<?php 

									echo "<div class='form-group'>
										<label>Danh mục</label>
										 <select name='tendanhmuc'>";
									require 'connect.php';
									$result = mysqli_query($conn,'
									select * from danhmuc ');
									while($row = $result->fetch_assoc()) {
										$tendanhmuc = $row["TENDANHMUC"];
										echo   " <option value='$tendanhmuc'>$tendanhmuc</option>";
										}
									 echo "</div>";
									 
									?>
									</div>
									<input type="" class = "hidden-element">

									<div class="form-group">

										<label><br>Giá Nhập</label>
										<input class="form-control" type="text" name = "gianhap" value="">
									</div>
										
									<div class="form-group">
										<label>Giá Bán</label>
										<input class="form-control" type="text" name = "giaban" value="">
									</div>
									<div class="form-group">
										<label>Ngày Nhập</label>
										<input type="date" name="ngaynhap" id="birth"  ><br>
									</div>
										<?php 

									echo "<div class='form-group'>
										 <label>Nhà cung cấp</label>
										 <select name='tenncc'>";
									require 'connect.php';
									$result = mysqli_query($conn,'
									select * from nhacuncap ');
									while($row = $result->fetch_assoc()) {
										$tenncc = $row["TENNCC"];
										echo   "<option value='$tenncc'>$tenncc</option>";
										}									 
									?>
									<input type="" class = "hidden-element">
									<div class="form-group">
										<label>Số lượng</label>
										<input class="form-control" type="text" name = "soluong" value="">
									</div>
	
								
								
									<div>
										<label>Mô tả</label>
										<textarea name="mota" id="textExample" cols="15" rows="10"></textarea>
									</div>
									
									<div class="mt-4">
										<button class="btn btn-primary" type="submit" name = "btnluu">Lưu thay đổi</button>
										<a href="categories.html" class="btn btn-link">Hủy</a>
									</div>
								</form>
							   </div>
						   </div>
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
									<!-- Select2 JS -->
									<script src="assets/js/select2.min.js"></script>

									<!-- Custom JS -->
									<script src="assets/js/admin.js"></script>

</body>

</html>
	