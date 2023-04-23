<?php
include 'layout.php';
include 'navtabs.php';

?>

<style>
    .payment-list {
        margin-left: 8rem;
        margin-right: 2rem;
    }

</style>

<div class="payment-list">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>รหัสการชำระเงิน</th>
                <th>รหัสการสั่งซื้อ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ธนาคาร</th>
                <th>จำนวนเงิน</th>
                <th>วันที่ชำระเงิน</th>
                <th>รูปสลิป</th>
                <th>ดูรูป</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM payments";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($payments as $row) {
            ?>
            <tr>
                <td><?= $row['PaymentID'] ?></td>
                <td><?= $row['OrderID'] ?></td>
                <td><?= $row['firstname'] ?></td>
                <td><?= $row['lastname'] ?></td>
                <td><?= $row['bank'] ?></td>
                <td><?= $row['transfer_amount'] ?></td>
                <td><?= $row['payment_date'] ?></td>
                <td><?= $row['slip_image'] ?></td>
                <td>
                    <button type="button" id="show" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showImg">
                    <i class="bi bi-file-image me-1"></i>ดูรูปสลิป
                    </button>
                </td>
            </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="showImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">รูปสลิป</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img id="image" class="rounded" style="width: 100%; height: 100%;" src="" alt="">
      </div>
    </div>
  </div>
</div>

<script>
    //get image 7 td
    $(document).ready(function() {
        $('#example').on('click', '#show', function() {
            var image = $(this).closest('tr').find('td:eq(7)').text();
            $('#image').attr('src', 'slip_image/' + image);
        });
    });

</script>