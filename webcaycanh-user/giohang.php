 <!-- <?php 

// Bắt đầu phiên
session_start();
error_reporting(E_ALL & ~(E_WARNING | E_NOTICE));

// Truy cập dữ liệu trong phiên
$userId = $_SESSION['USERID'];
require 'connect.php';
$tenUser = mysqli_query($conn,"
SELECT FULLNAME
FROM user
WHERE USERID = '$userId';
");
$tenUser = $tenUser -> fetch_assoc();
$tenUser = $tenUser["FULLNAME"];
// var_dump($tenUser);
?> -->

 
 
 <?php 


if(isset($_GET["btnthem"])){
    require 'connect.php';

    $sql = "SELECT * FROM giohang";
    $result = $conn->query($sql);
    $i = 1;
    while($row = $result->fetch_assoc()) {  
        $soluongmoi =(int) $_GET['soluong'.$i];
        $idmoi = (int) $_GET['masanpham'.$i];
        $i++;
        // var_dump($idmoi);
        // $sql1 = " UPDATE giohang
        // SET soluong = $soluongmoi;
        // WHERE id = $idmoi";
        // $conn->query($sql1);

        mysqli_query($conn,"
        UPDATE giohang
        SET soluong = $soluongmoi
        WHERE id = $idmoi;
        
    ");
    }
    mysqli_close($conn);

        // header("Location: dangnhap.php");
}

// if(isset($_POST["btnthanhtoan"])){
    // header("Location: dangnhap.php");
// }

?> 



<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>
    <link href="img/icon/icon-logo.png" rel="shortcut icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.html"><img src="img/banner/bieutuong_off.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="sign-in.html"><i class="fa fa-user"></i>Đăng Nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li class="active"><a href="muahang.php">Mua Sắm</a></li>
                <!-- <li><a href="./blog.html">Nhật Ký</a></li> -->
                <li><a href="./contact.html">Liên Hệ</a></li>
                <li><a href="giohang.php">Giỏ Hàng</a></li>

                <!-- <li><a href="#">Thêm</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Chi Tiết Sản Phẩm</a></li>
                        <li><a href="./shoping-cart.html">Giỏ Hàng</a></li>
                        <li><a href="./checkout.html">Thanh Toán</a></li>
                        <li><a href="./blog-details.html">Giới Thiệu Cửa Hàng</a></li>
                    </ul>
                </li>
            </ul> -->
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Miễn Phí Giao Hàng Cho Các Đơn Từ 499.000đ</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Miễn Phí Giao Hàng Cho Các Đơn Từ 499.000đ</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <a><i class="fa fa-user"></i> <?php echo $tenUser; ?></a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="dangnhap.php"><i class="fa fa-arrow-right"></i> Đăng Xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/banner/bieutuong_off.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                        <li><a href="index.php">Trang Chủ</a></li>
                <li class="active"><a href="muahang.php">Mua Sắm</a></li>
                <!-- <li><a href="./blog.html">Nhật Ký</a></li> -->
                <li><a href="./contact.html">Liên Hệ</a></li>
                <li><a href="giohang.php">Giỏ Hàng</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng:<span>150.000đ</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
  <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh Mục</span>
                        </div>
                        <ul>
                            
                            <li><a href="#">Cây để bàn</a></li>
                            <li><a href="#">Cây dây leo</a></li>
                            <li><a href="#">Cây tết</a></li>
                            <li><a href="#">Cây thủy sinh</a></li>
                            <li><a href="#">Cây trong nhà</a></li>
                            <li><a href="#">Cây ngoài vườn</a></li>
                            <!-- <li><a href="#">Hoa Chậu</a></li>
                            <li><a href="#">Đất Trồng Cây</a></li>
                            <li><a href="#">Dụng Cụ Làm Vườn</a></li>
                            <li><a href="#">Chậu Cảnh</a></li>
                            <li><a href="#">Tiểu Cảnh</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Tất Cả
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Tên cây cảnh">
                                <button type="submit" class="site-btn">TÌM KIẾM</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84353535355</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="img/banner/bg1.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thế Giới Cây Cảnh</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang Chủ</a>
                        <span>Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 

                                require 'connect.php';
                                $sql = "SELECT * FROM giohang";
                                $result = $conn->query($sql);
                                $i = 0;
                                $j = 0;

                                while($row = $result->fetch_assoc()) {
                                    $imagePath = $row['anh'];
                                    $tensanpham =  $row['tensanpham'];
                                    $giasanpham =  $row['gia'];
                                    $masanpham =  $row['id'];
                                    $so_luong = $row['soluong'];
                                    $j = $j + 1;
                                ?>

<tr>
                                    <td class="shoping__cart__item">

                                        <img src="<?php echo $imagePath ?>" alt="">
                                        <h5><?php echo $tensanpham ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    <?php echo number_format($giasanpham) ?>
                                    </td>
                                    <!-- <td class="shoping__cart__quantity"> -->
                                        <td>


                                        <form  method="get" action = "giohang.php">
                                        <input type="hidden" value = "<?php echo $masanpham ?>" name = "<?php echo "masanpham".$j ?>">

                                        <!-- <div class="quantity"> -->
                                            <div class="pro-qty">
                                            <!-- <input type="text" value="1"> -->

                                            <input type = "text" value = "<?php echo $so_luong ?>" name = "soluong<?php echo $i = $i + 1; ?>">
                                            </div>
                                        <!-- </div> -->
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo $giasanpham * $so_luong ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                        <?php } 
                        mysqli_close($conn);

                        ?>                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="muahang.php" class="primary-btn cart-btn">TIẾP TỤC MUA SẮM</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>

                        <button  class="btn btn-primary" type="submit" name = "btnthem">Cập nhật giỏ hàng</button></a>
                        </form>




                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                            <form  method="post" action = "">
                                <input type="text" placeholder="Nhập mã giãm giá mua hàng" name = "magiamgia">
                                <button type="submit" class="site-btn" name = "btngiamgia">SỬ DỤNG MÃ</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="shoping__checkout">
                        <h5>TỔNG TIỀN GIỎ HÀNG</h5>
                        <ul>
                            <li>Tổng<span>


                            <?php
                            error_reporting(0);
                            require 'connect.php';

                          $sql = "SELECT * FROM giohang";
                          $result = $conn->query($sql);
                          while($row = $result->fetch_assoc()) {
                              $soluongg = $row['soluong'];
                              $soluong = (int)$soluong;
                              $giasanpham =  $row['gia'];
                              $giasanpham = (int)($giasanpham);
                              $tongg = $tongg + $giasanpham*$soluongg;
                          }
                          

                            if(isset($_POST["btngiamgia"])){

                                $magiamgia = $_POST["magiamgia"];
                                // $_SESSION['magiamgia'] = $magiamgia;

                                // var_dump($magiamgia);
                                $magiamgiadb = mysqli_query($conn,"
                                SELECT TILEGIAMGIA
                                FROM giamgia
                                WHERE TENGIAMGIA = '$magiamgia';
                                     ");
    
                                $magiamgiadb = $magiamgiadb -> fetch_assoc();
                                $magiamgiadb = $magiamgiadb["TILEGIAMGIA"];
                                $magiamgiadb = (float)$magiamgiadb;
                                // var_dump($magiamgiadb);

                                $tongg = $tongg - ($tongg * $magiamgiadb) / 100;
                                $_SESSION['tong'] = $tongg;
                                $_SESSION['magiamgia'] = $magiamgiadb;

                            }
                                echo number_format($tongg).' VNĐ';
                                mysqli_close($conn);

                            ?>
</form>

                            <?php
                            if(isset($_POST["btnthanhtoan"])){
                                require 'connect.php';

                                $tonggds = $_SESSION['tong'];
                                // echo "Giảm giá còn : ".number_format($tonggds)." VNĐ";
                                // var_dump($_SESSION['tong']);

                                $iddonhang = mysqli_query($conn,"
                                SELECT MAX(MADONHANG)
                                FROM donhang;
                                     ");
                                $iddonhang = $iddonhang -> fetch_assoc();
                                $iddonhang = $iddonhang["MAX(MADONHANG)"];
                                (int)$iddonhang;
                                $iddonhang++;

                                $userId = $_SESSION['USERID'];
                                (int) $userId;

                                $currentDate = date('Y-m-d');

                                var_dump($userId);
                                $magiamgiadb = $_SESSION['magiamgia'];
                                mysqli_query($conn,"
                                insert into donhang (MADONHANG, USERID, TONGTIEN, NGAYDATHANG, MAGIAMGIA)
                                values			 ('$iddonhang','$userId','$tonggds', '$currentDate', '$magiamgiadb')
                            ");

                                $sql = "SELECT * FROM giohang";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    $masp = $row['id'];
                                    $soluongg = $row['soluong'];
                                    $gia = $row['gia'];
                                    $tongtien = (float) $gia * (int) $soluongg;

                                    $soluongsanpham = mysqli_query($conn,"
                                            SELECT SOLUONG
                                            FROM sanpham
                                            WHERE MASANPHAM = '$masp';

                                         ");
                                    $soluongsanpham = $soluongsanpham -> fetch_assoc();
                                    $soluongsanpham = $soluongsanpham["SOLUONG"];
                                    (int)$soluongsanpham;
                                    $soluongsanpham = $soluongsanpham - $soluongg;

                                    mysqli_query($conn,"
                                        insert into chitietdonhang (MASANPHAM, MADONHANG, SOLUONG, gia, TONGTIEN, TIENSAUGIAMGIA)
                                        values			 ('$masp','$iddonhang','$soluongg', '$gia','$tongtien', '$tonggds')
                                    ");
                                    mysqli_query($conn,"
                                    UPDATE sanpham
                                    SET SOLUONG = $soluongsanpham
                                    WHERE MASANPHAM = '$masp';                                     
                                    ");

                                }
                                mysqli_query($conn,"
                                DELETE FROM giohang
                            ");
                            mysqli_close($conn);

                            echo "<script>alert('Cảm ơn bạn đã mua hàng!.');</script>";
                            echo "<script>";
                            echo "window.location.href = 'hoadon.php';";
                            echo "</script>";
                            $_SESSION['magiamgia'] = 0;

                            // session_destroy();
                        }

                            
                            ?>
                            </span></li>

                            <!-- <li>Tổng tất cả <span>439.000VNĐ</span></li> -->
                        </ul>
                        <form  method="post" action = "">

                        <button  input class="btn btn-primary" type="submit" name = "btnthanhtoan">Tiến hành thanh toán</button></a>
                        </form>
                        <?php
                           
                            // header("Location: giohang.php");

                            // header("Location: index.php");

                            // echo "<script>alert('Cảm ơn bạn33333 đã mua hàng.');</script>";




                                // var_dump($iddonhang);


                                // var_dump($tongg);
                                // var_dump($userId);
                                // var_dump($userId);
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <!-- <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <!-- <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer> --> -->
    <!-- Footer Section End -->
    <!-- Footer Section Begin From Index -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/banner/bieutuong_off.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Đại học Nông Lâm TP.HCM</li>
                            <li>Phone: +84353535355</li>
                            <li>Email: thegioicaycanhNLU@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 ">
                    <div class="footer__widget no_flex">
                        <h6>Địa chỉ bán lẻ</h6>
                        <ul>
                            <li>Address: KIOT 35, đường số 6, Đại học Nông Lâm</li>
                            <li>Phone: +84353535355</li>
                            <li>Email: thegioicaycanhNLU@gmail.com</li>
                        </ul>
                            
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget no_flex">
                        <h6>Để lại thông tin liên hệ</h6>
                        <p>Tư vấn chăm sóc, mua bán cây</p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Gửi</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End From Index -->
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>