 <?php
    include "koneksi.php";
    if (isset($_POST['simpan'])) {
        $judul   = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $mulai   = $_POST['mulai'];
        $selesai = $_POST['selesai'];
        $gambar = '';

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

        $query = "INSERT INTO tbl_promosi (judul_promosi, gambar_promosi, deskripsi, tgl_mulai, tgl_selesai) VALUES ('$judul', '$gambar', '$deskripsi', '$mulai', '$selesai')";
        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php");
            exit();
        }
    }
    ?>