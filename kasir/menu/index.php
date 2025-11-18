<?php
    include "../../link/Koneksi.php";
    include "../../link/link_bs_css.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="container-fluid bg-primary">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark container">
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
                            <a class="nav-link active" aria-current="page" href="#">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pesanan.php">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transaksi.php">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="promosi.php">Promosi</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container my-4 flex-grow-1">
        <div class="row">
            <section class="col-12">
                <h1>Selamat Datang di Halaman Kasir Poin Coffeee</h1>
                <p>Gunakan navigasi di atas untuk mengelola menu, pesanan, transaksi, dan promosi.</p>
            </section>
        </div>

        <div class="container mt-3 p-3 border border-info bg-dark ">
        <a href="tambah_menu.php" class="btn btn-info">Tambah menu</a>
        <hr>
        <div class="col-md-12">
            <table class="table table-bordered border-info text-center text-light">
                <tr>
                    <td>ID</td>
                    <td>Nama Menu</td>
                    <td>Harga</td>
                    <td>Deskripsi</td>
                    <td>Gambar</td>
                    <td>Status</td>
                    <td>aksi</td>
                </tr>
                <?php
                $sql = "SELECT * from tbl_menu";
                $no = 1;
                $query = mysqli_query($koneksi, $sql);
                foreach ($query as $r) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r['nama_menu'] ?></td>
                        <td><?= $r['harga'] ?></td>
                        <td><?= $r['deskripsi'] ?></td>
                        <td><img src="../assets/<?= $r['gambar'] ?>" alt="<?= $r['gambar'] ?>" width="100"></td>
                        <td><?= $r['status'] ?></td>
                        <td>
                            <a href="edit_menu.php?id_menu=<?= $r['id_menu']; ?>" class='btn btn-warning'>EDIT</a>
                            <hr>
                            <a href="hapus_menu.php?id_menu=<?= $r['id_menu']; ?>" class='btn btn-danger'>HAPUS</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
