<?php
include 'db.php';

if (isset($_GET['ma_sp'])) {
    $ma_sp = $_GET['ma_sp'];
    $sql = "DELETE FROM san_pham WHERE ma_sp = '$ma_sp'";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa sản phẩm thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: products.php");
exit();
?>
