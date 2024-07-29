<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/s_detailpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    session_start();
    $pdo4 = new PDO("mysql:host=localhost;dbname=ql_noithat","root","");
    $pdo4->query("set names utf8");

    $maSP = $_GET["id"];
    $sql4 = "select * from san_pham where ma_sp = ".$maSP;
    $sanpham4 = $pdo4->query($sql4);
?>
<body>
    <div class="test">
        <!-- Header -->
        <?php include("header.php") ?>
        <!-- ======= -->
        <div class="main">
            <div class="theme">
                <h4><a href="">Thông tin chi tiết sản phẩm</a></h4>
                <div>
                    <a href="homepage.php">Trang chủ <i class="fa-solid fa-angles-right"></i></a>
                    <p style="color: #668a2d; padding-left: 5px">Chi tiết</p>
                </div>
            </div>
            <div class="detail_product container">
                <?php
                foreach ($sanpham4 as $sp)
                {
                ?>
                <div class="dp_left">
                    <div class="img_product">
                        <img src="../assets/images/image_products/<?php echo $sp[4] ?>">
                    </div>
                </div>
                <div class="dp_right">
                    <div class="r_name">
                        <h2><?php echo $sp[1] ?></h2>
                    </div>
                    <div class="r_cost">
                        <p><?php echo number_format($sp[3], 0, ',', '.');?>đ</p>
                    </div>
                    <form action="cart.php" method="POST">
                        <div class="r_qty">
                            <p>Số lượng: </p>
                            <input type="number" name="sl" placeholder="quantity" min="1" max="10"
                            value="1" size="5">
                        </div>
                        <div class="r_cart">
                            <input type="hidden" name="maSP" value="<?php echo $sp['ma_sp']?>">
                            <input type="hidden" name="tenSP" value="<?php echo $sp['ten_sp']?>">
                            <input type="hidden" name="hinh" value="<?php echo $sp['hinh']?>">
                            <input type="hidden" name="donGia" value="<?php echo $sp['gia']?>">
                            <input type="submit" name="add_to_cart" value="Cho vào giỏ">
                        </div>
                    </form>
                </div>
                <?php
                }
                ?>
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