<?php
session_start();
include 'config.php';

// Cek role admin, kalau belum login sebagai admin, redirect
if($data['role'] == 'admin'){
  $_SESSION['admin'] = $data['Nama']; // simpan nama admin
  header("Location: index_admin.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h3>📊 Halo, <?= htmlspecialchars($_SESSION['admin']) ?>!</h3>
  <hr>

  <a href="kelola_barang.php" class="btn btn-primary mb-2">📦 Kelola Barang</a>
  <a href="kelola_laporan.php" class="btn btn-warning mb-2">📋 Laporan User</a>
  <a href="logout.php" class="btn btn-danger mb-2">⏏️ Logout</a>

</body>
</html>
