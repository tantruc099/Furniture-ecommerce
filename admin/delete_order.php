<?php
    include 'db.php';

    $ma_hd = $_GET['ma_hd'];

    $sql = "DELETE FROM hoa_don WHERE ma_hd='$ma_hd'";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa hóa đơn thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: order.php");
?>
