<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengunjung</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="badan">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png" class="ms-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pengunjung.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Pengunjung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kasir.php"> Kasir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="demo" class="container carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/morning coffee.jpg" alt="1" class="d-block w-100" height="735px" width="420">
            </div>
            <div class="carousel-item">
                <img src="img/morning.jpg" alt="2" class="d-block w-100" height="735px" width="420">
            </div>
            <div class="carousel-item">
                <img src="img/sunset.jpg" alt="3" class="d-block w-100" height="735px" width="420">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="container mt-5">
        <h3 class="mb-5 text-center">Menu</h3>
        <div class="row">
            <?php
            include "koneksi.php";
            $result = mysqli_query($koneksi, "SELECT * FROM tbl_menu");
            while ($row = mysqli_fetch_assoc($result)) {
                $nama = ($row['nama_menu']);
                $deskripsi = ($row['deskripsi']);
                $gambar = ($row['gambar']);
                $harga = number_format($row['harga'], 0, ',', '.');
                $status = ($row['status']);
                $Class = ($status === 'Tersedia' || strtolower($status) === 'available') ? 'success' : 'secondary';

                echo
                '<div class="col-sm-6 col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="' . $gambar . '" class="card-img-top" alt="' . $nama . '" style="height:350px;object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">' . $nama . '</h5>
                            <p class="card-text small flex-grow-1">' . $deskripsi . '</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <strong>Rp ' . $harga . '</strong>
                                <span class="badge bg-' . $Class . '">' . $status . '</span>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>