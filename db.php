<?php
$conn = mysqli_connect("localhost", "root", "", "ecommerce_db");
if (!$conn) { die("Connection failed"); }
session_start();
?>
