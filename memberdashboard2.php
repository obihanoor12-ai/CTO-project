<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'member') {
    header("Location: login2.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'obihacto',3308);
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT observations.*, users.username FROM observations JOIN users ON observations.user_id = users.id WHERE observations.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member | CTO</title>
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

  <h2>Welcome Member: <?= htmlspecialchars($_SESSION['username']) ?></h2>
  <p>You are logged in as a member. Below are your posts:</p>
  <div class="viewpost-wrapper">

<?php while ($row = $result->fetch_assoc()): ?>
  <div class="post-card" id="post-<?= $row['id'] ?>">

    <div class="post-content">
      <h3><?= htmlspecialchars($row['bird']) ?> spotted in <?= htmlspecialchars($row['location']) ?></h3>

      <p>
        <strong>By:</strong> <?= htmlspecialchars($row['username']) ?>
        | <?= $row['date'] ?> <?= $row['time'] ?>
      </p>

      <p>
        <strong>Activity:</strong> <?= htmlspecialchars($row['activity']) ?>
        | Duration: <?= $row['duration'] ?> mins
      </p>

<p>
  <strong>Comments:</strong>
  <span class="comment"><?= nl2br(htmlspecialchars($row['comments'])) ?></span>
</p>

      <div style="margin-top: 15px;">
        <button onclick="editPost(<?= $row['id'] ?>)">Edit</button>
        <button onclick="deletePost(<?= $row['id'] ?>)">Delete</button>
      </div>
    </div>

    <?php if ($row['image']): ?>
      <div class="post-image">
        <img src="<?= htmlspecialchars($row['image']) ?>" alt="Bird Image">
      </div>
    <?php endif; ?>

  </div>
<?php endwhile; ?>

</div>

 <script src="editanddelete.js"></script>

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