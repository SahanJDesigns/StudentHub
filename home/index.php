<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>StudentHub - Your Academic Journey Starts Here</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <!-- Navigation Bar -->
    <?php include './../components/navigationbar.php'; ?>
    <div class="container">
        <!-- Hero Section -->
        <section class="hero">
            <h1 class="hero-title">
                Welcome to <span class="highlight">StudentHub</span>
            </h1>
            <p class="hero-subtitle">
                Your comprehensive platform for student management, communication, and academic success. 
                Connect, learn, and grow with our integrated suite of tools.
            </p>
            <?php if (!isset($_SESSION['user'])): ?>
            <div class="button-group">
                <a href="/register" class="btn">
                    <i class="fas fa-rocket"></i>
                    Get Started
                </a>
                <a href="/login" class="btn secondary">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </a>
            </div>
            <?php else: ?>
            <div class="button-group">
                <a href="/contact" class="btn">
                    <i class="fas fa-rocket"></i>
                    Contact Us
                </a>
                <a href="/profile" class="btn secondary">
                    <i class="fas fa-sign-in-alt"></i>
                    Profile
                </a>
            </div>
            <?php endif; ?>
            <div id="auth-actions"></div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <h2 class="section-title">Why Choose StudentHub?</h2>
            <p class="section-subtitle">
                Discover the features that make our platform the perfect choice for students and educators alike.
            </p>
            <div class="features-grid">
                <div class="feature-box">
                    <div class="icon users-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>User Management</h3>
                    <p>
                        Comprehensive user registration, authentication, and profile management system with secure session handling.
                    </p>
                </div>
                <div class="feature-box">
                    <div class="icon shield-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Secure & Protected</h3>
                    <p>
                        Advanced form validation, protected routes, and secure data handling to keep your information safe.
                    </p>
                </div>
                <div class="feature-box">
                    <div class="icon zap-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Modern Interface</h3>
                    <p>
                        Responsive design, smooth animations, and intuitive user experience across all devices.
                    </p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats">
            <div class="stat">
                <span class="value blue">100%</span>
                Responsive Design
            </div>
            <div class="stat">
                <span class="value green">24/7</span>
                Session Management
            </div>
            <div class="stat">
                <span class="value purple">Advanced</span>
                Form Validation
            </div>
            <div class="stat">
                <span class="value orange">Modern</span>
                UI/UX Design
            </div>
        </section>

        <!-- CTA Section -->
        <?php if (!isset($_SESSION['user'])): ?>
        <section class="cta">
            <h2 class="cta-title">Ready to Get Started?</h2>
            <p class="cta-subtitle">
                Join thousands of students who trust StudentHub for their academic journey.
            </p>
            <div>
                <a href="/register" class="btn">
                    <i class="fas fa-arrow-right"></i>
                    Sign Up Now
                </a>
            </div>
            <div id="cta-button"></div>
        </section>
        <?php endif; ?>
    </div>

    <script src="script.js"></script>
</body>
</html>