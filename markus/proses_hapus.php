<?php
include "koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tbl_promosi WHERE id_promosi=$id");
header("Location: index.php");
?>