<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit;
}

$username = $_SESSION['username'];
$password = isset($_SESSION['password']) ? $_SESSION['password'] : 'N/A'; 
$address = isset($_SESSION['address']) ? $_SESSION['address'] : 'N/A';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'N/A';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : 'N/A';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("Location: HOME.html");
  exit;
}
?>




<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <link href="PCE.css" rel="stylesheet">
  <link href="ASUM.css" rel="stylesheet">
  <title>TechCrate</title>
</head>

<body>

<!-- Start Header NEWS -->
<nav class="nsbar">
  <div class="container">
  <p class="newsn">Head to "Best Sellers" Page to view products on discount! </p>
  </div>
</nav>
<!-- END Header NEWS -->

<!-- Start Header/Navigation -->
<nav class="navbar">
  <div class="container">
    <ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="account.php">TechCrate</a></li>
      <li class="nav-item"><a class="nav-link" href="BS.html">Best Sellers</a></li>
      <li class="nav-item"><a class="nav-link" href="CS.html">Components</a></li>
      <li class="nav-item"><a class="nav-link" href="GG.html">Gaming Gears</a></li>
      <li class="nav-item"><a class="nav-link" href="MN.html">Monitors</a></li>

      <ul class="navbar-icons">
      <li class="nav-item"><a class="nav-link" href="Asummary.php"><img src="../PCWEB/IMG/user.png" alt="User"></a></li>
        <li class="nav-item"><a class="nav-link" href="Cart.php"><img src="../PCWEB/IMG/SB.png" alt="Cart"></a></li>
        <li class="nav-item"><a class="nav-link" href="Sp.html"><img src="../PCWEB/IMG/SP.png" alt="Support"></a></li>
      </ul>
    </ul>
   
  </div>
</nav>
<!-- End Header/Navigation -->



  <!-- Start Hero Section -->
  <div class="hero">
    <img src="../PCWEB/IMG/USR.jpg" alt="Hero Background">
    <div class="container">
      <div class="hero-content">
        <div class="hero-text">

        </div>
      </div>
    </div>
  </div>
  
  <!-- End Hero Section -->


 <!-- Start User Credentials Section -->
<<div class="user-credentials">
     <div class="container">
       <h2>User Credentials</h2>
       <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
       <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p> 
       <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
       <p><strong>Password:</strong> <?php echo htmlspecialchars($password); ?></p>
       <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
     </div>
     <!-- Logout Form -->
     <form method="post" class="logout-form">
        <button type="submit" name="logout" class="btn btn-primary">Logout</button>
      </form>
   </div>




   <!-- Start Footer Section -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-column">
        <h4>Contact</h4>
        <ul>
          <li><a href="#">Customer Support</a></li>
          <li><a href="#">Submit a Request</a></li>
          <li><a href="#">Support Center</a></li>
        </ul>
      </div>
  
      <div class="footer-column">
        <h4>About</h4>
        <ul>
          <li><a href="#">Company</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Customer Reviews</a></li>
        </ul>
      </div>
  
      <div class="footer-column">
        <h4>Community</h4>
        <ul>
          <li><a href="#">Our Discord</a></li>
          <li><a href="#">Newsroom & Blog</a></li>
        </ul>
      </div>
  
      <div class="footer-column">
        <h4>Account</h4>
        <ul>
          <li><a href="#">Manage Your Account</a></li>
        </ul>
      </div>
  
      <div class="footer-bottom">
        <p>&copy; 2024 Your Company. All Rights Reserved. <a href="#">Privacy Policy</a></p>
      </div>
    </div>
  </footer>
  
<!-- End Footer Section -->


</body>
</html>

