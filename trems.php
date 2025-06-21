<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Terms & Conditions | Thribbies</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/terms.css">
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

  <!-- Search Bar 
  <div class="search-bar">
    <form method="GET" action="" class="search-form">
      <input type="text" name="cari" class="input-cari" placeholder="Cari barang..." value="<?= isset($cari) ? htmlspecialchars($cari) : '' ?>">
      <input type="text" name="lokasi" class="input-lokasi" placeholder="Lokasi..." value="<?= isset($lokasi) ? htmlspecialchars($lokasi) : '' ?>">
      <button type="submit"><i class="fa fa-search"></i> Cari</button>
    </form>
  </div>-->
  
  <div class="hero-section">
    <a href="index.php" class="btn btn-light btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
  </div>
</header>

<div class="terms-container">
  <h2>Terms & Conditions – Thribbies</h2>
  <p><em>Last Updated: 18 Juni 2025</em></p>

  <p>Selamat datang di Thribbies! Dengan mengakses atau menggunakan platform kami (website dan/atau aplikasi), Anda setuju untuk mematuhi syarat dan ketentuan berikut. Jika tidak setuju, mohon untuk tidak menggunakan layanan Thribbies.</p>

  <h4>1. Definisi</h4>
  <p>• “Platform” berarti website Thribbies dan/atau aplikasinya.<br>
  • “Pengguna” berarti siapa saja yang mengakses atau menggunakan Platform, termasuk Penjual dan Pembeli.<br>
  • “Konten” mencakup semua materi yang diunggah pengguna, seperti teks, gambar, iklan, ulasan, dan deskripsi barang.<br>
  • “Transaksi” adalah kesepakatan jual-beli antara Penjual dan Pembeli melalui Platform.</p>

  <h4>2. Akun & Registrasi</h4>
  <p>• Pengguna harus mendaftar menggunakan data yang benar dan lengkap.<br>
  • Setiap pengguna bertanggung jawab menjaga kerahasiaan kredensial akun mereka.<br>
  • Thribbies dapat menangguhkan atau menghapus akun tanpa pemberitahuan jika ditemukan pelanggaran.</p>

  <h4>3. Larangan & Aturan Penggunaan</h4>
  <p>• Dilarang menggunakan platform untuk aktivitas ilegal, menipu, atau menyebarkan konten berbahaya atau menyesatkan.<br>
  • Dilarang menjual barang ilegal, palsu, curian, atau barang yang berpotensi melanggar hak cipta.<br>
  • Thribbies berhak menghapus konten yang tidak sesuai dan menghentikan akses pengguna pelanggar.</p>

  <h4>4. Konten & Hak Cipta</h4>
  <p>• Pengguna bertanggung jawab sepenuhnya atas Konten yang mereka unggah.<br>
  • Dengan mengunggah Konten ke Thribbies, pengguna memberi izin non-eksklusif kepada Thribbies untuk menampilkan dan mempromosikannya.<br>
  • Thribbies tidak bertanggung jawab atas klaim pelanggaran hak cipta oleh pihak ketiga.</p>

  <h4>5. Transaksi & Pembayaran</h4>
  <p>• Kontrak jual-beli terjadi langsung antara Penjual dan Pembeli; Thribbies hanya menjadi fasilitator dan tidak ikut bertanggung jawab secara legal atas kontrak tersebut.</p>

  <h4>6. Pembatasan Tanggung Jawab</h4>
  <p>• Platform disediakan “sebagaimana adanya” tanpa jaminan apapun, baik tertulis maupun tersirat.<br>
  • Thribbies tidak bertanggung jawab atas kerusakan langsung/yang diakibatkan penggunaan Platform.<br>
  • Thribbies tidak menjamin bahwa Platform bebas dari kesalahan, gangguan, atau virus.</p>

  <h4>7. Perubahan Konten</h4>
  <p>• Informasi di dalam Platform dapat diubah sewaktu-waktu tanpa pemberitahuan sebelumnya.<br>
  • Pengguna yang diperlakukan untuk rutin memeriksa syarat & ketentuan ini.</p>

  <h4>8. Hukum yang Berlaku</h4>
  <p>• Syarat & Ketentuan ini tunduk pada hukum Republik Indonesia.<br>
  • Sengketa akan diselesaikan melalui jalur hukum di pengadilan yang berwenang di Indonesia.</p>

  <h4>9. Terminasi & Pembatasan</h4>
  <p>• Thribbies berhak menghentikan akun pengguna yang melanggar syarat tanpa pemberitahuan.<br>
  • Pengguna tidak akan bisa kembali terdaftar sebelum memenuhi semua syarat dan ketentuan.</p>

  <h4>10. Ketentuan Umum</h4>
  <p>• Jika suatu ketentuan dianggap tidak sah oleh pengadilan, ketentuan lain tetap berlaku.<br>
  • Syarat & Ketentuan dapat diperbarui kapan saja. Versi terbaru akan dipublikasikan di halaman ini dan berlaku efektif setelah dipublikasikan.</p>

  <h4>Hubungi Kami</h4>
  <p>Jika ada pertanyaan atau butuh klarifikasi tentang syarat ini, silakan hubungi:<br>
  📩 <a href="mailto:support@thribbies.com">support@thribbies.com</a></p>

</div>
  <script src="js/index.js"></script>
</body>
</html>
