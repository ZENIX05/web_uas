<?php 
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>tambah peserta</title>
</head>

<body class="bg-secondary">
    <div class="container mb-3 p-3">
        <h4>Halaman Tambah Peeserta</h4>
        <a href="../index.php" class="btn btn-primary">KEMBALI</a>
        <hr>
        <form action="ptpeserta.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label>nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>foto</label>
                <input type="file" name="foto" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
        <script src="../js/bootstrap.min.js"></script>
    </div>
</body>

</html>
