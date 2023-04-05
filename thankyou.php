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
            width: 50rem;
            background-color: #F5F5F5;
        }
        .card-title{
            font-family: 'Mitr', sans-serif;
            color: #000000;
            margin-top: 10rem;
            margin-bottom: 1rem;
            line-height: 1.5px;
        }
        .card-text{
            font-family: 'Mitr', sans-serif;
            color: #000000;
            line-height: 1.5px;
        }
        .hr{
            margin: 5rem 2rem 4rem 2rem;
        }
        .img {
        padding-bottom: 1rem;
        margin-left: 2rem;
        margin-right: 2rem;
    }
    </style>
</head>

<body>
    <h1 class="title"><b>ชำระเงิน</b></h1>
    <div class="container">
        <div class="card" >
            <center>
            <div class="card-body">
                <b>
                    <p class="card-title">การชำระเงินสำเร็จ</p>
                    <p class="card-text">กรุณารอการติดต่อกลับจากทางฟาร์ม</p>
                    <p class="card-text">ขอบคุณที่รับเลี้ยงแมวค่ะ</p>
                </b>
                <hr class="hr">
                <p class="card-text"><b>สรุปคำสั่งซื้อ</b></p>
                <br>
                <div class="mb-3">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="cat_imge\cat6.png" class="img" alt="Product Image" class="img-fluid" style="max-width: 70%; height: 70%;">
                        </div>
                        <div class="col-md-5">
                            <div class="body" style="text-align:left;">
                                <h4 class=""><b>น้องเหนียง</b></h4>
                                <p class="" style="font-size: 13px;line-height: 1px;">พันธุ์บริติช ชอร์ตแฮร์</p>
                                <h6 class="" style="font-size: 18px;"><b>รายละเอียด</b></h6>
                                <p class="" style="font-size: 13px;line-height: 1px;">หนุ่มมีไข่อยู่ครบ2 ใบ</p>
                                <p class="" style="font-size: 13px;line-height: 1px;">British ShortHair NY11</p>
                                <p class="" style="font-size: 13px;line-height: 1px;">DOB 12/06/2019 น้ำหนัก5.5kgs.</p>

                            </div>
                        </div>
                        <!-- <div class="col-md-3 d-flex align-items-end"> -->
                            <div class="card-footer text-end">   
                            <h3><b>รวมทั้งสิ้น  43,000 ฿</b></h3>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            </center>
        </div>
    </div>
</body>

</html>