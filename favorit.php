<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$id_users = $_SESSION['id_users'];

$query = mysqli_query($conn, "SELECT p.* 
  FROM favorit f
  JOIN produk p ON f.id_produk = p.id
  WHERE f.id_users = '$id_users'");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Favorit Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/favorit.css">
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

  <!-- Search Bar -->
  <div class="search-bar">
    <form method="GET" action="" class="search-form">
      <input type="text" name="cari" class="input-cari" placeholder="Cari barang..." value="<?= isset($cari) ? htmlspecialchars($cari) : '' ?>">
      <input type="text" name="lokasi" class="input-lokasi" placeholder="Lokasi..." value="<?= isset($lokasi) ? htmlspecialchars($lokasi) : '' ?>">
      <button type="submit"><i class="fa fa-search"></i> Cari</button>
    </form>
  </div>
  
  <div class="hero-section">
    <a href="index.php" class="btn btn-light btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
  </div>
</header>


<div class="container mt-3 favorit-container">
  <h3 class="mb-4 fw-bold">❤️ Favorit Saya</h3>

  <?php if (mysqli_num_rows($query) > 0): ?>
    <div class="produk-grid">
      <?php while ($data = mysqli_fetch_assoc($query)) : ?>
        <div class="produk-card">
          <img src="imgs/<?= htmlspecialchars($data['gambar']) ?>" alt="<?= htmlspecialchars($data['nama']) ?>">

          <div class="produk-info">
            <h5 class="produk-nama"><?= htmlspecialchars($data['nama']) ?></h5>
            <p class="produk-harga">Rp <?= number_format($data['harga'],0,',','.') ?></p>
            <p class="produk-lokasi">
              <i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($data['lokasi']) ?>
            </p>

            <a href="detail.php?id=<?= $data['id'] ?>" class="btn btn-primary w-100 mb-2">
              Lihat Detail
            </a>

            <a href="hapus_favorit.php?id_produk=<?= $data['id'] ?>"
               onclick="return confirm('Yakin hapus dari favorit?')"
               class="btn btn-outline-danger w-100">
              <i class="fa-solid fa-trash"></i> Hapus Favorit
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

  <?php else: ?>
    <div class="empty-favorit text-center">
      <img src="imgs/f.png" alt="Kosong" class="img-fluid" style="max-width:250px;">
      <h5 class="mt-3">Kamu belum memiliki favorit nih!</h5>
      <a href="index.php" class="btn btn-dark mt-3">Explore</a>
    </div>
  <?php endif; ?>
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
