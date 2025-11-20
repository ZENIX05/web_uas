<!DOCTYPE html>
<html lang="en"> 
    
<!-- data-bs-theme="dark" -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <?php
    include "../../link/Koneksi.php";
    include "../../link/link_bs_css.php";
    ?>
    <style>
        #qty {
            width: 70px;
            text-align: center;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
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
                            <a class="nav-link " href="../menu/index.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Kasir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../transaksi/transaksi.php">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../promosi/promosi.php">Promosi</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <form action="proses_order.php" method="POST">

        <div class="container-fluid">
            <div class="row">

                <main class="col-md-8 py-4" >
                    <h2 >Pilih Menu</h2>
                    <p class="text-muted">Masukkan jumlah pada menu yang ingin dipesan.</p>
                    <button type="button" class="btn btn-danger btn-md mt-1 mb-1" onclick="document.querySelectorAll('#qty').forEach(i => i.value = 0);">
                        RESET
                    </button>
                    <br>
                    <hr>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_menu WHERE status = 'Tersedia'");
                        while ($menu = mysqli_fetch_assoc($query)) {
                            $id = $menu['id_menu'];
                        ?>

                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="../assets/<?php echo $menu['gambar']; ?>" class="card-img-top" style="height: 300px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?php echo $menu['nama_menu']; ?></h5>
                                        <p class="card-text text-success fw-bold mb-2">
                                            Rp <?php echo number_format($menu['harga'], 0, ',', '.'); ?>
                                        </p>

                                        <div class="mt-auto d-flex align-items-center justify-content-between">
                                            <label class="small fw-bold">Jml:</label>
                                            <input type="number" name="qty[<?php echo $id; ?>]" id="qty" value="0" min="0" class="form-control input-qty">

                                            <input type="hidden" name="harga[<?php echo $id; ?>]" value="<?php echo $menu['harga']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </main>

                <aside class="col-md-4 bg-white shadow-sm pt-4" style="height: 100vh; position: sticky; top: 0;">
                    <h3>Informasi Pesanan</h3>
                    <hr>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" required placeholder="Masukkan nama...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-select">
                            <option value="Tunai">Tunai</option>
                            <option value="QRIS">QRIS</option>
                        </select>
                    </div>

                    <div class="alert alert-info small">
                        <i class="bi bi-info-circle"></i> Total harga akan dihitung setelah tombol "Buat Pesanan" ditekan.
                    </div>

                    <button type="submit" name="submit_order" class="btn btn-success w-100 btn-lg mt-3">
                        Buat Pesanan
                    </button>
                </aside>

            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>

</body>

</html>