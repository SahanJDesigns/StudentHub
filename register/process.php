<?php
// Database registration

require_once '../services/db.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        header('Location: index.php?error=password_mismatch');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.php?error=invalid_email');
        exit;
    }

    // Check if email already exists
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();
    if ($checkStmt->num_rows > 0) {
        $checkStmt->close();
        header('Location: index.php?error=email_exists');
        exit;
    }
    $checkStmt->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, created_at) VALUES (?, ?, ?, NOW())");
    if (!$stmt) {
        header('Location: index.php?error=db');
        exit;
    }
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['user'] = $conn->insert_id;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['regdate'] = date('Y-m-d H:i:s');
        $_SESSION['last_login'] = date('Y-m-d H:i:s');
        header("Location: /");
        exit;
    } else {
        header('Location: index.php?error=db');
        exit;
    }

    $stmt->close();
    $conn->close();
}
