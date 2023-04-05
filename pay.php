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
        .title {
            text-align: left;
            font-size: 50px;
            font-family: 'Mitr', sans-serif;
            color: #000000;
            margin-top: 55px;
            margin-left: 8rem;
            margin-bottom: 50px;
        }

        .qr-container {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        form {
            max-width: 500px;
            text-align: left;
            /* margin: auto; */
        }

    label {
            display: block;
            margin-bottom: 0.5rem;
        }

        input {
            width: 100%;
            padding: 6px 12px;
            margin-top: 1rem;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }

        .form-submit {
            text-align: center;
        }  
</style>
</head>

<body>
    <h1 class="title"><b>ชำระเงิน</b></h1>
    <div class="qr-container">
        <img src="payment\qr_code.png" alt="QR Code" class="img-fluid" width="20%" height="20%">
    </div>
    <center>
    <form action="thankyou.php" method="post" enctype="multipart/form-data">
        <label for="fullname">ชื่อ-นามสกุล:</label>
        <input type="text" id="fullname" name="fullname" required>
        <label for="bank">ธนาคาร:</label>
        <select id="bank" name="bank" required>
            <option value="">เลือกธนาคาร</option>
            <option value="bangkok_bank">ธนาคารกรุงเทพ</option>
            <option value="kasikorn_bank">ธนาคารกสิกรไทย</option>
            <option value="siam_commercial_bank">ธนาคารไทยพาณิชย์</option>
            <option value="krungthai_bank">ธนาคารกรุงไทย</option>
            <option value="krungsri_bank">ธนาคารกรุงศรีอยุธยา</option>
            <!-- เพิ่มธนาคารอื่นๆ ตามที่ต้องการ -->
        </select>
        <label for="transfer-amount">ยอดโอน:</label>
        <input type="number" id="transfer-amount" name="transfer-amount" value="43000" required readonly>
        <label for="slip">แนบสลิปการโอนเงิน:</label>
        <input type="file" id="slip" name="slip" required>
        <div class="form-submit">
            <button type="submit" class="btn btn-dark">ยืนยันการชำระเงิน</button>
        </div>
    </form>
    </center>
    <br><br><br>
</body>

</html>