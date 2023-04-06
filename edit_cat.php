<?php
include 'layout.php';

if (!isset($_SESSION['user_id']) && $_SESSION['role'] !== 'admin') {
    echo "<script>window.location.href = 'login.php';</script>";
}

$cat_id = $_GET['id'];

$sql = "SELECT * FROM cats WHERE CatID = $cat_id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$cat = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cat</title>
</head>
<style>
    body {
        background-color: #f2f2f2;
        margin-top: 1rem;
        margin-left: 10rem;
    }

    .form {
        width: 50%;
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #fff;
        text-align: left;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="mt-5 mb-4">แก้ไขข้อมูลแมว</h1>
                <div class="card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="cat_name" class="form-label">ชื่อแมว:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $cat['name'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">เพศ:</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="Male" <?php if ($cat['gender'] === 'Male') echo 'selected' ?>>ผู้</option>
                                    <option value="Female" <?php if ($cat['gender'] === 'Female') echo 'selected' ?>>เมีย</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">วันเกิด:</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?= $cat['dob'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="breed" class="form-label">สายพันธุ์:</label>
                                <input type="text" class="form-control" id="breed" name="breed" value="<?= $cat['breed'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">ราคา:</label>
                                <input type="number" class="form-control" id="price" name="price" value="<?= $cat['price'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">รายละเอียด:</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required><?= $cat['description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="vaccine" class="form-label">วัคซีน:</label>
                                <select class="form-select" id="vaccine" name="vaccine">
                                    <option value="Injected" <?php if ($cat['vaccine'] === 'Injected') echo 'selected' ?>>ฉีดแล้ว</option>
                                    <option value="Not Injected Yet" <?php if ($cat['vaccine'] === 'Not Injected Yet') echo 'selected' ?>>ยังไม่ฉีด</option>
                                </select>
                            </div>
                            <input type="submit" value="แก้ไขข้อมูล" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


<?php

if (isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['dob']) && isset($_POST['breed']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['vaccine'])) {


    // Prepare an update statement

    $sql = 'UPDATE cats SET name = :name ,gender = :gender, dob = :dob, breed = :breed, price = :price, description = :description, vaccine = :vaccine WHERE CatID = :id';

    if ($stmt = $pdo->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
        $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
        $stmt->bindParam(":gender", $param_gender, PDO::PARAM_STR);
        $stmt->bindParam(":dob", $param_dob, PDO::PARAM_STR);
        $stmt->bindParam(":breed", $param_breed, PDO::PARAM_STR);
        $stmt->bindParam(":price", $param_price, PDO::PARAM_STR);
        $stmt->bindParam(":description", $param_description, PDO::PARAM_STR);
        $stmt->bindParam(":vaccine", $param_vaccine, PDO::PARAM_STR);

        // Set parameters
        $param_id = $cat_id;
        $param_name = trim($_POST["name"]);
        $param_gender = trim($_POST["gender"]);
        $param_dob = trim($_POST["dob"]);
        $param_breed = trim($_POST["breed"]);
        $param_price = trim($_POST["price"]);
        $param_description = trim($_POST["description"]);
        $param_vaccine = trim($_POST["vaccine"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'แก้ไขข้อมูลแมวสำเร็จ',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = 'cat_detail.php?id=$cat_id';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'แก้ไขข้อมูลแมวไม่สำเร็จ',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = 'cat_detail.php?id=$cat_id';
            });
            </script>";
        }

        // Close statement
        unset($stmt);
    }
}

// Close connection
unset($pdo);
?>



</html>