<?php
include "koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tbl_staf WHERE id_staf=$id");
header("Location: index.php");
?>