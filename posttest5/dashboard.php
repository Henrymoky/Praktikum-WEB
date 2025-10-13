<?php
require_once 'koneksi.php';
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// --- CREATE: Tambah Data Pegawai ---
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $sql = "INSERT INTO pegawai (nama, jabatan, gaji, tanggal_masuk)
            VALUES ('$nama', '$jabatan', '$gaji', '$tanggal_masuk')";
    $conn->query($sql);
    header("Location: dashboard.php");
    exit();
}

// --- DELETE: Hapus Data Pegawai ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM pegawai WHERE id = $id");
    header("Location: dashboard.php");
    exit();
}

// --- UPDATE: Ambil Data untuk Edit ---
$editData = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM pegawai WHERE id = $id");
    $editData = $result->fetch_assoc();
}

// --- UPDATE: Simpan Perubahan ---
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $sql = "UPDATE pegawai SET
                nama = '$nama',
                jabatan = '$jabatan',
                gaji = '$gaji',
                tanggal_masuk = '$tanggal_masuk'
            WHERE id = $id";
    $conn->query($sql);
    header("Location: dashboard.php");
    exit();
}

// --- READ: Ambil Semua Data ---
$result = $conn->query("SELECT * FROM pegawai ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pegawai</title>
    <link rel="stylesheet" href="web.css">
</head>
<body>
    <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php">Logout</a>
    <hr>

    <h3><?php echo $editData ? 'Edit Data Pegawai' : 'Tambah Pegawai Baru'; ?></h3>
    <form method="POST">
        <?php if ($editData): ?>
            <input type="hidden" name="id" value="<?php echo $editData['id']; ?>">
        <?php endif; ?>

        <input type="text" name="nama" placeholder="Nama Pegawai" required
            value="<?php echo $editData['nama'] ?? ''; ?>">
        <input type="text" name="jabatan" placeholder="Jabatan" required
            value="<?php echo $editData['jabatan'] ?? ''; ?>">
        <input type="number" step="0.01" name="gaji" placeholder="Gaji" required
            value="<?php echo $editData['gaji'] ?? ''; ?>">
        <input type="date" name="tanggal_masuk" required
            value="<?php echo $editData['tanggal_masuk'] ?? ''; ?>">

        <button type="submit" name="<?php echo $editData ? 'update' : 'tambah'; ?>">
            <?php echo $editData ? 'Update' : 'Tambah'; ?>
        </button>
    </form>

    <hr>
    <h3>Daftar Pegawai</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Gaji</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jabatan']; ?></td>
                <td><?php echo number_format($row['gaji'], 2); ?></td>
                <td><?php echo $row['tanggal_masuk']; ?></td>
                <td>
                    <a href="?edit=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="?hapus=<?php echo $row['id']; ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

