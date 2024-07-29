<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Chi Tiết Hóa Đơn</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    // Số lượng chi tiết hóa đơn trên mỗi trang
    $order_detail_per_page = 10;

    // Trang hiện tại, mặc định là 1 nếu không có tham số trang
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $order_detail_per_page;

    // Truy vấn để lấy tổng số chi tiết hóa đơn
    $total_order_detail_sql = "SELECT COUNT(*) FROM chi_tiet_hoa_don";
    $total_order_detail_result = $conn->query($total_order_detail_sql);
    $total_order_detail_row = $total_order_detail_result->fetch_row();
    $total_order_details = $total_order_detail_row[0];

    // Tính tổng số trang
    $total_pages = ceil($total_order_details / $order_detail_per_page);

    // Truy vấn để lấy dữ liệu của trang hiện tại
    $sql = "SELECT * FROM chi_tiet_hoa_don LIMIT $offset, $order_detail_per_page";
    $result = $conn->query($sql);
?>
<body>

    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="mid">
            <div>
                <a href="add_order_detail.php" class="btn btn-success">Thêm chi tiết hóa đơn</a>
            </div>
            <table class="table border-light align-middle" style="text-align: center">
                <thead>
                    <tr>
                        <th>Mã CTHD</th>
                        <th>Mã HD</th>
                        <th>Mã SP</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ma_cthd']}</td>
                                    <td>{$row['ma_hd']}</td>
                                    <td>{$row['ma_sp']}</td>
                                    <td>{$row['so_luong']}</td>
                                    <td>{$row['gia']}</td>
                                    <td>
                                        <a href='edit_order_detail.php?ma_cthd={$row['ma_cthd']}' class='btn btn-primary'>Sửa</a>
                                        <a href='delete_order_detail.php?ma_cthd={$row['ma_cthd']}' class='btn btn-danger'>Xóa</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Không tìm thấy chi tiết hóa đơn nào</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Hiển thị phân trang -->
            <nav>
                <ul class="pagination justify-content-center">
                    <?php if ($current_page > 1): ?>
                        <li class="page-item"><a class="page-link" href="list_order_details.php?page=<?= $current_page - 1 ?>">Trước</a></li>
                    <?php endif; ?>

                    <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                        <li class="page-item <?= $page == $current_page ? 'active' : '' ?>">
                            <a class="page-link" href="order_details.php?page=<?= $page ?>"><?= $page ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <li class="page-item"><a class="page-link" href="order_details.php?page=<?= $current_page + 1 ?>">Sau</a></li>
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
