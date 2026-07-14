<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];

$total = 0;
foreach ($_SESSION['cart'] as $pid => $qty) {
    $result = mysqli_query($conn, "SELECT price FROM product WHERE product_id = $pid");
    $p = mysqli_fetch_assoc($result);
    $total += $p['price'] * $qty;
}

mysqli_query($conn, "INSERT INTO orders (customer_id, order_date, status, total_amount) 
                     VALUES ($customer_id, NOW(), 'completed', $total)");
$order_id = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $pid => $qty) {
    $result = mysqli_query($conn, "SELECT price FROM product WHERE product_id = $pid");
    $p = mysqli_fetch_assoc($result);
    mysqli_query($conn, "INSERT INTO order_item (order_id, product_id, quantity, unit_price) 
                         VALUES ($order_id, $pid, $qty, " . $p['price'] . ")");
    mysqli_query($conn, "UPDATE product SET stock_quantity = stock_quantity - $qty WHERE product_id = $pid");
}

unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head><title>Success</title></head>
<body>
<h2>Purchase Successful!</h2>
<p>Thank you for your order.</p>
<p><a href="index.php">Back to Home</a></p>
</body>
</html>
