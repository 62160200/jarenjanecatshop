<?php
include 'layout.php';


?>

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

    .card-img-top {
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

                // get all cats from database or search cats by name or breed
                $sql = "SELECT * FROM cats WHERE status = 'available'";
                if (isset($_GET['search'])) {
                    $sql = "SELECT * FROM cats WHERE name LIKE '%{$_GET['search']}%' OR breed LIKE '%{$_GET['search']}%'";
                }
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $cats = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($cats as $cat) {
                    $dob = date('Y-m-d', strtotime($cat['dob']));
                    $now = date('Y-m-d');
                    $diff = date_diff(date_create($dob), date_create($now));
                    $age = $diff->format('%y');
                    if ($age > 0) {
                        $cat['ages'] = $age . ' ปี ' . $diff->format('%m') . ' เดือน';
                    } else {
                        $cat['ages'] = $diff->format('%m') . ' เดือน';
                    }
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
                                <p class="card-text">อายุ : <?= $cat['ages'] ?></p>
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
