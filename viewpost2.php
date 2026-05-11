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
        <li><a href="memberdashboard2.php">My Profile</a></li>
        <li><a href="newpost2.php">New Post</a></li>
        <li><a href="viewpost2.php">View Post</a></li>
      </ul>
    </nav>
</div>

<div class="viewpost-wrapper">

  <h2>All Bird Sightings</h2>

  <form method="get" class="search-form">
  <input type="text" name="search" placeholder="Search comments" />
  <button type="submit">Search</button>
</form>


  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="post-card">

  <div class="post-content">
    <h3><?= htmlspecialchars($row['bird']) ?> spotted in <?= htmlspecialchars($row['location']) ?></h3>

    <p><strong>By:</strong> <?= htmlspecialchars($row['username']) ?>
       | <?= $row['date'] ?> at <?= $row['time'] ?></p>

    <p><strong>Activity:</strong> <?= htmlspecialchars($row['activity']) ?>
       | Duration: <?= $row['duration'] ?> mins</p>

    <p><?= nl2br(htmlspecialchars($row['comments'])) ?></p>
  </div>

  <?php if ($row['image']): ?>
    <div class="post-image">
      <img src="<?= htmlspecialchars($row['image']) ?>" alt="Bird Image">
    </div>
  <?php endif; ?>

</div>
  <?php endwhile; ?>
</div>

<form action="logout.php" method="post" style="text-align: center;">
        <button type="submit">Logout</button>
      </form>
<footer>
  <div class="footer-container">
  <div class="footer-section">
  <h3>Quick Links</h3>
  <p><a href="memberdashboard.php">My Profile</a></p>
  <p><a href="newpost2.php">New Post</a></p>
  <p><a href="viewpost2.php">View Post</a></p>
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

  <?php include("dbconnection.php"); ?>
</body>
</html>

