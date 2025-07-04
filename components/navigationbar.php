<?php 
$isAuthenticated = isset($_SESSION['user']); 
$currentPath = $_SERVER['REQUEST_URI']; 
function isActive($path) {     
    global $currentPath; 
    if ($path !== '/') { 
           return strpos($currentPath, $path) !== false ? 'active-link' : 'nav-link'; 
    } else { 
        return $currentPath === '/' ? 'active-link' : 'nav-link';  
    } 
}
?>

<!-- Font Awesome CDN for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: black;
    }

    nav {
        background: black;
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        padding: 16px 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 1000;
        min-height: 70px;
    }

    .nav-brand {
        font-size: 24px;
        font-weight: 700;
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .nav-brand:hover {
        transform: translateY(-2px);
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .nav-left,
    .nav-right {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nav-link,
    .active-link {
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 25px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 14px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        position: relative;
        overflow: hidden;
        border: 1px solid transparent;
        backdrop-filter: blur(10px);
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.9);
        background: rgba(255, 255, 255, 0.1);
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .active-link {
        background: linear-gradient(135deg, #ff6b6b, #ee5a24);
        color: white;
        box-shadow: 0 4px 15px rgba(238, 90, 36, 0.4);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .active-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(238, 90, 36, 0.5);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255, 255, 255, 0.15);
        padding: 10px 16px;
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }

    .user-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #ff9a9e, #fecfef);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 14px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .user-name {
        font-weight: 500;
        color: white;
        font-size: 14px;
    }

    .logout-btn {
        background: rgba(255, 107, 107, 0.2);
        color: white;
        border: 1px solid rgba(255, 107, 107, 0.3);
    }

    .logout-btn:hover {
        background: rgba(255, 107, 107, 0.3);
        border-color: rgba(255, 107, 107, 0.5);
    }

    .mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .mobile-menu-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Mobile Styles */
    @media (max-width: 768px) {
        nav {
            padding: 16px 20px;
            flex-wrap: wrap;
        }

        .mobile-menu-toggle {
            display: block;
        }

        .nav-links {
            display: none;
            width: 100%;
            flex-direction: column;
            gap: 12px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-links.active {
            display: flex;
        }

        .nav-left,
        .nav-right {
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
            width: 100%;
        }

        .nav-link,
        .active-link {
            justify-content: center;
            width: 100%;
        }

        .user-info {
            justify-content: center;
            width: 100%;
        }
    }

    /* Animations */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .nav-link,
    .active-link {
        animation: slideIn 0.3s ease forwards;
    }

    .nav-link:nth-child(1) { animation-delay: 0.1s; }
    .nav-link:nth-child(2) { animation-delay: 0.2s; }
    .nav-link:nth-child(3) { animation-delay: 0.3s; }
    .nav-link:nth-child(4) { animation-delay: 0.4s; }
</style>

<nav>
    <a href="/" class="nav-brand">
        <i class="fas fa-rocket"></i>
        StudentHub
    </a>
    
    <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="nav-links" id="navLinks">
        <div class="nav-left">
            <a href="/" class="<?php echo isActive('/'); ?>">
                <i class="fas fa-home"></i> Home
            </a>
            <?php if ($isAuthenticated): ?>
                <a href="/profile" class="<?php echo isActive('/profile'); ?>">
                    <i class="fas fa-user"></i> Profile
                </a>
                <a href="/contact" class="<?php echo isActive('/contact'); ?>">
                    <i class="fas fa-envelope"></i> Contact
                </a>
            <?php endif; ?>
        </div>

        <div class="nav-right">
            <?php if ($isAuthenticated): ?>
                <div class="user-info">
                    <div class="user-avatar">
                        <?= strtoupper(substr($_SESSION['name'], 0, 1)) ?>
                    </div>
                    <span class="user-name">
                        <?= htmlspecialchars($_SESSION['name']) ?>
                    </span>
                </div>
                <a href="/../services/logout.php" class="nav-link logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            <?php else: ?>
                <a href="/login" class="<?php echo isActive('/login'); ?>">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <a href="/register" class="<?php echo isActive('/register'); ?>">
                    <i class="fas fa-user-plus"></i> Register
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const navLinks = document.getElementById('navLinks');
        const toggle = document.querySelector('.mobile-menu-toggle i');
        
        navLinks.classList.toggle('active');
        
        if (navLinks.classList.contains('active')) {
            toggle.classList.remove('fa-bars');
            toggle.classList.add('fa-times');
        } else {
            toggle.classList.remove('fa-times');
            toggle.classList.add('fa-bars');
        }
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const nav = document.querySelector('nav');
        const navLinks = document.getElementById('navLinks');
        const toggle = document.querySelector('.mobile-menu-toggle');
        
        if (!nav.contains(event.target) && navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
            toggle.querySelector('i').classList.remove('fa-times');
            toggle.querySelector('i').classList.add('fa-bars');
        }
    });

    // Add smooth scrolling effect
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>