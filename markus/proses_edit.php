<?php
include "koneksi.php";

if (isset($_POST['update'])) {

    $id        = $_POST['id'];
    $judul     = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $mulai     = $_POST['mulai'];
    $selesai   = $_POST['selesai'];

    $query = "UPDATE tbl_promosi 
              SET judul_promosi='$judul',
                  deskripsi='$deskripsi',
                  tgl_mulai='$mulai',
                  tgl_selesai='$selesai'
              WHERE id_promosi='$id'";

    mysqli_query($koneksi, $query);

    header("Location: index.php");
    exit();
}
?>
