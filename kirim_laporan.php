<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_produk = $_POST['id_produk'];
  $alasan = $_POST['alasan'];
  $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
  $pelapor = isset($_SESSION['user']) ? $_SESSION['user'] : 'Guest';

  mysqli_query($conn, "INSERT INTO laporan (id_produk, alasan, keterangan, pelapor, tanggal) 
                       VALUES ('$id_produk', '$alasan', '$keterangan', '$pelapor', NOW())");

  echo "<script>alert('Laporan berhasil dikirim!');window.history.back();</script>";
}
?>
