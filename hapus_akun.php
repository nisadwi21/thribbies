<?php
session_start();
include 'config.php';

// Cek login
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$id_users = $_SESSION['id'];

// Hapus semua produk user (kalau kamu punya relasi barang per user)
mysqli_query($conn, "DELETE FROM produk WHERE id_users = '$id_users'");

// Hapus dari tabel favorit (kalau ada)
mysqli_query($conn, "DELETE FROM favorit WHERE id_users = '$id_users'");

// Hapus akun user
$delete = mysqli_query($conn, "DELETE FROM users WHERE id = '$id_users'");

if ($delete) {
  session_destroy();
  header("Location: index.php");
  exit;
} else {
  echo "Gagal hapus akun: " . mysqli_error($conn);
}
?>
