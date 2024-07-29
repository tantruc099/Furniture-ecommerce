<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style/s_order.css">
</head>
<?php
    session_start();
    $totalAmount = 0;

    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $item) {
            $totalAmount += $item['donGia'] * $item['sl'];
        }
    }
?>
<body>
    <div class="test">
        <!-- Header -->
        <?php include("header.php") ?>
        <!-- ======= -->
        <div class="main">
            <div class="theme">
                <h4><a href="">Thanh toán</a></h4>
                <div>
                    <a href="homepage.php">Trang chủ <i class="fa-solid fa-angles-right"></i></a>
                    <p style="color: #668a2d; padding-left: 5px">Xác nhận thanh toán</p>
                </div>
            </div>
            <div class="confirm_order container">
                <div class="cf_table">
                    <div class="tb_title">
                        <h2>Vui lòng kiểm tra lại các thông tin sau</h2>
                    </div>
                    <div class="tb_show">
                        <table class="table table-bordered border-info align-middle" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                    foreach ($_SESSION['cart'] as $item) {
                                        $total = $item['donGia'] * $item['sl'];
                                        ?>
                                        <tr>
                                            <td><img src="../assets/images/image_products/<?php echo $item['hinh']?>" width="60px"></td>
                                            <td><?php echo $item['tenSP']; ?></td>
                                            <td><?php echo number_format($item['donGia'], 0, ',', '.'); ?></td>
                                            <td><?php echo $item['sl']; ?></td>
                                            <td><?php echo number_format($total, 0, ',', '.'); ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="4"><strong>Tổng tiền</strong></td>
                                    <td><strong><?php echo number_format($totalAmount, 0, ',', '.'); ?> VNĐ</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tb_form_action">
                        <form action="cart.php" method="post">
                            <input type="hidden" name="confirm_checkout" value="1">
                            <button type="submit" class="btn btn-outline-info">Xác nhận thanh toán</button>
                        </form>
                        <a href="cart.php" class="btn btn-outline-secondary">Quay lại giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="slide_pr container">
                <img src="../assets/images/bannerSection.jpg">
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
