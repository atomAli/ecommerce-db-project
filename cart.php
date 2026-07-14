<?php include 'header.php'; ?>

<h2>Cart</h2>

<?php
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Cart is empty!</p>";
} else {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Product</th><th>Price</th><th>Qty</th><th>Total</th><th></th></tr>";
    
    $total = 0;
    foreach ($_SESSION['cart'] as $pid => $qty) {
        $p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE product_id = $pid"));
        $sub = $p['price'] * $qty;
        $total += $sub;
        echo "<tr>";
        echo "<td>" . $p['name'] . "</td>";
        echo "<td>$" . $p['price'] . "</td>";
        echo "<td>" . $qty . "</td>";
        echo "<td>$" . $sub . "</td>";
        echo "<td><form method='POST' action='remove_from_cart.php' style='display:inline;'>
            <input type='hidden' name='product_id' value='$pid'>
            <input type='submit' value='X'>
        </form></td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='3'><b>Total</b></td><td><b>$" . $total . "</b></td><td></td></tr>";
    echo "</table>";
    
    echo "<br><form method='POST' action='place_order.php'>";
    echo "<h3>Payment Method</h3>";
    echo "<select name='payment_method'>";
    echo "<option value='credit_card'>Credit Card</option>";
    echo "<option value='cash_on_delivery'>Cash on Delivery</option>";
    echo "</select>";
    echo "<br><br>";
    echo "<input type='submit' value='Place Order'>";
    echo "</form>";
}
echo " | <a href='products.php'>Continue Shopping</a>";

include 'footer.php';
?>
