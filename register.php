<?php include 'header.php'; ?>

<h2>Register</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $check = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<p style='color:red;'>Email already exists!</p>";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO customer (first_name, last_name, email, password_hash) VALUES ('$name', '', '$email', '$hash')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Registered! <a href='login.php'>Login now</a></p>";
        }
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Register">
</form>

<p>Already have account? <a href="login.php">Login</a></p>

<?php include 'footer.php'; ?>
