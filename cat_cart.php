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
    .container {
        margin-top: 150px;
    }

    .card-text {
        font-size: 13px;
        line-height: 1.5;
    }

    .image-md {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>

<body>
    <div class="container">
        <h1 class="fw-bold">ตะกร้าแมว</h1>
        <div class="row mt-5">
            <div class="col-8">
                <?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM carts INNER JOIN cats ON carts.CatID = cats.CatID WHERE carts.UserID = $user_id AND carts.CartStatus = 0";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $carts = $stmt->fetchAll(PDO::FETCH_ASSOC);


                foreach ($carts as $row) {
                    //get image first 
                    $image = $row['image'];
                    $image = explode(',', $image);
                    $image = $image[0];

                ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-3 me-4">
                                <img src="images/<?= $image ?>" class="img-fluid rounded-start image-md" alt="...">
                            </div>
                            <div class="col-4">
                                <div class="card-body">
                                    <h4 class="card-title fw-bold"><?= $row['name'] ?></h4>
                                    <p class="card-text"><?= $row['breed'] ?></p>
                                    <h6 class="card-title" style="font-size: 18px;"><b>รายละเอียด</b></h6>
                                    <p class="card-text"><?= $row['description'] ?></p>

                                </div>
                            </div>
                            <div class="col-3 d-flex align-items-end">
                                <div class="ms-auto p-2">
                                    <h4 class="fw-bold text-end"><?= $row['price'] ?> ฿</h4>
                                </div>
                            </div>
                            <div class="col-1 d-flex align-items-end position-absolute top-0 end-0">
                                <div class="ms-auto p-2">
                                    <button id="cart-delete" data-id="<?= $row['CartID'] ?>" class="btn"><i class="bi bi-x-lg"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }

                // count cart
                $sql = "SELECT COUNT(*) AS count FROM carts WHERE UserID = $user_id AND CartStatus = 0";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $count = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $count['count'];

                //get total price and if no item in cart set total = 0
                $sql = "SELECT SUM(price) AS total FROM carts INNER JOIN cats ON carts.CatID = cats.CatID WHERE carts.UserID = $user_id AND carts.CartStatus = 0";
                if ($count == 0) {
                    $total = 0;
                } else {
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $total = $result['total'];
                }

                //get shipping price if total > 10000 and if no item in cart set shipping = 0
                if ($total > 20000) {
                    $shipping = 0;
                } else if ($count == 0) {
                    $shipping = 0;
                } else {
                    $shipping = 200;
                }

                //get 7% val
                $val = $total * 0.07;

                //get all price
                $all = $total + $shipping + $val;

                ?>

            </div>
            <div class="col-1">
                <div class="border-start h-100 ps-3"></div>
            </div>
            <div class="col-3">
                <h1 class="text-center fw-bold">คำสั่งซื้อ</h1>
                <div class="row mt-5">
                    <div class="col-7">
                        <div class="mb-3">
                            จำนวนสินค้า: <?= $count ?> รายการ
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-3">
                            <?= $total ?> ฿
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-3">
                            ค่าจัดส่ง:
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-3">
                            <?= $shipping ?> ฿
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-3">
                            Val 7%:
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-3">
                            <?= $val ?> ฿
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            ยอดรวม:
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <h1 class="fw-bold text-end"><?= $all ?> ฿</h1>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <form action="add_order.php" method="post" id="form">
                        <input type="hidden" name="cart_id" value="<?= $row['CartID'] ?>">
                        <input type="hidden" name="count" value="<?= $count ?>">
                        <input type="hidden" name="total" value="<?= $total ?>">
                        <input type="hidden" name="shipping" value="<?= $shipping ?>">
                        <input type="hidden" name="val" value="<?= $val ?>">
                        <input type="hidden" name="all" value="<?= $all ?>">
                        <button type="submit" id="payment" class="btn btn-dark btn-lg" <?php if ($count == 0) {echo 'disabled';} ?>>ชำระเงิน</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.querySelectorAll('#cart-delete').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            let id = btn.dataset.id
            Swal.fire({
                title: 'คุณต้องการลบสินค้าใช่หรือไม่?',
                showDenyButton: true,
                confirmButtonText: `ลบ`,
                denyButtonText: `ยกเลิก`,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete_cart.php?id=' + id
                } else {
                    e.preventDefault()
                }
            })

        })
    })

    document.querySelector('#payment').addEventListener('click', (e) => {
        e.preventDefault()
        let total = <?= $total ?>;
        let shipping = <?= $shipping ?>;
        let val = <?= $val ?>;
        let all = <?= $all ?>;
        Swal.fire({
            title: 'คุณต้องการชำระเงินใช่หรือไม่?',
            showDenyButton: true,
            confirmButtonText: `ชำระเงิน`,
            denyButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('#form').submit()
            } else {
                e.preventDefault()
            }
        })
    })
</script>

</html>