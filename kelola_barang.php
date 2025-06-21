<?php
session_start();
include 'config.php';

if($data['role'] == 'admin'){
  $_SESSION['admin'] = $data['Nama']; // simpan nama admin
  header("Location: index_admin.php");
}


$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Kelola Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h3>📦 Data Barang</h3>
  <a href="index_admin.php" class="btn btn-secondary mb-3">← Kembali</a>
  <table class="table table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;
      while($d = mysqli_fetch_assoc($query)): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($d['nama']) ?></td>
        <td>Rp <?= number_format($d['harga'],0,',','.') ?></td>
        <td><?= htmlspecialchars($d['kategori']) ?></td>
        <td><?= htmlspecialchars($d['lokasi']) ?></td>
        <td>
          <a href="../detail.php?id=<?= $d['id'] ?>" class="btn btn-info btn-sm">Lihat</a>
          <a href="hapus_barang.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus barang ini?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
