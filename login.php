<?php include 'header.php'; ?>

<h2>Login</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['customer_id'] = $user['customer_id'];
            $_SESSION['name'] = $user['name'];
            echo "<p>Login successful!</p>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        } else {
            echo "<p style='color:red;'>Wrong password!</p>";
        }
    } else {
        echo "<p style='color:red;'>Email not found!</p>";
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

<p>No account? <a href="register.php">Register</a></p>

</body>
</html>
