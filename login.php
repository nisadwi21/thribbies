<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  $data = mysqli_fetch_assoc($query);

  if($data){
    if(password_verify($password, $data['password'])){
  $_SESSION['user']     = $data['Nama'];
  $_SESSION['email']    = $data['email'];
  $_SESSION['foto']     = $data['foto'] ? $data['foto'] : 'default.png';
  $_SESSION['id']       = $data['id'];
  $_SESSION['id_users'] = $data['id'];
  $_SESSION['role']     = $data['role'];  // simpan role di session

  // Cek role-nya
  if($data['role'] == 'admin'){
    header("Location: index_admin.php");
  } else {
    header("Location: index.php");
  }
  exit;



    }else{
      $error = "Password salah!";
    }
  }else{
    $error = "Email tidak ditemukan!";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Thribbies</title>
</head>
<style>
  .overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.7);
  display: flex;
  align-items: center;
  justify-content: center;
}

.login-box {
  background: #fff;
  padding: 30px 40px;
  border-radius: 12px;
  width: 360px;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
}

.login-box h2 {
  margin-bottom: 20px;
  text-align: center;
}

.login-box label {
  display: block;
  margin: 8px 0 5px;
}

.login-box input[type="text"],
.login-box input[type="email"],
.login-box input[type="password"],
.login-box input[type="file"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 12px;
  border: 1px solid #ccc;
  border-radius: 8px;
}

.login-box button {
  width: 100%;
  padding: 10px;
  background: #3b82f6;
  color: #fff;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

.login-box button:hover {
  background: #2563eb;
}

</style>
<body>

<div class="overlay">
  <div class="login-box">
    <h2>Login</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button type="submit" name="login">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
  </div>
</div>

</body>
</html>