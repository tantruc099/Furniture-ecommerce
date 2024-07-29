<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/s_homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<?php
    session_start();
    // Lấy danh sách loại sản phẩm
    $pdo = new PDO("mysql:host=localhost;dbname=ql_noithat","root","");
    $pdo->query("set names utf8");

    $sql = "select ma_loai, ten_loai from loai_san_pham";
    $loai_sp = $pdo->query($sql);

    $pdo = null;
    // Lấy sản phẩm theo danh mục
    $pdo1 = new PDO("mysql:host=localhost;dbname=ql_noithat","root","");
    $pdo1->query("set names utf8");

    // Kiểm tra xem có tham số 'ml' được truyền qua không
    $ml = isset($_GET["ml"]) ? $_GET["ml"] : 0;
    
    if ($ml == 0)
        $sql1 = "select * from san_pham";
    else
        $sql1 =  "select * from san_pham where ma_loai =" .$ml;
    $sanpham = $pdo1->query($sql1);
    $pdo1 = null;
    // Lấy danh sách sản phẩm
    $pdo2 = new PDO("mysql:host=localhost;dbname=ql_noithat","root","");
    $pdo2->query("set names utf8");

    $sql2 = "select * from san_pham";
    $sanpham1 = $pdo2->query($sql2);

    // ==========Phân trang sản phẩm=============

    // Số lượng sản phẩm trên mỗi trang
    $items_per_page = 8;

    // Tính tổng số sản phẩm
    $total_items = $sanpham1->rowCount();

    // Tính tổng số trang
    $total_pages = ceil($total_items / $items_per_page);

    // Xác định trang hiện tại
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính toán vị trí bắt đầu và kết thúc của sản phẩm trên trang hiện tại
    $start = ($current_page - 1) * $items_per_page;

    // Truy vấn dữ liệu sản phẩm cho trang hiện tại
    $sql2 .= " LIMIT $start, $items_per_page";
    $sanpham1 = $pdo2->query($sql2);
    $pdo2 = null;

?>
<body>
    <div class="test">
        <!-- Header -->
        <?php include("header.php") ?>
        <!-- ====== -->
        <div class="main">
            <div class="category_slidepr container">
                <div class="category">
                    <h5><i class="fa-solid fa-table-list"></i></i> DANH MỤC SẢN PHẨM</h5>
                    <ul>
                        <?php
                            foreach($loai_sp as $loai)
                            {
                        ?>
                        <li><a href="layout_products.php?ml=<?php echo $loai[0]?>&tl=<?php echo $loai[1]?>"><i class="fa-solid fa-angles-right"></i> <?php echo $loai[1];?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="slidepr">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" style="height: 100%">
                        <div class="carousel-inner" style="height: 100%">
                            <div class="carousel-item active" style="height: 100%">
                                <img src="../assets/images/slider_1.jpg" class="d-block w-100" style="height: 100%">
                            </div>
                            <div class="carousel-item" style="height: 100%">
                                <img src="../assets/images/slider_2.jpg" class="d-block w-100" style="height: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="commit_info container">
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
            <div class="banner_pr container">
                <div class="banner_left">
                    <img src="../assets/images/bannerSlider1.jpg" alt="">
                </div>
                <div class="banner_right">
                    <img src="../assets/images/bannerSlider2.jpg" alt="">
                </div>
            </div>
            <div class="products container">
                <div class="title_products">
                    <h4>Sản phẩm</h4>
                </div>
                <div class="list_products row">
                    <?php
                    foreach ($sanpham1 as $sp)
                    {
                    ?>
                        <div class="frame_products col-sm-3">
                            <div class="fp_img">
                                <img src="../assets/images/image_products/<?php echo $sp[4]; ?>" alt="">
                            </div>
                            <div class="fp_tensp">
                                <p><?php echo $sp[1]; ?></p>
                            </div>
                            <div class="fp_gia">
                                <p><?php echo number_format($sp[3], 0, ',', '.');?>đ</p>
                            </div>
                            <div class="fp_details">
                                <a href="detailpage.php?id=<?php echo $sp['ma_sp'] ?>">Xem chi tiết</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="pagination">
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++)
                    {
                        $active_class = ($i == $current_page) ? 'active' : '';
                        echo "<a href='?page=$i' class='$active_class'>$i</a> ";
                    }
                    ?>
                </div>
            </div>
            <div class="banner_pr2 container">
                <img src="../assets/images/bannerSection.jpg" alt="">
            </div>
            <div class="partner container">
                <div class="title_partner">
                    <h4>Đối tác</h4>
                </div>
                <div class="list_partner owl-carousel owl-theme">
                    <div><img src="../assets/images/brand1.jpg" alt=""></div>
                    <div><img src="../assets/images/brand2.jpg" alt=""></div>
                    <div><img src="../assets/images/brand3.jpg" alt=""></div>
                    <div><img src="../assets/images/brand4.jpg" alt=""></div>
                    <div><img src="../assets/images/brand5.jpg" alt=""></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".list_partner").owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true
            });
        });
    </script>
</body>
</html>