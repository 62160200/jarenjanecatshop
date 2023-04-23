<?php
include 'layout.php';
include 'navtabs.php';

?>
<style>
.order-list {
    margin-left: 8rem;
    margin-right: 2rem;
}
.badge {
    font-size: 1rem;
}
.badge-warning {
    background-color: #ffc107;
}
.badge-success {
    background-color: #28a745;
}
.badge-danger {
    background-color: #dc3545;
}
</style>

<div class="order-list">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>รหัสการสั่งซื้อ</th>
                <th>วันที่สั่งซื้อ</th>
                <th>ชื่อผู้ซื้อ</th>
                <th>ชื่อน้องแมว</th>
                <th>จำนวน</th>
                <th>ราคา</th>
                <th>ภาษี</th>
                <th>ค่าจัดส่ง</th>
                <th>ราคารวม</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM orders
            JOIN users ON orders.UserID = users.UserID
            JOIN carts ON orders.CartID = carts.CartID
            JOIN cats ON carts.CatID = cats.CatID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
            <tr>
                <td><?= $row['OrderID'] ?></td>
                <td><?= $row['OrderDate'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['Count'] ?></td>
                <td><?= $row['Shipping'] ?></td>
                <td><?= $row['Val'] ?></td>
                <td><?= $row['TotalAmount'] ?></td>
                <td><?= $row['TotalAll'] ?></td>
                <td>
                    <?php
                        if ($row['Status'] == 'processing') {
                            echo '<span class="badge badge-warning">รอการชำระเงิน</span>';
                        } else if ($row['Status'] == 'succeeded') {
                            echo '<span class="badge badge-success">ชำระเงินแล้ว</span>';
                        } else if ($row['Status'] == 'failed') {
                            echo '<span class="badge badge-danger">ชำระเงินไม่สำเร็จ</span>';
                        }
                        ?>

                </td>
            </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>