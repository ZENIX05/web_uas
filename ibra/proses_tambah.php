<?php
include "koneksi.php";
    if (isset($_POST['simpan'])) {
        $nama_menu = ($_POST['nama_menu']);
        $deskripsi = ($_POST['deskripsi']);
        $harga = ($_POST['harga']);
        $status = ($_POST['status']);
        $gambar = '';

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

            $tmpName = $_FILES['gambar']['tmp_name'];
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($ext, $allowedExts)) {
                $safeName = uniqid('img_', true) . '.' . $ext;
                if (move_uploaded_file($tmpName, $uploadDir . $safeName)) {
                    $gambar = 'uploads/' . $safeName;
                }
            }
        }

        $query = "INSERT INTO tbl_menu (nama_menu, harga, deskripsi, gambar, status) VALUES ('$nama_menu', '$harga', '$deskripsi', '$gambar', '$status')";
        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php");
            exit();
        }
    }
    ?>