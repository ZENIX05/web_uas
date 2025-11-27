<?php
// 1. Sertakan file koneksi database
include "koneksi.php";

// Pastikan ID promosi ada di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Jika ID tidak ditemukan, kembalikan ke halaman daftar
    header("Location: tampilan.php");
    exit();
}

$id_promosi = $_GET['id'];

// 2. Ambil data promosi berdasarkan ID
// Tambahkan proteksi dari SQL Injection (mysqli_real_escape_string)
$query = "SELECT * FROM tbl_promosi WHERE id_promosi = " . mysqli_real_escape_string($koneksi, $id_promosi);
$result = mysqli_query($koneksi, $query);

// Periksa apakah data promosi ditemukan
if (mysqli_num_rows($result) == 0) {
    echo "Promosi tidak ditemukan.";
    exit();
}

$promosi = mysqli_fetch_assoc($result);

// 3. Fungsi untuk memformat tanggal (Opsional, tapi membuat tampilan lebih rapi)
function formatTanggal($tanggal)
{
    // Memastikan input tanggal adalah format Y-m-d
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecah = explode('-', $tanggal);
    if (count($pecah) < 3) return $tanggal;
    return $pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
}

$tgl_mulai_formatted = formatTanggal($promosi['tgl_mulai']);
$tgl_selesai_formatted = formatTanggal($promosi['tgl_selesai']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $promosi['judul_promosi']; ?> - Detail Promosi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Gaya untuk gambar agar responsif */
        .detail-img {
            max-height: 400px;
            /* Batasi tinggi gambar agar tidak terlalu besar */
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

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <a href="tampilan.php" class="btn btn-sm btn-outline-secondary mb-4">&larr; Kembali ke Daftar Promosi</a>

                <div class="card shadow-lg border-0">

                    <h2 class="card-title text-center my-4 px-4"><?php echo $promosi['judul_promosi']; ?></h2>

                    <div class="card-body p-4">
                        <div class="row align-items-center justify-content-center text-center text-md-start">
                            <div class="col-12 col-md-4 mb-4 mb-md-0 d-flex justify-content-center">
                                <img src="<?php echo $promosi['gambar_promosi']; ?>"
                                     class="img-fluid rounded detail-img border p-1 mx-auto"
                                     alt="<?php echo $promosi['judul_promosi']; ?>">
                            </div>

                            <div class="col-12 col-md-6">
                                <h4 class="text-dark mb-3">Deskripsi Promosi</h4>
                                <p class="text-secondary"><?php echo nl2br($promosi['deskripsi']); ?></p>

                                <div class="mt-4">
                                    <h5>Periode Promo:</h5>
                                    <p class="text-muted mb-0">
                                        Tanggal Mulai: <strong><?php echo $tgl_mulai_formatted; ?></strong><br>
                                        Tanggal Selesai: <strong><?php echo $tgl_selesai_formatted; ?></strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>