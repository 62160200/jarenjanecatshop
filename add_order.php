<?php
include "layout.php";


if (isset($_POST["cart_id"]) && isset($_POST["count"]) && isset($_POST["total"]) && isset($_POST["shipping"]) && isset($_POST["val"]) && isset($_POST["all"])) {

    // Prepare an insert statement
    $sql = "INSERT INTO orders (CartID,UserID, OrderDate,Count, Shipping,Val,TotalAmount, TotalAll,Status) VALUES (:cart_id,:user_id, :order_date,:count, :shipping,:val,:total,:all,:status)";

    if ($stmt = $pdo->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":cart_id", $param_cart_id, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $param_user_id, PDO::PARAM_STR);
        $stmt->bindParam(":order_date", $param_order_date, PDO::PARAM_STR);
        $stmt->bindParam(":count", $param_count, PDO::PARAM_STR);
        $stmt->bindParam(":total", $param_total, PDO::PARAM_STR);
        $stmt->bindParam(":shipping", $param_shipping, PDO::PARAM_STR);
        $stmt->bindParam(":val", $param_val, PDO::PARAM_STR);
        $stmt->bindParam(":all", $param_all, PDO::PARAM_STR);
        $stmt->bindParam(":status", $param_status, PDO::PARAM_STR);

        // Set parameters
        $param_cart_id = trim($_POST["cart_id"]);
        $param_user_id = $_SESSION["user_id"];
        $param_order_date = date("Y-m-d");
        $param_count = $_POST["count"];
        $param_total = trim($_POST["total"]);
        $param_shipping = trim($_POST["shipping"]);
        $param_val = trim($_POST["val"]);
        $param_all = trim($_POST["all"]);
        $param_status = "processing";

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Prepare an update cart status statement
            $sql = "UPDATE carts SET CartStatus = 1 WHERE CartID = :cart_id AND UserID = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user_id", $param_user_id, PDO::PARAM_STR);
            $stmt->bindParam(":cart_id", $param_cart_id, PDO::PARAM_STR);
            $param_user_id = $_SESSION["user_id"];
            $param_cart_id = trim($_POST["cart_id"]);
            $stmt->execute();
            

            //get order id and redirect to payment page
            $sql = "SELECT * FROM orders WHERE CartID = :cart_id AND UserID = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user_id", $param_user_id, PDO::PARAM_STR);
            $stmt->bindParam(":cart_id", $param_cart_id, PDO::PARAM_STR);
            $param_user_id = $_SESSION["user_id"];
            $param_cart_id = trim($_POST["cart_id"]);
            $stmt->execute();
            $row = $stmt->fetch();
            $order_id = $row["OrderID"];
            echo "  <script>
                        window.location = 'payment.php?order_id=$order_id';
                    </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                }).then(function() {
                    window.location = 'cat_cart.php';
                });
            </script>";
        }

        // Close statement
        unset($stmt);
    }
}