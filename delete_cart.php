<?php
include 'layout.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href = 'login.php';</script>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM carts WHERE CartID = $id";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute()) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'ลบข้อมูลสำเร็จ',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location = 'cat_cart.php';
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'ลบข้อมูลไม่สำเร็จ',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location = 'cat_cart.php';
        });
        </script>";
    }
}