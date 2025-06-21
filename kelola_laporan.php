<?php
session_start();
include 'config.php';

// Cek apakah user admin (optional kalau kamu pakai sistem role)

if($data['role'] == 'admin'){
  $_SESSION['admin'] = $data['Nama']; // simpan nama admin
  header("Location: index_admin.php");
}
$query = mysqli_query($conn, "SELECT laporan.*, produk.nama AS nama_produk 
                              FROM laporan 
                              LEFT JOIN produk ON laporan.id_produk = produk.id 
                              ORDER BY laporan.tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Laporan - Admin Thribbies</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="padding:20px; font-family: 'Segoe UI', sans-serif; background:#f1f1f1;">

<div class="container">
  <h3 class="mb-4">📋 Data Laporan User</h3>
  
  <table class="table table-bordered table-hover bg-white">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Produk</th>
        <th>Alasan</th>
        <th>Keterangan</th>
        <th>Pelapor</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($query) > 0): 
        $no = 1;
        while($lapor = mysqli_fetch_assoc($query)): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td>
            <?= htmlspecialchars($lapor['nama_produk'] ?? 'Produk Dihapus') ?><br>
            <a href="detail.php?id=<?= $lapor['id_produk'] ?>" class="btn btn-sm btn-info mt-1"><i class="fa-solid fa-eye"></i> Lihat</a>
          </td>
          <td><?= htmlspecialchars($lapor['alasan']) ?></td>
          <td><?= nl2br(htmlspecialchars($lapor['keterangan'])) ?></td>
          <td><?= htmlspecialchars($lapor['pelapor']) ?></td>
          <td><?= $lapor['tanggal'] ?></td>
          <td>
            <a href="hapus_laporan.php?id=<?= $lapor['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus laporan ini?')">
              <i class="fa-solid fa-trash"></i>
            </a>
          </td>
        </tr>
      <?php endwhile; else: ?>
        <tr>
          <td colspan="7" class="text-center">Belum ada laporan.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
