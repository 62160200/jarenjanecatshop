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

    .btn-detail,
    .test {
        margin-top: 10px;
    }
</style>

<body>
    <h1 class="title"><b>น้องเหนียง</b></h1>
    <div class="album bg-light">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2">
                    <img src="cat_imge\cat2.png" class="img-fluid mb-3" alt="Image 1">
                    <img src="cat_imge\cat3.png" class="img-fluid mb-3" alt="Image 2">
                    <img src="cat_imge\cat4.png" class="img-fluid mb-3" alt="Image 3">
                    <img src="cat_imge\cat5.png" class="img-fluid mb-3" alt="Image 4">
                </div>
                <div class="col-md-6">
                    <img src="cat_imge\cat6.png" width="800rem" height="700rem" class="img-fluid" alt="Large Image">
                    <br><br>
                    <a href="" class="btn btn-dark center-button faver">เพิ่มเป็นรายการโปรด <i class="bi bi-heart"></i></a>
                    <br><br><br><br>
                </div>
                <div class="col-md-4">
                    <h2><b class="title1 pb-2">พันธุ์บริติช ชอร์ตแฮร์</b></h2>
                    <h5><b>ข้อมูล</b></h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <p>ช่วงอายุ</p>
                        <p>2 ปี</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p>เพศ</p>
                        <p>ผู้</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p>วันเกิด</p>
                        <p>12 กรกฎาคม 2022</p>
                    </div>
                    <div class="d-flex1 justify-content-between align-items-center">
                        <p>วัคซีน</p>
                        <p>ฉีดแล้ว</p>
                    </div>
                    <h5><b>รายละเอียด</b></h5>
                    <p>หนุ่มมีไข่อยู่ครบ2 ใบ</p>
                    <p>British ShortHair NY11</p>
                    <p>DOB 12/06/2019 น้ำหนัก5.5kgs.</p>
                    <div class="text-center test">
                        <span class="font-weight-bold"><b>ค่าเลี้ยงดู</b></span>
                        <h3 class="d-inline font-weight-bold">40,000 B</h3>
                    </div>
                    <br>
                    <div class="text-center">
                        <a href="" class="btn btn-dark center-button btn-detail"><i class="bi bi-chat-square-dots"></i> ทักแชทสอบถาม</a>
                    </div>
                    <div class="text-center">
                        <a href="" class="btn btn-dark center-button btn-detail"><i class="bi bi-bag"></i> นำใส่ตระกร้า </a>
                    </div>
                </div>

            </div>
        </div>




</body>

</html>