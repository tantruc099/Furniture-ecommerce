<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    if (isset($_GET['ma_sp'])) {
        $ma_sp = $_GET['ma_sp'];
        $sql = "SELECT * FROM san_pham WHERE ma_sp = '$ma_sp'";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ma_sp = $_POST['ma_sp'];
        $ten_sp = $_POST['ten_sp'];
        $mo_ta = $_POST['mo_ta'];
        $gia = $_POST['gia'];
        $ma_loai = $_POST['ma_loai'];
        $hinh = $_FILES['hinh']['name'];

        if ($hinh) {
            $target = "../assets/images/image_products/" . basename($hinh);
            if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target)) {
                $sql = "UPDATE san_pham SET ten_sp='$ten_sp', mo_ta='$mo_ta', gia='$gia', hinh='$hinh', ma_loai='$ma_loai' WHERE ma_sp='$ma_sp'";
            } else {
                echo "Lỗi tải lên hình ảnh";
            }
        } else {
            $sql = "UPDATE san_pham SET ten_sp='$ten_sp', mo_ta='$mo_ta', gia='$gia', ma_loai='$ma_loai' WHERE ma_sp='$ma_sp'";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: products.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
<body>
    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="mid">
            <div class="container" style="color: white">
                <h2>Chỉnh sửa sản phẩm</h2>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ma_sp" value="<?= $product['ma_sp'] ?>">
                    <div class="mb-3">
                        <label for="ten_sp" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="ten_sp" name="ten_sp" value="<?= $product['ten_sp'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="mo_ta" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="mo_ta" name="mo_ta" required><?= $product['mo_ta'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gia" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="gia" name="gia" value="<?= $product['gia'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Hình</label>
                        <input type="file" class="form-control" id="hinh" name="hinh">
                        <img src="../assets/images/image_products/<?= $product['hinh'] ?>" alt="Hình ảnh" width="100">
                    </div>
                    <div class="mb-3">
                        <label for="ma_loai" class="form-label">Mã loại</label>
                        <input type="text" class="form-control" id="ma_loai" name="ma_loai" value="<?= $product['ma_loai'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                </form>
            </div>
        </div>
        <?php include("right.php") ?>
    </main>
    <?php include("ad_footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
