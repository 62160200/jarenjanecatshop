<?php
include 'layout.php';

if (!isset($_SESSION['user_id']) && $_SESSION['role'] !== 'admin') {
    echo "<script>window.location.href = 'login.php';</script>";
}
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
                <h1 class="mt-5 mb-4">เพิ่มข้อมูลแมว</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="cat_name" class="form-label">ชื่อแมว:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">เพศ:</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="Male">ผู้</option>
                                    <option value="Female">เมีย</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">วันเกิด:</label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                            <div class="mb-3">
                                <label for="breed" class="form-label">สายพันธุ์:</label>
                                <input type="text" class="form-control" id="breed" name="breed" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">ราคา:</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">รายละเอียด:</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">รูปภาพ:</label>
                                <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple required>
                            </div>
                            <div class="mb-3">
                                <label for="vaccine" class="form-label">วัคซีน:</label>
                                <select class="form-select" id="vaccine" name="vaccine">
                                    <option value="Injected">ฉีดแล้ว</option>
                                    <option value="Not Injected Yet">ยังไม่ได้ฉีด</option>
                                </select>
                            </div>
                            <input type="submit" value="เพิ่มแมว" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php

if (isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['dob']) && isset($_POST['breed']) && isset($_POST['price']) && isset($_POST['description']) && isset($_FILES['image']['name'])) {


    // Prepare an insert statement
    $sql = "INSERT INTO cats (name, gender, dob, breed, price, description,image, vaccine) VALUES (:name,:gender,:dob,:breed,:price,:description,:image,:vaccine)";

    if ($stmt = $pdo->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
        $stmt->bindParam(":gender", $param_gender, PDO::PARAM_STR);
        $stmt->bindParam(":dob", $param_dob, PDO::PARAM_STR);
        $stmt->bindParam(":breed", $param_breed, PDO::PARAM_STR);
        $stmt->bindParam(":price", $param_price, PDO::PARAM_STR);
        $stmt->bindParam(":description", $param_description, PDO::PARAM_STR);
        $stmt->bindParam(":image", $param_image, PDO::PARAM_STR);
        $stmt->bindParam(":vaccine", $param_vaccine, PDO::PARAM_STR);

        // Set parameters
        $param_name = trim($_POST["name"]);
        $param_gender = trim($_POST["gender"]);
        $param_dob = trim($_POST["dob"]);
        $param_breed = trim($_POST["breed"]);
        $param_price = trim($_POST["price"]);
        $param_description = trim($_POST["description"]);
        $param_vaccine = trim($_POST["vaccine"]);

        // Set image array 
        $image = array();

        //loop through each file in the files[] array
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            //check if the file is uploaded
            if ($_FILES['image']['error'][$key] == 0) {
                //check if the file is an image
                if (is_uploaded_file($_FILES['image']['tmp_name'][$key])) {
                    //save the image in the images folder
                    $image_name = $_FILES['image']['name'][$key];
                    $image_tmp = $_FILES['image']['tmp_name'][$key];
                    $image_type = $_FILES['image']['type'][$key];
                    $image_size = $_FILES['image']['size'][$key];
                    $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
                    //set new name for image
                    $image_name = uniqid() . "." . $image_ext;
                    $image_path = "images/" . $image_name;
                    $image_db = $image_name;
                    $image[] = $image_db;
                    move_uploaded_file($image_tmp, $image_path);
                }
            }
        }

        // Set image array to string
        $param_image = implode(",", $image);  

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'เพิ่มแมวสำเร็จ',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = 'cat_shop.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'เพิ่มแมวไม่สำเร็จ',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = 'cat_shop.php';
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