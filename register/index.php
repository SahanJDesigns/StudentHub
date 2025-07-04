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
            <div class="header">
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h2>Create your account</h2>
                <p>Join StudentHub and start your journey</p>
            </div>
           <form id="registerForm" action="process.php" method="POST">
        
        <div class="form-group">
          <label for="name">
            <i class="fas fa-user"></i> Full Name
          </label>
          <input type="text" id="name" name="name" placeholder="Enter your full name" required />
          <small class="error show" id="nameError"></small>
        </div>
        
        <div class="form-group">
          <label for="email">
            <i class="fas fa-envelope"></i> Email Address
          </label>
          <input type="email" id="email" name="email" placeholder="Enter your email address" required />
          <small class="error show" id="emailError"></small>
        </div>
        
        <div class="form-group">
            <label for="password">
          <i class="fas fa-key"></i> Password
            </label>
            <div class="password-container">
          <input type="password" id="password" name="password" placeholder="Create a password" required />
          
          <span id="togglePassword" class="toggle-password">
              <i class="fas fa-eye"></i>
          </span>
            </div>
            <small class="error show" id="passwordError"></small>
        </div>

           
        <div class="form-group">
            <label for="confirmPassword">
          <i class="fas fa-key"></i> Confirm Password
            </label>
            <div class="password-container">
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required />
          <span id="togglePassword" class="toggle-password">
              <i class="fas fa-eye"></i>
          </span>
            </div>
            <small class="error show" id="confirmPasswordError"></small>
        </div>
        
        <button type="submit" class="submit-btn">Create Account</button>
        <div id="formMessage"></div>
      </form>
       <p class="register-link">
                    Already have an account? <a href="/login">Login here</a>
        </p>
        </div>
    </div>

    <?php
    $errorMsg = '';
    if (isset($_GET['error'])) {
        $errorType = $_GET['error'];
        if ($errorType === 'email_exists') {
            $errorMsg = 'An account with this email already exists.';
        } elseif ($errorType === 'db') {
            $errorMsg = 'A database error occurred. Please try again.';
        } elseif ($errorType === 'invalid_email') {
            $errorMsg = 'Invalid email format.';
        } elseif ($errorType === 'password_mismatch') {
            $errorMsg = 'Passwords do not match.';
        } else {
            $errorMsg = 'An unknown error occurred.';
        }
    }
    if ($errorMsg) {
        echo '<div class="server-error">' . htmlspecialchars($errorMsg) . '</div>';
    }
    ?>

    <script src="script.js"></script>
</body>
</html>