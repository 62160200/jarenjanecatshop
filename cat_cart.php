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
    margin-top: 50px;
    margin-left: 8rem;
    margin-bottom: 50px;
}
.container{
    margin-left: 8rem;
}
.title1{
    font-family: 'Mitr', sans-serif;
    color: #000000;
    margin-top: 1px;
    margin-left: 3rem;
    margin-right: 3rem;
    /* margin-bottom: 100px; */
    line-height: 20px;
}
.d-flex1{
    font-size: 20px;
    margin-left: 10.5rem;
    margin-bottom: 100px;
    line-height: -10px;
}
center{
    margin-bottom: 30px;
}
.sum{
    margin-bottom: 0px;
}

</style>
<body>
<h1 class ="title"><b>ตะกร้าแมว</b></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- <h2>รายการสินค้าที่เลือก</h2> -->
                <!-- Add your product cards here -->
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Product details -->
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
                            <p >จำนวน 1 รายการ</p>
                            <p >40000</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p >ค่าจัดส่ง</p>
                            <p >200</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p >Vat 7%</p>
                            <p >2800</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="sum">รวม</p>
                        </div>
                        <div class="d-flex1 justify-content-between align-items-center">
                            <p><h3 ><b>43,000 ฿</b></h3></p>
                        </div>
                        <center>
                            <button class="btn btn-primary">ยืนยันคำสั่งซื้อ</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>