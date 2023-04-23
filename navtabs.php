<div class="container my-5">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?= $title == 'รายการแมว' ? 'active' : '' ?>" aria-current="page" href="cat_list.php">รายการแมว</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $title == 'รายการสั่งซื้อ' ? 'active' : '' ?>" aria-current="page" href="order_list.php">รายการสั่งซื้อ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $title == 'รายการชำระเงิน' ? 'active' : '' ?>" aria-current="page" href="payment_list.php">รายการชำระเงิน</a>
        </li>
    </ul>
</div>