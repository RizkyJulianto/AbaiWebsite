<?php
session_start();
include('../databases/koneksi.php');

$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];

// assume $db is a PDO object
$stmt = $db->prepare("SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id");
$stmt->execute(array(':post_id' => $post_id, ':user_id' => $user_id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
  $liked = true;
  $stmt = $db->prepare("DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id");
  $stmt->execute(array(':post_id' => $post_id, ':user_id' => $user_id));
} else {
  $liked = false;
  $stmt = $db->prepare("INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)");
  $stmt->execute(array(':post_id' => $post_id, ':user_id' => $user_id));
}

echo json_encode(array('liked' => $liked));
?>

