<?php
    // Lấy danh sách loại sản phẩm (cho header)
    $pdo = new PDO("mysql:host=localhost;dbname=ql_noithat","root","");
    $pdo->query("set names utf8");

    $sql = "select ma_loai, ten_loai from loai_san_pham";
    $loai_sp_hd = $pdo->query($sql);

    $pdo = null;

    if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="header">
    <div class="d_contacts">
        <div class="contacts container">
            <div class="contacts_info">
                <p>Phone: <a href="">01676435063 | </a></p>
                <p>Hotline: <a href="">19001009</a></p>
            </div>
            <ul class="login_register_cart">
                <?php if (isset($_SESSION['username'])): ?>
                    <li style="width: 25%"><a href="#"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['username']; ?></a></li>
                    <li style="width: 25%"><a href="logout.php"><i class="fa-solid fa-sign-out-alt"></i> Đăng xuất</a></li>
                <?php else: ?>
                    <li style="width: 25%"><a href="login.php"><i class="fa-solid fa-user"></i> Đăng nhập</a></li>
                    <li style="width: 25%"><a href="register.php"><i class="fa-solid fa-key"></i> Đăng ký</a></li>
                <?php endif; ?>
                <li style="width: 25%">
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                        <?php
                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                            echo '<sup>(' . count($_SESSION['cart']) . ')</sup>';
                        }
                        ?>
                        Giỏ hàng
                    </a>
                </li>
                <li><a href=""><i class="fa-solid fa-file-invoice-dollar"></i> Lịch sử mua hàng</a></li>
            </ul>
        </div>
    </div>
    <div class="logo container">
        <div class="img_logo">
            <img src="../assets/images/logo.jpg" alt="">
        </div>
        <div class="banner_top">
            <img src="../assets/images/bannertop.jpg" alt="">
        </div>
    </div>
    <div class="navbar container">
        <ul class="menu">
            <li><a href="homepage.php">TRANG CHỦ</a></li>
            <li><a href="">GIỚI THIỆU</a></li>
            <li>
                <a href="layout_products.php">SẢN PHẨM <i class="fa-solid fa-angle-down"></i></a>
                <ul class="menu_2">
                <?php
                    foreach($loai_sp_hd as $loai)
                    {
                    ?>
                        <li><a href="layout_products.php?ml=<?php echo $loai[0]?>&tl=<?php echo $loai[1]?>"><i class="fa-solid fa-angles-right"></i> <?php echo $loai[1];?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
            <li><a href="news.php">THIẾT KẾ NỘI THẤT</a></li>
            <li><a href="news.php">TIN TỨC</a></li>
            <li><a href="contact.php">LIÊN HỆ</a></li>
        </ul>
        <div class="search">
            <form action="layout_products.php" method="get">
                <input type="text" name="search" placeholder="Tìm kiếm sản phẩm">
                <i class="fa-solid fa-magnifying-glass" style="position: absolute"></i>
            </form>
        </div>
    </div>
</div>
