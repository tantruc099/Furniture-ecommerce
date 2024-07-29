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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ma_loai = $_POST['ma_loai'];
        $ten_loai = $_POST['ten_loai'];
        
        $sql = "UPDATE loai_san_pham SET ten_loai='$ten_loai' WHERE ma_loai='$ma_loai'";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: categories.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        $ma_loai = $_GET['ma_loai'];
        $sql = "SELECT * FROM loai_san_pham WHERE ma_loai='$ma_loai'";
        $result = $conn->query($sql);

        if (!$result) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            exit();
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No category found with this ID";
            exit();
        }
    }
?>
<body>
    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="container mid" style="color: white">
            <h2>Chỉnh sửa loại sản phẩm</h2>
            <form action="edit_category.php" method="post">
                <input type="hidden" name="ma_loai" value="<?php echo $row['ma_loai']; ?>">
                <div class="mb-3">
                    <label for="ten_loai" class="form-label">Tên loại</label>
                    <input type="text" class="form-control" id="ten_loai" name="ten_loai" value="<?php echo $row['ten_loai']; ?>" required>
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
