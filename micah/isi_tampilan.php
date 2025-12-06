<?php
include "koneksi.php";

// Cek ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: tampilan.php");
    exit();
}

$id_artikel = mysqli_real_escape_string($koneksi, $_GET['id']);

// Ambil data artikel
$query = "SELECT * FROM tbl_artikel WHERE id_artikel = '$id_artikel'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Artikel tidak ditemukan.";
    exit();
}

// Ambil hasil data
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['judul_artikel']; ?> - Detail artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .detail-img {
            max-height: 400px;
            width: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <header class="container-fluid bg-primary">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png"
                        alt="Point Coffee" height="70">
                </a>
            </nav>
        </div>
    </header>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <a href="tampilan.php" class="btn btn-sm btn-outline-secondary mb-4">
                    &larr; Kembali ke Daftar Artikel
                </a>

                <div class="card shadow-lg border-0">

                    <h2 class="card-title text-center my-4 px-4">
                        <?php echo $data['judul_artikel']; ?>
                    </h2>

                    <div class="card-body p-4">
                        <div class="row align-items-center">

                            <div class="col-md-4 mb-4 text-center">
                                <img src="<?php echo $data['gambar_utama']; ?>" 
                                     class="img-fluid rounded detail-img border p-1"
                                     alt="<?php echo $data['judul_artikel']; ?>">
                            </div>

                            <div class="col-md-8">
                                <p class="text-secondary">
                                    <?php echo $data['isi_konten']; ?>
                                </p>
                            </div>
                             <div class="col-md-8">
                                <p class="text-secondary">
                                    <?php echo "Ditulis oleh= " . $data['penulis']; ?>  
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>
