<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'config.php';


// Cek kalau belum login
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$id_users = $_SESSION['id'];
// Ambil produk milik user yang login
$produk_user = mysqli_query($conn, "SELECT * FROM produk WHERE user_id = '$id_users' ORDER BY id DESC");


// Ambil data user
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id_users'");
$users = mysqli_fetch_assoc($query);

// Simpan bio ke session
if (isset($_POST['update_bio'])) {
  $_SESSION['bio'] = $_POST['bio'];
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Saya - THRIBBIES</title>
  <link rel="stylesheet" href="css/profile.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="background-color: #EEEEEE; margin: 0; font-family: 'Segoe UI', sans-serif;">

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

<div class="container mt-5 profile-container">

  <div class="row align-items-center">
    <div class="col-auto">
      <img src="imgs/<?= $users['foto'] ?>" class="rounded-circle border border-3" alt="<?= $users['Nama'] ?>" style="width: 120px; height: 120px; object-fit: cover;">
    </div>
    <div class="col">
      <h3 class="mb-1"><?= $users['Nama'] ?></h3>
      <a href="edit_profil.php" class="btn btn-primary btn-sm mb-2">Edit Profile</a>

      <?php if (!empty($users['bio'])) : ?>
        <p><?= nl2br(htmlspecialchars($users['bio'])) ?></p>
      <?php else : ?>
        <p class="text-muted">Belum ada bio.</p>
      <?php endif; ?>
    </div>
  </div>
</div>


<!-- SECTION PRODUK -->
<div class="container mt-4">
  <h3 class="mb-3">Shop</h3>
  <hr class="custom-line">

  <?php if (mysqli_num_rows($produk_user) > 0) : ?>
    <div class="produk-wrapper mt-4">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php while($produk = mysqli_fetch_assoc($produk_user)) : ?>
          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="imgs/<?= htmlspecialchars($produk['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($produk['nama']) ?>" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($produk['nama']) ?></h5>
                <p class="card-text text-success fw-bold">Rp. <?= number_format($produk['harga'],0,',','.') ?></p>
                <p class="card-text"><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($produk['lokasi']) ?></p>
              </div>
              <div class="card-footer d-flex justify-content-between">
                <form method="POST" action="hapus.php" onsubmit="return confirm('Yakin mau hapus produk ini?')">
                  <input type="hidden" name="id" value="<?= $produk['id'] ?>">
                  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
                <a href="detail.php?id=<?= $produk['id'] ?>" class="btn btn-primary btn-sm">Lihat</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php else : ?>
    <div class="no-product mt-5">
      <img src="imgs/h.png" alt="Belum Ada Item">
      <p>Belum Ada Item</p>
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