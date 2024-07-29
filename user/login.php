<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/s_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    session_start();
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $error_message = ""; // Biến để lưu thông báo lỗi

    try {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=ql_noithat", "root", "");
        $pdo->query("set names utf8");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'login') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra username và mật khẩu
            $sql = "SELECT * FROM user WHERE username = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if ($password === $user['password']) {
                    // Lưu thông tin user vào session
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['is_admin'] = $user['is_admin'];
                    $_SESSION['ma_kh'] = $user['ma_kh'];

                    // Kiểm tra xem người dùng có phải là admin không
                    if ($user['is_admin'] == 1) {
                        header("Location: ../admin/admin.php");
                    } else {
                        header("Location: homepage.php");
                    }
                    exit();
                } else {
                    $error_message = "Mật khẩu không đúng.";
                }
            } else {
                $error_message = "Tên đăng nhập không tồn tại.";
            }
        }
    } catch (PDOException $e) {
        $error_message = "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    }
?>
<body>
    <div class="test">
        <!-- Header -->
        <?php include("header.php") ?>
        <!-- ======= -->
        <div class="main">
            <div class="theme">
                <h4><a href="">Tài khoản</a></h4>
                <div>
                    <a href="homepage.php">Trang chủ <i class="fa-solid fa-angles-right"></i></a>
                    <p style="color: #668a2d; padding-left: 5px">Tài khoản</p>
                </div>
            </div>
            <div class="d_form container">
                <div class="title_fl">
                    <h4>Tài khoản</h4>
                </div>
                <div class="noti_fl">
                    <div class="noti1">
                        <p>Nếu bạn đã có tài khoản, đăng nhập tại đây</p>
                    </div>
                    <div class="noti2">
                        <p>Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email.</p>
                    </div>
                </div>
                <div class="d_form_login">
                    <form class="form_login" action="login.php" method="post" name="form_login">
                        <input type="hidden" name="action" value="login"/>
                        <div class="d_email_password">
                            <div class="email">
                                <label for="username"><i class="fa-solid fa-user"></i> Tên đăng nhập:</label>
                                <br>
                                <input type="text" id="username" name="username" required/><br/>
                            </div>
                            <div class="password">
                                <label for="email1"><i class="fa-solid fa-envelope"></i> Email:</label>
                                <br>
                                <input type="email1" name="txt_email">
                            </div>
                        </div>
                        <div class="d_email1_rpass">
                            <div class="email1">
                                <label for="password"><i class="fa-solid fa-key"></i> Mật khẩu:</label>
                                <br>
                                <input type="password" id="password" name="password" required/><br/>
                            </div>
                            <div class="rpass">
                                <input type="submit" name="btn_rpass" value="Lấy lại mật khẩu">
                            </div>
                        </div>
                        <div class="d_login">
                            <input type="submit" name="btn_submit" value="Đăng nhập">
                            <a href="register.php">Chưa có tài khoản? Đăng ký tại đây</a>
                        </div>
                    </form>
                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
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
