<?php
include 'layout.php';
include 'navtabs.php';

?>

<style>
.cat-list {
    margin-left: 8rem;
    margin-right: 2rem;
}
</style>

<div class="cat-list">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Cat ID</th>
                <th>รูป</th>
                <th>ชื่อ</th>
                <th>เพศ</th>
                <th>อายุ</th>
                <th>สายพันธุ์</th>
                <th>วันเกิด</th>
                <th>รายละเอียด</th>
                <th>ค่าเลี้ยงดู</th>
                <th>วัคซีน</th>
                <th>สถานะ</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM cats";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $cat) {
                $image = $cat['image'];
                $image = explode(',', $image);
                $image = $image[0];

                $dob = date('Y-m-d', strtotime($cat['dob']));
                $now = date('Y-m-d');
                $diff = date_diff(date_create($dob), date_create($now));
                $age = $diff->format('%y');
                if ($age > 0) {
                    $cat['ages'] = $age . ' ปี ' . $diff->format('%m') . ' เดือน';
                } else {
                    $cat['ages'] = $diff->format('%m') . ' เดือน';
                }

            ?>
                <tr>
                    <td class="id"><?= $cat['CatID']; ?></td>
                    <td><img src="images/<?= $image ?>" width="100px" height="100px"></td>
                    <td class="name"><?= $cat['name']; ?></td>
                    <td>
                        <?= $cat['gender'] == 'Male' ? 'เพศผู้' : 'เพศเมีย'; ?>
                    </td>
                    <td><?= $cat['ages']; ?></td>
                    <td><?= $cat['breed']; ?></td>
                    <td><?= $cat['dob']; ?></td>
                    <td><?= $cat['description']; ?></td>
                    <td><?= $cat['price']; ?></td>
                    <td>
                        <?php
                        if ($cat['vaccine'] == 'Injected') {
                            echo 'ฉีดวัคซีนแล้ว';
                        } else {
                            echo 'ยังไม่ได้ฉีดวัคซีน';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($cat['status'] == 'available') {
                            echo 'น้องยังอยู่';
                        } else {
                            echo 'ขายแล้ว';
                        }
                        ?>
                    </td>
                    <td>
                        <div class="d-flex">
                            <button id="delete" class="btn btn-dark center-button me-1"><i class="bi bi-trash"></i> ลบ</button>
                            <button id="edit" class="btn btn-dark center-button ms-1"><i class="bi bi-pencil-square"></i> แก้ไข</button>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>


    // check delete button is clicked or not before redirect to delete_cat.php
    $(document).on('click', '#delete', function() {
        var id = $(this).closest('tr').find('.id').text();
        var name = $(this).closest('tr').find('.name').text();
        Swal.fire({
            title: 'คุณต้องการลบข้อมูล ' + name + ' หรือไม่?',
            text: "คุณจะไม่สามารถกู้คืนข้อมูลได้หากลบแล้ว!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบข้อมูล!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "delete_cat.php?id=" + id;
            }
        })
    });

    // check edit button is clicked or not before redirect to edit_cat.php
    $(document).on('click', '#edit', function() {
        var id = $(this).closest('tr').find('.id').text();
        var name = $(this).closest('tr').find('.name').text();
        Swal.fire({
            title: 'คุณต้องการแก้ไขข้อมูล ' + name + ' หรือไม่?',
            text: "คุณจะไม่สามารถกู้คืนข้อมูลได้หากแก้ไขแล้ว!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, แก้ไขข้อมูล!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "edit_cat.php?id=" + id;
            }
        })
    });

</script>