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
    .btn-group,
    .btn-dark {
        margin-right: 3rem;
        font-size: 17px;
    }

    .album {
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

    .card-text {
        font-family: 'Mitr', sans-serif;
        color: #000000;
        margin-top: 1px;
        margin-left: 10px;
        margin-bottom: 1px;
    }
    .card-img-top{
        width: 100%;
        height: 20vw;
        object-fit: cover;
    }
</style>

<body>
    <h1 class="title"><b>ตลาดแมว</b></h1>

    <div class="album py-10">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                
                $sql = "SELECT * FROM cats";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $cats = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // get age form dob (date of birth) in age value and get first image from images
                foreach ($cats as $cat) {
                    // calculate cat age range from dob (date of birth)
                    $cat['ages'] = date_diff(date_create($cat['dob']), date_create('now'))->y;
                    // get first image from images  
                    $cat['image'] = explode(',', $cat['image'])[0];
                    // format price to Thai Baht currency format
                    $cat['price'] = number_format($cat['price'], 0, '.', ',');
                ?>
                    <div class="col">
                        <img src="images\<?= $cat['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3><b><?= $cat['name'] ?></b></h3>
                            <p class="card-text"><?= $cat['breed'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text">อายุ : <?= $cat['ages'] ?> ปี</p>
                                <div class="btn-group">
                                    <a href="cat_detail.php?id=<?= $cat['CatID'] ?>" class="btn btn-dark center-button"><?= $cat['price'] ?> ฿</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>