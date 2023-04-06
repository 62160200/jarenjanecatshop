<?php

include 'layout.php';
// Include config file
require_once "config/db.php";

    $order_id = $_POST['order_id'];
    // Prepare an insert statement
    $sql = "INSERT INTO payments (OrderID, firstname, lastname, bank, transfer_amount,payment_date, slip_image) VALUES (:OrderID, :firstname, :lastname, :bank, :transfer_amount, :payment_date, :slip_image)";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":OrderID", $param_OrderID, PDO::PARAM_STR);
        $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
        $stmt->bindParam(":bank", $param_bank, PDO::PARAM_STR);
        $stmt->bindParam(":transfer_amount", $param_transfer_amount, PDO::PARAM_STR);
        $stmt->bindParam(":payment_date", $param_payment_date, PDO::PARAM_STR);
        $stmt->bindParam(":slip_image", $param_slip_iamge, PDO::PARAM_STR);

        // Set parameters
        $param_OrderID = $order_id;
        $param_firstname = $_POST['firstname'];
        $param_lastname = $_POST['lastname'];
        $param_bank = $_POST['bank'];
        $param_transfer_amount = $_POST['transfer_amount'];
        $param_payment_date = date("Y-m-d");

        $image_name = $_FILES['slip_image']['name'];
        $image_tmp = $_FILES['slip_image']['tmp_name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        //set new name for iamge
        $new_name = $order_id . '_' . date("YmdHis") . '.' . $image_ext;
        //set path for iamge
        $path = "slip/" . $new_name;
        $image = $new_name;
        $param_slip_iamge = $image;
        //upload iamge
        move_uploaded_file($image_tmp, $path);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $sql = "UPDATE orders SET Status = 'succeeded' WHERE OrderID = '$order_id'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            //get payment id from database to use in success_payment.php
            $sql = "SELECT * FROM payments WHERE OrderID = '$order_id'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $payment_id = $row['PaymentID'];
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: 'รอการตรวจสอบจากเจ้าหน้าที่',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'success_payment.php?payment_id=$payment_id';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'กรุณาลองใหม่อีกครั้ง',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'payment.php?order_id=$order_id';
            });
            </script>";
        }
    }
    // Close statement
    unset($stmt);

// Close connection
unset($pdo);