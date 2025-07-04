<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - StudentHub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <!-- Navigation Bar -->
    <?php include './../components/navigationbar.php'; ?>
    <div class="container">
        <div class="card">
            <?php
            $errorMsg = '';
            if (isset($_GET['error'])) {
                $errorType = $_GET['error'];
                if ($errorType === 'empty') {
                    $errorMsg = 'Please fill in both email and password.';
                } elseif ($errorType === 'invalid password') {
                    $errorMsg = 'Incorrect password. Please try again.';
                } elseif ($errorType === 'User notfound') {
                    $errorMsg = 'No account found with that email.';
                } elseif ($errorType === 'method') {
                    $errorMsg = 'Invalid request method.';
                } else {
                    $errorMsg = 'An unknown error occurred.';
                }
            }
            if ($errorMsg) {
                echo '<div class="server-error">' . htmlspecialchars($errorMsg) . '</div>';
            }
            ?>
            <div class="header">
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h2>Sign in to your account</h2>
                <p>Welcome back to StudentHub</p>
            </div>
            <form id="loginForm" action="process.php" method="POST">
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Email Address
                    </label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required />
                    <p class="error" id="emailError"></p>
                </div>
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-key"></i> Password
                    </label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required />
                        <span id="togglePassword" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <p class="error" id="passwordError"></p>
                </div>
                <button type="submit" id="submitBtn">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
                <p class="register-link">
                    Don't have an account? <a href="/register">Create one here</a>
                </p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>