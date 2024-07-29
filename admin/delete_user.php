<?php
    include 'db.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id_user='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: user.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
