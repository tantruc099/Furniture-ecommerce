<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/s_layout_products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    session_start();
    // Lấy danh sách loại món
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

    // ==========Phân trang sản phẩm=============

    // Số lượng sản phẩm trên mỗi trang
    $items_per_page = 6;

    // Tính tổng số sản phẩm
    $total_items = $sanpham->rowCount();

    // Tính tổng số trang
    $total_pages = ceil($total_items / $items_per_page);

    // Xác định trang hiện tại
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính toán vị trí bắt đầu và kết thúc của sản phẩm trên trang hiện tại
    $start = ($current_page - 1) * $items_per_page;

    // Truy vấn dữ liệu sản phẩm cho trang hiện tại
    $sql1 .= " LIMIT $start, $items_per_page";
    $sanpham = $pdo1->query($sql1);
    $pdo1 = null;

    // Tìm kiếm sản phẩm theo tên
    $pdo3 = new PDO("mysql:host=localhost;dbname=ql_noithat","root","");
    $pdo3->query("set names utf8");

    if (isset($_GET['search']))
    {
        $ten = $_GET["search"];
        $sql3 = "select * from san_pham where ten_sp like '%".$ten."%'";
        $sanpham3 = $pdo3->query($sql3);

        $items_per_page = 6;
        $total_items = $sanpham3->rowCount();

        // Tính tổng số trang
        $total_pages = ceil($total_items / $items_per_page);
        
        // Xác định trang hiện tại và giới hạn trang hiện tại
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $current_page = min($current_page, $total_pages);
        $current_page = max($current_page, 1);
        
        // Tính toán vị trí bắt đầu của sản phẩm trên trang hiện tại
        $start = ($current_page - 1) * $items_per_page;

        // Thêm điều kiện phân trang vào truy vấn SQL
        $sql3 .= " LIMIT $start, $items_per_page";

        // Thực hiện truy vấn SQL và hiển thị dữ liệu sản phẩm trên trang hiện tại
        $sanpham3 = $pdo3->query($sql3);
    }
    $pdo3 = null;
?>
<body>
    <div class="test">
        <!-- Header -->
        <?php include("header.php") ?>
        <!-- ====== -->
        <div class="main">
            <div class="theme">
                <h4><a href="">Sản phẩm</a></h4>
                <div>
                    <a href="homepage.php">Trang chủ <i class="fa-solid fa-angles-right"></i></a>
                    <p style="color: #668a2d; padding-left: 5px">Sản phẩm</p>
                </div>
            </div>
            <div class="category_products container">
                <div class="category">
                    <div class="menu_category">
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
                    <div class="sale_banner">
                        <div class="title_sale_banner">
                            <h4>Khuyến mãi hot</h4>
                            <div style="width: 15%; background-color: #729a33; height: 5px;"></div>
                        </div>
                        <div class="img_sale_banner">
                            <img src="../assets/images/aside_banner.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="products">
                    <div class="list_products row">
                        <?php
                        if (isset($_GET['search']))
                        {
                            foreach ($sanpham3 as $sp)
                            {
                            ?>
                            <div class="frame_products col-sm-4">
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
                        }
                        else
                        {
                            foreach ($sanpham as $sp)
                            {
                            ?>
                            <div class="frame_products col-sm-4">
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
                        } 
                        ?>
                    </div>
                    <div class="pagination">
                        <?php
                        if (isset($_GET['search']))
                        {
                            for ($i = 1; $i <= $total_pages; $i++)
                            {
                                $active_class = ($i == $current_page) ? 'active' : '';
                                echo "<a href='?page=$i&search=$ten' class='$active_class'>$i</a> ";
                            }
                        }
                        else
                        {
                            for ($i = 1; $i <= $total_pages; $i++)
                            {
                                $active_class = ($i == $current_page) ? 'active' : '';
                                echo "<a href='?page=$i&ml=$ml' class='$active_class'>$i</a> ";
                            }
                        }
                        ?>
                    </div>
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