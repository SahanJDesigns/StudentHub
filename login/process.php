<?php
session_start();
require_once './../services/db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        header('Location: login.php?error=empty');
        exit;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT id,full_name, password, created_at FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($userId, $full_name, $hashedPassword, $created_at);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user'] = $userId;
            $_SESSION['name'] = $full_name;
            $_SESSION['email'] = $email;
            $_SESSION['regdate'] = $created_at;
            $_SESSION['last_login'] = date('Y-m-d H:i:s');

            header('Location: /home');
            exit;
        } else {
            header('Location: /login?error=invalid password');
            exit;
        }
    } else {
        header('Location: /login?error=User notfound');
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: /login?error=method');
    exit;
}

