<?php include "../../link/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="container mb-3">
            <h2 class="mb-5">Tambah Menu Pengunjung</h2>
            
            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <select class="form-control" id="nama_menu" name="nama_menu" required>
                    <option value="">-- Pilih Menu --</option>
                    <option value="Hot Palm Sugar Latte">Hot Palm Sugar Latte</option>
                    <option value="Hot Cafe Dolce">Hot Cafe Dolce</option>
                    <option value="Iced Latte">Iced Latte</option>
                    <option value="Hot Mocha">Hot Mocha</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-outline-primary">
        </div>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama_menu = ($_POST['nama_menu']);
        $deskripsi = ($_POST['deskripsi']);
        $harga = ($_POST['harga']);
        $status = ($_POST['status']);
        $gambar = '';

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
            
            $tmpName = $_FILES['gambar']['tmp_name'];
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
            
            if (in_array($ext, $allowedExts)) {
                $safeName = uniqid('img_', true) . '.' . $ext;
                if (move_uploaded_file($tmpName, $uploadDir . $safeName)) {
                    $gambar = 'uploads/' . $safeName;
                }
            }
        }

        $query = "INSERT INTO tbl_menu (nama_menu, harga, deskripsi, gambar, status) VALUES ('$nama_menu', '$harga', '$deskripsi', '$gambar', '$status')";
        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php");
            exit();
        }
    }
    ?>
</body>
</html>