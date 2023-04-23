<?php
include 'layout.php';


?>

<style>
    .title {
        text-align: left;
        font-size: 50px;
        font-family: 'Mitr', sans-serif;
        color: #000000;
        margin-top: 80px;
        margin-left: 8rem;
        margin-bottom: 50px;
    }
</style>

<body>
    <h1 class="title"><b>ประวัติการซื้อขาย</b></h1>

    <div class="py-10">
        <div class="container">
            <div class="list-group">
                <?php
                $sql = "SELECT * FROM payments 
                JOIN orders ON orders.OrderID = payments.OrderID
                WHERE orders.UserID = {$_SESSION['user_id']}";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($payments as $payment) {
                    $sql = "SELECT * FROM cats
                    JOIN carts ON carts.CatID = cats.CatID
                    JOIN orders ON orders.CartID = carts.CartID
                    WHERE orders.OrderID = {$payment['OrderID']}";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $cat = $stmt->fetch(PDO::FETCH_ASSOC);

                    $payment['Status'] = $payment['Status'] == 'succeeded' ? 'ชำระเงินแล้ว' : 'การชำระเงินผิดพลาด';
                ?>
                    <a href="success_payment.php?payment_id=<?php echo $payment['PaymentID'] ?>"
                    class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo $cat['name'] ?></h5>
                            <small><?php echo $payment['OrderDate'] ?></small>
                        </div>
                        <p class="mb-1"><?php echo $cat['breed'] ?></p>
                        <small class="badge <?= $payment['Status'] == 'ชำระเงินแล้ว' ? 'bg-success' : 'bg-danger' ?>">
                            <?= $payment['Status'] ?>
                        </small>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>