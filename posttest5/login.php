<?php
require_once 'koneksi.php'; // konek ke database
// login.php
session_start();

// Jika user sudah login, redirect ke dashboard
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}

// Proses login saat method POST
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // --- AUTENTIKASI SEDERHANA ---
    // Contoh: username=admin, password=123
    // Ubah sesuai kebutuhan atau sambungkan ke DB jika perlu.
    if ($username === 'admin' && $password === '123') {
        // Set session
        $_SESSION['username'] = $username;
        // Redirect ke dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Username atau password salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login AEZY</title>
  <link rel="stylesheet" href="web.css">
</head>
<body>
  <h2 style="text-align:center;margin-top:40px;">Login AEZY</h2>

  <form method="POST" action="login.php" style="width:320px;margin:30px auto;padding:20px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.08);">
    <label for="username">Username</label><br>
    <input id="username" type="text" name="username" placeholder="Username" required style="width:100%;padding:8px;margin-top:6px;"><br><br>

    <label for="password">Password</label><br>
    <input id="password" type="password" name="password" placeholder="Password" required style="width:100%;padding:8px;margin-top:6px;"><br><br>

    <button type="submit" style="width:100%;padding:10px;border:none;border-radius:6px;cursor:pointer;">Login</button>

    <?php if ($error): ?>
      <p style="color:#c00;margin-top:12px;text-align:center;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <p style="text-align:center;margin-top:12px;font-size:0.9rem;">
      <a href="index.php">Kembali ke Beranda</a>
    </p>
  </form>
</body>
</html>
