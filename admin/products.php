<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lý sản phẩm</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    // Số lượng sản phẩm trên mỗi trang
    $products_per_page = 6;

    // Trang hiện tại, mặc định là 1 nếu không có tham số trang
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $products_per_page;

    // Truy vấn để lấy tổng số sản phẩm
    $total_products_sql = "SELECT COUNT(*) FROM san_pham";
    $total_products_result = $conn->query($total_products_sql);
    $total_products_row = $total_products_result->fetch_row();
    $total_products = $total_products_row[0];

    // Tính tổng số trang
    $total_pages = ceil($total_products / $products_per_page);

    // Truy vấn để lấy dữ liệu của trang hiện tại
    $sql = "SELECT * FROM san_pham LIMIT $offset, $products_per_page";
    $result = $conn->query($sql);
?>
<body>

    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="mid">
            <div>
                <a href="add_product.php" class="btn btn-success">Thêm sản phẩm</a>
            </div>
            <table class="table border-light align-middle" style="text-align: center">
                <thead>
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên SP</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Hình</th>
                        <th>Mã loại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ma_sp']}</td>
                                    <td>{$row['ten_sp']}</td>
                                    <td>{$row['mo_ta']}</td>
                                    <td>{$row['gia']}</td>
                                    <td><img src='../assets/images/image_products/{$row['hinh']}' alt='Hình ảnh' width='50'></td>
                                    <td>{$row['ma_loai']}</td>
                                    <td>
                                        <a href='edit_product.php?ma_sp={$row['ma_sp']}' class='btn btn-primary'>Sửa</a>
                                        <a href='delete_product.php?ma_sp={$row['ma_sp']}' class='btn btn-danger'>Xóa</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Không tìm thấy sản phẩm nào</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Hiển thị phân trang -->
            <nav>
                <ul class="pagination justify-content-center">
                    <?php if ($current_page > 1): ?>
                        <li class="page-item"><a class="page-link" href="products.php?page=<?= $current_page - 1 ?>">Trước</a></li>
                    <?php endif; ?>

                    <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                        <li class="page-item <?= $page == $current_page ? 'active' : '' ?>">
                            <a class="page-link" href="products.php?page=<?= $page ?>"><?= $page ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <li class="page-item"><a class="page-link" href="products.php?page=<?= $current_page + 1 ?>">Sau</a></li>
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
