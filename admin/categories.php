<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lí loại sản phẩm</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    // Số lượng bản ghi trên mỗi trang
    $limit = 6;

    // Xác định số trang hiện tại, mặc định là 1 nếu không có trang nào được chỉ định
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính toán vị trí bắt đầu của bản ghi trên trang hiện tại
    $start = ($page - 1) * $limit;

    // Lấy tổng số bản ghi
    $sql = "SELECT COUNT(ma_loai) AS total FROM loai_san_pham";
    $result = $conn->query($sql);
    $total = $result->fetch_assoc()['total'];

    // Tính toán tổng số trang
    $pages = ceil($total / $limit);

    // Lấy dữ liệu cho trang hiện tại
    $sql = "SELECT * FROM loai_san_pham LIMIT $start, $limit";
    $result = $conn->query($sql);
?>
<body>
    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="mid">
            <div>
                <a href="add_category.php" class="btn btn-success">Thêm loại sản phẩm</a>
            </div>
            <table class="table border-light align-middle" style="text-align: center">
                <thead>
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ma_loai']}</td>
                                    <td>{$row['ten_loai']}</td>
                                    <td>
                                        <a href='edit_category.php?ma_loai={$row['ma_loai']}' class='btn btn-primary'>Sửa</a>
                                        <a href='delete_category.php?ma_loai={$row['ma_loai']}' class='btn btn-danger'>Xoá</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No categories found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Phần hiển thị các liên kết phân trang -->
            <nav>
                <ul class="pagination justify-content-center">
                    <?php if ($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a></li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $pages; $i++): ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <?php if ($page < $pages): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <?php include("right.php") ?>
    </main>
    <?php include("ad_footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
