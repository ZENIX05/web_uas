
<?php
include "../link/koneksi.php";
if (isset($_POST['update'])) {
        $judul = ($_POST['judul_artikel']);
        $konten = ($_POST['isi_konten']);
        $penulis = ($_POST['penulis']);
        $id_staf = ($_POST['id_staf']);
        $result = mysqli_query($koneksi, "SELECT gambar_utama FROM tbl_artikel");
        $row = mysqli_fetch_assoc($result);

        $gambar = $row['gambar_utama'];
            if (isset($_FILES['gambar_utama']) && $_FILES['gambar_utama']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/uploads/';

            if (!is_dir( $uploadDir)) mkdir($uploadDir, 0755, true);
            $tmpName = $_FILES['gambar_utama']['tmp_name'];
            $ext = strtolower(pathinfo($_FILES['gambar_utama']['name'], PATHINFO_EXTENSION));
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
            
            if (in_array($ext, $allowedExts)) {
                $safeName = uniqid('img_', true) . '.' . $ext;
                if (move_uploaded_file($tmpName, $uploadDir . $safeName)) {
                    $gambar = 'uploads/' . $safeName;
                }
            }
        }

        $query = "UPDATE tbl_artikel SET judul_artikel='$judul', isi_konten='$konten', penulis= '$penulis', id_staf='$id_staf', gambar_utama='$gambar'";
        if (mysqli_query($koneksi, $query)) {
            header("location:index.php");
            exit();
        } else {
            echo "SQL ERROR: " . mysqli_error($koneksi);
        }
    }
    ?>