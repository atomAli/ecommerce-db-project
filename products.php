<?php include 'header.php'; ?>

<h2>Products</h2>

<form method="GET" action="products.php">
    <select name="category">
        <option value="">All</option>
        <?php
        $cats = mysqli_query($conn, "SELECT * FROM category");
        while ($c = mysqli_fetch_assoc($cats)) {
            $sel = (isset($_GET['category']) && $_GET['category'] == $c['category_id']) ? "selected" : "";
            echo "<option value='" . $c['category_id'] . "' " . $sel . ">" . $c['name'] . "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Filter">
</form>
<br>

<?php
$sql = "SELECT * FROM product WHERE 1=1";
if (!empty($_GET['category'])) {
    $sql .= " AND category_id = " . $_GET['category'];
}
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px; display:inline-block; width:180px;'>";
    echo "<h4>" . $row['name'] . "</h4>";
    echo "<p>$" . $row['price'] . "</p>";
    echo "<p>Stock: " . $row['stock_quantity'] . "</p>";
    echo "<a href='product_detail.php?id=" . $row['product_id'] . "'>View</a>";
    if (isset($_SESSION['customer_id']) && $row['stock_quantity'] > 0) {
        echo " | <form method='POST' action='add_to_cart.php' style='display:inline;'>
            <input type='hidden' name='product_id' value='" . $row['product_id'] . "'>
            <input type='submit' value='Add'>
        </form>";
    }
    echo "</div>";
}

?>

</body>
</html>