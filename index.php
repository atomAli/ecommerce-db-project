<?php include 'header.php'; ?>

<h2>Welcome</h2>

<?php
$result = mysqli_query($conn, "SELECT * FROM product ORDER BY product_id DESC LIMIT 4");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px; display:inline-block; width:180px;'>";
    echo "<h4>" . $row['name'] . "</h4>";
    echo "<p>$" . $row['price'] . "</p>";
    echo "<a href='product_detail.php?id=" . $row['product_id'] . "'>View</a>";
    echo "</div>";
}
?>

<p><a href='products.php'>See All Products</a></p>

</body>
</html>
