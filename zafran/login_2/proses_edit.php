<?php
include("koneksi.php");
if (isset($_POST['update'])) {
    $nama = ($_POST['nama_lengkap']);
    $user = ($_POST['username']);
    $password= $_POST['password'];
    $role = ($_POST['role']);
    $id = $_GET['id'];

    $query = "UPDATE tbl_staf SET nama_lengkap='$nama', username='$user',password='$password', role='$role' WHERE id_staf=$id";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
