<!-- <?php 

// Bắt đầu phiên
session_start();

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
$userId = $_SESSION['USERID'];
// var_dump($userId);
(int) $userId;
if(isset($_GET["btnthem"])){
    $id_san_pham = $_GET['masanpham'];
    $ten_san_pham = $_GET['tensanpham'];
    $gia = $_GET['giasanpham'];
    $anh = $_GET['linkanh'];
    require('connect.php');
    $id_san_pham = (int)($id_san_pham);
    $gia = (double)($gia);
    // Chuẩn bị câu truy vấn SQL

    $rows = mysqli_query($conn,"
    select * from giohang where id = '$id_san_pham'
");
    $count = mysqli_num_rows($rows);

    if($count == 1){

        $soluongdb = mysqli_query($conn,"
		SELECT *
		FROM giohang
		WHERE id = '$id_san_pham'
		");
        $soluongdb = $soluongdb->fetch_assoc();
		$soluongdb = $soluongdb['soluong'];
        (int)$soluongdb;


        $soluongud = $soluongdb + 1;
        $sql = "UPDATE giohang SET soluong = '$soluongud' WHERE id = '$id_san_pham'";
        $conn->query($sql);
        header("Location: giohang.php");
    }else{
        $sql = "INSERT INTO giohang (id, tensanpham, soluong, gia, anh, USERID) 
        VALUES ('$id_san_pham', '$ten_san_pham', '1', '$gia', '$anh', '$userId')";
        $conn->query($sql);
        header("Location: giohang.php");
    }
    }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mua Sắm</title>
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
            <a href="index.php"><img src="img/banner/bieutuong_off.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">Tổng:<span>150.000đ</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i>Đăng Nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li class="active"><a href="muahang.php">Mua Sắm</a></li>
                <!-- <li><a href="./blog.html">Nhật Ký</a></li> -->
                <li><a href="./contact.html">Liên Hệ</a></li>
                <!-- <li><a href="#">Thêm</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Chi Tiết Sản Phẩm</a></li>
                        <li><a href="./checkout.html">Thanh Toán</a></li>
                        <li><a href="./blog-details.html">Giới Thiệu Cửa Hàng</a></li>
                    </ul>
                </li> -->
                <li><a href="./shoping-cart.html">Giỏ Hàng</a></li>

            </ul>
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
                            <li class="active"><a href="muahang.php">Mua sắm</a></li>
                            <li><a href="./contact.html">Liên hệ</a></li>
                            <!-- <li><a href="#">Thêm</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Chi Tiết Sản Phẩm</a></li>
                                    <li><a href="./checkout.html">Thanh Toán</a></li>
                                    <li><a href="./blog-details.html">Giới Thiệu</a></li>
                                </ul>
                            </li> -->
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
                        <form action="" method="get">
                                <div class="hero__search__categories">
                                    Tất Cả
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Tên cây cảnh" name = "tentimkiem">
                                <button type="submit" class="site-btn" name = "btntimkiem">TÌM KIẾM</button>
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
                        <span>Mua Sắm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh Mục</h4>
                            <ul>
                                <li><a href="#">Cây để bàn</a></li>
                                <li><a href="#">Cây dây leo</a></li>
                                <li><a href="#">Cây tết</a></li>
                                <li><a href="#">Cây thủy sinh</a></li>
                                <li><a href="#">Cây trong nhà</a></li>
                                <li><a href="#">Cây ngoài vườn</a></li>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Giá</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="900">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Kích Thước</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Lớn
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Trung Bình
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Nhỏ
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Rất nhỏ
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Mới Nhất</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic img-1">
                                                <img src="img/cay-de-ban/cam-nhung.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Cây Cẩm Nhung</h6>
                                                <span>39.000 VNĐ</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic img-1">
                                                <img src="img/cay-de-ban/sen-da-mini.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Sen Đá Mini</h6>
                                                <span>50.000 VNĐ</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic img-1">
                                                <img src="img/cay-de-ban/cay-mong-rong.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Cây Móng Rồng</h6>
                                                <span>64.000 VNĐ</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic img-1">
                                                <img src="img/cay-de-ban/cam-nhung.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Cây Cẩm Nhung</h6>
                                                <span>39.000 VNĐ</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic img-1">
                                                <img src="img/cay-de-ban/sen-da-mini.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Sen Đá Mini</h6>
                                                <span>29.000 VNĐ</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic img-1">
                                                <img src="img/cay-de-ban/cay-mong-rong.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Cây Móng Rồng</h6>
                                                <span>64.000 VNĐ</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Lọc theo</span>
                                    <select>
                                        <option value="0">Mới Nhất</option>
                                        <option value="0">Giá Cả</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <!-- <div class="filter__found">
                                    <h6><span>16</span> sản phẩm đã tìm thấy</h6>
                                </div> -->
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <a href="shop-grid.html"><span class="icon_grid-2x2"></span></a>
                                    <a href="shop-list.html"><span class="icon_ul"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    <script>
    // Hàm JavaScript để gửi yêu cầu thêm sản phẩm vào giỏ hàng
//     function addToCart(tensanpham) {
//         alert('tensanpham');

//         // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
//         // var xhr = new XMLHttpRequest();
//         // xhr.open('GET', 'add_to_cart.php?product_id=' + tensanpham, true);
//         // xhr.send();
//         // Có thể thêm các xử lý khác ở đây, như hiển thị thông báo thành công
//     }
// </script>

                    <?php 

                    require 'connect.php';
                    $sql = "SELECT * FROM sanpham";
                    $result = $conn->query($sql);

                    if(isset($_GET["btntimkiem"])){
                        $search_term = $_GET["tentimkiem"];
                        $sql = "SELECT * FROM sanpham WHERE TENSANPHAM LIKE '%$search_term%'"; 
                       $result = $conn->query($sql);
                    }


                    while($row = $result->fetch_assoc()) {
                        $imagePath = $row['ANHSANPHAM'];
                        $tensanpham =  $row['TENSANPHAM'];
                        $giasanpham =  $row['GIABAN'];
                        $masanpham =  $row['MASANPHAM'];

                        ?>
                        
                        <div class='col-lg-4 col-md-6 col-sm-6'>
                        <div class='product__item'>
                            <div class='product__item__pic set-bg' data-setbg='<?php echo $imagePath ?>'>
                                <ul class='product__item__pic__hover'>
                                   
                                    <li>
                                    <form  method="get" action = "muahang.php">
                                    <input type = "hidden" value = " <?php echo $imagePath ?>" name = "linkanh" >
                                    <input type = "hidden" value = " <?php echo $tensanpham ?>" name = "tensanpham" >
                                    <input type = "hidden" value = " <?php echo $giasanpham ?>" name = "giasanpham" >
                                    <input type = "hidden" value = " <?php echo $masanpham ?>" name = "masanpham" >
                                 <i class='fa fa-shopping-cart'></i><button  class="btn btn-primary" type="submit" name = "btnthem">Thêm giỏ hàng</button>

                                    </form>
                                    <form  method="get" action = "chitietsanpham.php">
                                    <input type = "hidden" value = " <?php echo $masanpham ?>" name = "masanpham" >

                                    <br><i class="fa fa-regular fa-eye"></i><button  class="btn btn-primary" type="submit" name = "btnchitiet">Chi tiết sản phẩm</button>
                                    </form>


                                </li>
                                </ul>
                            </div>
                            <div class='product__item__text'>
                                <h6> <?php echo $tensanpham ?></a></h6>
                                <h5><?php echo number_format($giasanpham).' VNĐ' ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                                    }
                    ?>
                 

                


                    

                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/banner/bieutuong_off.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: Đại học Nông Lâm TP.HCM</li>
                            <li>Điện thoại: +84353535355</li>
                            <li>Email: thegioicaycanhNLU@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 ">
                    <div class="footer__widget no_flex">
                        <h6>Địa chỉ bán lẻ</h6>
                        <ul>
                            <li>Địa chỉ: KIOT 35, đường số 6, Đại học Nông Lâm</li>
                            <li>Điện thoại: +84353535355</li>
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
                            <button type="submit" class="site-btn"  onclick='addToCart()'>Gửi</button>
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
    
    <!-- Footer Section End -->

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