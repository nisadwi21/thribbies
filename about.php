<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tentang Kami - THRIBBIES</title>
  <link rel="stylesheet" href="css/about.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="background-color: #EEEEEE; margin: 0; font-family: 'Segoe UI', sans-serif;">


<header>
  <div class="nav">
    <!-- Logo -->
    <div class="logo">
      <a class="navbar-brand" href="index.php">
        <img src="imgs/l1.png" alt="Logo" style="height: 50px;">
      </a>
    </div>

   
    <!-- Nav Kanan -->
    <div class="nav-kanan">
      <!-- Kategori Dropdown -->
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

  <!-- Search Bar -->
  <div class="search-bar">
    <form method="GET" action="" class="search-form">
      <input type="text" name="cari" class="input-cari" placeholder="Cari barang..." value="<?= isset($cari) ? htmlspecialchars($cari) : '' ?>">
      <input type="text" name="lokasi" class="input-lokasi" placeholder="Lokasi..." value="<?= isset($lokasi) ? htmlspecialchars($lokasi) : '' ?>">
      <button type="submit"><i class="fa fa-search"></i> Cari</button>
    </form>
  </div>

  <!-- Hero Banner -->
  <div class="hero-section">
      <h1>THRIFT IS MOST UPLIFTING</h1>
      <h2>THRIBBIES</h2>
      <p>BAJU • BARANG • PERNAK PERNIK</p>
      <a href="index.php" class="btn btn-light">SHOP NOW</a>
    </div>
  </div>
</header>


<div class="container py-5">
  <h2 class="text-center mb-4">Tentang Kami</h2>
  <p class="text-center">THRIBBIES adalah platform jual beli barang bekas terpercaya yang menghubungkan penjual dan pembeli dari seluruh Indonesia. Di THRIBBIES, kamu bisa menemukan berbagai produk second hand dari pakaian, sepatu, hingga perlengkapan rumah tangga dengan harga terjangkau dan kualitas masih bagus. Kami hadir untuk memberikan solusi jual beli yang aman, praktis, dan tetap berkualitas, semua dilakukan dalam satu tempat.</p>
  <p class="text-center">Kami percaya bahwa barang bekas bukan berarti tidak berharga. Dengan konsep thrifting, barang bisa digunakan dan tampilkan gaya tanpa menguras kantong. Dengan tampilan sistem modern, fitur lengkap, dan transaksi aman, THRIBBIES hadir sebagai pilihan marketplace thrifting terpercaya di Indonesia.</p>
</div>

<div class="container">
  <h3 class="mb-4">Jual Barang Bekas Online</h3>
  <div class="row g-4">
    <div class="col-md-4">
      <img src="imgs/j1.png" alt="" class="img-fluid rounded">
      <h5 class="mt-2">1. Daftar Akun sebagai Penjual</h5>
      <p>Daftarkan dirimu di THRIBBIES, lengkapi profil penjual, serta dapatkan kemudahan menjual barang bekas dengan aman.</p>
    </div>
    <div class="col-md-4">
      <img src="imgs/j1.png" alt="" class="img-fluid rounded">
      <h5 class="mt-2">2. Upload Produk</h5>
      <p>Foto barang yang akan dijual, lengkapi deskripsi, kategori, dan tentukan harga.</p>
    </div>
    <div class="col-md-4">
      <img src="imgs/j1.png" alt="" class="img-fluid rounded">
      <h5 class="mt-2">3. Tunggu Pembeli & Transaksi</h5>
      <p>Pembeli akan langsung menghubungi kamu lewat fitur chat atau WhatsApp. Transaksi bisa diselesaikan dengan sistem COD atau transfer.</p>
    </div>
  </div>
</div>

<div class="container mt-5">
  <h3 class="mb-4">Beli Barang Bekas Online</h3>
  <div class="row g-4">
    <div class="col-md-4">
      <img src="imgs/j2.png" alt="" class="img-fluid rounded">
      <h5 class="mt-2">1. Temukan Produk</h5>
      <p>Lihat pilihan ribuan produk bekas, filter sesuai kategori & harga, dan pilih favoritmu.</p>
    </div>
    <div class="col-md-4">
      <img src="imgs/j2.png" alt="" class="img-fluid rounded">
      <h5 class="mt-2">2. Hubungi Penjual</h5>
      <p>Sebelum membeli, hubungi penjual untuk konfirmasi ketersediaan barang & diskusi harga.</p>
    </div>
    <div class="col-md-4">
      <img src="imgs/j2.png" alt="" class="img-fluid rounded">
      <h5 class="mt-2">3. Sepakati & Terima Barang</h5>
      <p>Lakukan pembayaran sesuai kesepakatan, barang akan dikirim dan transaksi selesai.</p>
    </div>
  </div>
</div>

<footer>
  <div class="footer-section">
    <h6>THRIBBIES</h6>
    <a href="about.php" class="footer-link"><p>Tentang Kami</p></a>
    <a href="privacy.php" class="footer-link"><p>Privacy Policy</p></a>
    <a href="trems.php" class="footer-link"><p>Terms & Condition</p></a>
  </div>


  <div class="footer-section">
    <h6>HELP</h6>
    <a href="faq.php" class="footer-link"><p>FAQ</p></a>
    <a href="contact.php" class="footer-link"><p>Contact</p></a>
  </div>

  <div class="footer-social">
    <a href="https://instagram.com" target="_blank" class="footer-link"><i class="fa-brands fa-instagram"></i></a>
    <a href="https://tiktok.com" target="_blank" class="footer-link"><i class="fa-brands fa-tiktok"></i></a>
    <a href="https://facebook.com" target="_blank" class="footer-link"><i class="fa-brands fa-facebook"></i></a>
    <a href="#" target="_blank" class="footer-link"><i class="fa-solid fa-x"></i></a>
    <a href="https://linkedin.com" target="_blank" class="footer-link"><i class="fa-brands fa-linkedin"></i></a>
  </div>

  <p class="footer-copy">© 2025 THRIBBIES. All rights reserved.</p>
</footer>


 <script src="js/index.js"></script>
 <script>
  window.addEventListener('scroll', function() {
    const nav = document.querySelector('.nav');
    if (window.scrollY > 50) {
      nav.classList.add('scrolled');
    } else {
      nav.classList.remove('scrolled');
    }
  });
</script>
</body>
</html>
