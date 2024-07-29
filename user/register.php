<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/s_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
try {
    // Kết nối đến cơ sở dữ liệu
    $pdo = new PDO("mysql:host=localhost;dbname=ql_noithat", "root", "");
    $pdo->query("set names utf8");

    // Kiểm tra xem form có được submit không
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'register') {
        // Lấy dữ liệu từ form
        $tenKH = $_POST['tenKH'];
        $email = $_POST['email'];
        $diaChi = $_POST['diaChi'];
        $sdt = $_POST['sdt'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Chèn dữ liệu vào bảng khach_hang
        $sql_khach_hang = "INSERT INTO khach_hang (ten_kh, email, dia_chi, sdt) VALUES (:tenKH, :email, :diaChi, :sdt)";
        $stmt_khach_hang = $pdo->prepare($sql_khach_hang);
        $stmt_khach_hang->bindParam(':tenKH', $tenKH);
        $stmt_khach_hang->bindParam(':email', $email);
        $stmt_khach_hang->bindParam(':diaChi', $diaChi);
        $stmt_khach_hang->bindParam(':sdt', $sdt);

        if ($stmt_khach_hang->execute()) {
            $ma_kh = $pdo->lastInsertId(); // Lấy ma_kh vừa được chèn

            // Chèn dữ liệu vào bảng user
            $sql_user = "INSERT INTO user (username, password, is_admin, ma_kh) VALUES (:username, :password, 0, :ma_kh)";
            $stmt_user = $pdo->prepare($sql_user);
            $stmt_user->bindParam(':username', $username);
            $stmt_user->bindParam(':password', $password);
            $stmt_user->bindParam(':ma_kh', $ma_kh);

            if ($stmt_user->execute()) {
                echo "Đăng ký thành công!";
                header("Location: login.php");
                exit();
            } else {
                echo "Lỗi: Không thể chèn dữ liệu vào bảng user.";
            }
        } else {
            echo "Lỗi: Không thể chèn dữ liệu vào bảng khach_hang.";
        }
    }
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
}
?>
<body>
    <div class="test">
        <!-- Header -->
        <?php include("header.php") ?>
        <!-- ======= -->
        <div class="main">
            <div class="theme">
                <h4><a href="">Tạo tài khoản</a></h4>
                <div>
                    <a href="homepage.php">Trang chủ <i class="fa-solid fa-angles-right"></i></a>
                    <p style="color: #668a2d; padding-left: 5px">Tạo tài khoản</p>
                </div>
            </div>
            <div class="d_form container">
                <div class="title_fl">
                    <h4>Tạo tài khoản</h4>
                </div>
                <div class="noti_fl">
                    <p>Nếu chưa có tài khoản vui lòng đăng ký tại đây</p>
                </div>
                <div class="d_form_register">
                    <form class="form_register" action="register.php" method="post" name="form_register">
                        <input type="hidden" name="action" value="register"/>
                        <div class="d_lastname_name">
                            <div class="last_name">
                                <label for="tenKH"><i class="fa-solid fa-user"></i> Tên:</label>
                                <br>
                                <input type="text" id="tenKH" name="tenKH" required/><br/>
                            </div>
                            <div class="name">
                                <label for="email"><i class="fa-solid fa-envelope"></i> Email:</label>
                                <br>
                                <input type="email" id="email" name="email" required/><br/>
                            </div>
                        </div>
                        <div class="d_email_password">
                            <div class="email">
                                <label for="diaChi"><i class="fa-solid fa-location-dot"></i> Địa chỉ:</label>
                                <br>
                                <input type="text" id="diaChi" name="diaChi" required/><br/>
                            </div>
                            <div class="password">
                                <label for="sdt"><i class="fa-solid fa-phone"></i> Số điện thoại:</label>
                                <br>
                                <input type="text" id="sdt" name="sdt" required/><br/>
                            </div>
                        </div>
                        <div class="d_email_password">
                            <div class="email">
                                <label for="username"><i class="fa-solid fa-user"></i> Tên đăng nhập:</label>
                                <br>
                                <input type="text" id="username" name="username" required/><br/>
                            </div>
                            <div class="password">
                                <label for="password"><i class="fa-solid fa-key"></i> Mật khẩu:</label>
                                <br>
                                <input type="password" id="password" name="password" required/><br/>
                            </div>
                        </div>
                        <div class="d_register">
                            <input type="submit" name="btn_submit" value="Đăng ký">
                        </div>
                    </form>
                    <div class="l_login">
                        <a href="login.php">Bạn đã có tài khoản? Đăng nhập tại đây</a>
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