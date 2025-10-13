<?php
// koneksi.php
// Simpan file ini di folder project (satu level sama dashboard.php / login.php)
// Cara pakai: include 'koneksi.php'; atau require_once 'koneksi.php';

// ---------------------------
// CONFIG DATABASE (ubah sesuai environment kamu)
// ---------------------------
$db_host = 'localhost';      // biasanya localhost
$db_user = 'root';           // user database (ganti kalau beda)
$db_pass = '';               // password (ganti kalau ada)
$db_name = 'kepegawaian_db'; // nama database yang mau dipakai (kita bakal pakai ini)

// ---------------------------
// Buat koneksi (mysqli, OOP style)
// ---------------------------
$conn = new mysqli($db_host, $db_user, $db_pass);

// cek koneksi ke server MySQL dulu
if ($conn->connect_error) {
    // Kalau koneksi gagal, hentikan dan tampilkan pesan yang jelas
    die("Gagal konek ke MySQL: " . $conn->connect_error);
}

// Set charset biar aman untuk unicode (emoji & bahasa lain)
$conn->set_charset("utf8mb4");

// Pastikan database ada, kalau belum ada kita buat (opsional tapi praktis)
$db_selected = $conn->select_db($db_name);
if (!$db_selected) {
    // Database belum ada — kita coba buat
    $createDbSql = "CREATE DATABASE IF NOT EXISTS `{$db_name}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if ($conn->query($createDbSql) === TRUE) {
        // pilih database yang baru dibuat
        $conn->select_db($db_name);
    } else {
        die("Gagal membuat database '{$db_name}': " . $conn->error);
    }
}

// Sekarang $conn udah siap pake dan sudah menunjuk ke database $db_name
// Kamu bisa pakai $conn di file lain setelah include 'koneksi.php';

// ----- helper sederhana (opsional) -----
// Fungsi kecil buat escape input kalau mau pake manual query (prevent SQL injection dasar)
function esc($str) {
    global $conn;
    return $conn->real_escape_string($str);
}

// Kalau mau pakai prepared statement, tinggal pake $conn->prepare(...) langsung

// jangan close($conn) di sini karena file ini di-include; biarkan file yang butuh koneksi yang nutupnya
?>
