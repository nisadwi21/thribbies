<?php
session_start();
include 'config.php';

// Cek kalau belum login
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$id_users = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id_users'");
$user = mysqli_fetch_assoc($query);

if (isset($_POST['update_profil'])) {
  $nama = $_POST['nama'];
  $bio  = $_POST['bio'];

  if ($_FILES['foto']['name'] != '') {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "imgs/$foto");
  } else {
    $foto = $user['foto'];
  }

  $update = mysqli_query($conn, "UPDATE users SET Nama = '$nama', bio = '$bio', foto = '$foto' WHERE id = '$id_users'");

  if ($update) {
    header("Location: profil.php");
    exit;
  } else {
    echo "Update gagal: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile - THRIBBIES</title>
  <link rel="stylesheet" href="css/edit_profil.css">
 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="container mt-4">
  <h3>Edit Profile</h3>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama:</label>
      <input type="text" name="nama" class="form-control" value="<?= $user['Nama'] ?>" required>
    </div>

    <div class="mb-3">
      <label>Bio:</label>
      <textarea name="bio" class="form-control" rows="3"><?= $user['bio'] ?></textarea>
    </div>

    <div class="mb-3">
      <label>Foto Profile (optional):</label>
      <input type="file" name="foto" class="form-control">
      <small>Foto sekarang:</small><br>
      <img src="imgs/<?= $user['foto'] ?>" class="profile-pic-small">
    </div>

    <button type="submit" name="update_profil" class="btn btn-primary">Simpan Perubahan</button>
    <a href="profil.php" class="btn btn-secondary">Batal</a>
    <a href="hapus_akun.php" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus akun? Semua data kamu akan hilang!')">Hapus Akun</a>
  </form>
</div>
<footer>
  <div class="footer-section">
    <h6>THRIBBIES</h6>
    <a href="about.php" class="footer-link"><p>Tentang Kami</p></a>
    <a href="privacy.php" class="footer-link"><p>Privacy Policy</p></a>
    <a href="terms.php" class="footer-link"><p>Terms & Condition</p></a>
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



</body>
</html>
