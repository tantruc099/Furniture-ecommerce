<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa khách hàng</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ma_kh = $_POST['ma_kh'];
        $ten_kh = $_POST['ten_kh'];
        $email = $_POST['email'];
        $dia_chi = $_POST['dia_chi'];
        $sdt = $_POST['sdt'];

        $sql = "UPDATE khach_hang SET ten_kh='$ten_kh', email='$email', dia_chi='$dia_chi', sdt='$sdt' WHERE ma_kh='$ma_kh'";

        if ($conn->query($sql) === TRUE) {
            header("Location: customers.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        $ma_kh = $_GET['ma_kh'];
        $sql = "SELECT * FROM khach_hang WHERE ma_kh='$ma_kh'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No customer found with this ID";
            exit();
        }
    }
?>
<body>
    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="container" style="color: white">
            <h2>Chỉnh sửa khách hàng</h2>
            <form action="edit_customer.php" method="post">
                <input type="hidden" name="ma_kh" value="<?php echo $row['ma_kh']; ?>">
                <div class="mb-3">
                    <label for="ten_kh" class="form-label">Tên khách hàng</label>
                    <input type="text" class="form-control" id="ten_kh" name="ten_kh" value="<?php echo $row['ten_kh']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="dia_chi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?php echo $row['dia_chi']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $row['sdt']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </main>
    <?php include("ad_footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
