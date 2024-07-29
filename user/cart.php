<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/s_cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    // Giỏ hàng
    session_start();
    // Nếu chưa có giỏ hàng thì khởi tạo giỏ
    if (!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = [];
    }
    // Xoá all giỏ
    if (isset($_GET['emptyCart']) && ($_GET['emptyCart'] == 1))
    {
        unset($_SESSION['cart']);
    }
    // Xoá item trong giỏ
    if (isset($_GET['delId']) && ($_GET['delId'] >= 0))
    {
        array_splice($_SESSION['cart'], $_GET['delId'], 1);
    }
    // Update item trong giỏ
    if (isset($_GET['updateId']) && ($_GET['updateId'] >= 0))
    {
        $index = $_GET['updateId'];
        if (isset($_SESSION['cart'][$index]))
        {
            $new_quantity = $_GET['num_sl']; // Số lượng mới
            $_SESSION['cart'][$index]['sl'] = $new_quantity;
        }
    }
    // Lấy dữ liệu từ form xem chi tiết
    if (isset($_POST['add_to_cart']) && ($_POST['add_to_cart']))
    {
        $maSP = $_POST['maSP'];
        $tenSP = $_POST['tenSP'];
        $hinh = $_POST['hinh'];
        $donGia = $_POST['donGia'];
        $sl = $_POST['sl'];

        $flag = 0;
        $count = count($_SESSION['cart']);
        for ($i = 0; $i < $count; $i++)
        {
            $item = $_SESSION['cart'][$i];
            if ($item["maSP"] == $maSP)
            {
                $flag = 1;
                $sl_new = $sl + $item["sl"];
                $item["sl"] = $sl_new; // Cập nhật số lượng trực tiếp trong mảng $_SESSION['cart]
                $_SESSION['cart'][$i] == $item;
                break;
            }
        }
        // Thêm sản phâm mới vào giỏ hàng nếu không trùng
        if ($flag == 0)
        {
            $sp = array(
                'maSP' => $maSP,
                'tenSP' => $tenSP,
                'hinh' => $hinh,
                'donGia' => $donGia,
                'sl' => $sl,
            );
            $_SESSION['cart'][] = $sp;
        }
    }
    // Tính tổng tiền trong giỏ hàng
    $totalQuantity = 0;
    $totalAmount = 0;

    // Lặp qua các mặt hàng trong giỏ hàng để tính tổng số lượng và tổng tiền
    foreach ($_SESSION['cart'] as $item) {
        $totalQuantity += $item['sl']; 
        $totalAmount += ($item['donGia'] * $item['sl']);
    }

    // Xử lí khi nhấn nút "Thanh toán"
    if (isset($_POST['checkout'])) {
        header('Location: order.php');
        exit();
    }

    // Kết nối đến cơ sở dữ liệu
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=ql_noithat", "root", "");
        $pdo->query("set names utf8");
    } catch (PDOException $e) {
        echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        exit();
    }

    // Xử lý xác nhận thanh toán
    if (isset($_POST['confirm_checkout'])) {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!isset($_SESSION['ma_kh'])) {
            header('Location: login.php');
            exit(); // Dừng việc thực hiện xác nhận thanh toán nếu chưa đăng nhập
        }
        $maKH = $_SESSION['ma_kh']; // Lấy mã khách hàng từ session
        $ngayDat = date('Y-m-d'); // Ngày hiện tại
        $tongTien = $totalAmount;

        // Thêm hóa đơn vào bảng hoa_don
        $sql_hoa_don = "INSERT INTO hoa_don (ma_kh, ngay_dat, tong_tien) VALUES (:maKH, :ngayDat, :tongTien)";
        $stmt_hoa_don = $pdo->prepare($sql_hoa_don);
        $stmt_hoa_don->bindParam(':maKH', $maKH);
        $stmt_hoa_don->bindParam(':ngayDat', $ngayDat);
        $stmt_hoa_don->bindParam(':tongTien', $tongTien);

        if ($stmt_hoa_don->execute()) {
            $maHD = $pdo->lastInsertId(); // Lấy mã hóa đơn vừa thêm

            // Thêm chi tiết hóa đơn vào bảng chi_tiet_hoa_don
            foreach ($_SESSION['cart'] as $item) {
                $maSP = $item['maSP'];
                $soLuong = $item['sl'];
                $gia = $item['donGia'];
                $sql_chi_tiet = "INSERT INTO chi_tiet_hoa_don (ma_hd, ma_sp, so_luong, gia) VALUES (:maHD, :maSP, :soLuong, :gia)";
                $stmt_chi_tiet = $pdo->prepare($sql_chi_tiet);
                $stmt_chi_tiet->bindParam(':maHD', $maHD);
                $stmt_chi_tiet->bindParam(':maSP', $maSP);
                $stmt_chi_tiet->bindParam(':soLuong', $soLuong);
                $stmt_chi_tiet->bindParam(':gia', $gia);
                $stmt_chi_tiet->execute();
            }

            // Xóa giỏ hàng sau khi thanh toán
            unset($_SESSION['cart']);
            // Chuyển hướng sang trang orderSuccess.php
            header("Location: orderSuccess.php");
            exit();
        } else {
            echo "Lỗi: Không thể thêm hóa đơn.";
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
                <h4><a href="">Giỏ hàng</a></h4>
                <div>
                    <a href="homepage.php">Trang chủ <i class="fa-solid fa-angles-right"></i></a>
                    <p style="color: #668a2d; padding-left: 5px">Giỏ hàng của bạn</p>
                </div>
            </div>
            <div class="cart container">
                <div class="c_title">
                    <h2>Thông tin giỏ hàng của bạn</h2>
                </div>
                <div class="c_table">
                    <?php
                    if (empty($_SESSION['cart']))
                    {
                    ?>
                    <table class="table">
                        <tr>
                            <td>
                                <p>Giỏ hàng của bạn hiện chưa có sản phẩm nào</p>
                            </td>
                        </tr>
                    </table>
                    <?php        
                    }
                    ?>
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
                    {
                    ?>
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $totalCounter = 0;
                                $itemCounter = 0;
                                $count = count($_SESSION['cart']);
                                for ($i = 0; $i < $count; $i++)
                                {
                                    $item = $_SESSION['cart'][$i];
                                    $imgUrl = "../assets/images/image_products"."/".$item["hinh"];
                                    $total = (float) $item["donGia"] * (int) $item["sl"];
                                    $totalCounter += $total;
                                    $itemCounter += $item["sl"];
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $imgUrl ?>" class="rounded img-thumbnail mr-2" style="width: 60px">
                                            <?php echo $item['tenSP'] ?>
                                            <!-- <a href="cart.php?delId=<?php echo $i ?>" class="text-danger"><i class="fa-solid fa-trash"></i></a> -->
                                        </td>
                                        <td>
                                            <?php echo number_format($item["donGia"], 0, ',', '.'); ?>
                                        </td>
                                        <td>
                                            <form action="cart.php" method="get">
                                                <input type="hidden" name="updateId" value="<?php echo $i ?>">
                                                <input type="number" name="num_sl" class="cart-qty-single soluong" data-item="<?php echo $key ?>" value="<?php echo $item['sl'] ?>">
                                                <button type="submit" class="text-primary" style="border: none; background-color: transparent"><i class="fa-solid fa-pen"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php echo number_format($total, 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <a href="cart.php?delId=<?php echo $i ?>" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                    <div class="cart-summary">
                        <div class="sum_qty">
                            <p>Tổng số lượng: <?php echo $totalQuantity; ?></p>
                        </div>
                        <div class="sum_alltotal">
                            <p>Tổng tiền: <?php echo number_format($totalAmount, 0, ',', '.'); ?> VNĐ</p>
                        </div>
                    </div>
                    <?php    
                    }
                    ?>
                    <div class="actions">
                        <a href="layout_products.php" class="btn btn-outline-primary btnM">Tiếp tục mua sắm</a>
                        <!-- Nút Thanh toán -->
                        <form action="cart.php" method="post">
                            <button type="submit" name="checkout" class="btn btn-outline-success btnTT">Thanh toán</button>
                        </form>
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