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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login Page</title>

</head>

<body>
    <div class="m-0 p-0" style="display: flex; height: 100vh; width: 100%;">
        <div class="left">

            <h2 style="color: #ffffff;"><b>JARAREN CAT LOVE SHOP</b></h2>
            <p style="color: #ffffff;">เว็บส่งน้องแมว JararenFamiry</p>
        </div>
        <div class="right">
            <!-- ใส่ฟอร์มล็อกอินหรือเนื้อหาด้านขวาที่นี่ -->

            <div class="card-body">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label"><b>Username</b></label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><b>Password</b></label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <a type="submit" class="btn btn-primary">Login</a>
                    </div>
                </form>
                <div class="mb-3">
                    <p id="register">Or sign up: <a href="register.php">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>