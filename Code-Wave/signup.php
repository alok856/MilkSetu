<?php
$servername = "sql202.infinityfree.com";
$username   = "if0_39375461";
$password   = "20cec56dEOU";  
$database   = "if0_39375461_wavecode";

// Connection (corrected here 👇)
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$course = $_POST['course'];

// Insert
$sql = "INSERT INTO users (name, email, password, mobile, address, course)
        VALUES ('$name', '$email', '$pass', '$mobile', '$address', '$course')";

if ($conn->query($sql) === TRUE) {
  echo "<h2>✅ Signup successful!</h2>";
  echo "<p>Hi <strong>$name</strong>! Your selected course: <strong>$course</strong></p>";
  echo "<a href='index.html'>Back to Home</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>