<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header class="container-fluid bg-primary">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png"
                        alt="Poin Coffeee" height="70" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="index.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="tampilan.php">promosi</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mt-5">
        <h2 class="mb-3 text-center">Jangan Lewatkan Penawaran Promo Terbaik </h2> <br>
        <div class="row">
            <?php 
            include "koneksi.php";
            $result = mysqli_query($koneksi, "SELECT * FROM tbl_promosi");
            while ($row = mysqli_fetch_assoc($result)) {
                $judul = ($row['judul_promosi']);
                $gambar = ($row['gambar_promosi']);

                echo '
                <div class="col-sm-6 col-md-4 mb-4 me-6">
                    <div class="card h-100 shadow-sm">
                        <a href="isi_tampilan.php?id=' . $row['id_promosi'] . '" class="text-decoration-none text-reset">
                            <img src="' . $gambar . '" 
                                class="card-img-top" 
                                alt="' . $judul . '" 
                                style="height:600px; object-fit:cover;">

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-center">' . $judul . '</h5>
                            </div>
                        </a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>