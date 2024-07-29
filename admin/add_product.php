<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten_sp = $_POST['ten_sp'];
        $mo_ta = $_POST['mo_ta'];
        $gia = $_POST['gia'];
        $ma_loai = $_POST['ma_loai'];
        $hinh = $_FILES['hinh']['name'];
        $target = "../assets/images/image_products/" . basename($hinh);

        if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target)) {
            $sql = "INSERT INTO san_pham (ten_sp, mo_ta, gia, hinh, ma_loai) VALUES ('$ten_sp', '$mo_ta', '$gia', '$hinh', '$ma_loai')";
            if ($conn->query($sql) === TRUE) {
                header("Location: products.php");
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Lỗi tải lên hình ảnh";
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
                <h2>Thêm sản phẩm mới</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="ten_sp" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="ten_sp" name="ten_sp" required>
                    </div>
                    <div class="mb-3">
                        <label for="mo_ta" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="mo_ta" name="mo_ta" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gia" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="gia" name="gia" required>
                    </div>
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Hình</label>
                        <input type="file" class="form-control" id="hinh" name="hinh" required>
                    </div>
                    <div class="mb-3">
                        <label for="ma_loai" class="form-label">Mã loại</label>
                        <input type="text" class="form-control" id="ma_loai" name="ma_loai" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                </form>
            </div>
        </div>
        <?php include("right.php") ?>
    </main>
    <?php include("ad_footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
