<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += $quantity;
} else {
    $_SESSION['cart'][$product_id] = $quantity;
}

header("Location: cart.php");
?>
