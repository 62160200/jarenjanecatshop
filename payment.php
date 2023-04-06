<?php
include 'layout.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href = 'login.php';</script>";
}

$order_id = $_GET['order_id'];
$sql = "SELECT * FROM orders WHERE OrderID = '$order_id'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            margin-top: 150px;
        }

        .qr-container {
            text-align: center;
        }

        .form-submit {
            text-align: center;
        }

        .vl {
            border-left: 1px solid #ccc;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="add_payment.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">
                    <h1 class="fw-bold"><b>ชำระเงิน</b></h1>
                    <div class="qr-container">
                        <img src="payment\qr_code.png" alt="QR Code" class="img-fluid" width="25%" height="25%">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="hidden" name="order_id" value="<?= $order['OrderID'] ?>">
                                <label for="slip_image" class="form-label">แนบสลิปการโอนเงิน:</label>
                                <input class="form-control" type="file" id="slip_image" name="slip_image" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">ชื่อ:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">นามสกุล:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="bank" class="form-label">ธนาคาร:</label>
                                <select class="form-select" aria-label="Default select example" id="bank" name="bank" required>
                                    <option selected>เลือกธนาคาร</option>
                                    <option value="bbl">ธนาคารกรุงเทพ</option>
                                    <option value="ktb">ธนาคารกสิกรไทย</option>
                                    <option value="scb">ธนาคารไทยพาณิชย์</option>
                                    <option value="kbank">ธนาคารกรุงไทย</option>
                                    <option value="tmb">ธนาคารทหารไทย</option>
                                    <option value="gsb">ธนาคารออมสิน</option>
                                    <option value="bay">ธนาคารกรุงศรีอยุธยา</option>
                                    <option value="tbank">ธนาคารธนชาต</option>
                                    <option value="cimb">ธนาคารซีไอเอ็มบีไทย</option>
                                    <option value="tisco">ธนาคารทิสโก้</option>
                                    <option value="uob">ธนาคารยูโอบี</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="transfer_amount" class="form-label">ยอดโอน:</label>
                                <input type="number" class="form-control" id="transfer_amount" name="transfer_amount" value="<?= $order['TotalAll'] ?>" required readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="vl"></div>
                </div>


                <div class="col-3">
                    <h1 class="text-center fw-bold">สรุปคำสั่งซื้อ</h1>
                    <div class="row mt-5">
                        <div class="col-7">
                            <div class="mb-3">
                                จำนวนสินค้า: <?php echo $order['Count']; ?> ชิ้น
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <?php echo $order['TotalAmount']; ?> ฿
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="mb-3">
                                ค่าจัดส่ง:
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <?= $order['Shipping'] ?> ฿
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="mb-3">
                                Val 7%:
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <?= $order['Val'] ?> ฿
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                ยอดรวม:
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <h1 class="fw-bold text-end"><?= $order['TotalAll'] ?> ฿</h1>
                            </div>
                        </div>
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn-dark btn-lg">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>