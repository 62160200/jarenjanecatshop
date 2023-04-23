<?php
// Include config file
require_once "config/db.php";
session_start();

$page = $_SERVER['PHP_SELF'];
$title = basename($page, '.php');

$title = ucwords(str_replace('_', ' ', $title));
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
    <link rel="stylesheet" href="./css/register.css">
    <title>JARAREN CAT SHOP | <?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="images/icon/cat-icon.png" />
</head>

<body>
    <div class="m-0 p-0" style="display: flex; height: 100vh; width: 100%;">
        <div class="left">
            <a href="index.php" style="text-decoration:none;"><h1 style="color: #ffffff;">Register Account</h1></a>
            <p style="color: #ffffff;">สร้างบัญชีของคุณในไม่กี่นาที</p>
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
                        <label for="Email" class="form-label"><b>Email</b></label>
                        <input type="Email" class="form-control" id="Email" name="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="Phone" class="form-label"><b>Phone Number</b></label>
                        <input type="tesxt" class="form-control" id="Phone" name="Phone" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <div class="mb-3">
                    <p id="login">Back To Login: <a href="login.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

<?php

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['Email']) && isset($_POST['Phone'])) {

    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password, Email, Phone,Role) VALUES (:username, :password, :Email, :Phone,'user')";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
        $stmt->bindParam(":Email", $param_Email, PDO::PARAM_STR);
        $stmt->bindParam(":Phone", $param_Phone, PDO::PARAM_STR);

        // Set parameters
        $param_username = trim($_POST["username"]);
        $param_password = trim($_POST["password"]);
        $param_password = password_hash($param_password, PASSWORD_DEFAULT); // Creates a password hash
        $param_Email = trim($_POST["Email"]);
        $param_Phone = trim($_POST["Phone"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "สมัครสมาชิกสำเร็จ",
                        text: "กรุณาเข้าสู่ระบบ",
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(
                        function()
                        { 
                            window.location.href = "login.php"; 
                        }, 1500
                    );
                </script>';
        } else {
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "สมัครสมาชิกไม่สำเร็จ",
                        text: "กรุณาลองใหม่อีกครั้ง",
                        showConfirmButton: false,
                        timer: 1500
                    })
                    </script>';
        }
    }
    // Close statement
    unset($stmt);
}

?>

</html>