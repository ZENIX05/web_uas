<?php
include "koneksi.php";

if (isset($_POST['update'])) {

    $id        = $_POST['id'];
    $judul     = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $gambar    = mysqli_real_escape_string($koneksi, $_POST['gambar']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $mulai     = $_POST['mulai'];
    $selesai   = $_POST['selesai'];


if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/assets/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

            $tmpName = $_FILES['gambar']['tmp_name'];
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($ext, $allowedExts)) {
                $safeName = uniqid('img_', true) . '.' . $ext;
                if (move_uploaded_file($tmpName, $uploadDir . $safeName)) {
                    $gambar = 'assets/' . $safeName;
                }
            }
        }

    $query = "UPDATE tbl_promosi 
              SET judul_promosi='$judul',
                gambar_promosi='$gambar',
                  deskripsi='$deskripsi',
                  tgl_mulai='$mulai',
                  tgl_selesai='$selesai'
              WHERE id_promosi='$id'";

    mysqli_query($koneksi, $query);

    header("Location: index.php");
    exit();
}
?>
