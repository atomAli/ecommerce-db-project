<?php include 'header.php'; ?>

<h2>Checkout</h2>

<?php
$customer_id = $_SESSION['customer_id'];
$addresses = mysqli_query($conn, "SELECT * FROM address WHERE customer_id = $customer_id");
?>

<form method="POST" action="place_order.php">
    <h3>Address</h3>
    <?php while ($addr = mysqli_fetch_assoc($addresses)): ?>
        <input type="radio" name="address_id" value="<?php echo $addr['address_id']; ?>"
            <?php echo $addr['is_default'] ? 'checked' : ''; ?>>
        <?php echo $addr['address_line1'] . ", " . $addr['city']; ?><br>
    <?php endwhile; ?>
    
    <h3>Payment</h3>
    <select name="payment_method">
        <option value="credit_card">Credit Card</option>
        <option value="cash_on_delivery">Cash on Delivery</option>
    </select>
    <br><br>
    <input type="submit" value="Place Order">
</form>

<?php include 'footer.php'; ?>
