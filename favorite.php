<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id_users'])) {
  echo json_encode(['status' => 'login']);
  exit;
}

$id_users  = $_SESSION['id_users'];
$id_produk = $_POST['id_produk'];

// Cek apakah produk sudah difavoritkan
$cek = mysqli_query($conn, "SELECT * FROM favorit WHERE id_users='$id_users' AND id_produk='$id_produk'");
if (mysqli_num_rows($cek) > 0) {
  mysqli_query($conn, "DELETE FROM favorit WHERE id_users='$id_users' AND id_produk='$id_produk'");
  echo json_encode(['status' => 'removed']);
} else {
  mysqli_query($conn, "INSERT INTO favorit (id_users, id_produk) VALUES ('$id_users', '$id_produk')");
  echo json_encode(['status' => 'added']);
}
?>
