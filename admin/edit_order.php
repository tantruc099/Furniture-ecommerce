<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa loại sản phẩm</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ma_hd = $_POST['ma_hd'];
        $ma_kh = $_POST['ma_kh'];
        $ngay_dat = $_POST['ngay_dat'];
        $tong_tien = $_POST['tong_tien'];

        $sql = "UPDATE hoa_don SET ma_kh='$ma_kh', ngay_dat='$ngay_dat', tong_tien='$tong_tien' WHERE ma_hd='$ma_hd'";
        if ($conn->query($sql) === TRUE) {
            header("Location: order.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        $ma_hd = $_GET['ma_hd'];

        $sql = "SELECT * FROM hoa_don WHERE ma_hd='$ma_hd'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
?>
<body>
    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="container mid" style="color: white">
            <h2>Chỉnh sửa loại hoá đơn</h2>
            <form method="post" action="edit_order.php">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="ma_hd" value="<?php echo $row['ma_hd']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ma_kh" class="form-label">Mã khách hàng</label>
                    <input type="text" class="form-control" name="ma_kh" value="<?php echo $row['ma_kh']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ngay_dat" class="form-label">Ngày đặt</label>
                    <input type="date" class="form-control" name="ngay_dat" value="<?php echo $row['ngay_dat']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ngay_dat" class="form-label">Tổng tiền</label>
                    <input type="number" class="form-control" name="tong_tien" value="<?php echo $row['tong_tien']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
        <?php include("right.php") ?>
    </main>
    <?php include("ad_footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
