<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Privacy & Policy | Thribbies</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/privacy.css">
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
  <!--<div class="search-bar">
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

<div class="privacy-container">
  <h2>Privacy & Policy</h2>
  <p><em>Last updated: 18 Juni 2025</em></p>

  <p>Di Thribbies (<a href="https://thribbies.com">https://thribbies.com</a>), melindungi privasi pengunjung adalah prioritas utama kami.
    Dokumen ini merinci jenis informasi yang kami kumpulkan dan gunakan, serta bagaimana kami menjaganya tetap aman.</p>

  <h4>Consent</h4>
  <p>Dengan menggunakan layanan Thribbies, kamu menyetujui praktik privasi ini dan setuju pada ketentuan kami.</p>

  <h4>Informasi yang Kami Kumpulkan</h4>
  <p>Saat kamu:</p>
  <p>• Membuat akun, kami dapat meminta data seperti nama, email, nomor telepon, alamat, dan informasi kendaraan atau barang yang dijual.</p>
  <p>• Menghubungi kami, informasi tambahan seperti isi pesan dan lampiran dapat tercatat.</p>
  <p>• Menggunakan situs, kami otomatis mengumpulkan data teknis seperti alamat IP, jenis browser, waktu akses, dan pola navigasi.</p>

  <h4>Akses & Penghapusan Data</h4>
  <p>Kamu dapat melihat dan mengedit data melalui halaman My Account. Jika ingin menghapus akun dan data, cukup kirim permintaan ke 
    <a href="mailto:privacy@thribbies.com">privacy@thribbies.com</a>, dan data akan dihapus secara permanen, kecuali sebagian kecil diperlukan untuk tujuan hukum atau pencegahan penipuan.</p>

  <h4>Cara Kami Menggunakan Informasimu</h4>
  <p>Kami memanfaatkan data untuk:</p>
  <p>• Mengoperasikan platform Thribbies dan meningkatkan layanan;</p>
  <p>• Berkomunikasi (notifikasi, update, promo);</p>
  <p>• Mencegah penipuan dan memastikan keamanan transaksi.</p>

  <h4>Log Files</h4>
  <p>Kami menggunakan file log untuk mencatat aktivitas pengguna—termasuk IP, browser, dan halaman yang diakses—untuk analisis tren dan administrasi situs, tanpa kaitkan ke data pribadi.</p>

  <h4>Cookies & Web Beacons</h4>
  <p>Thribbies menggunakan cookies untuk menyimpan preferensi, mempercepat akses, dan meningkatkan pengalaman pengguna. Kamu bisa menonaktifkan cookies melalui pengaturan browser jika diinginkan.</p>

  <h4>Iklan & Pihak Ketiga</h4>
  <p>Kami mungkin bekerja sama dengan mitra iklan atau analytics eksternal. Mitra ini dapat menggunakan cookies atau teknologi serupa, namun Thribbies tidak memiliki akses langsung ke data mereka.</p>

  <h4>Hak Privasi</h4>
  <p>Pengguna (terutama dari EEA, UK, atau California) memiliki hak untuk:</p>
  <p>• Mengakses, memperbaiki, atau menghapus data pribadi;</p>
  <p>• Menbatasi atau menolak pengolahan data;</p>
  <p>• Menarik persetujuan kapan saja;</p>
  <p>• Mengajukan komplain ke otoritas jika merasa data diproses tidak sesuai aturan.</p>

  <h4>Informasi Anak-Anak</h4>
  <p>Thribbies tidak menargetkan anak di bawah 13 tahun. Jika diketahui muncul data dari anak di bawah usia tersebut, akan kami hapus sesegera mungkin.</p>

  <h4>Perubahan Kebijakan</h4>
  <p>Kami dapat memperbarui kebijakan ini dari waktu ke waktu. Setiap perubahan signifikan akan diumumkan di halaman ini dengan tanggal update baru.</p>
</div>
  <script src="js/index.js"></script>
</body>
</html>
