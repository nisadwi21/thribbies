<?php
session_start();
include 'config.php';

if($data['role'] == 'admin'){
  $_SESSION['admin'] = $data['Nama']; // simpan nama admin
  header("Location: index_admin.php");
}


// Validasi parameter ID
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
  echo "ID barang tidak valid.";
  exit;
}

$id = (int)$_GET['id'];

// Cek dulu apakah barangnya ada
$cek = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
if(mysqli_num_rows($cek) == 0){
  echo "Barang tidak ditemukan.";
  exit;
}

// Hapus gambar di folder imgs jika bukan default
$data = mysqli_fetch_assoc($cek);
if($data['gambar'] != 'default.png' && file_exists("../imgs/".$data['gambar'])){
  unlink("../imgs/".$data['gambar']);
}

// Hapus barang dari database
mysqli_query($conn, "DELETE FROM produk WHERE id=$id");

// Redirect balik ke halaman kelola barang
header("Location: kelola_barang.php");
exit;
?>
