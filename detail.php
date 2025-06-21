<?php
session_start();
include 'config.php';

// Validasi ID produk
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "Produk tidak ditemukan!";
  exit;
}

$id = (int)$_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
  echo "Produk tidak ditemukan!";
  exit;
}

// Format no WA
$no_wa = preg_replace('/^0/', '62', $data['no_penjual']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($data['nama']) ?> - Detail Produk</title>
  <link rel="stylesheet" href="css/detail.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
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



<div class="container">
  <div class="detail-wrapper">
    <div class="detail-left">
      <img src="imgs/<?= htmlspecialchars($data['gambar'] ?? 'default.png') ?>" alt="<?= htmlspecialchars($data['nama']) ?>" class="produk-img">
      <h2><?= htmlspecialchars($data['nama']) ?></h2>
      <h3>RP. <?= number_format($data['harga'],0,',','.') ?></h3>

      <div class="deskripsi-box">
        <h4>Deskripsi</h4>
        <p><?= nl2br(htmlspecialchars($data['deskripsi'])) ?></p>
      </div>

      <a href="tambah_favorit.php?id_produk=<?= $data['id'] ?>" class="btn btn-danger mt-3">
        <i class="fa-solid fa-heart"></i> Tambah ke Favorit
      </a>
    </div>

    <div class="detail-right">
      <div class="penjual-box">
        <img src="imgs/<?= htmlspecialchars($data['gambar_penjual'] ?? 'default.png') ?>" alt="<?= htmlspecialchars($data['penjual'] ?? 'Penjual') ?>" class="profile-img">
        <h5><?= htmlspecialchars($data['penjual'] ?? 'Penjual') ?></h5>

        <a href="https://wa.me/<?= $no_wa ?>" target="_blank" class="btn btn-success w-100 mt-2">
          <i class="fa-brands fa-whatsapp"></i> Chat Penjual
        </a>
<!-- Tombol Laporkan -->
<button onclick="openReportModal()" class="btn btn-outline-danger w-100 mt-2">
  <i class="fa-solid fa-flag"></i> Laporkan
</button>

        <p class="mt-2"><i class="fa-solid fa-phone"></i> <?= htmlspecialchars($data['no_penjual']) ?></p>
      </div>
    </div>
  </div>
</div>
<!-- Modal Report -->
<div id="reportModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeReportModal()">&times;</span>
    <h5>Laporkan User/Penjual ini?</h5>
    <p>Pilih alasan laporan:</p>
    <form action="kirim_laporan.php" method="POST">
      <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">

      <label><input type="radio" name="alasan" value="Barang Tidak Sesuai" required> Barang Tidak Sesuai</label><br>
      <label><input type="radio" name="alasan" value="Penjual Tidak Ramah"> Penjual Tidak Ramah</label><br>
      <label><input type="radio" name="alasan" value="Penjual Sulit Dihubungi"> Penjual Sulit Dihubungi</label><br>
      <label><input type="radio" name="alasan" value="Lainnya"> Lainnya</label>

      <textarea name="keterangan" placeholder="Tulis detail jika perlu..." rows="3"></textarea>

      <button type="submit" class="btn btn-primary w-100 mt-2">Laporkan</button>
    </form>
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
 <script>
function openReportModal() {
  document.getElementById("reportModal").style.display = "block";
}

function closeReportModal() {
  document.getElementById("reportModal").style.display = "none";
}

window.onclick = function(event) {
  const modal = document.getElementById("reportModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
}</script>

</body>
</html>
