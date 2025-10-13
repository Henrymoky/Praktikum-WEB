<?php
// index.php
// Halaman utama produk — gunakan ?variant=Nama+Varian untuk memilih varian
// Pastikan file ini disimpan sebagai index.php dan dijalankan lewat server (XAMPP/Laragon/dll).

// Ambil varian dari query string
$variant = isset($_GET['variant']) ? trim($_GET['variant']) : 'Semua Varian';
// Sanitasi untuk menampilkan
$variant_safe = htmlspecialchars($variant, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>AEZY - Comfort T-Shirt</title>
  <link rel="stylesheet" href="web.css">
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="navbar">
      <div class="logo">
        <!-- Ganti logo bila perlu -->
        <img src="aezy.png" alt="Logo AEZY" width="100">
      </div>
      <div class="icons">
        <a href="login.php" id="login-link" title="Login / Dashboard"><i data-feather="log-in"></i></a>
        <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <!-- Tombol Dark Mode -->
        <button id="dark-mode-toggle">🌙</button>
      </div>
    </div>
  </header>

  <!-- Title -->
  <section>
    <h1>Comfort AEZY T-Shirt</h1>
    <div class="subtitle-container">
      <p class="subtitle">Minimal style, maximum comfort. Designed to feel as good as it looks.</p>
    </div>

    <!-- Tampilan varian yang dipilih -->
    <p style="text-align:center;margin-top:12px;">Varian dipilih: <strong><?php echo $variant_safe; ?></strong></p>
  </section>

  <!-- Product Grid -->
  <section>
    <table width="100%" border="0">
      <!-- Baris 1 -->
      <tr>
        <td align="center">
          <a href="?variant=Regular+White">
            <img src="baju3.webp" alt="Regular White" width="200"><br>
          </a>
          <strong>Regular White</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Regular+Brown">
            <img src="baju1.webp" alt="Regular Brown" width="200"><br>
          </a>
          <strong>Regular Brown</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Regular+Black">
            <img src="baju2.webp" alt="Regular Black" width="200"><br>
          </a>
          <strong>Regular Black</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Body+Fit+Black">
            <img src="body fit hitam.webp" alt="Body Fit Black" width="200"><br>
          </a>
          <strong>Body Fit Black</strong><br>$25.00
        </td>
      </tr>
      <!-- Baris 2 -->
      <tr>
        <td align="center">
          <a href="?variant=Oversized+Black">
            <img src="oversize niga.webp" alt="Oversized Black" width="200"><br>
          </a>
          <strong>Oversized Black</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Oversized+Sand">
            <img src="oversize sand.webp" alt="Oversized Sand" width="200"><br>
          </a>
          <strong>Oversized Sand</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Oversized+Grey">
            <img src="oversized grey.webp" alt="Oversized Grey" width="200"><br>
          </a>
          <strong>Oversized Grey</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Heavy+Weight+Black">
            <img src="Heavy weight niga.webp" alt="Heavy Weight Black" width="200"><br>
          </a>
          <strong>Heavy Weight Black</strong><br>$25.00
        </td>
      </tr>
      <!-- Baris 3 -->
      <tr>
        <td align="center">
          <a href="?variant=Olive">
            <img src="baju2.webp" alt="Olive" width="200"><br>
          </a>
          <strong>Olive</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Maroon">
            <img src="baju3.webp" alt="Maroon" width="200"><br>
          </a>
          <strong>Maroon</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Blue">
            <img src="baju1.webp" alt="Blue" width="200"><br>
          </a>
          <strong>Blue</strong><br>$25.00
        </td>
        <td align="center">
          <a href="?variant=Yellow">
            <img src="baju2.webp" alt="Yellow" width="200"><br>
          </a>
          <strong>Yellow</strong><br>$25.00
        </td>
      </tr>
    </table>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; <?php echo date('Y'); ?> AEZY. All rights reserved.</p>
    <p id="weather">Loading weather...</p>
  </footer>

  <!-- Feather Icons -->
  <script>
    feather.replace();
  </script>

  <!-- Link ke file JavaScript eksternal -->
  <script src="script.js"></script>
</body>
</html>
