<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link "  href="index.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tampilan.php">Tampilan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="mb-3 text-center">Jangan Lewatkan Penawaran Promo Terbaik </h2> <br>
        <div class="row">
            <?php 
            include "koneksi.php";
            $result = mysqli_query($koneksi, "SELECT * FROM tbl_promosi");
            while ($row = mysqli_fetch_assoc($result)) {
                $judul = ($row['judul_promosi']);
                $gambar = ($row['gambar_promosi']);
                $deskripsi = ($row['deskripsi']);
                $mulai = ($row['tgl_mulai']);
                $selesai = ($row['tgl_selesai']); 

                echo '
                <div class="col-sm-6 col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        <img src="' . $gambar . '" 
                            class="card-img-top" 
                            alt="' . $judul . '" 
                            style="height:400px;  object-fit:cover;">

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title text-center">' . $judul . '</h5>

                            <p class="card-text small flex-grow-1">' . nl2br ($deskripsi) . '</p>

                            <p class="text-muted mb-1">
                                <strong>Mulai:</strong> ' . $mulai . '
                            </p>

                            <p class="text-muted">
                                <strong>Selesai:</strong> ' . $selesai . '
                            </p>

                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</body>

</html>