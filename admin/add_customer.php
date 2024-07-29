<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khách hàng</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ten_kh = $_POST['ten_kh'];
        $email = $_POST['email'];
        $dia_chi = $_POST['dia_chi'];
        $sdt = $_POST['sdt'];

        $sql = "INSERT INTO khach_hang (ten_kh, email, dia_chi, sdt) VALUES ('$ten_kh', '$email', '$dia_chi', '$sdt')";

        if ($conn->query($sql) === TRUE) {
            header("Location: customers.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
<body>
    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="container" style="color: white">
            <h2>Thêm khách hàng</h2>
            <form action="add_customer.php" method="post">
                <div class="mb-3">
                    <label for="ten_kh" class="form-label">Tên khách hàng</label>
                    <input type="text" class="form-control" id="ten_kh" name="ten_kh" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="dia_chi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" required>
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" required>
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
