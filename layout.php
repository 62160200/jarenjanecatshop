<?php
// Include config file
require_once "config/db.php";
session_start();

$page = $_SERVER['PHP_SELF'];
$title = basename($page, '.php');

$title = ucwords(str_replace('_', ' ', $title));
$title = $title == 'Index' ? 'หน้าแรก' : $title;
$title = $title == 'Dashboard' ? 'หน้าแอดมิน' : $title;
$title = $title == 'Order List' ? 'รายการสั่งซื้อ' : $title;
$title = $title == 'Cat List' ? 'รายการแมว' : $title;
$title = $title == 'Cat Cart' ? 'ตะกร้าสินค้า' : $title;
$title = $title == 'Cat Shop' ? 'ตลาดแมว' : $title;
$title = $title == 'Cat Detail' ? 'รายละเอียดน้องแมว' : $title;
$title = $title == 'Edit Cat' ? 'แก้ไขข้อมูลแมว' : $title;
$title = $title == 'Insert Cat' ? 'เพิ่มแมว' : $title;
$title = $title == 'About Us' ? 'เกี่ยวกับเรา' : $title;
$title = $title == 'Contact' ? 'ติดต่อเรา' : $title;
$title = $title == 'History' ? 'ประวัติการสั่งซื้อ' : $title;
$title = $title == 'Payment List' ? 'รายการชำระเงิน' : $title;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JARAREN CAT SHOP | <?php echo $title; ?></title>
    <link rel="icon" type="image/x-icon" href="images/icon/cat-icon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/layout.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>


</head>
<style>
    .bi-person-circle {
        font-size: 1.8rem;
        color: #989696;
        margin-left: 1rem;
    }

    #search {
        margin-left: 1rem;
        margin-right: 1rem;
        height: 40px;
        width: 300px;
    }

    .product-number-con {
        position: relative;
    }

    .product-number {
        position: absolute;
        color: white;
        background-color: red;
        font-size: 15px;
        width: 20px;
        height: 20px;
        text-align: center;
        border-radius: 100%;
        top: -6px;
        right: -6px;
    }
</style>

<body style="font-family: 'Mitr', sans-serif; ">
    <div class="fixed-sidebar d-flex flex-column flex-shrink-0 p-3" id="sidebar">

        <a href="#" class="d-flex align-items-center text-white text-decoration-none " aria-expanded="false">
            <!-- <img src="https://github.com/mdo.png" alt="" width="40" height="40" class="rounded-circle me-2"> -->
            <i class="bi bi-person-circle"></i>&nbsp;
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo '<strong class="text" style="color: #989696;">' . $_SESSION['username'] . '</strong>';
            } else {
                echo '<strong class="text" style="color: #989696;">Jararen CatLoveShop</strong>';
            }
            ?>
            <!-- <strong class="text" style="color: #989696;">Jararen CatLoveShop</strong> -->
        </a>

        <hr style="color: white;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link <?= $title == 'หน้าแรก' ? 'active bg-light' : ''; ?>">
                    <h4><i class="bi bi-house-door-fill me-3" style="color: #989696;"></i><span class="fs-5 text" style="color: #989696;">หน้าแรก</span></h4>
                </a>
            </li>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'admin') {
            ?>
                <li>
                    <a href="dashboard.php" class="nav-link <?= $title == 'หน้าแอดมิน' ? 'active bg-light' : ''; ?> " style="color: #989696;">
                        <h4><i class="bi bi-menu-button-wide-fill me-3"></i><span class="fs-5 text">หน้าแอดมิน</span></h4>
                    </a>
                </li>
                <li>
                    <a href="insert_cat.php" class="nav-link <?= $title == 'เพิ่มแมว' ? 'active bg-light' : ''; ?> " style="color: #989696;">
                        <h4><i class="bi bi-plus-circle me-3"></i><span class="fs-5 text">เพิ่มแมว</span></h4>
                    </a>
                </li>
            <?php
            }
            if (isset($_SESSION['loggedin'])) {
            ?>
                <li>
                    <a href="history.php" class="nav-link <?= $title == 'ประวัติการสั่งซื้อ' ? 'active bg-light' : ''; ?> " style="color: #989696;">
                        <h4><i class="bi bi-cart4 me-3"></i><span class="fs-5 text">ประวัติการสั่งซื้อ</span></h4>
                    </a>
                </li>
            <?php
            }
            ?>

            <li>
                <a href="cat_shop.php" class="nav-link <?= $title == 'ตลาดแมว' ? 'active bg-light' : ''; ?> " style="color: #989696;">
                    <h4><i class="bi bi-shop-window me-3"></i><span class="fs-5 text">ตลาดแมว</span></h4>
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
                <a href="about_us.php" class="nav-link <?= $title == 'เกี่ยวกับเรา' ? 'active bg-light' : ''; ?> " style="color: #989696;">
                    <h4><i class="bi bi-info-circle-fill me-3"></i><span class="fs-5 text">เกี่ยวกับเรา</span></h4>
                </a>
            </li>
            <li>
                <a href="contact.php" class="nav-link <?= $title == 'ติดต่อเรา' ? 'active bg-light' : ''; ?> " style="color: #989696;">
                    <h4><i class="bi bi-telephone-fill me-3"></i><span class="fs-5 text">ติดต่อเรา</span></h4>
                </a>
            </li>
        </ul>
    </div>
    <div class="top-bar d-flex align-items-right">
        <form class="search-form ms-auto" action="cat_shop.php" method="post" id="search-form">
            <input class="form-control" type="search" id="search" placeholder="ค้นหา" aria-label="ค้นหา">
        </form>
        <?php
        if (isset($_SESSION['loggedin'])) {
            // count cart
            $sql = "SELECT COUNT(*) AS count FROM carts WHERE UserID = " . $_SESSION['user_id'] . " AND CartStatus = 0";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $count['count'];
        ?>
            <div class="icon-container product-number-con">
                <a href="cat_cart.php" class="btn">
                    <b><i class="bi bi-bag"></i></b>
                </a>
                <?php if ($count > 0) { ?>
                    <span class="product-number"><?= $count; ?></span>
                <?php } ?>
            </div>
        <?php
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


        // search form 
        const searchForm = document.querySelector("#search-form");
        const searchInput = document.querySelector("#search");
        searchForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const searchValue = searchInput.value;
            window.location.href = `cat_shop.php?search=${searchValue}`;
        });
    </script>
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
                "zeroRecords": "ไม่พบข้อมูล",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่มีข้อมูล",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "ค้นหา",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            }
        });
    });
</script>
</html>