<?php
include "../../link/koneksi.php";
include "../../link/link_bs_css.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
</head>

<body class="bg-secondary">
    <div class="container mb-3 p-3">
        <h4>Halaman Tambah Menu</h4>
        <a href="index.php" class="btn btn-primary">KEMBALI</a>
        <hr>
        <form action="proses_tambah_menu.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label>Nama Menu</label>
                <input type="text" name="nama_menu" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group mb-2">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusTersedia" value="Tersedia" checked required>
                    <label class="form-check-label" for="statusTersedia">Tersedia</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusHabis" value="Habis">
                    <label class="form-check-label" for="statusHabis">Habis</label>
                </div>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
<?= include "../../link/link_bs_js.php"; ?>
</body>

</html>
