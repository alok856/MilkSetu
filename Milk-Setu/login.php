<?php
// login.php

// Database connection (update these values)
$host = "sql311.infinityfree.com";
$user = "if0_39390568";
$password = "1dH1mjdhgOXL";
$dbname = "if0_39390568_milksetu";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// Check user
$sql = "SELECT * FROM users WHERE email='$email' AND role='$role'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  
  if (password_verify($password, $row['password'])) {
    echo "Login successful! Welcome, " . $row['name'] . " (" . $row['role'] . ")";
  } else {
    echo "Invalid password.";
  }
} else {
  echo "User not found or role does not match.";
}

$conn->close();
?>