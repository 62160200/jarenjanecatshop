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
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

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
        margin-left: 8rem;
    }

    .title1 {
        font-family: 'Mitr', sans-serif;
        color: #000000;
        margin-top: 1px;
        margin-left: 3rem;
        margin-right: 3rem;
        /* margin-bottom: 100px; */
        line-height: 20px;
    }

    .d-flex1 {
        font-size: 20px;
        margin-left: 10.5rem;
        margin-bottom: 100px;
        line-height: -10px;
    }

    center {
        margin-bottom: 30px;
    }

    .sum {
        margin-bottom: 0px;
    }

    body {
        font-family: 'Mitr', sans-serif;
    }

    .card {
        /* border: none; */
        border-radius: 10px;
        margin-left: 2rem;
        margin-right: 2rem;
        margin-bottom: 1rem;
        /* box-shadow: 0 0 0 0 rgba(0,0,0,0); */
    }

    .col-md-3 {
        margin-left: 6rem;

    }

    .col-md-5 {
        margin-left: 2rem;
    }

    .g-0 {
        margin-left: 10px;
        margin-right: 10px;
    }

    .img {
        padding-top: 1rem;
        padding-bottom: 1rem;
        margin-left: 0.5rem;
        margin-right: 2rem;
    }
</style>

<body>
    <h1 class="title"><b>ตะกร้าแมว</b></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- <h2>รายการสินค้าที่เลือก</h2> -->
                <!-- Add your product cards here -->
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="cat_imge\cat6.png" class="img" alt="Product Image" class="img-fluid" style="max-width: 100%; height: 100%;">
                        </div>
                        <div class="col-md-5">
                            <div class="card-body">
                                <h4 class="card-title"><b>น้องเหนียง</b></h4>
                                <p class="card-text" style="font-size: 13px;line-height: 1px;">พันธุ์บริติช ชอร์ตแฮร์</p>
                                <h6 class="card-title" style="font-size: 18px;"><b>รายละเอียด</b></h6>
                                <p class="card-text" style="font-size: 13px;line-height: 1px;">หนุ่มมีไข่อยู่ครบ2 ใบ</p>
                                <p class="card-text" style="font-size: 13px;line-height: 1px;">British ShortHair NY11</p>
                                <p class="card-text" style="font-size: 13px;line-height: 1px;">DOB 12/06/2019 น้ำหนัก5.5kgs.</p>

                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <!-- <div class="card-footer text-end"> -->
                            <h3><b>40,000 ฿</b></h3>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>

                <!-- Repeat the card for other products -->
            </div>
            <div class="col-md-4">
                <div class="border-start ps-3">
                    <div class="title1">
                        <center>
                            <h2><b>คำสั่งซื้อ</b></h2>
                        </center>
                        <div class="d-flex justify-content-between align-items-center">
                            <p>จำนวน 1 รายการ</p>
                            <p>40000</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p>ค่าจัดส่ง</p>
                            <p>200</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p>Vat 7%</p>
                            <p>2800</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="sum">รวม</p>
                        </div>
                        <div class="d-flex1 justify-content-between align-items-center">
                            <p>
                            <h3><b>43,000 ฿</b></h3>
                            </p>
                        </div>
                        <center>
                            <a href="pay.php" class="btn btn-dark">ยืนยันคำสั่งซื้อ</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>