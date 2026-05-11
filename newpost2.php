<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Post | CTO</title>
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

  <h2>Submit a Bird Observation</h2>

  <form class="newpost-form" action="submit-post.php" method="post" enctype="multipart/form-data">

    <label>Location:
      <select name="location" required>
        <option value="">Select</option>
        <option>Erean</option><option>Brunad</option><option>Bylyn</option>
        <option>Docia</option><option>Marend</option><option>Pryn</option>
        <option>Zord</option><option>Yaean</option><option>Frestin</option>
        <option>Stonyam</option><option>Ryall</option><option>Ruril</option>
        <option>Keivia</option><option>Tallan</option><option>Adohad</option>
        <option>Obelyn</option><option>Holmer</option><option>Vertwall</option>
      </select>
    </label>

    <label>Date: <input type="date" name="date" required></label>
    <label>Time: <input type="time" name="time" required></label>

    <label>Bird Species:
      <select name="bird" required>
        <option>Wood Pigeon</option><option>House Sparrow</option>
        <option>Starling</option><option>Blue Tit</option>
        <option>Blackbird</option><option>Robin</option>
        <option>Goldfinch</option><option>Magpie</option>
        <option>Other/Unknown</option>
      </select>
    </label>

    <label>Primary Activity:
      <select name="activity" required>
        <option>Visit</option><option>Feeding</option>
        <option>Nesting</option><option>Other</option>
      </select>
    </label>

    <label>Duration (minutes): <input type="number" name="duration" min="1" required></label>

    <label>Comments:<br>
      <textarea name="comments" rows="4"></textarea>
    </label>

    <label>Image (optional): <input type="file" name="image" accept=".jpg, .jpeg, .png"></label>

    <button type="submit">Submit Post</button>

  </form>
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
