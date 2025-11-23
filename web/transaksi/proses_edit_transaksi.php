<?php
// Hubungkan ke database
include "../../link/koneksi.php";

// Cek apakah tombol 'update' dari form sudah ditekan
if (isset($_POST['update'])) {
    
    // 1. Ambil data yang dikirim dari form
    $id      = $_POST['id_transaksi']; // Dari input hidden
    $nama    = $_POST['nama_pelanggan'];
    $metode  = $_POST['metode_pembayaran'];
    $status  = $_POST['status_pesanan'];

    // 2. Lakukan Query UPDATE
    $query = "UPDATE tbl_transaksi SET 
                nama_pelanggan = '$nama', 
                metode_pembayaran = '$metode', 
                status_pesanan = '$status' 
              WHERE id_transaksi = '$id'";

    $update = mysqli_query($koneksi, $query);

    // 3. Cek hasil dan alihkan halaman
    if ($update) {
        // Jika sukses, kembali ke halaman daftar transaksi
        echo "<script>alert('Data berhasil diupdate!'); window.location='transaksi.php';</script>";
    } else {
        // Jika gagal, kembali ke halaman edit tadi
        echo "<script>alert('Gagal update!'); window.location='edit_transaksi.php?id=$id';</script>";
    }

} else {
    // Jika file ini diakses langsung tanpa lewat form
    echo "Akses dilarang!";
}
?>