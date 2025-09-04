<?php
// signup.php

// Database connection (update these values)
$host = "sql311.infinityfree.com";
$user = "if0_39390568";
$password = "1dH1mjdhgOXL";
$dbname = "if0_39390568_milksetu";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$phone = $_POST['phone'];
$address = $_POST['address'];
$role = $_POST['role'];

// Check if email already exists
$sql_check = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql_check);
if ($result->num_rows > 0) {
  echo "Email already registered. Please login.";
  exit;
}

// Insert data
$sql = "INSERT INTO users (name, email, password, phone, address, role)
        VALUES ('$name', '$email', '$password', '$phone', '$address', '$role')";

if ($conn->query($sql) === TRUE) {
  echo "Registration successful. You can now login.";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>