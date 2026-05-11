<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'obihacto',3308);

if (!isset($_SESSION['user_id'])) {
    die("Please login first.");
}

$user_id = $_SESSION['user_id'];
$location = $_POST['location'];
$bird = $_POST['bird'];
$activity = $_POST['activity'];
$duration = $_POST['duration'];
$date = $_POST['date'];
$time = $_POST['time'];
$comments = $_POST['comments'];

$image_path = null;
if ($_FILES['image']['name']) {
    $allowed = ['image/jpeg', 'image/png'];
    if ($_FILES['image']['size'] <= 1200000 && in_array($_FILES['image']['type'], $allowed)) {
        $image_path = "uploads/" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);
    }
}

$stmt = $conn->prepare("INSERT INTO observations (user_id, location, bird, activity, duration, date, time, comments, image)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssissss", $user_id, $location, $bird, $activity, $duration, $date, $time, $comments, $image_path);

if ($stmt->execute()) {
    echo "Post submitted. <a href='memberdashboard2.php'>View Posts</a>";
} else {
    echo "Error: " . $stmt->error;
}
?>