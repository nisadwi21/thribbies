<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$id_users = $_SESSION['id_users'];
$id_produk = $_GET['id_produk'];

// Hapus dari tabel favorit
mysqli_query($conn, "DELETE FROM favorit WHERE id_users = '$id_users' AND id_produk = '$id_produk'");

header("Location: favorit.php");
exit;
?>
