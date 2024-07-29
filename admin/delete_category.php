<?php
include 'db.php';

$ma_loai = $_GET['ma_loai'];
$sql = "DELETE FROM loai_san_pham WHERE ma_loai='$ma_loai'";

if ($conn->query($sql) === TRUE) {
    header("Location: categories.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
