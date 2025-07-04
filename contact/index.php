<?php session_start(); 
if (!isset($_SESSION['user'])) {
  header('Location: /login');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - StudentHub</title>
  <link rel="stylesheet" href="contact.css" />
</head>
<body>
  <!-- Navigation Bar -->
   <?php include './../components/navigationbar.php'; ?>
  <div class="bg-animation"></div>
  <div class="container">
    <div class="contact-container">
      <form id="contactForm" action="process.php" method="POST">
        <div class="form-group">
        <input type="text" name="name" placeholder="Full Name" value="<?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?>" required />
        </div>
        
        <div class="form-group">
        <input type="email" name="email" placeholder="Email Address" value="<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>" required />
        </div>
        
        <div class="form-group">
          <input type="text" name="subject" placeholder="Subject" required />
        </div>
        
        <div class="form-group">
          <textarea name="message" placeholder="Your Message..." required></textarea>
        </div>
        
        <div class="rating">
          <label>Rate Your Experience:</label>
          <div class="stars" id="stars">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
          </div>
        </div>
        
        <input type="hidden" name="rating" id="rating" value="0" />
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user']); ?>" />
        <button type="submit" class="submit-btn">Send Message</button>
      </form>
      
      <div id="response" class="response"></div>
    </div>
  </div>

  <script src="contact.js"></script>
</body>
</html>