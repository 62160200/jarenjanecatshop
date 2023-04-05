<?php
// Include config file
require_once "config/db.php";
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JARAREN CAT SHOP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/layout.css">
</head>
<style>
.bi-person-circle{
    font-size: 1.8rem;
    color: #989696;
    margin-left: 1rem;
}

</style>

<body style="font-family: 'Mitr', sans-serif; ">
    <div class="fixed-sidebar d-flex flex-column flex-shrink-0 p-3" id="sidebar">
        
        <a href="#" class="d-flex align-items-center text-white text-decoration-none " aria-expanded="false">
            <!-- <img src="https://github.com/mdo.png" alt="" width="40" height="40" class="rounded-circle me-2"> -->
            <i class="bi bi-person-circle" ></i>&nbsp;
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo '<strong class="text" style="color: #989696;">' . $_SESSION['username'] . '</strong>';
            } else {
                echo '<strong class="text" style="color: #989696;"></strong>';
            }
            ?>
            <!-- <strong class="text" style="color: #989696;">Jararen CatLoveShop</strong> -->
        </a>  

        <hr style="color: white;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link ">
                    <h4><i class="bi bi-house-door-fill" style="color: #989696;"></i><span class="text">&nbsp;&nbsp;</span><span class="fs-5 text" style="color: #989696;">หน้าแรก</span></h4>
                </a>
            </li>
            <li>
                <a href="" class="nav-link " style="color: #989696;">
                    <h4><i class="bi bi-heart-fill"></i><span class="text">&nbsp;&nbsp;</span><span class="fs-5 text">รายการโปรด</span></h4>
                </a>
            </li>
            <li>
                <a href="cat_shop.php" class="nav-link " style="color: #989696;">
                    <h4><i class="bi bi-shop-window"></i><span class="text">&nbsp;&nbsp;</span><span class="fs-5 text">ตลาดแมว</span></h4>
                </a>
            </li>
            <br>
            <h5 class="text"><b style="color: #989696;">Setting</b></h5>
            <li>
                <?php
                if (isset($_SESSION['loggedin'])) {
                    echo '  <form action="logout.php" method="post">
                                <button type="submit" name="logout" class="btn" style="color: #989696;">
                                    <h4><i class="bi bi-box-arrow-right"></i><span class="text">&nbsp;&nbsp;</span><span class="fs-5 text">Logout</span></h4>
                                </button>
                            </form>';
                } else {
                    echo '  <a href="login.php" class="nav-link " style="color: #989696;">
                                <h4>
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span class="text">&nbsp;&nbsp;</span>
                                    <span class="fs-5 text">
                                        Login
                                    </span>
                                </h4>
                            </a>';
                }
                ?>
            </li>
        </ul>
        <hr style="color: #ffffff;">
        <h5 class="text">
            <b style="color: #989696;">Contact</b>
        </h5>
        <ul class="nav nav-pills flex-column ">
            <li>
                <a href="" class="nav-link " style="color: #989696;">
                    <h4><i class="bi bi-info-circle-fill"></i><span class="text">&nbsp;&nbsp;</span><span class="fs-5 text">เกี่ยวกับเรา</span></h4>
                </a>
            </li>
            <li>
                <a href="" class="nav-link " style="color: #989696;">
                    <h4><i class="bi bi-telephone-fill"></i><span class="text">&nbsp;&nbsp;</span><span class="fs-5 text">ติดต่อฉัน</span></h4>
                </a>
            </li>
        </ul>
    </div>
    <div class="top-bar d-flex align-items-center">
        <form class="search-form ms-auto">
            <input class="form-control" type="search" placeholder="ค้นหา" aria-label="ค้นหา">
        </form>
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo '  <div class="icon-container">
                            <a href="cat_cart.php" class="btn">
                                <b><i class="bi bi-bag"></i></b>
                            </a>
                        </div>';
            }
            ?>

    </div>

    <script>
        const element = document.getElementById("sidebar");
        const topBar = document.querySelector(".top-bar");
        if (element.classList.contains("collapsed")) {
            topBar.style.left = "100px";
        } else {
            topBar.style.left = "250px";
        }


        sidebar.addEventListener("mouseenter", () => {
            sidebar.classList.remove("collapsed");
            topBar.style.left = "250px";
        });

        sidebar.addEventListener("mouseleave", () => {
            sidebar.classList.add("collapsed");
            topBar.style.left = "100px";
        });
        sidebar.classList.add("collapsed");
        topBar.style.left = "100px";
    </script>
</body>

</html>