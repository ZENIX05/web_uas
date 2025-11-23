<?php
include "../../link/Koneksi.php";

$nama_pelanggan = $_POST['nama_pelanggan'];
$metode = $_POST['metode_pembayaran'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$total_harga = 0;

foreach ($qty as $id_menu => $jumlah) {

    if ($jumlah > 0) {

        $harga_satu_item = $harga[$id_menu];

        $subtotal = $jumlah * $harga_satu_item;

        $total_harga += $subtotal;
    }
}

mysqli_query($koneksi, "INSERT INTO tbl_transaksi (nama_pelanggan, metode_pembayaran, total_harga, status_pesanan) VALUES ('$nama_pelanggan', '$metode', '$total_harga', 'Diproses')");

$id_transaksi_baru = mysqli_insert_id($koneksi);
foreach ($qty as $id_menu => $jumlah) {

    if ($jumlah > 0) {
        $harga_saat_ini = $harga[$id_menu];
        mysqli_query($koneksi, "INSERT INTO tbl_transaksi_detail (id_transaksi, id_menu, kuantitas, harga_saat_transaksi) VALUES ('$id_transaksi_baru', '$id_menu', '$jumlah', '$harga_saat_ini')");
    }
}

header("location:../transaksi/transaksi.php");
