<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Store</title></head>
<body>
<h2>My Store</h2>
<a href="index.php">Home</a> |
<a href="products.php">Products</a> |
<a href="cart.php">Cart</a> |
<?php if (isset($_SESSION['customer_id'])): ?>
    <?php echo $_SESSION['name']; ?> |
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login</a> |
    <a href="register.php">Register</a>
<?php endif; ?>
<hr>

