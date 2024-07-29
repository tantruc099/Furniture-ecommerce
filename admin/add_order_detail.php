<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm loại sản phẩm</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ma_hd = $_POST['ma_hd'];
        $ma_sp = $_POST['ma_sp'];
        $so_luong = $_POST['so_luong'];
        $gia = $_POST['gia'];

        $sql = "INSERT INTO chi_tiet_hoa_don (ma_hd, ma_sp, so_luong, gia) VALUES ('$ma_hd', '$ma_sp', '$so_luong', '$gia')";
        if ($conn->query($sql) === TRUE) {
            header("Location: order_details.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
<body>
    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="container mid" style="color: white">
            <h2>Thêm loại sản phẩm</h2>
            <form action="add_order_detail.php" method="post">
                <div class="mb-3">
                    <label for="ma_hd" class="form-label">Mã hoá đơn</label>
                    <input type="text" class="form-control" name="ma_hd" required>
                </div>
                <div class="mb-3">
                    <label for="ma_sp" class="form-label">Mã sản phẩm</label>
                    <input type="text" class="form-control" name="ma_sp" required>
                </div>
                <div class="mb-3">
                    <label for="so_luong" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" name="so_luong" required>
                </div>
                <div class="mb-3">
                    <label for="gia" class="form-label">Đơn giá</label>
                    <input type="number" class="form-control" name="gia" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <?php include("right.php") ?>
    </main>
    <?php include("ad_footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
