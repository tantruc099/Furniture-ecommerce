<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style/s_layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    $pdo = new PDO("mysql:host=localhost;dbname=ql_noithat","root","");
    $pdo->query("set names utf8");

    $sql = "select ma_loai, ten_loai from loai_san_pham";
    $loai_sp = $pdo->query($sql);

    $pdo = null;
?>
<body>
    <div class="container">
        <!-- Header -->
        <?php include("header.php") ?>
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
                <div class="list_products">Danh sách sản phẩm ở đây!!!</div>
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
        <?php include("footer.php") ?>
        <!-- ====== -->
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>