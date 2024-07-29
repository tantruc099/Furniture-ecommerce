
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lí người dùng</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    // Số người dùng mỗi trang
    $users_per_page = 10;

    // Lấy tổng số người dùng
    $sql_total_users = "SELECT COUNT(*) AS total FROM user";
    $result_total = $conn->query($sql_total_users);
    $row_total = $result_total->fetch_assoc();
    $total_users = $row_total['total'];

    // Tính tổng số trang
    $total_pages = ceil($total_users / $users_per_page);

    // Lấy trang hiện tại từ URL, nếu không có thì mặc định là 1
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($current_page < 1) $current_page = 1;
    if ($current_page > $total_pages) $current_page = $total_pages;

    // Tính offset cho truy vấn SQL
    $offset = ($current_page - 1) * $users_per_page;

    // Lấy người dùng cho trang hiện tại
    $sql = "SELECT * FROM user LIMIT $offset, $users_per_page";
    $result = $conn->query($sql);
?>

<body>

<?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="mid">
            <div>
                <a href="add_user.php" class="btn btn-success">Thêm người dùng</a>
            </div>
            <table class="table border-light align-middle" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Quản trị viên</th>
                        <th>Mã KH</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (@$result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id_user']}</td>
                                    <td>{$row['username']}</td>
                                    <td>{$row['password']}</td>
                                    <td>{$row['is_admin']}</td>
                                    <td>{$row['ma_kh']}</td>
                                    <td>
                                        <a href='edit_user.php?id={$row['id_user']}' class='btn btn-primary'>Sửa</a>
                                        <a href='delete_user.php?id={$row['id_user']}' class='btn btn-danger'>Xóa</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Không tìm thấy người dùng nào</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Điều khiển phân trang -->
            <nav>
                <ul class="pagination justify-content-center">
                    <?php if($current_page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $current_page - 1 ?>">Trang trước</a>
                        </li>
                    <?php endif; ?>

                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if($current_page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $current_page + 1 ?>">Trang sau</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <?php include("right.php") ?>
        
    </main>
    <?php include("ad_footer.php") ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
