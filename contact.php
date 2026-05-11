<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | CTO</title>
  <link rel="stylesheet" href="contact.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="navbar">
    <div class="logo">CTO</div>
    
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="viewpost.php">View Post</a></li>
        <li><a href="register2.php">Register</a></li>
        <li><a href="login2.php">Login</a></li>
      </ul>
  </div>
</nav>

<section class="contact-header">
    <h1>Contact Us</h1>
    <p>We’re here to help you learn more about bird conservation and our community initiatives.</p>
</section>

<section class="contact-container">

    <div class="contact-info">
        <h2>Get in Touch</h2>
        <p class="desc">
            Whether you have questions, need assistance, or want to get involved,
            our team at the Centrala Trust for Ornithology is here to help.
        </p>

        <div class="info-box">
            <h3>Email</h3>
            <p><a href="mailto:contact.obiha@cto.org" class="contact-link">contact.obiha@cto.org</a></p>
        </div>

        <div class="info-box">
            <h3>Phone</h3>
            <p><a href="tel:+97398734562" class="contact-link">+97 398734562</a></p>
        </div>

        <div class="info-box">
            <h3>Location</h3>
            <p>
            240 Evergreen Trail Road,<br>
            Highland Eco Region, New Zealand
            </p>
        </div>

        <div class="info-box">
            <h3>Opening Hours</h3>
            <p>
                Monday – Friday: 9:00 AM – 6:00 PM<br>
                Saturday: 10:00 AM – 4:00 PM<br>
                Sunday: Closed
            </p>
        </div>

        <div class="map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.95373531531697!3d-37.81627974202115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDQ5JzAyLjYiUyAxNDTCsDU3JzEwLjQiRQ!5e0!3m2!1sen!2sus!4v1616648465844!5m2!1sen!2sus" 
                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>

    <div class="contact-form">
        <h2>Send Us a Message</h2>

        <form action="contact.php" method="POST">
            <div class="form-group">
                <label>Your Name</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Your Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Your Message</label>
                <textarea name="message" rows="5" required></textarea>
            </div>

            <input type="submit" name="contact" class="submit-btn">
        </form>
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
<?php
   if($_POST['contact'])
   {
       $full_name = $_POST['name'];
       $full_email = $_POST['email'];
       $full_mess = $_POST['message'];
       
       $query = "INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$full_name','$full_email','$full_mess')";

       $data = mysqli_query($conn,$query);

       if($data)
       {
          echo "message sent successfully";
       }
       else
       {
          echo "failed";
       }
   }
?>
</body>
</html>
