<?php
session_start();
include 'config.php';

// Cek kalau belum login, redirect ke login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Ambil data user yang login dari tabel users
$id_user = $_SESSION['id'];
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id_user'");
$user = mysqli_fetch_assoc($user_query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $user_id = $_SESSION['id']; 
    // Upload gambar produk
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "imgs/" . $gambar);

    // Simpan ke database
    $query = "INSERT INTO produk 
        (nama, harga, lokasi, gambar, deskripsi, penjual, no_penjual, gambar_penjual, kategori, user_id)
        VALUES (
            '$nama', 
            '$harga', 
            '$lokasi', 
            '$gambar', 
            '$deskripsi', 
            '{$user['Nama']}', 
            '{$user['no_wa']}', 
            '{$user['foto']}', 
            '$kategori',
            '$user_id'
        )";

    mysqli_query($conn, $query);

    header("Location: index.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <link rel="stylesheet" href="css/tambah.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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


<div class="form-container">
  <h2>Tambah Produk Baru</h2>
  <form method="POST" enctype="multipart/form-data">
  <label>Nama Produk</label>
  <input type="text" name="nama" required>
  
  <label>Harga</label>
  <input type="text" name="harga" required>

  <label>Lokasi</label>
  <input type="text" name="lokasi" required>

  <label>Kategori</label>
  <select name="kategori" required>
    <option value="">-- Pilih Kategori --</option>
    <option value="Alat Musik & Aksesoris">Alat Musik & Aksesoris</option>
    <option value="Olahraga">Olahraga</option>
    <option value="Sepeda, Skuter & Aksesoris">Sepeda, Skuter & Aksesoris</option>
    <option value="Mainan Hobi">Mainan Hobi</option>
    <option value="Baju">Baju</option>
    <option value="Celana">Celana</option>
    <option value="Jilbab">Jilbab</option>
    <option value="Vest">Vest</option>
    <option value="Motor Bekas">Motor Bekas</option>
    <option value="Motor Baru">Motor Baru</option>
    <option value="Handphone">Handphone</option>
    <option value="Tablet">Tablet</option>
  </select>

  <label>Deskripsi</label>
  <textarea name="deskripsi" rows="4" required></textarea>

  <label>Upload Gambar Produk</label>
  <input type="file" name="gambar" required>

  <button type="submit">Tambah Produk</button>
</form>

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
