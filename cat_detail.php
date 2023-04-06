<?php
include 'layout.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .album {
        padding-left: 5rem;
    }

    .col-md-2 {
        flex: 0 0 auto;
        width: 13.666667%;
    }

    .title1 {
        /* margin-left: 2rem; */
        text-align: left;
        font-size: 30px;
    }

    .col-md-4 {
        padding-top: 1rem;
        padding-left: 8rem;
        padding-bottom: 2rem;
    }

    .title {
        text-align: left;
        font-size: 50px;
        font-family: 'Mitr', sans-serif;
        color: #000000;
        margin-top: 60px;
        margin-left: 8rem;
        margin-bottom: 50px;
    }

    .card-text {
        font-family: 'Mitr', sans-serif;
        color: #000000;
        margin-top: 1px;
        margin-left: 10px;
        margin-bottom: 1px;
    }

    .d-flex1 {
        font-size: 20px;
    }

    .faver {
        font-size: 20px;
        margin-left: 65%;
    }

    .image-sm {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .image-lg {
        width: 100%;
        height: 650px;
        object-fit: cover;
    }
</style>

<body>
    <?php
    $cat_id = $_GET['id'];

    $sql = "SELECT * FROM cats where CatID = $cat_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $cats = $stmt->fetch(PDO::FETCH_ASSOC);
    // get age form dob (date of birth) in age value
    $cats['ages'] = date_diff(date_create($cats['dob']), date_create('now'))->y;
    // get image from images

    $cats['image5'] = explode(',', $cats['image'])[0];

    // if no image[1] then set image[1] = image[0]
    if (empty(explode(',', $cats['image'])[1])) {
        $cats['image4'] = explode(',', $cats['image'])[0];
    } else {
        $cats['image4'] = explode(',', $cats['image'])[1];
    }
    // if no image[2] then set image[2] = image[0]
    if (empty(explode(',', $cats['image'])[2])) {
        $cats['image3'] = explode(',', $cats['image'])[0];
    } else {
        $cats['image3'] = explode(',', $cats['image'])[2];
    }
    // if no image[3] then set image[3] = image[0]
    if (empty(explode(',', $cats['image'])[3])) {
        $cats['image2'] = explode(',', $cats['image'])[0];
    } else {
        $cats['image2'] = explode(',', $cats['image'])[3];
    }
    // if no image[4] then set image[4] = image[0]
    if (empty(explode(',', $cats['image'])[4])) {
        $cats['image1'] = explode(',', $cats['image'])[0];
    } else {
        $cats['image1'] = explode(',', $cats['image'])[4];
    }

    // Get gender
    if ($cats['gender'] === 'Male') {
        $cats['gender'] = 'ผู้';
    } else {
        $cats['gender'] = 'เมีย';
    }
    // convert date format to dd/mm/yyyy
    $cats['dob'] = date('d/m/Y', strtotime($cats['dob']));
    // convert vaccine to thai
    if ($cats['vaccine'] === 'Injected') {
        $cats['vaccine'] = 'ฉีดวัคซีนแล้ว';
    } else {
        $cats['vaccine'] = 'ยังไม่ได้ฉีดวัคซีน';
    }

    // format price to Thai Baht currency format
    $cats['price'] = number_format($cats['price'], 0, '.', ',');


    if (isset($_POST['id'])) {
        $cat_id = $_POST['id'];
        $sql = "INSERT INTO carts (CatID, UserID) VALUES (:id, :userid)";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":id", $cat_id, PDO::PARAM_INT);
            $stmt->bindParam(":userid", $_SESSION['user_id'], PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "fail";
            }
        }
        unset($stmt);
    }

    $sql = "SELECT * FROM carts WHERE UserID = :UserID AND CartStatus = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":UserID", $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $cart = $stmt->fetch(PDO::FETCH_ASSOC)

    ?>
    <h1 class="title fw-bold"><?= $cats['name'] ?></h1>
    
    <div class="album">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2">
                    <img src="images\<?= $cats['image1'] ?>" class="img-fluid rounded mb-3 image-sm" alt="Image 1">
                    <img src="images\<?= $cats['image2'] ?>" class="img-fluid rounded mb-3 image-sm" alt="Image 2">
                    <img src="images\<?= $cats['image3'] ?>" class="img-fluid rounded mb-3 image-sm" alt="Image 3">
                    <img src="images\<?= $cats['image4'] ?>" class="img-fluid rounded mb-3 image-sm" alt="Image 4">
                </div>
                <div class="col-md-6">
                    <img src="images\<?= $cats['image5'] ?>" class="img-fluid rounded image-lg" alt="Large Image">
                </div>
                <div class="col-md-4">
                    <h2 class="title1 pb-2 fw-bold"><?= $cats['breed'] ?></h2>
                    <h5><b>ข้อมูล</b></h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <p>อายุ</p>
                        <p><?= $cats['ages'] ?> ปี</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p>เพศ</p>
                        <p><?= $cats['gender'] ?></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p>วันเกิด</p>
                        <p><?= $cats['dob'] ?></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p>วัคซีน</p>
                        <p><?= $cats['vaccine'] ?></p>
                    </div>
                    <h5><b>รายละเอียด</b></h5>
                    <p class="card-text mt-3">
                        <?= $cats['description'] ?>
                    </p>
                    <div class="mt-3 mb-5 text-end">
                        <span class="font-weight-bold"><b>ค่าเลี้ยงดู</b></span>
                        <h3 class="d-inline font-weight-bold"><?= $cats['price'] ?> ฿</h3>
                    </div>
                    <br>
                    <div class="text-center">
                        <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'admin') {
                            echo '<button id="delete"  class="btn btn-dark center-button me-1"><i class="bi bi-trash"></i> ลบ</button>';
                            echo '<a href="edit_cat.php?id=' . $cats['CatID'] . '" class="btn btn-dark center-button ms-1"><i class="bi bi-pencil-square"></i> แก้ไข</a>';
                        }
                        ?>
                        <!-- <a href="" class="btn btn-dark center-button"><i class="bi bi-chat-square-dots"></i> ทักแชทสอบถาม</a> -->
                    </div>
                    <div class="text-center mt-2">
                        <button id="cat-cart" class="btn btn-dark center-button" <?php if (isset($cart['CartID'])) {
                                                                                    echo 'disabled';
                                                                                } ?>>
                                                                                <?php if (isset($cart['CartID'])) {
                                                                                            echo '<i class="bi bi-check"></i>สามารถเลือกได้ครั้งละ 1 ตัวเท่านั้น';
                                                                                        } else {
                                                                                            echo '<i class="bi bi-bag"></i> นำใส่ตระกร้า';
                                                                                        } ?></button>
                    </div>
                    </div>
                </div>

            </div>
        </div>
