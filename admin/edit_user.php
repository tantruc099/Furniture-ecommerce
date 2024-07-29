
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
    <link rel="stylesheet" href="../assets/style/s_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<?php
    include 'db.php';

    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $is_admin = $_POST['is_admin'];
        $ma_kh = $_POST['ma_kh'];

        $sql = "UPDATE user SET username='$username', password='$password', is_admin='$is_admin', ma_kh='$ma_kh' WHERE id_user='$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: user.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "SELECT * FROM user WHERE id_user='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $conn->close();
?>
<body>
    <?php include("ad_header.php") ?>
    
    <main>
        <?php include("left.php") ?>
        <div class="mid">
            <div class="container" style="color: white">
                <h2>Sửa người dùng</h2>
                <form action="edit_user.php?id=<?php echo $id; ?>" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="is_admin" class="form-label">Is Admin</label>
                        <input type="number" class="form-control" id="is_admin" name="is_admin" value="<?php echo $row['is_admin']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ma_kh" class="form-label">Mã KH</label>
                        <input type="text" class="form-control" id="ma_kh" name="ma_kh" value="<?php echo $row['ma_kh']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
        <?php include("right.php") ?>
    </main>
    
    <?php include("ad_footer.php") ?>
</body>
</html>
