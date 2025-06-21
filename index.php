<?php
session_start();
include 'config.php';

//if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
//  header("Location: index.php");
 // exit;
//}


// Inisialisasi variabel pencarian
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$lokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : '';
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$id_users = isset($_SESSION['id_users']) ? $_SESSION['id_users'] : 0;


$sql = "SELECT * FROM produk WHERE 1";

if (!empty($cari)) {
    $sql .= " AND nama LIKE '%$cari%'";
}

if (!empty($lokasi)) {
    $sql .= " AND lokasi LIKE '%$lokasi%'";
}

if (!empty($kategori)) {
    $sql .= " AND kategori = '$kategori'";
}

$sql .= " LIMIT 10";

$query = mysqli_query($conn, $sql);
 
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Thribbies Clone - Login Popup</title>
  <link rel="stylesheet" href="css/index.css" />
  <link rel="shortcut icon" type="image/png" href="imgs/icon.png" />
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
        <img src="imgs/L1.png" alt="Logo" style="height: 50px;">
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
</header>



<div class="rekomendasi">
  <h2>Rekomendasi Kami</h2>
  <div class="produk-grid">
    <?php if (mysqli_num_rows($query) > 0) : ?>
      <?php while($data = mysqli_fetch_assoc($query)) : ?>
        <?php  
        // Cek apakah produk ini sudah jadi favorit user
        $isFavorit = mysqli_query($conn, "SELECT * FROM favorit WHERE id_users='$id_users' AND id_produk='".$data['id']."'");
        $favorited = mysqli_num_rows($isFavorit) > 0 ? 'fa-solid' : 'fa-regular';
        ?>
        <div class="produk-card-wrapper">
          <a href="detail.php?id=<?= $data['id'] ?>" class="produk-card">
            <img src="imgs/<?= htmlspecialchars($data['gambar']) ?>" alt="<?= htmlspecialchars($data['nama']) ?>">
            <div class="produk-info">
              <h3>Rp. <?= number_format($data['harga'],0,',','.') ?></h3>
              <p class="produk-nama"><?= htmlspecialchars($data['nama']) ?></p>
              <div class="produk-footer">
                <p class="produk-lokasi"><?= htmlspecialchars($data['lokasi']) ?></p>
                <button class="love-icon" data-id="<?= $data['id'] ?>">
  <i class="<?= $favorited ?> fa-heart" style="color: <?= $favorited == 'fa-solid' ? 'red' : 'inherit' ?>;"></i>
</button>

              </div>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <p style="text-align:center;">Produk tidak ditemukan.</p>
    <?php endif; ?>
  </div>
</div>

<div style="text-align:center; margin: 30px 0;" ba>
  <a href="produk_lainnya.php" class="btn-lihat-lebih">Lihat Lebih Banyak Produk</a>
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
</body>
</html>
