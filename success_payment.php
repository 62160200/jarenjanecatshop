<?php
include 'layout.php';

$payment_id = $_GET['payment_id'];

$sql = "SELECT * FROM payments
INNER JOIN orders ON payments.OrderID = orders.OrderID
INNER JOIN carts ON orders.CartID = carts.CartID
INNER JOIN cats ON carts.CatID = cats.CatID
WHERE payments.PaymentID = '$payment_id'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

foreach ($row as $key => $value) {
    $image = $row['image'];
    $image = explode(',', $image);
    $image = $image[0];
}

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
    .title {
        text-align: left;
        font-size: 50px;
        font-family: 'Mitr', sans-serif;
        color: #000000;
        margin-top: 55px;
        margin-left: 8rem;
        margin-bottom: 50px;
    }

    .container {
        display: flex;
        justify-content: center;
    }

    .card {
        width: 50rem;
    }
    .card-text {
        font-size: 16px;
        line-height: 1.5;
    }

    .hr {
        margin: 5rem 2rem 4rem 2rem;
    }
    .icon{
        font-size: 100px;
        color: #00B140;
    }

    .image {
        object-fit: cover;
    }
</style>
</head>

<body>
    <h1 class="title"><b>ชำระเงิน</b></h1>
    <div class="container">
        <div class="card">
            <center>
                <div class="card-body">
                    <i class="bi bi-check-circle-fill icon m-0 p-0"></i>
                    <div class="fw-bold lh-1">
                        <p>การชำระเงินสำเร็จ</p>
                        <p>กรุณารอการติดต่อกลับจากทางฟาร์ม</p>
                        <p>ขอบคุณที่รับเลี้ยงแมวค่ะ</p>
                    </div>
                    <hr class="hr my-4">
                    <p class="fs-4"><b>สรุปคำสั่งซื้อ</b></p>
                    <br>
                    <div class="mb-3">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="images/<?= $image ?> " class="image img-fluid rounded" style="max-width: 70%; height: 70%;">
                            </div>
                            <div class="col-md-5">
                                <div class="body" style="text-align:left;">
                                    <h4 class="fw-bold"><?= $row['name'] ?></h4>
                                    <p class="card-text"><?= $row['breed'] ?></p>
                                    <h6 class="" style="font-size: 18px;"><b>รายละเอียด</b></h6>
                                    <p class="card-text"><?= $row['description'] ?></p>

                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <h3><b>รวมทั้งสิ้น <?= $row['TotalAll'] ?> ฿</b></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
</body>

</html>