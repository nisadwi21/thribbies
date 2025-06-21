<?php
session_start();
include 'config.php';

// Cek admin (optional)
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
  echo "Akses ditolak!";
  exit;
}

if (isset($_GET['id'])) {
  $id = (int)$_GET['id'];
  mysqli_query($conn, "DELETE FROM laporan WHERE id = $id");
}

header("Location: admin_laporan.php");
?>
