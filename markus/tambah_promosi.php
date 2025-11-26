<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

      
</head>

<body>
    <form action="proses_tambah_promosi.php" method="POST" enctype="multipart/form-data">
        <div class="container mb-3 ">
            <h1>Tambah Promosi Baru</h1>
            <br>


            <div class="mb-3">
                <label for="judul" class="form-label">Judul Promo:</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Utama:</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" rows="6" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="mulai" class="form-label">Tanggal Mulai:</label>
                <input type="date" name="mulai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="selesai" class="form-label">Tanggal Selesai:</label>
                <input type="date" name="selesai" class="form-control" required>
            </div>
            <button  name="simpan" value="simpan"  type="submit" class="submit-btn">Simpan</button>

        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


</body>
</html>