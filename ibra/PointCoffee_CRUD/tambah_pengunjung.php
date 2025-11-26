<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
        <div class="container mb-3">
            <h2 class="text-center mb-5 mt-5">Tambah Menu Pengunjung</h2>
            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <select class="form-control" id="nama_menu" name="nama_menu" required>
                    <option value="">--- Pilih Menu ---</option>
                    <option value="Hot Palm Sugar Latte">Hot Palm Sugar Latte</option>
                    <option value="Hot Cafe Dolce">Hot Cafe Dolce</option>
                    <option value="Iced Latte">Iced Latte</option>
                    <option value="Cappuccino">Cappuccino</option>
                    <option value="Avocadofee Frappe">Avocadofee Frappe</option>
                    <option value="Mysterious Green Frappe">Mysterious Green Frappe</option>
                    <option value="Matcha Frappe">Matcha Frappe</option>
                    <option value="Cendolita">Cendolita</option>
                    <option value="Creamy matchachio">Creamy matchachio</option>
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
                <select class="form-select" id="status" name="status" required>
                    <option value="">--- Choose ---</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Habis">Habis</option>
                </select>
            </div>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-outline-primary">
            <a href="index.php" class="btn btn-outline-danger me-md-2">Batal</a>
        </div>
    </form>
</body>

</html>