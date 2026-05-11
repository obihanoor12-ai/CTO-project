<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'obihacto',3308);



// Handle search
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | CTO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

  <header>
    <h1>Admin Panel</h1>
    <h2>Centrala Trust for Ornithology</h2>
    <nav>
      <form action="logout.php" method="post" style="text-align: left;">
        <button type="submit">Logout</button>
      </form>
    </nav>
  </header>
  
  <h1>User Posts</h1>

  <h2>All Bird Sightings</h2>

 <form method="get">
     <input type="text" name="search" placeholder="Search comments" />
     <button type="submit">Search</button>
 </form>

 <?php while ($row = $result->fetch_assoc()): ?>
 <div style="border:1px solid #ccc; padding:10px; margin:10px;" id="post-<?= $row['id'] ?>">
   <h3><?= htmlspecialchars($row['bird']) ?> spotted in <?= htmlspecialchars($row['location']) ?></h3>
   <p><strong>By:</strong> <?= htmlspecialchars($row['username']) ?> | <?= $row['date'] ?> <?= $row['time'] ?></p>
   <p><strong>Activity:</strong> <?= htmlspecialchars($row['activity']) ?> | Duration: <?= $row['duration'] ?> mins</p>
   <p><strong>Comments:</strong> <span class="comment"><?= htmlspecialchars($row['comments']) ?></span></p>

   <?php if ($row['image']): ?>
    <img src="<?= htmlspecialchars($row['image']) ?>" alt="Bird Image" width="200" />
   <?php endif; ?>

   <br>
   <button onclick="editPost(<?= $row['id'] ?>)">Edit</button>
   <button onclick="deletePost(<?= $row['id'] ?>)">Delete</button>
 </div>
 <?php endwhile; ?>


 <script src="editanddelete.js"></script>
</body>
</html>