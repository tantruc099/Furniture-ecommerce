<?php
    include 'db.php';

    $ma_cthd = $_GET['ma_cthd'];

    $sql = "DELETE FROM chi_tiet_hoa_don WHERE ma_cthd='$ma_cthd'";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa chi tiết hóa đơn thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: order_details.php");
?>
