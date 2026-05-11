<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'obihacto',3308);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $selectedRole = trim($_POST['role']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $selectedRole);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admindashboard.php");
            } else {
                header("Location: memberdashboard2.php");
            }
            exit();
        } else {
            echo "❌ Incorrect password.";
        }
    } else {
        echo "❌ No user found with this username and role.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | CTO</title>
  <link rel="stylesheet" href="style.css">
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

  <div class="login-container">
    <h2>Access your CTO Account</h2>

    <form method="POST" action="login2.php">
      <label>Username:</label>
      <input type="text" name="username" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <label>Select Role:</label>
      <select name="role" required>
        <option value="member">Member</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit">Login</button>
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
