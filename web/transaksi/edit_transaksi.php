<?php
include "../../link/koneksi.php";
include "../../link/link_bs_css.php";

$id = $_GET['id'];

// 1. Ambil data transaksi saat ini untuk ditampilkan di form
$query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE id_transaksi = '$id'");
$data = mysqli_fetch_assoc($query);

// 2. Ambil detail item (Read Only)
$q_detail = mysqli_query($koneksi, "SELECT d.*, m.nama_menu FROM tbl_transaksi_detail d JOIN tbl_menu m ON d.id_menu = m.id_menu WHERE d.id_transaksi = '$id'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Transaksi</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Edit Transaksi #<?php echo $id; ?></h4>
            </div>
            <div class="card-body">
                
                <form action="proses_edit_transaksi.php" method="POST">
                    
                    <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>">

                    <div class="mb-3">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $data['nama_pelanggan']; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label>Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-select">
                            <option value="Tunai" <?php echo ($data['metode_pembayaran'] == 'Tunai') ? 'selected' : ''; ?>>Tunai</option>
                            <option value="QRIS" <?php echo ($data['metode_pembayaran'] == 'QRIS') ? 'selected' : ''; ?>>QRIS</option>
                            <option value="Debit" <?php echo ($data['metode_pembayaran'] == 'Debit') ? 'selected' : ''; ?>>Debit</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Status Pesanan</label>
                        <select name="status_pesanan" class="form-select">
                            <option value="Diproses" <?php echo ($data['status_pesanan'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
                            <option value="Selesai" <?php echo ($data['status_pesanan'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                            <option value="Dibatalkan" <?php echo ($data['status_pesanan'] == 'Dibatalkan') ? 'selected' : ''; ?>>Dibatalkan</option>
                        </select>
                    </div>

                    <hr>
                    <h5>Detail Item (Tidak bisa diedit disini)</h5>
                    <ul class="list-group mb-3">
                        <?php while($item = mysqli_fetch_assoc($q_detail)) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo $item['nama_menu']; ?>
                                <span class="badge bg-secondary rounded-pill"><?php echo $item['kuantitas']; ?> pcs</span>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="alert alert-info">Total: Rp <?php echo number_format($data['total_harga']); ?></div>

                    <a href="transaksi.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>