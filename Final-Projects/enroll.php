<?php
include 'db.php';

$user_id    = $_POST['user_id'];
$course     = $_POST['course'];

$sql = "INSERT INTO enrollments (user_id, course_name) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $user_id, $course);

if ($stmt->execute()) {
  echo "success";
} else {
  echo "error";
}

$stmt->close();
$conn->close();
?>