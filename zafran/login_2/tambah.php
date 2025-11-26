<?php
ob_start();
session_start();
// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h2 class="mt-5 mb-5">Tambah Akun Staf</h2>
    </div>

    <form method="POST" action="proses_tambah.php" class="container" enctype="multipart/form-data">
        
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: Mark kegelapan" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Contoh: kasir01" required>
            <small class="text-muted">Username tidak boleh sama dengan yang lain.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role (Jabatan)</label>
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="Admin">Admin</option>
                <option value="Kasir">Kasir</option>
            </select>
        </div>

        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-outline-danger me-md-2">Batal</a>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-outline-primary">
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
