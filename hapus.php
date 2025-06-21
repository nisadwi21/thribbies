<?php
session_start();
include 'config.php';

// pastikan user sudah login
if (!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit;
}

// ambil id produk dari form
$id_produk = $_POST['id'];
$id_user = $_SESSION['id'];

// cek apakah produk ini milik user yang login
$cek = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id_produk' AND user_id='$id_user'");
if (mysqli_num_rows($cek) > 0) {
  // kalau milik sendiri, hapus
  mysqli_query($conn, "DELETE FROM produk WHERE id='$id_produk'");
}

// kembali ke halaman sebelumnya
header("Location: index.php");
exit;
?>
