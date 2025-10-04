<?php
include "connect.php";
//$result = mysqli_query($conn,"SELECT * FROM users" );

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="Container-Type" content="text/html">
    <title>Thông tin người dùng</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link href="indexx.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            
        }
        header {
            text-align: center;
            padding: 10px;
            background-color: #f8f8f8;
        }
        h1 {
            color: #333;
        }
        section {
            margin: 20px 0;
        }
        p {
            margin-bottom: 8px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- phần header-->
    <div class="container-fluid st" style="background-color: rgba(235, 235, 235, 0.5);">

        <div class="row" style="height: 110px;padding: 20px 0px 0px 30px">
            <div class="col-lg-1"><img src="hinhanhbanhmi/logo.jpg"
                   style="width: 110px;height: 100px;" alt=""></div>
            <div class="col-lg-7 menutrl">
                <div class="row" style="padding-left: 40px;">
                    
                        <nav class="navbar navbar-expand-sm">
                            <ul class="navbar-nav">
                                <li><a style="padding-right: 20px;" href="index.html">TRANG CHỦ</a></li>
                                <li><a style="padding-right: 20px;"  href="gioithieu.html">GIỚI THIỆU</a></li>
                                <li class="nav-item_dropdown">
                                    <a class="nav-link dropdown-toggle" href=""  style="padding-right: 20px;padding-top: 0px;" id="navbardrop"
                                        data-toggle="dropdown">Menu Bánh</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="banhmiau.html">Bánh mì âu</a>
                                        <a class="dropdown-item" href="banhmisourdough.html">Bánh mì men chua Sourdough</a>
                                        <a class="dropdown-item" href="banhmimem.html">Bánh mì mềm</a>
                                        <a class="dropdown-item" href="cakesanddesserts.html">Cakes and Dessert</a>
                                        <a class="dropdown-item" href="croissant.html">Croissant</a>
                                        <a class="dropdown-item" href="banhrandailoan.html">Bánh rán Đài Loan</a>
                                        <a class="dropdown-item" href="pizza.html">Pizza</a>
                                        <a class="dropdown-item" href="monankem.html">Món ăn kèm</a>
                                    </div>
                                </li>
                                <li class="nav-item_dropdown">
                                    <a class="nav-link dropdown-toggle" style="padding: 0px;" href="" id="navbardrop"
                                        data-toggle="dropdown">Menu đồ uống</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="Coffee.html">Coffee</a>
                                        <a class="dropdown-item" href="tratraicay.html">Trà trái cây</a>
                                        <a class="dropdown-item" href="trasua.html">Trà sữa</a>
                                    </div>
                                </li>
                                
                                
                            </ul>
                        </nav>
                    
                </div>
            </div>
            <div class="col-lg-4" >
                <div class="row">
                    <div class="col-lg-7" style="padding-top: 5px;padding-bottom: 10px;" >
                        <form action="" id="search-box" >
                            <input type="text" id="search-text" placeholder="Search..."> 
                            <button  id="search-btn"><i style="color: rgb(57, 51, 51);" class="fa fa-search"></i></button>
                            
                        </form>
                    
                    </div>
                    <div class="col-lg-2" style="padding: 0px;" >
                        <button style="height: 50px;padding: 0px;border: 0px;" type="button" class="circle1"><a
                            href="thongtinngdung.html"><i style="color: white;" class="fa fa-user-o"
                                aria-hidden="true"></i></a></button>
                            
                    </div>
                    <div class="col-lg-2" style="padding-left: 0px;">
                        <button style="height: 50px;padding: 0px;border: 0px;" type="button" class="circle2"><a
                            href="giohang.html"><i style="color: rgb(54, 49, 49);" class="fa fa-shopping-basket"
                                aria-hidden="true"></i></a></button>
                    
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="container-fluid">
        <div class="row  ">
            <h1 class="text">Thông tin người dùng</h1>
            <img src="hinhanhbanhmi/nenbanhmi.jpg" width="100%" height="250px" style="margin-top: 30px;" alt="">
            <h6 class="te"><a href="index.html">Trang chủ</a>&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;<i>Thông tin người dùng</i></h6>
        </div>
    </div>
    <?php
    if(isset($_POST['btndangnhap'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Truy vấn kiểm tra thông tin đăng nhập
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);
    
        if ($result->num_rows > 0) {
            // Lấy thông tin người dùng từ cơ sở dữ liệu
            $user = $result->fetch_assoc();
            $name = $user['name'];
            $email = $user['email'];
            $phone = $user['phone'];
    
            // Hiển thị giao diện người dùng
            echo '<section style="margin-left: 20px;">';
            echo "<h2>Xin chào, $name!</h2>";
            echo "<p>Dưới đây là thông tin tài khoản của bạn:</p>";
            echo "<p><strong>Họ và Tên:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Số Điện Thoại:</strong> $phone</p>";
            echo '<button><a href="logout.php" style="text-decoration: none;">Đăng Xuất</a></button>';
            echo '</section>';
        } else {
            echo "Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.";
        }
    }
    
    
    ?>
    <!--<section style="margin-left: 20px;">
        <h2>Xin chào, $name</h2>
        <p>Dưới đây là thông tin tài khoản của bạn:</p>
        <p><strong>Họ và Tên:</strong> [Tên Người Dùng]</p>
        <p><strong>Email:</strong> [example@email.com]</p>
        <p><strong>Số Điện Thoại:</strong> [Số Điện Thoại]</p>

        <button ><a href="login.php" style="text-decoration: none;">Đăng Xuất</a></button>
    </section>-->

    
        
        
        
        
    </div>
    <div class="contact-icons">
        <a href="tel:0123456789" class="phone-icon"><img src="hinhanhbanhmi/phone.jpg" alt="" style="width: 50px;height: 50px;"></a>
        <a href="https://zalo.me/your-zalo-id" class="zalo-icon"><img src="hinhanhbanhmi/zalo.png" alt=""style="width: 50px;height: 50px;"></a>
    </div>
    <div class="container-fluid lh ">
        <div class="row">
            <div class="col-lg-6 ">
                <h3>Liên hệ phản hồi CSKH</h3>
            </div>
            <div class="col-lg-6 sdt">
                <input type="tel" id="phone" placeholder=" Số điện thoại...">
                <button onclick="validatePhoneNumber()">Đăng ký</button>
            </div>
        </div>
    </div>
    <div class="container opp">
        <div class="row">
            <div class="col-lg-3 ">
                <img src="hinhanhbanhmi/logo.jpg" alt="" style="height: 300px;width: 300px;">
                <a href="https://www.google.com/maps/place/Ti%E1%BB%87m+b%C3%A1nh+Changi+chi+nh%C3%A1nh+T%C3%A2n+Xu%C3%A2n/@21.0855134,105.7848878,17z/data=!3m1!4b1!4m6!3m5!1s0x3135ab8e7989e827:0x950ee5b5bbd11ae!8m2!3d21.0855134!4d105.7848878!16s%2Fg%2F11q4dl4424?entry=ttu"><b> Địa chỉ:</b><p>ShopHouse05 Tòa N05 CC <br>Ecohome 3 Tân Xuân-Bắc Từ Liêm <br>-Hà Nội </p></a>
                <b>Hotline</b><p>0355063225</p>
            </div>
            <div class="col-lg-3 "><b><h6>CÔNG TY CỔ PHẦN THƯƠNG MẠI DỊCH VỤ <br> NHIỀU THÀNH VIÊN</h6></b><br>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i>Vĩnh Tân, Vĩnh Cửu District, Dong Nai, Vietnam</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Giấy chứng nhận đăng ký kinh <br> doanh số:0109886114 do <br> Phòng Đăng ký kinh doanh - <br> Sở Kế hoạch và Đầu tư cấp <br> ngày 13/01/2022</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i>0927900688</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i>binhkhong2410@gmail.com</p>
            </div>
            <div class="col-lg-3 vv"><a href="lienhe.html"><b><h6>QUYỀN LỢI KHÁCH HÀNG</h6></b>
                <p><i class="fa fa-check" aria-hidden="true"></i>Quyền lợi khách hàng</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Quyền đổi trả sản phẩm</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Hỏi đáp thắc mắc <br>Thư tố cáo</p></a>
            </div>
            <div class="col-lg-3 vv"><b><h6>CHÍNH SÁCH</h6></b>
                <a href="chinhsachchung.html"><p><i class="fa fa-check" aria-hidden="true"></i>Chính sách quy định chung</p></a>
                <a href="chinhsachbaomat.html"><p><i class="fa fa-check" aria-hidden="true"></i>Chính sách bảo mật</p></a>
                <a href="chinhsachvanchuyen.html"><p><i class="fa fa-check" aria-hidden="true"></i>Chính sách vận chuyển</p></a>
                <a href="baomatchinhsach.html"><p><i class="fa fa-check" aria-hidden="true"></i>Bảo mật chính sách</p></a>
            </div>
        </div>
    </div>
    <div class="container-fluid bq">
        
            <p>@ Bản quyền website thuộc về SownBifnh</p>
        
    </div>
</body>
</html>