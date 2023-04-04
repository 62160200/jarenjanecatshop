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

    .btn-group, .btn-dark{
        margin-right: 3rem;
        font-size: 17px;
    }
    .album{
        padding-left: 10rem;
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
.card-text{
    font-family: 'Mitr', sans-serif;
    color: #000000;
    margin-top: 1px;
    margin-left: 10px;
    margin-bottom: 1px;}

</style>
<body>
<h1 class ="title"><b>ตลาดแมว</b></h1>

    <div class="album py-10 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
                <div class="col">
                    <img src="cat_imge\cat6.png" alt="cat" width="80%" height="70%">
                    <div class="card-body">
                        <h3><b>น้องเปอร์เซีย</b></h3>
                        <p class="card-text">พันธ์ุเปอร์เซีย</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">อายุ : 2 ปี</p>
                            <div class="btn-group">
                            <a href="cat_detail.php" class="btn btn-dark center-button">11,000 B</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <img src="cat_imge\cat6.png" alt="cat" width="80%" height="70%">
                    <div class="card-body">
                        <h3><b>น้องเปอร์เซีย</b></h3>
                        <p class="card-text">พันธ์ุเปอร์เซีย</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">อายุ : 2 ปี</p>
                            <div class="btn-group">
                            <a href="cat_detail.php" class="btn btn-dark center-button">11,000 B</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <img src="cat_imge\cat6.png" alt="cat" width="80%" height="70%">
                    <div class="card-body">
                        <h3><b>น้องเปอร์เซีย</b></h3>
                        <p class="card-text">พันธ์ุเปอร์เซีย</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">อายุ : 2 ปี</p>
                            <div class="btn-group">
                                <a href="cat_detail.php" class="btn btn-dark center-button">11,000 B</a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

</body>
</html>