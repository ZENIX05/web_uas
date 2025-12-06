<?php 
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel | Point Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header class="container-fluid bg-primary">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png"
                    alt="Poin Coffeee" height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link active" href="tampilan.php">tampilan</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
    
<div class="container mt-5">
    <h2 class="mb-3 text-center">Baca Artikel dan Berita Terbaru Kami</h2>
    <br>

    <div class="row">
        <?php 
        // Ambil semua kolom termasuk isi_konten
        $result = mysqli_query($koneksi, "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC");
        
        while ($row = mysqli_fetch_assoc($result)) {

            $judul = htmlspecialchars($row['judul_artikel']);
            $gambar = htmlspecialchars($row['gambar_utama']);
            $konten = htmlspecialchars($row['isi_konten']);

            // buat preview 100 karakter
            $preview = substr($konten, 0, 100) . "...";

            echo '
            <div class="col-sm-6 col-md-4 mb-4"> 
                <div class="card h-100 shadow-sm">
                    <a href="isi_tampilan.php?id=' . $row['id_artikel'] . '" class="text-decoration-none text-reset">
                        <img src="' . $gambar . '" class="card-img-top" alt="' . $judul . '" 
                             style="height:250px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">' . $judul . '</h5>
                            <p class="card-text text-muted" style="font-size:14px;">' . $preview . '</p>
                        </div>
                    </a>
                </div>
            </div>';
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
