<?php
$servername = "sql202.infinityfree.com";
$username   = "if0_39375461";
$password   = "20cec56dEOU";  
$database   = "if0_39375461_wavecode";

// Connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if (password_verify($pass, $row['password'])) {
    echo "<h2>✅ Login successful!</h2>";
    echo "<p>Welcome back, <strong>" . $row['name'] . "</strong>!</p>";
    echo "<p>Your course: <strong>" . $row['course'] . "</strong></p>";
    echo "<a href='index.html'>Back to Home</a>";
  } else {
    echo "❌ Incorrect password.";
  }
} else {
  echo "❌ Email not found.";
}

$conn->close();
?>