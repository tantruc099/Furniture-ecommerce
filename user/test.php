<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style/s_homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="contacts">
                <div class="contacts_info">
                    <p>Phone: <a href="">01676435063 | </a></p>
                    <p>Hotline: <a href="">19001009</a></p>
                </div>
                <ul class="login_register_cart">
                    <li style="width: 35%"><a href="login.php"><i class="fa-solid fa-user"></i> Đăng nhập</a></li>
                    <li style="width: 35%"><a href="register.php"><i class="fa-solid fa-key"></i> Đăng ký</a></li>
                    <li style="width: 30%">
                        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
                    </li>
                </ul>
            </div>
            <div class="logo">
                <div class="img_logo">
                    <img src="./assets/images/logo.jpg" alt="">
                </div>
                <div class="banner_top">
                    <img src="./assets/images/bannertop.jpg" alt="">
                </div>
            </div>
            <div class="navbar">
                <ul class="menu">
                    <li><a href="homepage.php">TRANG CHỦ</a></li>
                    <li><a href="">GIỚI THIỆU</a></li>
                    <li>
                        <a href="layout_products.php">SẢN PHẨM <i class="fa-solid fa-angle-down"></i></a>
                        <!-- <ul class="menu_2">
                            <li><a href="">Sản phẩm hot</a></li>
                            <li><a href="">Sản phẩm khuyến mãi</a></li>
                            <li><a href="">Sản phẩm mới</a></li>
                            <li><a href="">Nội thất phòng khách</a></li>
                            <li><a href="">Nội thất phòng ngủ</a></li>
                            <li><a href="">Nội thất phòng ăn</a></li>
                            <li><a href="">Nội thất phòng bếp</a></li>
                            <li><a href="">Phòng làm việc</a></li>
                            <li><a href="">Hàng trang trí</a></li>
                            <li><a href="">Bộ sưu tập</a></li>
                        </ul> -->
                    </li>
                    <li><a href="news.php">THIẾT KẾ NỘI THẤT</a></li>
                    <li><a href="news.php">TIN TỨC</a></li>
                    <li><a href="contact.php">LIÊN HỆ</a></li>
                </ul>
                <div class="search">
                    <form action="layout_products.php" method="get">
                    <input type="text" name="search" placeholder="Tìm kiếm sản phẩm"><i class="fa-solid fa-magnifying-glass" style="position: absolute"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- ====== -->
        <div class="main">
            <div class="category_slidepr">
                <div class="category">
                    <h5><i class="fa-solid fa-table-list"></i></i> DANH MỤC SẢN PHẨM</h5>
                    <ul>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Sản phẩm hot</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Sản phẩm khuyến mãi</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Sản phẩm mới</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Nội thất phòng khách</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Nội thất phòng ngủ</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Nội thất phòng ăn</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Nội thất phòng bếp</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Phòng làm việc</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Hàng trang trí</a></li>
                        <li><a href=""><i class="fa-solid fa-angles-right"></i> Bộ sưu tập</a></li>
                    </ul>
                </div>
                <div class="slidepr">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" style="height: 100%">
                        <div class="carousel-inner" style="height: 100%">
                            <div class="carousel-item active" style="height: 100%">
                                <img src="./assets/images/slider_1.jpg" class="d-block w-100" style="height: 100%">
                            </div>
                            <div class="carousel-item" style="height: 100%">
                                <img src="./assets/images/slider_2.jpg" class="d-block w-100" style="height: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="commit_info">
                <div class="item_commit_info">
                    <div class="icon_commit"><i class="fa-solid fa-wallet"></i></div>
                    <div>
                        <p style="font-weight: bold;">TRẢ TIỀN & HOÀN TIỀN</p>
                        <p>Khách hàng hoàn trả hàng được hoàn trả 100% số tiền đã chi trả trước đó</p>
                    </div>
                </div>
                <div class="item_commit_info">
                    <div class="icon_commit"><i class="fa-solid fa-car"></i></div>
                    <div>
                        <p style="font-weight: bold;">MIỄN PHÍ VẬN CHUYỂN</p>
                        <p>Chúng tôi miễn phí vẫn chuyển cho toàn bộ khách hàng trong nội thành</p>
                    </div>
                </div>
                <div class="item_commit_info">
                    <div class="icon_commit"><i class="fa-solid fa-share"></i></div>
                    <div>
                        <p style="font-weight: bold;">BẢO MẬT THÔNG TIN</p>
                        <p>Công ty cam kết bảo mật tuyệt đối thông tin cá nhân của khách hàng</p>
                    </div>
                </div>
            </div>
            <div class="banner_pr">
                <div class="banner_left">
                    <img src="./assets/images/bannerSlider1.jpg" alt="">
                </div>
                <div class="banner_right">
                    <img src="./assets/images/bannerSlider2.jpg" alt="">
                </div>
            </div>
            <div class="products">
                <div class="title_products">
                    <h4>Sản phẩm</h4>
                </div>
                <div class="list_products row">

                </div>
                <div class="pagination">

                </div>
            </div>
            <div class="banner_pr2">
                <img src="./assets/images/bannerSection.jpg" alt="">
            </div>
            <div class="partner">
                <div class="title_partner">
                    <h4>Đối tác</h4>
                </div>
                <div class="list_partner">
                    <div><img src="./assets/images/brand1.jpg" alt=""></div>
                    <div><img src="./assets/images/brand2.jpg" alt=""></div>
                    <div><img src="./assets/images/brand3.jpg" alt=""></div>
                    <div><img src="./assets/images/brand4.jpg" alt=""></div>
                    <div><img src="./assets/images/brand5.jpg" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="footer">
            <div class="ft_1">
                <h4>Tài khoản</h4>
                <div></div>
                <p style="">Địa chỉ: <a href="">140 Lê Trọng Tấn, Tây Thạnh, Tân Phú, Thành phố Hồ Chí Minh</a></p>
                <p style="">Email: <a href="">noithatviet@gmail.com</a></p>
                <p style="">Điện thoại: <a href="">19001009</a></p>
                <p>
                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook" style="padding-right: 10px; font-size: 30px;"></i></a>
                    <a href="https://twitter.com/"><i class="fa-brands fa-twitter" style="padding-right: 10px; font-size: 30px"></i></a>
                    <a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest" style="padding-right: 10px; font-size: 30px"></i></a>
                    <a href="https://google.com/"><i class="fa-brands fa-google-plus-g" style="padding-right: 10px; font-size: 30px"></i></a>
                </p>
            </div>
            <div class="ft_2">
                <h4>Hướng dẫn</h4>
                <div></div>
                <ul>
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="">Sản phẩm</a></li>
                    <li><a href="">Thiết kế nội thất</a></li>
                    <li><a href="">Tin tức</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </div>
            <div class="ft_3">
                <h4>Chính sách</h4>
                <div></div>
                <ul>
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="">Sản phẩm</a></li>
                    <li><a href="">Thiết kế nội thất</a></li>
                    <li><a href="">Tin tức</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <!-- ====== -->
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>