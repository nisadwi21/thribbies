<?php
session_start();
include 'config.php';

// Cek login
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

// Ambil id user dan produk
$id_users = $_SESSION['id_users'];
$id_produk = $_GET['id_produk'];

// Cek apakah sudah pernah difavoritkan
$cek = mysqli_query($conn, "SELECT * FROM favorit WHERE id_users='$id_users' AND id_produk='$id_produk'");
if (mysqli_num_rows($cek) == 0) {
  // Kalau belum, tambahkan
  mysqli_query($conn, "INSERT INTO favorit (id_users, id_produk) VALUES ('$id_users', '$id_produk')");
}

// Redirect ke halaman sebelumnya
header("Location: detail.php?id=$id_produk");
exit;
?>
