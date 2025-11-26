<?php
session_start();
include 'koneksi.php'; // koneksi database

// LOGIKA LOGIN
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 1. Cari user berdasarkan username di tabel tbl_staf
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_staf WHERE username = '$username'");

    // 2. Cek apakah username ditemukan
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        if ($password == $data['password']) {

            // 4. Set Session
            $_SESSION['user_id'] = $data['id_staf'];
            $_SESSION['username'] = $data['nama_lengkap'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['status'] = "login";

            // 5. Cek Role untuk Pengalihan Halaman
            if ($data['role'] == "Admin") {
                header("Location: index.php");
            } else if ($data['role'] == "Kasir") {
                header("Location: kasir.php");
            } else {
                // Default jika role lain
                header("Location: index.php");
            }
            exit;
        } else {
            // Password salah
            header("Location: login.php?pesan=gagal");
            exit;
        }
    } else {
        // Kembalikan ke login.php dengan pesan error di URL
        header("Location: login.php?pesan=gagal");
        exit;
    }
}
?>