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
        .container {
            display: flex;
            justify-content: center;
        }
        .card{
            width: 18rem;
        }
    </style>
</head>

<body>
    <h1 class="title"><b>ชำระเงิน</b></h1>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">การชำระเงินสำเร็จ</h5>
                <p class="card-text">ขอขอบคุณที่ใช้บริการของเรา การชำระเงินของคุณเสร็จสมบูรณ์แล้ว</p>
                <a href="#" class="btn btn-primary">ย้อนกลับหน้าหลัก</a>
            </div>
        </div>
    </div>
</body>

</html>