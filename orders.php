<?php include 'header.php'; ?>

<h2>My Orders</h2>

<?php
$customer_id = $_SESSION['customer_id'];
$result = mysqli_query($conn, "SELECT o.*, a.address_line1, a.city FROM orders o 
                               JOIN address a ON o.address_id = a.address_id 
                               WHERE o.customer_id = $customer_id ORDER BY o.order_id DESC");

if (mysqli_num_rows($result) == 0) {
    echo "<p>No orders.</p>";
} else {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Order</th><th>Date</th><th>Status</th><th>Total</th><th>Address</th></tr>";
    while ($o = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>#" . $o['order_id'] . "</td>";
        echo "<td>" . $o['order_date'] . "</td>";
        echo "<td>" . ucfirst($o['status']) . "</td>";
        echo "<td>$" . $o['total_amount'] . "</td>";
        echo "<td>" . $o['address_line1'] . ", " . $o['city'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

<?php include 'footer.php'; ?>
