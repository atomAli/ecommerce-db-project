<?php
session_start();
if (isset($_SESSION['cart'][$_POST['product_id']])) {
    unset($_SESSION['cart'][$_POST['product_id']]);
}
header("Location: cart.php");
?>
