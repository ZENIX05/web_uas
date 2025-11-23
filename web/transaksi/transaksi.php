<?php
include "../../link/koneksi.php";
include "../../link/link_bs_css.php";

// --- LOGIKA UPDATE STATUS ---
// Jika ada tombol status yang ditekan
if (isset($_POST['update_status'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $status_baru = $_POST['status_baru'];
    
    $update = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status_pesanan='$status_baru' WHERE id_transaksi='$id_transaksi'");
    
    if($update) {
        echo "<script>alert('Status pesanan berhasil diperbarui!'); window.location='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui status!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Transaksi</title>
    <style>
        .status-Diproses { border-left: 5px solid #ffc107; }
        .status-Selesai { border-left: 5px solid #198754; }
        .status-Dibatalkan { border-left: 5px solid #dc3545; opacity: 0.7; }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    
    <header class="container-fluid bg-primary shadow-sm mb-4">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="https://pointcoffee.id/wp-content/uploads/2023/04/cropped-cropped-cropped-Logo-Point-Coffee.png"
                        alt="Point Coffee" height="50" class="d-inline-block align-text-top me-2">
                    <span class="fw-bold">Admin Panel</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="../menu/index.php">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="../kasir/kasir.php">Kasir</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="#">Transaksi</a></li>
                        <li class="nav-item"><a class="nav-link" href="../promosi/promosi.php">Promosi</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container flex-grow-1">
        <h2 class="mb-4 border-bottom pb-2"><i class="bi bi-receipt-cutoff"></i> Daftar Transaksi</h2>

        <?php
        // Ambil semua data transaksi, urutkan dari yang terbaru
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi ORDER BY waktu_transaksi asc");
        
        if (mysqli_num_rows($query) == 0) {
            echo "<div class='alert alert-info text-center'>Belum ada transaksi yang tercatat.</div>";
        }

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id_transaksi'];
            $status = $row['status_pesanan'];
            
            // Tentukan warna badge status
            $badge_color = ($status == 'Selesai') ? 'bg-success' : (($status == 'Dibatalkan') ? 'bg-danger' : 'bg-warning text-dark');
        ?>
            <div class="card mb-3 shadow-sm status-<?php echo $status; ?>">
                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                    <span class="fw-bold">Order #<?php echo $id; ?></span>
                    <span class="badge <?php echo $badge_color; ?> rounded-pill"><?php echo $status; ?></span>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 border-end">
                            <h5 class="card-title mb-1"><?php echo $row['nama_pelanggan']; ?></h5>
                            <p class="text-muted small mb-2">
                                <i class="bi bi-clock"></i> <?php echo date('d M Y, H:i', strtotime($row['waktu_transaksi'])); ?> WIB
                            </p>
                            <p class="mb-0">Metode: <strong><?php echo $row['metode_pembayaran']; ?></strong></p>
                        </div>

                        <div class="col-md-5">
                            <ul class="list-group list-group-flush list-group-item-action small">
                                <?php
                                // Ambil detail item untuk transaksi ini
                                $q_detail = mysqli_query($koneksi, "
                                    SELECT d.*, m.nama_menu 
                                    FROM tbl_transaksi_detail d 
                                    JOIN tbl_menu m ON d.id_menu = m.id_menu 
                                    WHERE d.id_transaksi = '$id'
                                ");
                                while($item = mysqli_fetch_assoc($q_detail)){
                                    echo "<li class='list-group-item d-flex justify-content-between align-items-center px-0 py-1 border-0'>";
                                    echo "<span>" . $item['kuantitas'] . "x " . $item['nama_menu'] . "</span>";
                                    echo "<span>Rp " . number_format($item['harga_saat_transaksi'] * $item['kuantitas'], 0, ',', '.') . "</span>";
                                    echo "</li>";
                                }
                                ?>
                            </ul>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total Bayar:</span>
                                <span class="text-primary fs-5">Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></span>
                            </div>
                        </div>

                        <div class="col-md-3 text-center border-start">
                            <p class="text-muted small mb-2">Ubah Status:</p>
                            <form method="POST" action="">
                                <input type="hidden" name="id_transaksi" value="<?php echo $id; ?>">
                                
                                <button type="submit" name="update_status" value="Edit" name="status_baru" 
                                    class="btn btn-warning btn-sm mb-1 w-100 <?php echo ($status == 'Edit') ? 'disabled' : ''; ?>">
                                    Edit
                                </button>
                                
                                <button type="submit" name="update_status" value="Selesai" name="status_baru" 
                                    class="btn btn-success btn-sm mb-1 w-100 <?php echo ($status == 'Selesai') ? 'disabled' : ''; ?>">
                                    Selesai
                                </button>
                                
                                <button type="submit" name="update_status" value="Dibatalkan" name="status_baru" 
                                    class="btn btn-danger btn-sm w-100 <?php echo ($status == 'Dibatalkan') ? 'disabled' : ''; ?>" 
                                    onclick="return confirm('Yakin batalkan pesanan ini?')">
                                    Batalkan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </main>

    <?php include "../../link/link_bs_js.php"; ?>
</body>
</html>b