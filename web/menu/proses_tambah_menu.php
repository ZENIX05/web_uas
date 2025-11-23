<?php

include "../../link/koneksi.php";
$nama_menu = $_POST["nama_menu"];
$gambar = $_FILES["gambar"] ["name"];
$harga = $_POST["harga"];
$deskripsi = $_POST["deskripsi"];
$status = $_POST["status"];
$direction = $_FILES["gambar"] ["tmp_name"];


$data = mysqli_query ($koneksi,"INSERT INTO tbl_menu (nama_menu, harga, deskripsi, gambar, status) VALUES ('$nama_menu','$harga','$deskripsi','$gambar','$status')");

move_uploaded_file($direction,'../assets/'.$gambar);
header('location:index.php');

?>
