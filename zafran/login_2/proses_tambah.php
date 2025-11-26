<?php
// 1. Mulai Session & Koneksi
ob_start();
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// 2. LOGIKA SIMPAN DATA (Ditaruh di sini)
if (isset($_POST['simpan'])) {
    $nama     = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    // Cek username kembar
    $cek = mysqli_query($koneksi, "SELECT * FROM tbl_staf WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah terpakai! Silakan ganti.');</script>";
    } else {
        // Enkripsi Password (WAJIB, karena login pakai password_verify)
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);

        // Masukkan ke database
        $query = "INSERT INTO tbl_staf (nama_lengkap, username, password, role) 
                  VALUES ('$nama', '$username', '$pass_hash', '$role')";
        
        $simpan_data = mysqli_query($koneksi, $query);

        if ($simpan_data) {
            echo "<script>alert('Berhasil menambah user!'); window.location='index.php';</script>";
            exit;
        } else {
            echo "Gagal menyimpan: " . mysqli_error($koneksi);
        }
    }
}
?>