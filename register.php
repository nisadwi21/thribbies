<?php
include 'config.php';
session_start();

if(isset($_POST['register'])){
  $Nama     = $_POST['nama'];
  $email    = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $no_wa    = $_POST['no_wa'];

  // kalau upload foto
  if(!empty($_FILES['foto']['name'])){
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], 'imgs/'.$foto);
  } else {
    $foto = 'default.png';
  }

  $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if(mysqli_num_rows($cek) > 0){
    $error = "Email sudah terdaftar!";
  } else {
   mysqli_query($conn, "INSERT INTO users (nama, email, password, foto, no_wa, role) 
                     VALUES ('$Nama','$email','$password','$foto','$no_wa', 'user')");
    $success = "Berhasil daftar, silakan login!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Akun</title>
</head>
<style>
  body {
    font-family: sans-serif;
    background: #eef2f7;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
  .register-box {
    background: #fff;
    padding: 30px 40px;
    border-radius: 12px;
    width: 400px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
  }
  .register-box h2 {
    text-align: center;
    margin-bottom: 20px;
  }
  .register-box input[type="text"],
  .register-box input[type="email"],
  .register-box input[type="password"],
  .register-box input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
  }
  .register-box button {
    width: 100%;
    padding: 10px;
    background: #3b82f6;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
  }
  .register-box button:hover {
    background: #2563eb;
  }
  .msg {
    text-align: center;
    margin-bottom: 12px;
  }
</style>
<body>

<div class="register-box">
  <h2>Daftar Akun</h2>
  <?php if(isset($error)) echo "<p class='msg' style='color:red;'>$error</p>"; ?>
  <?php if(isset($success)) echo "<p class='msg' style='color:green;'>$success</p>"; ?>

  <form method="POST" enctype="multipart/form-data">
  <input type="text" name="nama" placeholder="Nama Lengkap" required>
  <input type="email" name="email" placeholder="Email Aktif" required>
  <input type="password" name="password" placeholder="Password" required>
  <input type="text" name="no_wa" placeholder="No WhatsApp Aktif" required>
  <label>Foto Profil (opsional)</label>
  <input type="file" name="foto">
  <button type="submit" name="register">Daftar</button>
</form>

  <p style="text-align:center; margin-top:10px;">
    Sudah punya akun? <a href="login.php">Login di sini</a>
  </p>
</div>

</body>
</html>
