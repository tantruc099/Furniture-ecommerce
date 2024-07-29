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
        $ma_cthd = $_POST['ma_cthd'];
        $ma_hd = $_POST['ma_hd'];
        $ma_sp = $_POST['ma_sp'];
        $so_luong = $_POST['so_luong'];
        $gia = $_POST['gia'];

        $sql = "UPDATE chi_tiet_hoa_don SET ma_hd='$ma_hd', ma_sp='$ma_sp', so_luong='$so_luong', gia='$gia' WHERE ma_cthd='$ma_cthd'";
        if ($conn->query($sql) === TRUE) {
            header("Location: order_details.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        $ma_cthd = $_GET['ma_cthd'];

        $sql = "SELECT * FROM chi_tiet_hoa_don WHERE ma_cthd='$ma_cthd'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
?>

<body>
    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="container mid" style="color: white">
            <h2>Chỉnh sửa chi tiết hoá đơn</h2>
            <form action="edit_order_detail.php" method="post">
                <input type="hidden" name="ma_cthd" value="<?php echo $row['ma_cthd']; ?>">
                <div class="mb-3">
                    <label for="ma_hd" class="form-label">Mã hoá đơn</label>
                    <input type="text" class="form-control" name="ma_hd" value="<?php echo $row['ma_hd']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ma_sp" class="form-label">Mã sản phẩm</label>
                    <input type="text" class="form-control" name="ma_sp" value="<?php echo $row['ma_sp']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="so_luong" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" name="so_luong" value="<?php echo $row['so_luong']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="gia" class="form-label">Đơn giá</label>
                    <input type="number" class="form-control" name="gia" value="<?php echo $row['gia']; ?>" required>
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