</body>

<script>
    // check delete button is clicked or not before redirect to delete_cat.php
    document.getElementById('delete').addEventListener('click', function(e) {
        Swal.fire({
            title: 'คุณต้องการลบข้อมูลนี้ใช่หรือไม่?',
            text: "คุณจะไม่สามารถกู้คืนข้อมูลนี้ได้หากลบแล้ว!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบข้อมูลนี้!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'delete_cat.php?id=' + <?= $cats['CatID'] ?>;
            } else {
                e.preventDefault();
            }
        })
    });

    document.getElementById('cat-cart').addEventListener('click', function() {
        Swal.fire({
            title: 'เพิ่มลงตระกร้า!',
            text: "คุณต้องการเพิ่มสัตว์เลี้ยงนี้ลงตระกร้าใช่หรือไม่?",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ไปที่ตระกร้าสินค้า',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: {
                        id: <?= $cats['CatID'] ?>
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'เพิ่มลงตระกร้าสำเร็จ!',
                            text: 'คุณได้เพิ่มสัตว์เลี้ยงลงตระกร้าสำเร็จแล้ว',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'cat_cart.php';
                            }
                        })
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'เพิ่มลงตระกร้าไม่สำเร็จ!',
                            text: 'เกิดข้อผิดพลาดในการเพิ่มสัตว์เลี้ยงลงตระกร้า',
                        })
                    }
                });
            }
        })
    });

</script>


</html>