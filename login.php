<?php
// Include config file
require_once "config/db.php";
session_start();
if (isset($_SESSION['loggedin'])) {
    header("Location: index.php");
}

$page = $_SERVER['PHP_SELF'];
$title = basename($page, '.php');

$title = ucwords(str_replace('_', ' ', $title));
$title = $title == 'Login' ? 'เข้าสู่ระบบ' : $title;
$title = $title == 'Register' ? 'สมัครสมาชิก' : $title;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <title>JARAREN CAT SHOP | <?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="images/icon/cat-icon.png" />
</head>

<body>
    <div class="m-0 p-0" style="display: flex; height: 100vh; width: 100%;">
        <div class="left">
            <a href="index.php" style="text-decoration:none;">
                <h2 style="color: #ffffff;"><b>JARAREN CAT LOVE SHOP</b></h2>
            </a>

            <p style="color: #ffffff;">เว็บส่งน้องแมว JararenFamiry</p>
        </div>
        <div class="right">
            <!-- ใส่ฟอร์มล็อกอินหรือเนื้อหาด้านขวาที่นี่ -->

            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label"><b>Username</b></label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><b>Password</b></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="mb-3">
                    <p id="register">Or sign up: <a href="register.php">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
<?php

if (isset($_POST['username']) && isset($_POST['password'])) {

    $sql = "SELECT * FROM users WHERE username = :username";

    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

        $param_username = trim($_POST["username"]);
        $param_password = trim($_POST["password"]);

        if ($stmt->execute()) {
            if ($row = $stmt->fetch()) {
                $hashed_password = $row['password'];
                if (password_verify($param_password, $hashed_password)) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $param_username;
                    $_SESSION['user_id'] = $row['UserID'];
                    $_SESSION['role'] = $row['role'];
                    echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Login Success',
                        text: 'Welcome to Cat Love Shop',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = 'index.php';
                    });</script>";
                } else {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: 'Username or Password is incorrect',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = 'login.php';
                    });</script>";
                }
            } else {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: 'Username or Password is incorrect',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = 'login.php';
                });</script>";
            }
        } else {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = 'login.php';
            });</script>";
        }
        unset($stmt);
    }
    unset($pdo);
}
