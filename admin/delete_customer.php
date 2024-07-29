<?php
    include 'db.php';

    $ma_kh = $_GET['ma_kh'];

    $sql = "DELETE FROM khach_hang WHERE ma_kh='$ma_kh'";

    if ($conn->query($sql) === TRUE) {
        header("Location: customers.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
