<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $is_admin = $_POST['is_admin'];
        $ma_kh = $_POST['ma_kh'];

        // Ràng buộc giá trị cho is_admin
        if ($is_admin !== '0' && $is_admin !== '1') {
            echo "Error: is_admin phải là 0 hoặc 1.";
            exit();
        }

        $sql = "INSERT INTO user (username, password, is_admin, ma_kh) VALUES ('$username', '$password', '$is_admin', '$ma_kh')";

        if ($conn->query($sql) === TRUE) {
            header("Location: user.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
                <h2>Thêm người dùng</h2>
                <form action="add_user.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="is_admin" class="form-label">Quyền Admin</label>
                        <div>
                            <input type="radio" id="is_admin_1" name="is_admin" value="1" required>
                            <label for="is_admin_1">Có</label>
                            &nbsp; &nbsp;
                            <input type="radio" id="is_admin_0" name="is_admin" value="0" required>
                            <label for="is_admin_0">Không</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ma_kh" class="form-label">Mã khách hàng</label>
                        <input type="text" class="form-control" id="ma_kh" name="ma_kh" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>  
        <?php include("right.php") ?>
    </main>
    <?php include("ad_footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
