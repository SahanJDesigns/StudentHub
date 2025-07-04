<?php
require_once '../services/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = htmlspecialchars(trim($_POST["user_id"] ?? ''));
    $name    = htmlspecialchars(trim($_POST["name"] ?? ''));
    $email   = htmlspecialchars(trim($_POST["email"] ?? ''));
    $subject = htmlspecialchars(trim($_POST["subject"] ?? ''));
    $message = htmlspecialchars(trim($_POST["message"] ?? ''));
    $rating  = intval($_POST["rating"] ?? 0);

    if (!$name|| !$userId || !$email || !$subject || !$message || $rating < 1 || $rating > 5) {
        echo "All fields are required and rating must be between 1-5.";
        exit;
    }
  

    if ($conn->connect_error) {
        echo "Database connection failed: " . $conn->connect_error;
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO messages (user_id, name, email, subject, message, rating, submitted_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
    }
    $submitted_at = date("Y-m-d H:i:s");

    $stmt->bind_param(
        "sssssis",
        $userId,
        $name,
        $email,
        $subject,
        $message,
        $rating,
        $submitted_at
    );

    if ($stmt->execute()) {
        echo "Message submitted successfully!";
    } else {
        echo "Failed to save message: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
