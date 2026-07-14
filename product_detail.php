<?php include 'header.php'; ?>

<?php
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE product_id = $id"));
?>

<h2><?php echo $row['name']; ?></h2>
<p><b>$<?php echo $row['price']; ?></b></p>
<p><?php echo $row['description']; ?></p>
<p>Stock: <?php echo $row['stock_quantity']; ?></p>

<?php if (isset($_SESSION['customer_id']) && $row['stock_quantity'] > 0): ?>
    <form method="POST" action="add_to_cart.php">
        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
        Qty: <input type="number" name="quantity" value="1" min="1" max="<?php echo $row['stock_quantity']; ?>" style="width:50px;">
        <input type="submit" value="Add to Cart">
    </form>
<?php endif; ?>

<p><a href="products.php">Back to Products</a></p>

</body>
</html>
