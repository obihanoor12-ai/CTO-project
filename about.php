<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us | CTO</title>
  <link rel="stylesheet" href="about.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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

<!-- HEADER SECTION -->
<section class="about-header">
    <h1>About Us</h1>
    <p>Learn more about the Centrala Trust for Ornithology, our mission, vision, and dedicated team working for bird conservation.</p>
</section>

<!-- MAIN CONTAINER -->
<section class="about-container">

    <!-- LEFT SECTION: TEXT -->
    <div class="about-text">
        <div class="text-box">
            <h2>Our Mission</h2>
            <p>To conserve bird species and their habitats while educating communities about the importance of biodiversity and ecosystem health.</p>
        </div>

        <div class="text-box">
            <h2>Our Vision</h2>
            <p>A world where humans and birds coexist harmoniously, with thriving ecosystems and informed communities actively participating in conservation efforts.</p>
        </div>

        <div class="text-box">
            <h2>Our History</h2>
            <p>Founded in 2005, the Centrala Trust for Ornithology has worked tirelessly to monitor bird populations, rehabilitate endangered species, and involve local communities in conservation programs.</p>
        </div>
    </div>

    <!-- RIGHT SECTION: IMAGES -->
    <div class="about-images">
        <div class="image-box">
            <img src="uploads/team.jpg" alt="Our Team">
            <p>Our dedicated team in action</p>
        </div>

        <div class="image-box">
            <img src="uploads/birdteam.jpg" alt="Bird Conservation">
            <p>Protecting bird habitats</p>
        </div>
    </div>

</section>

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

  <?php include("dbconnection.php"); ?>
</body>
</html>
