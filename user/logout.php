<?php
session_start();
session_unset(); // Xóa tất cả các biến session
session_destroy(); // Hủy session
header("Location: homepage.php"); // Chuyển hướng về trang chủ
exit();
?>
