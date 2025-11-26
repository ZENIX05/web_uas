<?php
include "../link/koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tbl_artikel WHERE id_artikel=$id");
header("Location: index.php");
?>