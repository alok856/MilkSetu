<?php
include 'db.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  if (password_verify($password, $row['password'])) {
    echo json_encode([
      "status" => "success",
      "name" => $row['name'],
      "user_id" => $row['id']
    ]);
  } else {
    echo json_encode(["status" => "invalid"]);
  }
} else {
  echo json_encode(["status" => "notfound"]);
}

$stmt->close();
$conn->close();
?>