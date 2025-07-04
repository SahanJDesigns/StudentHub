<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Profile - StudentHub</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300
  ;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Navigation Bar -->
  <?php include './../components/navigationbar.php'; ?>
  <div class="bg-animation"></div>
  <div class="container">

    <div class="grid">
      <!-- Profile Card -->
      <div class="profile-card">
        <div class="profile-header">
          <div class="icon-wrapper">
            <div class="user-icon">👤</div>
          </div>
          <div class="user-details">
            <h2><?php echo htmlspecialchars($_SESSION['name']); ?></h2>
            <p><?php echo htmlspecialchars($_SESSION['email']); ?></p>
          </div>
        </div>
        <div class="profile-info">
          <h3>Account Information</h3>
            <div class="info-block">
            <strong>Email Address:</strong>
            <span><?php echo htmlspecialchars($_SESSION['email']); ?></span>
            </div>
            <div class="info-block">
            <strong>Full Name:</strong>
            <span><?php echo htmlspecialchars($_SESSION['name']); ?></span>
            </div>
          <div class="info-block">
            <strong>Registration Date:</strong>
            <span>
            <span>
              <?php echo isset($_SESSION['regdate']) && $_SESSION['regdate'] ? date('F j, Y, g:i A', strtotime($_SESSION['regdate'])) : 'Not available'; ?>
            </span>

            </span>
          </div>
          <div class="info-block">
            <strong>Account Status:</strong>
            <span class="status active">Active</span>
          </div>
        </div>
      </div>

      <!-- Quick Stats + Session + Completion -->
      <div class="stats-wrapper">
        <div class="card">
          <h3>Quick Stats</h3>
          <div class="stat-row">
            <span>Account Age</span>
            <span>
              <?php
                if (isset($_SESSION['regdate']) && $_SESSION['regdate']) {
                  $regDate = new DateTime($_SESSION['regdate']);
                  $now = new DateTime();
                  $interval = $regDate->diff($now);
                  echo $interval->days . ' days';
                } else {
                  echo 'Unknown';
                }
              ?>
            </span>
          </div>
          <div class="stat-row">
            <span>Profile Status</span>
            <span class="text-green">Complete</span>
          </div>
          <div class="stat-row">
            <span>Security Level</span>
            <span class="text-blue">High</span>
          </div>
        </div>

        <div class="card">
          <h3>Session Information</h3>
          <div class="session-row">
            <span>Last Login:</span>
            <span>
              <?php
                if (isset($_SESSION['last_login']) && $_SESSION['last_login']) {
                  echo date('F j, Y, g:i A', strtotime($_SESSION['last_login']));
                } else {
                  echo date('F j, Y, g:i A');
                }
              ?>
            </span>
          </div>
          <div class="session-row">
            <span>Session Status:</span>
            <span class="status active">Active</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>