<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];
$address_id = $_POST['address_id'];
$payment_method = $_POST['payment_method'];

$total = 0;
foreach ($_SESSION['cart'] as $pid => $qty) {
    $result = mysqli_query($conn, "SELECT price FROM product WHERE product_id = $pid");
    $p = mysqli_fetch_assoc($result);
    $total += $p['price'] * $qty;
}

mysqli_query($conn, "INSERT INTO orders (customer_id, address_id, total_amount, status) 
                     VALUES ($customer_id, $address_id, $total, 'pending')");
$order_id = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $pid => $qty) {
    $result = mysqli_query($conn, "SELECT price FROM product WHERE product_id = $pid");
    $p = mysqli_fetch_assoc($result);
    mysqli_query($conn, "INSERT INTO order_item (order_id, product_id, quantity, unit_price) 
                         VALUES ($order_id, $pid, $qty, " . $p['price'] . ")");
    mysqli_query($conn, "UPDATE product SET stock_quantity = stock_quantity - $qty WHERE product_id = $pid");
}

mysqli_query($conn, "INSERT INTO payment (order_id, amount, payment_method, status) 
                     VALUES ($order_id, $total, '$payment_method', 'completed')");

unset($_SESSION['cart']);

echo "<h2>Order #$order_id Placed!</h2>";
echo "<p>Total: $$total</p>";
echo "<a href='orders.php'>View Orders</a>";
?>
