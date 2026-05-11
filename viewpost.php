<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'obihacto',3308);



$search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%";

$stmt = $conn->prepare("SELECT observations.*, users.username FROM observations JOIN users ON observations.user_id = users.id WHERE comments LIKE ?");
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bird Sightings | CTO</title>
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

  <h2>All Bird Sightings</h2>

 <form method="get" class="search-form">
  <input type="text" name="search" placeholder="Search comments" />
  <button type="submit">Search</button>
</form>

  <?php while ($row = $result->fetch_assoc()): ?>
  <div style="border:1px solid #ccc; padding:10px; margin:10px;">
    <h3><?= htmlspecialchars($row['bird']) ?> spotted in <?= htmlspecialchars($row['location']) ?></h3>
    <p><strong>By:</strong> <?= htmlspecialchars($row['username']) ?> | <?= $row['date'] ?> <?= $row['time'] ?></p>
    <p><strong>Activity:</strong> <?= htmlspecialchars($row['activity']) ?> | Duration: <?= $row['duration'] ?> mins</p>
    <p><?= htmlspecialchars($row['comments']) ?></p>

    <?php if ($row['image']): ?>
      <img src="<?= htmlspecialchars($row['image']) ?>" alt="Bird Image" width="200" />
    <?php endif; ?>

  </div>
 <?php endwhile; ?>

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