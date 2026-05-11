<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'obihacto', 3308);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email    = trim($_POST['email']);

    $check = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('❌ Username already exists! Choose another.');</script>";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, 'member')");
        $stmt->bind_param("sss", $username, $hashedPassword, $email);

        if ($stmt->execute()) {
            echo "<script>alert('✅ Registration successful! Please login now.'); window.location.href='login2.php';</script>";
        } else {
            echo "<script>alert('❌ Failed to register. Please try again later.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | CTO</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="navbar">
    <div class="logo">CTO</div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="viewpost.php">View Post</a></li>
        <li><a href="register2.php">Register</a></li>
        <li><a href="login2.php">Login</a></li>
      </ul>
    </nav>
  </div>

  <div class="register-container">
    <h2>Join the CTO Community</h2>
    <form action="register2.php" method="post">
      <label>Username:</label>
      <input type="text" name="username" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <button type="submit">Register</button>
    </form>
  </div>

  <footer>
    <div class="footer-container">
      <div class="footer-section">
      <h3>Quick Links</h3>
  <p><a href="contact.php">Contact Us</a></p>
  <p><a href="about.php">About Us</a></p>
  <p><a href="location.php">Location</a></p>
  <p><a href="viewpost.php">View Posts</a></p>
  <p><a href="index.php">Home</a></p>
</div>
        <div class="footer-section">
        <h3>About CTO</h3>
        <p>Dedicated to preserving bird life and restoring natural habitats across Central regions.</p>
      </div>
      
      <div class="footer-section">
        <h3>Contact Us</h3>
        <p>Email: <a href="mailto:contact.obiha@cto.org">contact.obiha@cto.org</a></p>
        <p>Phone: <a href="tel:+97 398734562">+97 398734562</a></p>
      </div>
      <div class="footer-section">
        <h3>Location</h3>
        <p>240 Evergreen Trail Road, Highland Eco Region, New Zealand</p>
      </div>
    </div>
    <div class="footer-bottom">
      © 2025 Centrala Trust for Ornithology | All Rights Reserved | Developed by Obiha
    </div>
  </footer>
</body>
</html>
