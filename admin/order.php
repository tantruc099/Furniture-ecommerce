<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Hóa Đơn</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    // Số lượng hóa đơn trên mỗi trang
    $order_per_page = 10;

    // Trang hiện tại, mặc định là 1 nếu không có tham số trang
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $order_per_page;

    // Truy vấn để lấy tổng số hóa đơn
    $total_order_sql = "SELECT COUNT(*) FROM hoa_don";
    $total_order_result = $conn->query($total_order_sql);
    $total_order_row = $total_order_result->fetch_row();
    $total_orders = $total_order_row[0];

    // Tính tổng số trang
    $total_pages = ceil($total_orders / $order_per_page);

    // Truy vấn để lấy dữ liệu của trang hiện tại
    $sql = "SELECT * FROM hoa_don LIMIT $offset, $order_per_page";
    $result = $conn->query($sql);
?>
<body>

    <?php include("ad_header.php") ?>
    <main>
        <?php include("left.php") ?>
        <div class="mid">
            <div>
                <a href=""></a>
            </div>
            <table class="table border-light align-middle" style="text-align: center">
                <thead>
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Mã KH</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ma_hd']}</td>
                                    <td>{$row['ma_kh']}</td>
                                    <td>{$row['ngay_dat']}</td>
                                    <td>{$row['tong_tien']}</td>
                                    <td>
                                        <a href='edit_order.php?ma_hd={$row['ma_hd']}' class='btn btn-primary'>Sửa</a>
                                        <a href='delete_order.php?ma_hd={$row['ma_hd']}' class='btn btn-danger'>Xóa</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Không tìm thấy hóa đơn nào</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Hiển thị phân trang -->
            <nav>
                <ul class="pagination justify-content-center">
                    <?php if ($current_page > 1): ?>
                        <li class="page-item"><a class="page-link" href="list_orders.php?page=<?= $current_page - 1 ?>">Trước</a></li>
                    <?php endif; ?>

                    <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                        <li class="page-item <?= $page == $current_page ? 'active' : '' ?>">
                            <a class="page-link" href="list_orders.php?page=<?= $page ?>"><?= $page ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <li class="page-item"><a class="page-link" href="list_orders.php?page=<?= $current_page + 1 ?>">Sau</a></li>
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
