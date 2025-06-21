<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>FAQ | Thribbies</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/faq.css">
</head>
<body>
  <header>
  <div class="nav">
    <!-- Logo -->
    <div class="logo">
      <a class="navbar-brand" href="#">
        <img src="imgs/l.png" alt="Logo" style="height: 50px;">
      </a>
    </div>

    <!-- Nav Kanan -->
    <div class="nav-kanan">
      <!-- Kategori Dropdown Pindah ke sini -->
      <div class="kategori">
        <button id="kategoriBtn">Semua Kategori <i class="fa-solid fa-chevron-down"></i></button>
        <div class="kategori-dropdown" id="kategoriDropdown">
          <div class="kategori-column">
            <h4>Hobi / Olahraga</h4>
            <a href="kategori.php?kategori=Alat Musik & Aksesoris">Alat Musik & Aksesoris</a>
            <a href="kategori.php?kategori=Olahraga">Olahraga</a>
            <a href="kategori.php?kategori=Sepeda, Skuter & Aksesoris">Sepeda, Skuter & Aksesoris</a>
            <a href="kategori.php?kategori=Mainan Hobi">Mainan Hobi</a>
          </div>
          <div class="kategori-column">
            <h4>Fashion</h4>
            <a href="kategori.php?kategori=Baju">Baju</a>
            <a href="kategori.php?kategori=Celana">Celana</a>
            <a href="kategori.php?kategori=Jilbab">Jilbab</a>
            <a href="kategori.php?kategori=Vest">Vest</a>
          </div>
          <div class="kategori-column">
            <h4>Motor</h4>
            <a href="kategori.php?kategori=Motor Bekas">Motor Bekas</a>
            <a href="kategori.php?kategori=Motor Baru">Motor Baru</a>
          </div>
          <div class="kategori-column">
            <h4>Handphone / Gadget</h4>
            <a href="kategori.php?kategori=Handphone">Handphone</a>
            <a href="kategori.php?kategori=Tablet">Tablet</a>
          </div>
        </div>
      </div>

      <?php if (isset($_SESSION['user'])): ?>
        <a href="tambah.php" class="btn-tambah">+ Tambah Barang</a>
        <div class="user-menu">
          <img src="imgs/<?= $_SESSION['foto'] ?>" alt="Foto Profil" class="user-photo" id="userBtn">
          <div class="user-dropdown" id="userDropdown">
            <div class="user-info">
              <img src="imgs/<?= $_SESSION['foto'] ?>" alt="Foto Profil" class="user-photo">
              <div class="user-details">
                <strong><?= $_SESSION['user'] ?></strong>
                <a href="profil.php">Lihat Profil</a>
              </div>
            </div>
            <hr>
            <a href="favorit.php" class="dropdown-item">❤️ Favorit Saya</a>
            <a href="logout.php" class="dropdown-item">⬅️ Keluar</a>
          </div>
        </div>
      <?php else: ?>
        <a href="login.php" class="btn-login">Login/Daftar</a>
      <?php endif; ?>
    </div>
  </div>
 <div class="hero-section">
    <a href="index.php" class="btn btn-light btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
  </div>
  <!-- Search Bar -->
  <!--<div class="search-bar">
    <form method="GET" action="" class="search-form">
      <input type="text" name="cari" class="input-cari" placeholder="Cari barang..." value="<?= isset($cari) ? htmlspecialchars($cari) : '' ?>">
      <input type="text" name="lokasi" class="input-lokasi" placeholder="Lokasi..." value="<?= isset($lokasi) ? htmlspecialchars($lokasi) : '' ?>">
      <button type="submit"><i class="fa fa-search"></i> Cari</button>
    </form>
  </div>-->
  
 
</header>

<div class="faq-container">
  <h2>FAQ – Thribbies</h2>

  <h4>1. Apa itu Thribbies?</h4>
  <p>Thribbies adalah platform jual beli barang bekas (preloved) yang memungkinkan pengguna menjual dan membeli berbagai produk seperti pakaian, kendaraan, gadget, elektronik, hingga perlengkapan rumah tangga. Mirip seperti OLX, tapi dengan antarmuka yang lebih modern dan ramah pengguna.</p>

  <h4>2. Apakah Thribbies gratis?</h4>
  <p>Ya, mendaftar dan mengunggah barang di Thribbies gratis.</p>

  <h4>3. Bagaimana cara menjual barang di Thribbies?</h4>
  <p>Cukup daftar sebagai penjual, klik tombol “Jual Barang”, lalu unggah foto, deskripsi, dan harga barangmu.</p>

  <h4>4. Apakah barang di Thribbies dijamin asli?</h4>
  <p>Thribbies mengandalkan sistem komunitas, jadi setiap penjual bertanggung jawab atas keaslian barangnya. Kami menyediakan sistem laporan dan ulasan untuk membantu pembeli menilai reputasi penjual. Hubungi penjual untuk bertanya sebelum membeli.</p>

  <h4>5. Bagaimana cara transaksi di Thribbies?</h4>
  <p>Transaksi bisa dilakukan langsung antara pembeli dan penjual melalui:<br>
  • COD (Cash on Delivery)<br>
  • Transfer Bank langsung</p>

  <h4>6. Apakah ada garansi barang?</h4>
  <p>Sebagian besar barang bekas tidak bergaransi. Namun, kamu bisa berdiskusi langsung dengan penjual tentang kondisi dan garansi jika masih berlaku. Baca deskripsi produk dan ulasan dengan teliti sebelum membeli.</p>

  <h4>7. Bagaimana jika saya menemukan penipuan?</h4>
  <p>Segera gunakan fitur Laporkan pada halaman produk. Tim Thribbies akan meninjau dan mengambil tindakan yang sesuai, termasuk pemblokiran akun jika terbukti melanggar.</p>

  <h4>8. Apakah saya bisa menghapus akun saya?</h4>
  <p>Bisa. Masuk ke Lihat Profil, lalu klik edit profil, lalu pilih Hapus Akun.</p>

</div>
  <script src="js/index.js"></script>
</body>
</html>
