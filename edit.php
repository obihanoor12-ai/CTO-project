<?php
session_start();


$conn = new mysqli('localhost', 'root', '', 'obihacto',3308);
$id = (int)$_POST['id'];
$comment = $conn->real_escape_string($_POST['comment']);

$conn->query("UPDATE observations SET comments = '$comment' WHERE id = $id");

echo "Post updated successfully.";
?>